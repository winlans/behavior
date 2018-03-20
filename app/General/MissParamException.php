<?php
/**
 * Created by PhpStorm.
 * User: raye
 * Date: 2018/3/20
 * Time: 17:19
 */
namespace App\General;

use Throwable;

class MissParamException extends \Exception{
    public function __construct(string $message = "miss param", int $code = JsonResponse::MISS_PARAM, Throwable $previous = null)
    {
        $this->message = $message;
        $this->code = $code;
    }
}