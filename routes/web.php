<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/task', 'TaskController@home');

// 资源管理器模式路由, 不同的method与url的组合会分别映射到不同的方法上
//Route::resource('post', 'PostController');

// 兜底路由
Route::fallback(function () {
    return '哎，这真是太为难我了～';
});

//路由中间件配置
Route::group(['middleware' => ['throttle:6,1']], function () {
    Route::get('post', 'PostController@index');
});

// method改写, 表单加入token参数
Route::get('task/{id}/delete', function ($id) {
    return '<form method="post" action="' . route('task.delete', [$id]) . '">
                <input type="hidden" name="_method" value="DELETE"> 
                <input type="hidden" name="_token" value="' . csrf_token() . '">
                <button type="submit">删除任务</button>
            </form>';
});
Route::delete('task/{id}', function ($id) {
    return 'Delete Task ' . $id;
})->name('task.delete');

// 视图
// php
Route::get('user/{id?}', function ($id = 1) {
    return view('user.profile', ['id' => $id]);
});

// blade
Route::get('page/{id}', function ($id) {
    return view('page.show', ['id' => $id]);
})->where('id', '[0-9]+');

// css
Route::get('page/css', function () {
    return view('page.style');
});