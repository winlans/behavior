<?php
/**
 * Created by PhpStorm.
 * User: raye
 * Date: 2018/3/20
 * Time: 14:18
 */

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
class UserController extends Controller{

    public function profile(){
        return 'afafaf';
    }

    public function register(Request $request){
        $fields = ['name', 'mobile', ''];
    }

}