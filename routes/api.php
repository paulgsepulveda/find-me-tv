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

Route::prefix('v1')->group(function() { //'auth:api'

  Route::post('discover', 'ApiController@discoverShow');

  Route::post('search', 'ApiController@search');

  Route::get('show/{show}', 'ApiController@getShow');
  Route::get('show/{show}/season/{season}', 'ApiController@getSeason');
  Route::get('show/{show}/season/{season}/episode/{episode}', 'ApiController@getEpisode');
  
  Route::post('create', 'ApiController@createReview');
  Route::post('update', 'ApiController@updateReview');
  Route::post('review', 'ApiController@getReview');
  Route::post('reviews', 'ApiController@getReviews');

});

