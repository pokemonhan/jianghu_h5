<?php

namespace App\Lib\ErrorsHandler\Reporters;

use Exception;

interface ReporterInterface
{
    public function report(Exception $e);
}
