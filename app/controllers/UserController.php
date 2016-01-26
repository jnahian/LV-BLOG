<?php

class UserController extends \BaseController {

    /**
     * Calls some
     *
     *
     */
    public function __construct(User $user) {
        $this->user = $user;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        return View::make('pages.user_list')->with('users', $this->user->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {
//        return $user = User::all();
        
        $roles = DB::table('roles')->get();
        
        return View::make('pages.create_user')->with('roles', $roles);
    }

    /**
     * Store a newly created user in database.
     *
     * @return Response
     */
    public function store() {

        try {
            $input = Input::all();
            if ($this->user->fill($input)->validate_registration()) {
                $input['password'] = Hash::make($input['password']);
                $input['remember_token'] = $input['_token'];
                $this->user->create($input);
                Session::flash('success', 'Well Done! User created successfully');
                return Redirect::route('admin.user.create');
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
        //
    }

}
