<?php

namespace App\Http\Controllers;

use App\General\JsonResponse;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    protected $redirectPath = '/where/you/want';
    /**
     * Get a JWT token via given credentials.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $this->verifyInputParams($request->all(), ['mobile', 'password']);

        // 使用 Auth 登录用户，如果登录成功，则返回 201 的 code 和 token，如果登录失败则返回
        return ($token = Auth::guard('api')->attempt($request->all()))
            ? new JsonResponse(JsonResponse::SUCCESS, 'success', $token)
            : new JsonResponse(JsonResponse::FAILD, 'auth failed.');
    }

    /**
     * 处理用户登出逻辑
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        Auth::guard('api')->logout();

        return new JsonResponse(JsonResponse::SUCCESS);
    }
}
