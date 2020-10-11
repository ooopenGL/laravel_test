<?php
/**
 * Created by PhpStorm.
 * User: xiajia
 * Date: 2020/9/29
 * Time: 9:38 PM
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller
{
    // 输入参数获取, 包括get和post方法
    public function input_data(Request $request)
    {
        return $request -> all();
    }

    // url路由参数获取
    public function path_param(Request $request, $id, $code)
    {
        return $request -> segments();
    }
}