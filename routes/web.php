<?php

use AshAllenDesign\ShortURL\Classes\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
    return view('app');
});

Route::middleware('throttle:5')->post('/shorten', function (Request $request) {
    $builder = new Builder();
    $shortURLObject = $builder->destinationUrl($request->get('url'))->make();

    return response()->json([
        'shorten' => route('short-url.invoke', [$shortURLObject->url_key])
    ]);
});
