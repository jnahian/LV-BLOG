<?php

class UserController extends \BaseController {

    /**
     * Calls some
     *
     *
     */
    public function __construct(User $user, Role $role) {
        $this->user = $user;
        $this->role = $role;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
//            
        $data = $this->user->with('roles')->paginate(10);
//            echo '<pre>';
//            print_r($data->pivot()->user_id);
//            echo '</pre>';
//            

        return View::make('pages.user_list')->with('users', $data)->withPivot('name');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {
        $roles = Role::get();
        return View::make('pages.create_user')->with([
                    'roles' => $roles,
                    'editmode' => false
        ]);
    }

    /**
     * Store a newly created user in database.
     *
     * @return Response
     */
    public function store() {

        try {
            $input = Input::all();
            if ($this->user->fill($input)->validate_rules('registration')) {
                $input['password'] = Hash::make($input['password']);
                $input['remember_token'] = $input['_token'];
                if ($data = $this->user->create($input)) {
                    $user = $this->user->find($data->id);
                    $user->roles()->attach($input['role']);

                    Session::flash('type', 'success');
                    Session::flash('message', 'Well Done! User created successfully');
                    return Redirect::route('admin.user.create');
                } else {
                    Session::flash('type', 'error');
                    Session::flash('message', 'Error!!! Cannot Create User');
                    return Redirect::back()->withInput();
                }
            }
            return Redirect::back()->withInput()->withErrors($this->user->errors);
        } catch (Exception $ex) {
            return Redirect::back()->withInput()->withErrors(['exception' => $ex]);
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
     * @param  string  $username
     * @return Response
     */
    public function edit($username) {
        $roles = DB::table('roles')->get();
        return View::make('pages.edit_user')->with([
                    'roles' => $roles,
                    'user' => $this->user->where('username', $username)->first()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id) {
        try {
            $input = Input::all();
            if ($this->user->fill($input)->validate_rules('update_user')) {
                $user = $this->user->find($id);
                $user->first_name = $input['first_name'];
                $user->last_name = $input['last_name'];
                if ($user->save()) {
                    Session::flash('type', 'success');
                    Session::flash('message', 'Well Done! User updated successfully');
                    return Redirect::route('admin.user.index');
                } else {
                    Session::flash('type', 'error');
                    Session::flash('message', 'Error!!! Cannot Update User');
                    return Redirect::back()->withInput();
                }
            }
            return Redirect::back()->withInput()->withErrors($this->user->errors);
        } catch (Exception $ex) {
            return Redirect::back()->withInput()->withErrors(['exception' => $ex]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id) {
        try {
            $user = $this->user->find($id);
            if ($user->delete()) {
                Session::flash('type', 'success');
                Session::flash('message', 'User Deleted');
                return Redirect::back();
            }
        } catch (Exception $ex) {
            echo 'Error!';
        }
    }

    /**
     * Login User View
     * @return Response 
     */
    public function login_form() {
        return View::make('pages.login');
    }

    /*
     * The Process of user login
     * @return Response
     */

    public function login_process() {
        try {
            $input = Input::only('username', 'password');
            if ($this->user->fill($input)->validate_rules('login')) {
                if (Auth::attempt($input)) {
                    return Redirect::route('home');
                } else {
                    return Redirect::back()->withInput()->withErrors(['login' => 'Username & Password doesn\'t match']);
                }
            } else {
                return Redirect::back()->withInput()->withErrors($this->user->errors);
            }
        } catch (Exception $ex) {
            echo 'Error!';
        }
    }

    /*
     * Logout process
     * @return Response
     */

    public function logout() {
        try {
            if (Auth::logout()) {
                Session::flash('type', 'success');
                Session::flash('message', 'You\'ve logged out');
                return Redirect::route('home');
            } else {
                return Redirect::route('home');
            }
        } catch (Exception $ex) {
            echo 'Error!';
        }
    }

}
