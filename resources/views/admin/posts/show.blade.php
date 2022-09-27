@extends('layouts.app')

@section('content')
<div class="container">
    <header>
        <h1> {{ $post->title }} </h1>
    </header>
    <hr>
    <div class="clearfix">
        @if($post->image)
        <img src=" {{ $post->image }} " alt="" class="float-left p-2">
        @endif
        <p class="pt-5"> {{ $post->content }} </p>
        <div>
            <time>Created at: {{ $post->created_at }}</time> <br>
            <time>Updated at: {{ $post->updated_at }} </time>
        </div>
    </div>
    <footer class="d-flex align-items-center justify-content-between">
        <div>
            <a href=" {{ route('admin.posts.index') }} " class="btn btn-primary">
                <i class="fa-solid fa-door-open"></i> All posts
            </a>
        </div>
        <div>
            <form action=" {{ route('admin.posts.destroy' , $post->id) }} " methods='POST'>
                @csrf
                @method('DELETE')
                <button class="btn btn-danger">
                    <i class="fa-solid fa-trash"></i> Delete
                </button>
            </form>
            </a>
        </div>
    </footer>
</div>
@endsection