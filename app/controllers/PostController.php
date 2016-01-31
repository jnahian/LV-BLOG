<?php

class PostController extends \BaseController {

    /**
     * 
     */
    public function __construct(Post $post, Tag $tag) {
        $this->post = $post;
        $this->tag = $tag;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        $posts = $this->post->where('user_id', Auth::user()->id)->orderBy('id', 'desc')->with('tags')->paginate(5);
        return View::make('pages.posts')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {
        $tags = $this->tag->get_tags();
        return View::make('pages.create_post')->withTags($tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store() {
        $input = Input::all();
        if ($this->post->fill($input)->validate_post()) {
            $image = Input::file('attachment');
            if ($image->isValid()) {
                $path = 'uploads/posts/' . Auth::user()->username;
                $filename = 'posts-' . time() . rand(1000, 9999) . '.' . $image->getClientOriginalExtension();
                if ($image->move($path, $filename)) {
                    $data = $this->post->create([
                        'user_id' => Auth::user()->id,
                        'title' => $input['title'],
                        'content' => $input['content'],
                        'attachment' => $filename,
                    ]);
                    if ($data->id) {
                        $post = $this->post->find($data->id);
                        $post->tags()->attach($input['tags']);
                        Session::flash('type', 'success');
                        Session::flash('message', 'Post Created');
                        return Redirect::route('post.index');
                    } else {
                        Session::flash('type', 'error');
                        Session::flash('message', 'Error!!! Cannot create post');
                        return Redirect::back()->withInput();
                    }
                } else {
                    Session::flash('type', 'error');
                    Session::flash('message', 'Error!!! File cannot be uploaded');
                    return Redirect::back()->withInput();
                }
            } else {
                Session::flash('type', 'error');
                Session::flash('message', 'Error!!! File is not valid');
                return Redirect::back()->withInput();
            }
        } else {
            return Redirect::back()->withInput()->withErrors($this->post->errors);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id) {
        try {
            $post = $this->post->find($id);
            if ($post->delete()) {
                Session::flash('type', 'success');
                Session::flash('message', 'Post Deleted');
                return Redirect::back();
            }
        } catch (Exception $ex) {
            echo 'Error!';
        }
    }
    
    /**
     * Approve post for publishing
     * 
     * @return response 
     */
    
    public function approve($id) {
        $post = $this->post->find($id);
        $post->approved = '1';
        if($post->save()){
            Session::flash('success', true);
            Session::flash('message', 'Post Approved');
            return Redirect::back();
        }
            Session::flash('error', true);
            Session::flash('message', 'Error!!! Post not Approved');
            return Redirect::back();
    }

}
