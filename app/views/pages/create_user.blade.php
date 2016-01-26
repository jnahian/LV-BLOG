@extends('layouts.admin_master')

@section('title') 

    Create User

@stop()

@section('content') 
   
    {{$errors->first('exception')}}
    
    {{Form::open(['route' => 'admin.user.store', 'class' => 'form-horizontal'])}}
    
        <div class="col-md-8">
            <div class="form-group">
                <div class="col-sm-4">
                    <label for="first_name" class="control-label">First Name</label>
                </div>
                <div class="col-sm-8">
                    {{Form::text('first_name', null ,['class' => 'form-control', 'id' => 'first_name'])}}
                    <span class="text-danger pull-right">{{$errors->first('first_name')}}</span>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-4">
                    <label for="last_name" class="control-label">Last Name</label>
                </div>
                <div class="col-sm-8">
                    {{Form::text('last_name', null ,['class' => 'form-control', 'id' => 'last_name'])}}
                    <span class="text-danger pull-right">{{$errors->first('last_name')}}</span>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-4">
                    <label for="username" class="control-label">Username</label>
                </div>
                <div class="col-sm-8">
                    {{Form::text('username', null ,['class' => 'form-control', 'id' => 'username'])}}
                    <span class="text-danger pull-right">{{$errors->first('username')}}</span>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-4">
                    <label for="email" class="control-label">Email</label>
                </div>
                <div class="col-sm-8">
                    {{Form::email('email', null ,['class' => 'form-control', 'id' => 'email'])}}
                    <span class="text-danger pull-right">{{$errors->first('email')}}</span>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-4">
                    <label for="role" class="control-label">Role</label>
                </div>
                <div class="col-sm-8">
                    <select name="role" class="form-control">
                        <option value="0">-- Select A Role --</option>
                        @foreach($roles as $role)
                            <option value="{{$role->id}}">{{$role->name}}</option>
                        @endforeach
                    </select>
                    <span class="text-danger pull-right">{{$errors->first('role')}}</span>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-4">
                    <label for="password" class="control-label">Password</label>
                </div>
                <div class="col-sm-8">
                    {{Form::password('password' ,['class' => 'form-control', 'id' => 'password'])}}
                    <span class="text-danger pull-right">{{$errors->first('password')}}</span>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-12 text-right">
                    <input type="submit" value="Create User Account" class="btn btn-info">
                </div>
            </div>
        </div>
    
    {{Form::close()}}
    
@stop