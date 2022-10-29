<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function __construct()
    {
        //para proteger las rutas antes de autenticar usuario
        $this->middleware('auth')->only(['edit','myposts','create','adminpost','delete']);
    }
    public function index(){
        $posts = Post::withCount(['commentary'])->get();
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
            'titulo' => 'required|max:50|min:5',
            'ubicacion' => 'required|max:50|min:5',
            'descripcion' => 'required|max:100|min:5',
            'category_id' => 'required',
            'multimedia' => 'required',
        ]);
        
        if(isset($validated['multimedia'])){            
            $validated['multimedia'] = $nombrearchivo = str_replace(" ","",$validated['titulo'])."_".time().".".$validated['multimedia']->extension();
            $request->multimedia->move(public_path('img/post'),$nombrearchivo);
        }
        $validated['user_id'] = Auth::user()->id; //agregando el valor del id del usuario autenticado a la validacion
        Post::create($validated);
        return redirect()->route('post.my-posts')->with('success','Publicación creado con exito');;
    }
    public function update(Request $request,$id){
        $postfind = Post::find($id);
        // dd($post);
        $validated = $request->validate([
            'titulo' => 'required|max:50|min:5',
            'ubicacion' => 'required|max:50|min:5',
            'descripcion' => 'required|max:100|min:5',
            'category_id' => 'required',
            'multimedia' => 'required',
        ]);

        if(isset($validated['multimedia'])){            
            $validated['multimedia'] = $nombrearchivo = str_replace(" ","",$validated['titulo'])."_".time().".".$validated['multimedia']->extension();
            $request->multimedia->move(public_path('img/post'),$nombrearchivo);
        }

        $postfind->update([
            'titulo' => $validated['titulo'],
            'ubicacion' => $validated['ubicacion'],
            'descripcion' => $validated['descripcion'],
            'category_id' => $validated['category_id'],
            'multimedia' => $validated['multimedia'],
            'user_id' => Auth::user()->id,
        ]);
      

        return redirect()->route('post.my-posts')->with('success','Publicación actualizado con exito');

    }
    public function create(){
        $categorias = Category::all();
//        dd($categorias);
        return view('post.create',compact('categorias'));
    }
    public function delete($id){
        $post = Post::find($id);
        $post->commentary()->delete();//elimina primeros los comentarios relacionados al post
        $post->delete();
        return redirect()->route('post.my-posts')->with('success','EL post se eliminó con exito');
    }
    public function adminpost(){
        $allposts = Post::all();
        return view('post.admin.index',compact('allposts'));
    }


    public function removeImage($image){
        if(!$image){
            return ;
        }

        if(Storage::disk('public')->exists($image)){
            Storage::disk('public')->delete($image);
        }
    }
}
