<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Delivery;
use App\User;
use App\Message;


class DeliveriesController extends Controller
{
    public function index()
    {
        
        if (\Auth::check()) {
         // ログイン時の処理
         
         //全てのユーザーの出品一覧にする
         
            $data = [];
            $user = \Auth::user();
            $deliveries = Delivery::orderBy('created_at', 'desc')->paginate(20);
            
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
        $messages = $delivery->messages()->orderBy('created_at', 'desc')->paginate(6);
       
        
        $data = [
            'user' => $user,
            'delivery' => $delivery,
            'messages' => $messages,
           
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
            'name' => 'required|max:20',
            'content' => 'required|max:500',
            'price' => 'required|max:100000|numeric',
            'place' => 'required|max:20',
        ]);
        
        $file = $request->file('file');
        $path = Storage::disk('s3')->putFile('/', $file, 'public');
        $url = Storage::disk('s3')->url($path);

        $request->user()->deliveries()->create([
            'name' => $request->name,
            'content' => $request->content,
            'price' => $request->price,
            'place' => $request->place,
            'img' => $url,
        ]);

        return redirect('/')->with('flash_message', '出品しました！！！');
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
            'name' =>'required|max:20',
            'content' => 'required|max:500',
            'price' => 'required|max:100000|numeric',
            'place' => 'required|max:20',
        ]);
        
        
        $file = $request->file('file');
        $path = Storage::disk('s3')->putFile('/', $file, 'public');
        $url = Storage::disk('s3')->url($path);
       
     
        Delivery::find($id)->update([
            'name' => $request->name,
            'content' => $request->content,
            'place' => $request->place,
            'price' => $request->price,
            'img' => $url,
        ]);
        
         return redirect('/')->with('flash_message', '出品を更新しました！');
        
        
    }
    
    public function destroy($id)
    {
        
        $delivery = \App\Delivery::find($id);

        if (\Auth::id() == $delivery->user_id) {
            $delivery->delete();
        }

        return redirect('/')->with('flash_message', '出品を削除しました。');
    }
    
    
}