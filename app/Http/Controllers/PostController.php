<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

class PostController extends Controller
{
    // Show all posts
    public function index()
    {
        // select * from posts;
        $postsFromDB = Post::all(); //collection object

        // id, title (Var char), description(TEXT), created_at, updated_at

        // Pass the posts to the 'posts.index' view
        return view('posts.index', ['posts' => $postsFromDB]);
    }

    // Show a single post
    public function show(Post $post) //type hinting
    {
        // select * from posts where id = $postId limit 1;
        // $singlePostFromDB = Post::find($postId); //model object
        // $singlePostFromDB = Post::findOrFail($postId); //model object
        // if(is_null($singlePostFromDB)) {
        //     return to_route('posts.index');
        // }
        // $singlePostFromDB = Post::where('id', $postId)->first(); //model object
        // $singlePostFromDB = Post::where('id', $postId)->get(); //collection object
        // Post::where('title', 'php')->first() //select * from posts where title = 'php' limit 1;
        // Post::where('title', 'php')->get() //select * from posts where title = 'php';

        // Return the 'posts.show' view with the specified post
        return view('posts.show', ['post' => $post]);
    }

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function showall(Post $post)
    {
        $postsFromDB = Post::all();
        return view('posts.showall', ['posts' => $postsFromDB]);

    }





//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////



    // Show the form for creating a new post
    public function create()
    {
        // select * from users;
        $users = User::all();

        // Pass the users to the 'posts.create' view
        return view('posts.create', ['users' => $users]);
    }


 //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


    // Store a newly created post in the database
    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'post_creator' => 'required|exists:users,id',
            'pic' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // validate the image file
        ]);
    
        // Handle file upload
        if ($request->hasFile('pic')) {
            // Get the file from the request
            $file = $request->file('pic');
            // Generate a unique name for the file
            $fileName = time() . '_' . $file->getClientOriginalName();
            // Store the file in the storage/app/public/uploads directory
            $file->storeAs('public/uploads', $fileName);
    
            // Create a new post record in the database
            $post = new Post;
            $post->title = $request->title;
            $post->description = $request->description;
            $post->user_id = $request->post_creator;
            $post->pic = $fileName; // Save the file name to the database
            $post->save();
    
            // Redirect to the index page with a success message
            return redirect()->route('posts.index')->with('success', 'Post created successfully.');
        }
    
        // If file upload fails, redirect back with an error message
        return redirect()->back()->with('error', 'File upload failed.');
    }

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    

    // Show the form for editing a post
    public function edit(Post $post)
    {
        // select * from users;
        $users = User::all();

        // Pass the users and the post to the 'posts.edit' view
        return view('posts.edit', ['users' => $users, 'post' => $post]);
    }

 //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    // Update the specified post in the database
    public function update($postId)
    {
        // Retrieve all data from the request
        $title = request()->title;
        $description = request()->description;
        $postCreator = request()->post_creator;

        // Update the submitted data in the database
        $singlePostFromDB = Post::find($postId);
        $singlePostFromDB->update([
            'title' => $title,
            'description' => $description,
            'user_id' => $postCreator,
        ]);

        // Redirection to 'posts.show'
        return to_route('posts.show', $postId);
    }
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    // Remove the specified post from the database
    public function destroy($postId)
    {
        // Delete the post from the database
        $post = Post::find($postId);
        $post->delete();


        // Post::where('id', $postId)->delete(); // to delete any thing with title "php" exa,ple  , not to delete specific row 

        // Redirect to 'posts.index'
        return to_route('posts.index');
        ;
    }


//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


}

