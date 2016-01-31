@extends('layouts.admin_master')

@section('title')

All Posts

@stop


@section('content')

@if($posts)
<div class="table-responsive">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Content</th>
                <th>Image</th>
                <th>Status</th>
                <th>Tags</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($posts as $i => $post)
            <tr>
                <td>{{$i+1}}</td>
                <td>{{str_limit($post->title, 30, '...')}}</td>
                <td>{{str_limit($post->content, 100, '...')}}</td>
                <td class="text-center"><img width="60" class="img-responsive" src="{{asset('uploads/posts/jnahian')}}/{{$post->attachment}}" alt="" /></td>
                <td class="text-center">
                    @if($post->approved)
                        <label class="label label-success">Approved</label>
                    @else
                        <label class="label label-warning">Pending</label>
                    @endif
                </td>
                <td>
                    @foreach($post->tags as $tag)   
                        <label class="label label-default">{{$tag->name}}</label>
                    @endforeach
                </td>
                <td class="text-center">
                    <a href="{{route('post.approve', $post->id)}}" class="text-success" title="Approve"><i class="glyphicon glyphicon-check"></i></a>
                    <a href={{url("post/{$post->id}/edit")}} class="text-info"><i class="glyphicon glyphicon-edit"></i></a>
                    <a href="{{route('post.delete', $post->id)}}" class="text-danger"><i class="glyphicon glyphicon-trash"></i></a>
                </td>
            </tr>
            @endforeach()
        </tbody>
    </table>
</div>
{{$posts->links()}}
@else()
<div class="alert alert-info">
    No Post found
</div>    
@endif()

@stop