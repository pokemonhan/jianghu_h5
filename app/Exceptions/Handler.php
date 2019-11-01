<?php

namespace App\Exceptions;

use App\Lib\ErrorsHandler\Formatters\BaseFormatter;
use App\Lib\ErrorsHandler\Reporters\ReporterInterface;
use Asm89\Stack\CorsService;
use Exception;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Contracts\Container\Container;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Request;
use Jenssegers\Agent\Agent;
use ReflectionClass;
use Symfony\Component\HttpFoundation\Response;

class Handler extends ExceptionHandler
{
    protected $config;

    protected $container;

    protected $debug;

    protected $reportResponses = [];
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * ExceptionHandler constructor.
     * @param Container $container
     */
    public function __construct(Container $container)
    {
        parent::__construct($container);

        $this->config = $container['config']->get('overall-exception');
        $this->debug = $container['config']->get('app.debug');
    }

//    /**
//     * Report or log an exception.
//     *
//     * @param  \Exception  $exception
//     * @return void
//     */
//    public function report(Exception $exception)
//    {
//        if ($this->shouldntReport($exception)) {
//            return;
//        }
//        //###### sending errors to tg //Harris ############
//        $appEnvironment = app()->environment();
//        if ($appEnvironment == 'develop' || $appEnvironment == 'test-develop') {
//            $agent = new Agent();
//            $os = $agent->platform();
//            $osVersion = $agent->version($os);
//            $browser = $agent->browser();
//            $bsVersion = $agent->version($browser);
//            $robot = $agent->robot();
//            if ($agent->isRobot()) {
//                $type = 'robot';
//            } elseif ($agent->isDesktop()) {
//                $type = 'desktop';
//            } elseif ($agent->isTablet()) {
//                $type = 'tablet';
//            } elseif ($agent->isMobile()) {
//                $type = 'mobile';
//            } elseif ($agent->isPhone()) {
//                $type = 'phone';
//            } else {
//                $type = 'other';
//            }
//            $error = [
//                'origin' => request()->headers->get('origin'),
//                'ips' => json_encode(request()->ips(), JSON_THROW_ON_ERROR, 512),
//                'user_agent' => request()->server('HTTP_USER_AGENT'),
//                'lang' => json_encode($agent->languages(), JSON_THROW_ON_ERROR, 512),
//                'device' => $agent->device(),
//                'os' => $os,
//                'browser' => $browser,
//                'bs_version' => $bsVersion,
//                'os_version' => $osVersion,
//                'device_type' => $type,
//                'robot' => $robot,
//                'inputs' => Request::all(),
//                'file' => $exception->getFile(),
//                'line' => $exception->getLine(),
//                'code' => $exception->getCode(),
//                'message' => $exception->getMessage(),
//                'previous' => $exception->getPrevious(),
//                'TraceAsString' => $exception->getTraceAsString(),
//            ];
////            $telegram = new Telegram(config('telegram.token'), config('telegram.botusername'));
////            $telegram->sendMessage(config('telegram.chats.'.$appEnvironment), e((string)json_encode($error, JSON_THROW_ON_ERROR | JSON_PRETTY_PRINT, 512)));
//        }
//        Log::channel('daily')->error(
//            $exception->getMessage(),
//            array_merge($this->context(), ['exception' => $exception])
//        );
////        parent::report($exception);
//    }

    /**
     * Report
     *
     * @param Exception $e
     * @throws Exception
     * @returns void
     */
    public function report(Exception $e)
    {
        parent::report($e);

        $this->reportResponses = [];

        if ($this->shouldntReport($e)) {
            return $this->reportResponses;
        }

        $reporters = $this->config['reporters'];

        foreach ($reporters as $key => $reporter) {
            $class = $reporter['class'] ?? null;

            if (
                is_null($class) ||
                !class_exists($class) ||
                !in_array(ReporterInterface::class, class_implements($class))
            ) {
                throw new InvalidArgumentException(
                    sprintf(
                        '%s: %s is not a valid reporter class.',
                        $key,
                        $class
                    )
                );
            }

            $config = isset($reporter['config']) && is_array($reporter['config']) ? $reporter['config'] : [];

            // $this->container->make($class)($config) fails php <= 5.4
            $reporterFactory = $this->container->make($class);
            $reporterInstance = $reporterFactory($config);

            $this->reportResponses[$key] = $reporterInstance->report($e);
        }
    }

    /**
     * Render
     *
     * @param \Illuminate\Http\Request $request
     * @param Exception $e
     * @return Response
     */
    public function render($request, Exception $e)
    {
        $response = $this->generateExceptionResponse($request, $e);
        if ($this->config['add_cors_headers']) {
            if (!class_exists(CorsService::class)) {
                throw new InvalidArgumentException(
                    'asm89/stack-cors has not been installed. Harris api-error needs it for adding CORS headers to response.'
                );
            }
            /** @var CorsService $cors */
            $cors = $this->container->make(CorsService::class);
            $cors->addActualRequestHeaders($response, $request);
        }

        return $response;
    }

    /**
     * Generate exception response
     *
     * @param $request
     * @param Exception $e
     * @return mixed
     */
    private function generateExceptionResponse($request, Exception $e)
    {
        $formatters = $this->config['formatters'];
        // :: notation will otherwise not work for PHP <= 5.6
        $responseFactoryClass = $this->config['response_factory'];
        // Allow users to have a base formatter for every response.
        $response = $responseFactoryClass::make($e);
        foreach ($formatters as $exceptionType => $formatter) {
            if (!($e instanceof $exceptionType)) {
                continue;
            }
            if (
                !class_exists($formatter) ||
                !(new ReflectionClass($formatter))->isSubclassOf(new ReflectionClass(BaseFormatter::class))
            ) {
                throw new InvalidArgumentException(
                    sprintf(
                        '%s is not a valid formatter class.',
                        $formatter
                    )
                );
            }
            $formatterInstance = new $formatter($this->config, $this->debug);
            $formatterInstance->format($response, $e, $this->reportResponses);

            break;
        }
        return $response;
    }

    /*
    * @returns array
    */
    public function getReportResponses()
    {
        return $this->reportResponses;
    }

    protected function unauthenticated($request, AuthenticationException $exception)
    {
        if ($request->expectsJson()) {
            $msg = $exception->getMessage();
            if ($msg == 'Unauthenticated.') {
                $result = [
                    'success' => false,
                    'code' => $exception->getCode(),
                    'data' => [],
                    'message' => '您没有权限操作 请尝试先登录',
                ];
            } else {
                $result = ['message' => $msg];
            }
            return response()->json($result);
        } else {
            return redirect()->guest($exception->redirectTo() ?? route('login'));
        }
//        return parent::render($request, $exception);
    }
}
