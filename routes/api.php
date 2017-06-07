<?php

use Illuminate\Http\Request;

Route::post('signup', 'ApiUserController@signup');

Route::post('signin', 'ApiUserController@signin');
// Route::post('location', function(){
//     $user = JWTAuth::parseToken()->toUser();

//     return response()->json(['success' => 'user found', 'user' => $user]);
// })->middleware('auth.jwt');
