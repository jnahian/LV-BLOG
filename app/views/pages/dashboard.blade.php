@extends('layouts.admin_master')


@section('title')
    Dashboard
@stop()


@section('content')

    <h4>Pending Posts</h4>
    
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Post Title</th>
                    <th>Post Content</th>
                    <th>Post Image</th>
                    <th>Post Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Est, amet?</td>
                    <td>Repellendus, aperiam.</td>
                    <td>Cumque, quibusdam?</td>
                    <td class="text-center">
                        <label class="label label-success">Approved</label>
                        <label class="label label-warning">Pending</label>
                    </td>
                    <td class="text-center">
                        <a href="" class="text-info" data-toggle="tooltip" data-placement="top" title="Edit"><i class="glyphicon glyphicon-edit"></i></a>
                        <a href="" class="text-danger" data-toggle="tooltip" data-placement="top" title="Delete"><i class="glyphicon glyphicon-trash"></i></a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    
@stop()