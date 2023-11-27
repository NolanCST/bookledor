@extends('layouts.app')
@section('title', 'Affichage creation de livre')
@section('titlePage')
    <h2>Votre livre {{$title}} a bien ete cree</h2>
@endsection
@section('content')
    <img src="/storage/images/{{$image}}" alt="Image du livre" />
    <p>titre: {{$title}} </p>
    <p>Auteur: {{$author}} </p>
    <p>année: {{$year}} </p>
    <p>genre: {{$gender}} </p>
@endsection