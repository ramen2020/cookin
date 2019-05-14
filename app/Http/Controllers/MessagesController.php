<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Delivery;
use App\Message;
use App\User;

class MessagesController extends Controller
{

    
    
    
    public function store(Request $request)
    {
        $this->validate($request, [
            'content' => 'required|max:191',
        ]);
        
        
        
        $request->user()->messages()->create([
            'content' => $request->content,
            'delivery_id' => $request->delivery_id,
            'user_id' => $request->user_id,
        ]);
    	
    	 return back();
    }
    
        public function destroy($id)
        {
         
            $message = \App\Message::find($id);
    
            if(\Auth::id() == $message->user_id){
                $message->delete();
            }  
                 return back();
            
        }
        
}
