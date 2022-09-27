@extends('layouts.app');

@section('content')

<header class="d-flex justify-content-between">
    <h2>Post</h2>   
    <a href=" {{ route('admin.posts.create') }} " class="btn btn-sm btn-success" >
        <i class="fa-solid fa-plus">Crea post
    </a>

</header>
<table class="table container">
    <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Titolo</th>
            <th scope="col">Slug</th>
            <th scope="col">Data creazione</th>
            <th scope="col">Data modifica</th>
            <th>Btn</th>
        </tr>
    </thead>
    <tbody>

        @forelse($posts as $post)
        <tr>
            <th scope="row"> {{ $post->id }} </th>
            <td> {{ $post->title }} </td>
            <td> {{ $post->slug }} </td>
            <td> {{ $post->created_at}} </td>
            <td> {{ $post->updated_at}} </td>
            <td class="d-flex align-items-start">
                <a href="{{ route('admin.posts.show', $post) }}" class="btn btn-sm btn-primary mr-1">
                    <i class="fa-solid fa-eye"></i>View
                </a>
                <form action="{{ route('admin.posts.destroy' , $post->id) }}" method='POST'>
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm mr-1" type="submit">
                        <i class="fa-solid fa-trash"></i> Delete
                    </button> 
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <th>Nessun Post trovato</th>
        </tr>
        @endforelse



    </tbody>
</table>

@endsection