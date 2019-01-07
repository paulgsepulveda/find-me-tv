<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('v1')->middleware('auth:api')->group(function() {

  Route::get('discover', 'API\ApiController@discoverShow');
  Route::get('show/{show}', 'API\ApiContoller@getShow');
  Route::get('show/{show/season/{season}', 'API\ApiController@getSeason');
  Route::get('show/{show}/season/{season}/episode/{episode}', 'API\ApiController@getEpisode');
  
  Route::post('create', 'API\ApiController@createReview');
  Route::post('update', 'API\ApiController@updateReview');
  Route::post('review', 'API\ApiController@getReview');
  Route::post('reviews', 'API\ApiController@getReviews');
  
});

