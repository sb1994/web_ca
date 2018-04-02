<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
class EventController extends Controller
{
    //
    public function addEvent(Request $request){
        if($request->input('img') != ""){
            $img = $request->file('img');
            //expoles the base64 text for the image
            $exploded = explode(',',$request->img);

            //gets the string after the comma
            $decoded = base64_decode($exploded[1]);

            //checks the exstention
            if (str_contains($exploded[0],'jpeg')) {
            $extension = 'jpg';
            }else {
            # code...
            $extension = 'png';
            }
            //setting the name that will be stored in the db and with the image
            $fileName = str_random().'.'.$extension;
            //
            $path = public_path()."/storage/img/".$fileName;
            if(file_put_contents($path,$decoded)){
                $event  = new Event();
                $event->name = $request->name;
                $event->description = $request->description;
                $event->img = $fileName;
                $event->save();
                return response()
                ->json([
                    'status' => 200,
                    'msg'=>'Event was created'
                ]);
            }else{
                return response()
                ->json([
                    'status'=>409,
                    'msg'=>'Failed to store image'
                ]);
            }
        }else {
            return response()
                ->json([
                    'status'=>400,
                    'msg'=>'Please fill in All data'
                ]);
        }
    }
    public function getEvents(){
        $events = Event::All();

        return $events;
    }
}
