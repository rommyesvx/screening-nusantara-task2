<?php

namespace App\Http\Controllers;

use App\Http\Resources\RegisterResources;
use App\Http\Resources\SiswaResources;
use App\Models\Post;
use App\Models\Register;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index(){
        $posts = Post::all();
        return response()->json($posts);
    }
    public function store(Request $request){
        $validated = $request->validate([
            'id_kelas'=>'max:50',
            'nama'=> 'required',
        ]);
        $post = Post::create($request->all());
        return new SiswaResources($post);
    }
    public function update(Request $request, $id){
        $validated = $request->validate([
            'nama'=> 'required',
        ]);
        $post = Post::findOrFail($id);
        $post->update($request->all());
        return new SiswaResources($post);
    }
    public function destroy($id){
        $post = Post::findOrFail($id);
        $post->delete();

        return new SiswaResources($post);
    }
}
