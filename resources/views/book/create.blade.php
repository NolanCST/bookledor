@extends('layouts.app')

@section('title', 'Création d\'un nouveau livre')

@section('content')
    {{-- @if($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    @endif --}}
    <form action='{{route("book.store")}}' method='post'>
        @csrf
        Titre: <input type='text' name='title' placeholder='Titre du livre' value='{{old('title')}}' required>
        {{-- @if($errors->has('title'))
            <p>{{$errors->first('title')}}</p>
        @endif --}}
        <br>
        Auteur: <input type='text' name='author' placeholder="Auteur du livre" value='{{old('author')}}' required>
        {{-- @if($errors->has('author'))
            <p>{{$errors->first('author')}}</p>
        @endif --}}
        <br>
        Année: <input type='number' name='year' placeholder="Année du livre" value='{{old('year')}}' required>
        {{-- @if($errors->has('year'))
            <p>{{$errors->first('year')}}</p>
        @endif --}}
        <br>
       Genre: <input type='text' name='gender' placeholder="Genre du livre" value='{{old('gender')}}' required>
        {{-- @if($errors->has('gender'))
            <p>{{$errors->first('gender')}}</p>
        @endif --}}
       image: <input type='files' name='img' placeholder="img" value='{{old('img')}}'>
        {{-- @if($errors->has('img'))
            <p>{{$errors->first('img')}}</p>
        @endif --}}
        <br>
        <input type='submit' value='Créer'>
    </form>
@endsection