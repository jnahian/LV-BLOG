@extends('layouts.master')

@section('title') 

Login

@stop()

@section('content') 

<div class="col-md-4 col-md-offset-4">
    {{{$errors->first('login')}}}
    <hr />
    {{Form::open(['route' => 'login.process', 'class' => 'form-horizontal'])}}

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
            <label for="password" class="control-label">Password</label>
        </div>
        <div class="col-sm-8">
            {{Form::password('password' ,['class' => 'form-control', 'id' => 'password'])}}
            <span class="text-danger pull-right">{{$errors->first('password')}}</span>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-12 text-right">
            <input type="submit" value="Login" class="btn btn-info">
        </div>
    </div>

    {{Form::close()}}
</div>

@stop