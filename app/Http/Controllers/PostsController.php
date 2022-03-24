<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePostRequest;
use App\Models\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //return "This is PostController.php in the index method and the id is";

        //$posts = Post::all();

//        $posts = Post::latest();

        $posts = Post::latest()->get();

        //$posts = Post::orderby('id')->get();

        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('posts.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePostRequest $request)
    {
//        $this->validate($request, [
//
//            'title'=>'required',
//            //'title'=>'required|max:4',
//
//        ]);


//        return $request->title;

        ///one way
//        Post::create($request->all());


        ///another way
        ///
//        $input = $request->all();
//
//        $input['title'] = $request->title;
//
//        Post::create($request->all());


        ////3rd way
        ///
//        $post = new Post;
//        $post->title = $request->title;
//        $post->save();
//
//        return redirect('/posts');



        //=================getting File info from the Create page============

//        $file = $request->file('file1');
//
//        echo "<br>";
//
//        echo $file->getClientOriginalName();
//
//        echo "<br>";
//
//        echo $file->getSize();
//
//        echo "<br>";



//=================persisting File data into Database============

        $input = $request->all();

        if($file = $request->file('file1')){


            $name = $file->getClientOriginalName();

            $file->move('images', $name);

            $input['path'] = $name;



        }

        Post::create($input);
        return redirect('/posts');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $post = Post::findorfail($id);

        return view('posts.show', compact('post'));


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //

        $post = Post::findorfail($id);

        return view('posts.edit', compact('post'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

        $post = Post::findorfail($id);

        $post->update($request->all());

        return redirect('/posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $post = Post::findorfail($id);

        $post->delete();

        return redirect('/posts');

    }

    public function contact(){

        // $people = ['Edwin', 'Jose','Peter', "Maria"];
        $people = ['edim'];

        return view('contact', compact('people'));

    }

    public function show_post($id, $name){

        return view('post', compact('id', 'name')) ;

    }
}
