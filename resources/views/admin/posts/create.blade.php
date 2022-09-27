@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Crea nuovo post:</h1>
    <hr>
    <div class="d-flex">
        <form action=" {{ route('admin.posts.index') }} " method="POST" class="row">
            @csrf
            <div class="form-group col-12">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" value=" {{ old('title') }} " required minlength="5" maxlength="50">
                <small id="title" class="form-text text-muted">Must be longer than 5 letters anche shorter than 50!</small>
            </div>
            <div class="form-group col-12">
                <label for="content">Content</label>
                <textarea class="form-control" id="content" name="content" required> {{ old('content') }} </textarea>
                <small id="title" class="form-text text-muted">You must write any content</small>
            </div>
            <div class="form-group col-10">
                <label for="image">Image</label>
                <input type="url" class="form-control" id="image" name="image" value=" {{ old('image') }} ">
                <small id="image" class="form-text text-muted">Copy the image's url here.</small>
            </div>
            <div class="form-group col-2">
                <img src="https://storage.googleapis.com/proudcity/mebanenc/uploads/2021/03/placeholder-image-300x225.png" alt="preview of image" id="preview" class="img-fluid">
            </div>
            <div class="d-flex align-items-center justify-content-between">
        <div>
            <a href=" {{ route('admin.posts.index') }} " class="btn btn-primary mr-1">
                <i class="fa-solid fa-door-open"></i> All posts
            </a>
        </div>
        <div>
            <button type="submit" class="btn btn-success">
                <i class="fa-solid fa-save"></i> Save
            </button>
        </div>
        </form>
    </div>

    




    </div>
    @endsection