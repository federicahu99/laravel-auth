@extends('layouts.app');

@section('content')

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
            <td>
                <a href="{{ route('admin.posts.show', $post) }}" class="btn btn-primary">
                    <i class="fa-solid fa-eye"></i> Dettagli
                </a>
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