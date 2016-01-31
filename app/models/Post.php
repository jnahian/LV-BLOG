<?php

class Post extends Eloquent {

    /**
     * The database table used by the model
     * 
     * @var string
     */
    protected $table = 'posts';

    /**
     * The unfillabel fields of the table
     * 
     * @var array
     */
    protected $guarded = ['approved'];

    /**
     * The rules for validating a post
     * 
     * @var array
     */
    public $rules = [
        'title' => 'required',
        'content' => 'required',
        'attachment' => 'required',
        'tags' => 'required',
    ];
    
    public $errors = [];

    /**
     * The validation of registering user
     *
     * @var function
     */
    public function validate_post() {
        $validation = Validator::make($this->attributes, $this->rules);
        if ($validation->passes()) {
            return TRUE;
        }
        $this->errors = $validation->messages();
        return FALSE;
    }

    /**
     *  The tags associated to the post
     * 
     *  @return response
     */
    public function tags() {
        return $this->belongsToMany('Tag');
    }

}
