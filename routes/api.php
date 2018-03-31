<?php

use Illuminate\Http\Request;



Route::post('/addEvent','EventController@addEvent');
Route::get('/getEvents','EventController@getEvents');
