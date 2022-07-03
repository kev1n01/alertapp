<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function __construct()
    {
        //para proteger las rutas antes de autenticar usuario
        $this->middleware('auth')->only(['edit','myposts','create','adminpost','delete']);
    }
    public function index(){
        $posts = Post::all();
        return view('post.index',compact('posts'));

    }

    public function show(){
        return view('post.show');
    }

    public function myposts(){
        $myposts = Post::where('user_id',Auth::user()->id)->get();
        return view('post.my-post',compact('myposts'));
    }

    public function edit($id){
        $post = Post::find($id);
        $categorias = Category::all();
        return view('post.edit',compact('post','categorias'));
    }

    public function store(Request $request){
        $validated = $request->validate([
            'titulo' => 'required|unique:posts|max:50|min:10',
            'ubicacion' => 'required|max:30|min:5',
            'category_id' => 'required',
            'multimedia' => 'required',
        ]);
        $validated['user_id'] = Auth::user()->id; //agregando el valor del id del usuario autenticado a la validacion
//        dd($validated);
        Post::updateOrCreate($validated);
        return redirect()->route('post.my-posts');
    }
    public function create(){
        $categorias = Category::all();
//        dd($categorias);
        return view('post.create',compact('categorias'));
    }
    public function delete(Post $post){
        $post->delete();
        return redirect()->route('post.my-posts');
    }
    public function adminpost(){
        $allposts = Post::all();
        return view('post.admin.index',compact('allposts'));
    }
}
