<?php

namespace App\Http\Controllers;

use App\Message;
use App\User;
use Illuminate\Http\Request;

class MessagesController extends Controller
{

    public function store(Request $request)
    {
        $this->validate($request, [
            'content' => 'required|max:100',
        ]);

        $request->user()->messages()->create([
            'content' => $request->content,
            'delivery_id' => $request->delivery_id,
        ]);

        return back();
    }

    public function destroy($id)
    {

        $message = \App\Message::find($id);

        if (\Auth::id() == $message->user_id) {
            $message->delete();
        }
        return back();

    }

}
