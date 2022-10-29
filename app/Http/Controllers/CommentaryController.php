<?php

namespace App\Http\Controllers;

use App\Models\Commentary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentaryController extends Controller
{
    
    public function store(Request $request){
        // dd($request['post_id']);
        if(!Auth::user()){
            return redirect()->route('post.index')->with('danger','Inicie sesión para realizar comentarios');
        }

        Commentary::create([
            'mensaje' => $request['mensaje'],
            'post_id' => $request['post_id'],
            'user_id' => Auth::user()->id,
        ]);

        return redirect()->route('post.index')->with('success','Comentario registrado');
    }
}
