<?php

use Illuminate\Http\Request;


//event routes
Route::post('/addEvent','EventController@addEvent');
Route::get('/getEvents','EventController@getEvents');
Route::delete('/delete/{id}','EventController@deleteEvent');
Route::get('/getEvent/{id}','EventController@getEvent');
Route::post('/editEvent','EventController@editEvent');


//event_comments routes
Route::post('/addEventComment','EventCommentController@addEventComment');