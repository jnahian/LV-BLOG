@extends('layouts.admin_master')

@section('title') 

    Create Post

@stop()

@section('content') 
   
    
    {{Form::open(['route' => 'post.store', 'class' => 'form-horizontal', 'enctype' => 'multipart/form-data'])}}
    
        <div class="col-md-10">
            <div class="form-group">
                <div class="col-sm-3 ">
                    <label for="post_title" class="control-label">Post Title</label>
                </div>
                <div class="col-sm-9">
                    {{Form::text('title', null ,['class' => 'form-control', 'id' => 'post_title'])}}
                    <span class="text-danger pull-right">{{$errors->first('title')}}</span>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-3">
                    <label for="post_content" class="control-label">Post Contents</label>
                </div>
                <div class="col-sm-9">
                    {{Form::textarea('content', null ,['class' => 'form-control', 'id' => 'post_content'])}}
                    <span class="text-danger pull-right">{{$errors->first('content')}}</span>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-3">
                    <label for="post_image" class="control-label">Post Image</label>
                </div>
                <div class="col-sm-9">
                    {{Form::file('attachment', ['id' => 'post_image'])}}
                    <span class="text-danger pull-right">{{$errors->first('attachment')}}</span>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-3">
                    <label class="control-label">Tags</label>
                </div>
                <div class="col-sm-9">
                    @foreach($tags as $tag)
                        <label>{{Form::checkbox('tags[]', $tag->id)}} {{$tag->name}}</label>
                    @endforeach
                    <span class="text-danger pull-right">{{$errors->first('tags')}}</span>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-12 text-right">
                    <input type="submit" value="Create Post" class="btn btn-info">
                </div>
            </div>
        </div>
    
    {{Form::close()}}
    
@stop