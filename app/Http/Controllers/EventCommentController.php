<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EventComment;
class EventCommentController extends Controller
{
    //
    public function addEventComment(Request $request){
        $event_comment = new EventComment();
        $event_comment->comment = $request->comment;
        $event_comment->username = $request->username;
        $event_comment->event_id = $request->event_id;
        if ($event_comment->save()) {
          return response()->json([
              'status'=>200
            ]
          );
        }else {
          return response()->json([
              'status'=>400
            ]
          );
        }
    }
    public function getEventCommentsByEid($id){
        $event_comments = EventComment::where('event_id','=',$id)->get();
        return response()->json(['event_comments'=>$event_comments]);
    }
}
