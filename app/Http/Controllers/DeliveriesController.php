<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Delivery;
use App\User;

class DeliveriesController extends Controller
{
    public function index()
    {
        
        if (\Auth::check()) {
         // ログイン時の処理
         
         //全てのユーザーの出品一覧にする
         
            $data = [];
            $user = \Auth::user();
            $deliveries = Delivery::orderBy('created_at', 'desc')->paginate(10);
            
            $data = [
                'user' => $user,
                'deliveries' => $deliveries,
            ];
        
        
            return view('deliveries.index', [
                'deliveries' => $deliveries,
            ]);
         
        } else {
            
         // ログインしていないときの処理
             return view('welcome');
        }
  
    }
    
    public function show($id)
    {
        
        $data = [];
        $user = User::find($id);
        $delivery = Delivery::find($id);
        
        $data = [
            'user' => $user,
            'delivery' => $delivery,
        ];
    
        return view('deliveries.show', $data);
    }
    
    public function create()
    {
        $delivery = new Delivery;

        return view('deliveries.create', [
            'delivery' => $delivery,
        ]);
    }
    
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:191',
            'content' => 'required|max:191',
            'price' => 'required|max:191',
            'place' => 'required|max:191',
        ]);

        $request->user()->deliveries()->create([
            'name' => $request->name,
            'content' => $request->content,
            'price' => $request->price,
            'place' => $request->place,
        ]);

        return redirect('/');
    }
    
    public function edit($id)
    {
        $delivery = Delivery::find($id);

        if(\Auth::id() == $delivery->user_id){
            return view('deliveries.edit', [
            'delivery' => $delivery,
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
            'place' => 'required|max:191',
            'price' => 'required|max:191',
        ]);
        
        
        Delivery::find($id)->update([
            'name' => $request->name,
            'content' => $request->content,
            'place' => $request->place,
            'price' => $request->price,
        ]);
        
         return redirect('/');
        
        
    }
    
    public function destroy($id)
    {
        $delivery = \App\Delivery::find($id);

        if (\Auth::id() == $delivery->user_id) {
            $delivery->delete();
        }

        return back();
    }
}