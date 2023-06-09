<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    function __construct()
    {
        $this->middleware('auth')->except('index','show');
    }

    /**
     * Display a listing of the resource.
     */

    public function dashboard(){
        $authUser = Auth::user();
        $myPosts = $authUser->posts()->paginate(3);
        return view('post.dashboard', compact('myPosts'));
    } 
    public function index()
{
    $posts = Post::orderBy('id', 'desc')->paginate(4);
    return view('post.index', compact('posts'));
}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       
        return view('post.create');
    }

    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $request->validate([
            'title' => ['required','min:3', 'max:30'],
            'content' => ['required','min:3']
       ]);

       try {
       Post::create([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'user_id' => Auth::id(),
       ]);

       //return redirect()->route('route.index')->with('msg', 'Your post was successfully created');
       return redirect()->route('post.index')->with('msg', 'Your post was successfully created');


        } catch(\Exception $e) {
            return redirect()->back()->with('msg','post not added');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = Post::find($id);
        return view('post.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Post::find($id);
        return view('post.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => ['required','min:3', 'max:30'],
            'content' => ['required','min:3']
       ]);

       try {
        $myPost = Post::find($id);
       $myPost->update([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'user_id' => Auth::id(),
       ]);

       //return redirect()->route('route.index')->w  ith('msg', 'Your post was successfully created');
       return redirect()->route('post.index')->with('msg', 'Your Updated was successfully created');


        } catch(\Exception $e) {
            return redirect()->back()->with('msg','post not updated');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        try {
            $owner = $post->user->id;
            $authUser = Auth::id();

            if($owner == $authUser) {
                $post->delete();
                return redirect()->back()->with('msg', 'Your post was deleted successfully');
            } else{
                return redirect()->back()->with('msg', 'It is not your post to be deleted');
            }
        
        } catch(\Exception $e) {
            return redirect()->back()->with('msg','post not deleted');
    }
 }
}