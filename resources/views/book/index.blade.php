@extends('layouts.app')

@section('title', 'Bibliothèque Bookledor')

@section('content')


    <ol>
        @foreach($books as $book)
            <li>
                <a href="{{route('book.show', $book)}}"><i class="fa-solid fa-magnifying-glass"></i>{{$book['title']}}</a>
                {{-- <a href="{{route('post.edit', $post)}}"><i class="fa-solid fa-pencil"></i></a> --}}
                {{-- {{$blog}}  --}}
            </li>
        @endforeach
    </ol>
@endsection