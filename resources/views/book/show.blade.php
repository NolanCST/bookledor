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
    <form action="{{route('book.edit', $book['id'])}}" method="get">
        @csrf
        <input type="submit" value="Modifier"/>
    </form>
@endsection