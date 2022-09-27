@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Crea nuovo post:</h1>
    <hr>

    <form action=" {{ route('admin.posts.index') }} " method="POST">
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name="title" value=" {{ old('title') }} " required minlength="5" maxlength="50">
            <small id="title" class="form-text text-muted">Must be longer than 5 letters anche shorter than 50!</small>
        </div>
        <div class="form-group">
            <label for="content">Content</label>
            <textarea class="form-control" id="content" name="content" required> {{ old('content') }} </textarea>
            <small id="title" class="form-text text-muted">You must write any content</small>
        </div>
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name="title" value=" {{ old('title') }} " required minlength="5" maxlength="50">
            <small id="title" class="form-text text-muted">Must be longer than 5 letters anche shorter than 50!</small>
        </div>
        <button type="submit" class="btn btn-primary">
            <i class="fa-solid fa-save"></i> Save</button>
    </form>




    <div class="d-flex align-items-center justify-content-between">
        <div>
            <a href=" {{ route('admin.posts.index') }} " class="btn btn-primary">
                <i class="fa-solid fa-door-open"></i> All posts
            </a>
        </div>
        <div>
            <button class="btn btn-danger" type="submit" value="Submit">
                <i class="fa-solid fa-trash"></i> Delete
            </button>
        </div>
        </form>
        </a>
    </div>
    </footer>
    </form>
</div>
@endsection