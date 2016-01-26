<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The fillable fields of the table
	 *
	 * @var array
	 */
	protected $fillable = array('first_name', 'last_name', 'username', 'email', 'password', 'remember_token');
        
        /**
         *  Error Messages
         *  @var array
         */
        public $errors = [];


        /**
         *  The Rules for creating users
         * 
         *  @var string
         */
        public $rules = [
            'first_name'    => 'required',
            'last_name'     => 'required',
            'username'      => 'required|alpha_dash|between:6,20|unique:users',
            'email'         => 'required|email|unique:users',
            'password'      => 'required|min:8',
        ];


        /**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');
        
        /**
	 * The 
	 *
	 * @var function
	 */
        
        public function validate_registration()
        {
            $validation = Validator::make($this->attributes, $this->rules);
            if($validation->passes())
            {
                return TRUE;
            }
            $this->errors = $validation->messages();
            return FALSE;
        }
        
        /**
         * 
         * @return 
         */
        
        public function roles()
        {
            return $this->belongsToMany('Role');
        }
}
