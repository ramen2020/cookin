<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Delivery;
use App\Message;
use Illuminate\Support\Facades\Storage;


class UsersController extends Controller
{
    
    public function index()
    {
        
        $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();
            $favorite_users = $user->feed_favorites()->orderBy('created_at', 'desc')->paginate(10);
            $users = User::orderBy('id', 'desc')->paginate(10);


            $data = [
                'user' => $user,
                'users' => $users,
                'favorite_users' => $favorite_users,
            ];
        }
        return view('users.index', $data);
    } 
    
    public function show($id)
    {
        
        $data = [];
        $user = User::find($id);
        $deliveries = $user->deliveries()->orderBy('created_at', 'desc')->paginate(10);
        $count_followers = $user->followers()->count();
       
        
        $data = [
            'user' => $user,
            'deliveries' => $deliveries,
            'count_followers' => $count_followers,
        ];
    
        return view('users.show', $data);

    }
    
    public function store(Request $request)
    {
        
        $this->validate($request, [
            'name' =>'required|max:15',
            'email' =>'required|max:150',
            'content' => 'required|max:500',
        ]);
        
        $file = $request->file('file');
        $path = Storage::disk('s3')->putFile('/', $file, 'public');
        $url = Storage::disk('s3')->url($path);
        
        $request->user()->create([
            'name' => $request->name,
            'content' => $request->content,
            'email' => $request->email,
            'user_picture' => $url,
            
        ]);


        return redirect('/');
    }
    
    public function edit($id)
    {
        $user = User::find($id);
    
        if (\Auth::id() == $user->id) {
            return view('users.edit', [
                'user' => $user,
            ]);
        }else {
    
            return redirect('/');
        }
    }
    
    public function update(Request $request, $id)
    {
        
        $this->validate($request, [
            'name' =>'required|max:15',
            'email' => 'required|max:150',
            'content' => 'required|max:500',
          
        ]);
        
        $file = $request->file('file');
        $path = Storage::disk('s3')->putFile('/', $file, 'public');
        $url = Storage::disk('s3')->url($path);
        
       
       $request->user()->update([
            'name' => $request->name,
            'content' => $request->content,
            'email' => $request->email,
            'user_picture' => $url,
        ]);


        return redirect('/')->with('flash_message', 'プロフィールを更新しました！');;
        
    }
    
    public function destroy($id)
    {
        
        $user = \App\User::find($id);
        $delivery = $user->deliveries();
        
        if (\Auth::id() == $user->id) {
            
            $delivery->delete();
            $user->delete();
        }

        return redirect('/');
    }
    
    
}
