@extends('layouts.app')
@section('title', 'Modifier livre')
@section('titlePage')
    <h2>Votre livre {{$book['id']}} a bien été modifié</h2>
@endsection
@section('content')
    <p>{{$book['image']}} </p>
    <p>Titre: {{$book['title']}} </p>
    <p>Auteur: {{$book['author']}} </p>
    <p>Année: {{$book['year']}} </p>
    <p>Genre: {{$book['gender_id']}} </p>
@endsection