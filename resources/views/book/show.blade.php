@extends('layouts.app')
@section('title', 'Details livre')
@section('titlePage')
 
@endsection
@section('content')
    <img class="showImage" src="/storage/images/{{$book['image']}}"/>
    <h1>{{$book['title']}}</h1>
    <h4>Ecrit par: {{$book['author']}}</h4>
    <p>Annee de sortie: {{$book['year']}}<p>
    <p>Genre: {{$book['gender']}}<p>
    @if($id == $book['user_id'])
        <form action="{{route('book.edit', $book['id'])}}" method="get">
            @csrf
            <input type="submit" value="Modifier"/>
        </form>
        <form action="{{route('book.destroy', $book['id'])}}" method="post">
            @csrf
            @method('delete')
            <input type="submit" value="Supprimer"/>
        </form>
    @endif
@endsection