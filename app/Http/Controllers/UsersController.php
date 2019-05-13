<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Delivery;


class UsersController extends Controller
{
    
    public function index()
    {
        $users = User::orderBy('id', 'desc')->paginate(10);

        return view('users.index', [
            'users' => $users,
        ]);
    
    }
    
    public function show($id)
    {
        
        $data = [];
        $user = User::find($id);
        $deliveries = $user->deliveries()->orderBy('created_at', 'desc')->paginate(10);
        
        $data = [
            'user' => $user,
            'deliveries' => $deliveries,
        ];
    
        return view('users.show', $data);

    }
    
    public function store(Request $request)
    {
        
        $this->validate($request, [
            'name' =>'required|max:255',
            'email' =>'required|max:255',
            'content' => 'required|max:191',
        ]);
        
        $request->user()->create([
            'name' => $request->name,
            'content' => $request->content,
            'email' => $request->email,
            
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
            'name' =>'required|max:255',
            'content' => 'required|max:191',
            'email' => 'required|max:191',
        ]);
        
       
       $request->user()->update([
            'name' => $request->name,
            'content' => $request->content,
            'email' => $request->email,
        ]);


        return redirect('/');
        
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
