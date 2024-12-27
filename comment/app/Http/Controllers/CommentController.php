<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        return Comment::where('post_id', $id)->get();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $comment =  Comment::create([
            'post_id' => $request->input('post_id'),
            'text' => $request->input('text'),
        ]);
        if(rand(0,10) <= 9 ){
            $req = Http::post("http://localhost:8000/api/posts/{$comment->post_id}/comments",[
                'text' => $comment->text
            ]);

            if($req->failed()){
                echo "Request Failed!";
            }
        }

        return $comment;
    }


}
