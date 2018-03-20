<?php
/**
 * Created by PhpStorm.
 * User: raye
 * Date: 2018/3/20
 * Time: 16:45
 */
namespace App\General;
trait Verifier
{
    private $error;
    /**
     * fixme: integrate EnsureService
     * @param $exp
     * @param $errorCode
     * @param $errorMsg
     * @return bool
     */
    protected function ensure( $exp, $errorCode, $errorMsg )
    {
        if ( !$exp ) {
            $this->error = array(
                'errorCode' => $errorCode,
                'errorMsg' => $errorMsg
            );

            return false;
        }

        return true;
    }

    /**
     * @param string $email
     * @return bool
     */
    function emailValidate($email){
        return (bool)filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    /**
     * @param string $phone
     * @return bool
     */
    function phoneValidate($phone){
        $pattern = "/^1[34578]\\d{9}$/";
        return (bool)preg_match($pattern, $phone);
    }

    /**
     * @param string $id
     * @return bool
     */
    function checkPsidOrUuid($id) {
        if (is_numeric($id)){
            return true;
        }
        return false;
    }

    /**
     * @param $time
     * @return \DateTime
     */
    function timeProcessing($time) {
        if (empty($time)) {
            return new \DateTime('0000-00-00 00:00:00');
        }

        if(strtotime($time)) {
            return new \DateTime($time);
        } else {
            return new \DateTime(date ('Y-m-d H:i:s', $time));
        }
    }

    /**
     * Check whether the field exists, there is a return value, there is no return error information
     * 检查字段是否存在，存在返回数值，不存在返回错误信息
     * @param $data
     * @param $fields
     */
    function verifyInputParams($data, $fields) {
        $error = array('status' => 1);
        $param = array();
        foreach ($fields as $key => $val) {
            if (!isset($data[$val])) {
                throw new MissParamException('Illegal operation not find ' . $val . ' field', JsonResponse::MISS_PARAM);
            }
            $param[$key] = $data[$val];
        }

        $error['msg'] = '';
        $error['data'] = $param;
    }

}