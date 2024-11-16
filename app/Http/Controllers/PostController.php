<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function deletePost(Post $post){
        if (auth()->user()->getAuthIdentifier() === $post['user_id']) {
            $post->delete();
        }
        return redirect('/user-posts');
    }
    public function actuallyUpdatePost(Post $post, Request $request)
    {
        if (auth()->user()->getAuthIdentifier() !== $post['user_id']) {
            return redirect('/user-posts');
        }
        $incomingFields = $request->validate([
            'car' => 'required',
            'price' => 'required|numeric',
            'description' => 'required',
        ]);


        $incomingFields['car']=strip_tags($incomingFields['car']);
        $incomingFields['price']=strip_tags($incomingFields['price']);
        $incomingFields['description']=strip_tags($incomingFields['description']);

        $post->update($incomingFields);
        return redirect('user-posts');
    }

public function showEditScreen(Post $post){
    if (auth()->user()->getAuthIdentifier() !== $post['user_id']) {
        return redirect('/');
    }
    return view('/edit-post', ['post' => $post]);
}
    public function addCar(Request $request)
    {
        $incomingFields = $request->validate([
            'car' => 'required',
            'price' => 'required',
            'description' => 'required'
        ]);

        $incomingFields['car']=strip_tags($incomingFields['car']);
        $incomingFields['price']=strip_tags($incomingFields['price']);
        $incomingFields['description']=strip_tags($incomingFields['description']);
        $incomingFields['user_id']= auth()->id();
        Post::create($incomingFields);
        return redirect('/user-posts');
    }
}
