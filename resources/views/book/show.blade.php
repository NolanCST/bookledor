@extends('layouts.app')
@section('title', 'Details livre')
@section('titlePage')
    <h1>{{$book['title']}}</h1>
@endsection
@section('content')
    <img src="/storage/images/{{$book['image']}}"/>
    <h4>Ecrit par: {{$book['author']}}</h4>
    <p>Annee de sortie: {{$book['year']}}<p>
    {{-- <form action="{{route('blog.edit', $blog['id'])}}" method="get">
        @csrf
        <input type="submit" value="Modifier"/>
    </form> --}}
@endsection