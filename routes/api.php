<?php

use Illuminate\Http\Request;



Route::post('/addEvent','EventController@addEvent');
Route::get('/getEvents','EventController@getEvents');
Route::delete('/delete/{id}','EventController@deleteEvent');
Route::get('/getEvent/{id}','EventController@getEvent');
Route::post('/editEvent','EventController@editEvent');
