<?php
/**
 * Created by PhpStorm.
 * User: raye
 * Date: 2018/3/20
 * Time: 16:53
 */
namespace App\General;
class JsonResponse extends \Illuminate\Http\JsonResponse {
    const MISS_PARAM = 10001;
    const SUCCESS = 1;
    const FAILD = 0;
    const TOKEN_EXPIRE = 11111;
    public function __construct($code = self::SUCCESS, $msg = 'success', $data = [], int $status = 200, array $headers = [], int $options = 0)
    {
        $return = array(
            'data' => $data,
            'code' => $code,
            'msg' => $msg,
        );
        parent::__construct($return, $status, $headers, $options);

    }
}