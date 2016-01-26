@extends('layouts.admin_master')

@section('title')

    Users List

@stop


@section('content')

    <h4>Users List</h4>
    @if($users)
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                   @foreach($users as $i => $user)
                    <tr>
                        <td>{{$i+1}}</td>
                        <td>{{$user->first_name.' '.$user->last_name}}</td>
                        <td>{{$user->username}}</td>
                        <td>{{$user->email}}</td>
                        <td class="text-center">
                            <label class="label label-success">Approved</label>
                            <label class="label label-warning">Pending</label>
                        </td>
                        <td class="text-center">
                            <a href={{url("admin/user/{$user->username}/edit")}} class="text-info"><i class="glyphicon glyphicon-edit"></i></a>
                            <a href={{route('admin.user.destroy', ['username' => ''])}} class="text-danger"><i class="glyphicon glyphicon-trash"></i></a>
                        </td>
                    </tr>
                    @endforeach()
                </tbody>
            </table>
        </div>
    @else()
        <div class="alert alert-info">
            No User found
        </div>    
    @endif()

@stop