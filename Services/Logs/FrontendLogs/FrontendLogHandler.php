<?php
/**
 * Created by PhpStorm.
 * author: harris
 * Date: 3/27/19
 * Time: 9:48 AM
 */

namespace App\Services\Logs\FrontendLogs;

use App\Services\Logs\LogsCommons\CommonLogFormatter;
use Monolog\Handler\AbstractProcessingHandler;
use Monolog\Logger;

class FrontendLogHandler extends AbstractProcessingHandler
{
    public function __construct($level = Logger::DEBUG)
    {
        parent::__construct($level);
    }

    /**
     * @param array $record
     */
    protected function write(array $record):void
    {
        // Queue implementation
        event(new FrontendLogMonologEvent($record));
    }

    /**
     * {@inheritDoc}
     */
    protected function getDefaultFormatter()
    {
        return new CommonLogFormatter();
    }
}
