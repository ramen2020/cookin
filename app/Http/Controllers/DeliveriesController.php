<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Delivery;
use App\User;
use App\Message;



class DeliveriesController extends Controller
{
    public function index(Request $request)
    {
        
        if (\Auth::check()) {
   
           $delivery_name = $request->get('delivery_name');
           $delivery_place = $request->get('delivery_place');
           $query = Delivery::query();
           
          	if (!empty($delivery_name)) {
          	    
        		$query->where('name', 'like', '%'.$delivery_name.'%');
                                
        	}if(!empty($delivery_place)) {
        	    
        		$query->where('place', 'like', '%'.$delivery_place.'%');
        		
        	}else{
        	   
        		$query ->orderBy('created_at', 'desc');
        		
        	}
        	
        	$deliveries = $query->paginate(12);
        	
            return view('deliveries.index', [
                'deliveries' => $deliveries,
                'delivery_name' => $delivery_name,
                'delivery_place' => $delivery_place,
               
            ]);
         
        } else {
            
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
            'name' => 'required|max:15',
            'content' => 'required|max:500',
            'price' => 'required|max:100000|numeric',
            'place' => 'required|max:15',
            'file' => 'required|image',
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
            'name' =>'required|max:15',
            'content' => 'required|max:500',
            'price' => 'required|max:100000|numeric',
            'place' => 'required|max:15',
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