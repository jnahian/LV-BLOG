@extends('layouts.admin_master')

@section('title') 

    Edit User

@stop()

@section('content') 
    
    {{Form::open(['route' => ['admin.user.update', $user->id], 'class' => 'form-horizontal', 'method' => 'PUT'])}}
    
        <div class="col-md-8">
            <div class="form-group">
                <div class="col-sm-4">
                    <label for="first_name" class="control-label">First Name</label>
                </div>
                <div class="col-sm-8">
                    {{Form::text('first_name', $user->first_name ,['class' => 'form-control', 'id' => 'first_name'])}}
                    <span class="text-danger pull-right">{{$errors->first('first_name')}}</span>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-4">
                    <label for="last_name" class="control-label">Last Name</label>
                </div>
                <div class="col-sm-8">
                    {{Form::text('last_name', $user->last_name ,['class' => 'form-control', 'id' => 'last_name'])}}
                    <span class="text-danger pull-right">{{$errors->first('last_name')}}</span>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-12 text-right">
                    <input type="submit" value="Update User Account" class="btn btn-info">
                </div>
            </div>
        </div>
    
    {{Form::close()}}
    
@stop