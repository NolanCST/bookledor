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
        {{-- image: <input type='text' name='image' placeholder="Image" value='{{old('image')}}'> --}}
        {{-- @if($errors->has('image'))
            <p>{{$errors->first('image')}}</p>
            @endif --}}
        Titre: <input type='text' name='title' placeholder='Titre du livre' value='{{old('title')}}' required>
        @if($errors->has('title'))
            <p>{{$errors->first('title')}}</p>
        @endif
        <br>
        Auteur: <input type='text' name='author' placeholder="Auteur du livre" value='{{old('author')}}' required>
        @if($errors->has('author'))
            <p>{{$errors->first('author')}}</p>
        @endif
        <br>
        Année: <input type='number' name='year' placeholder="Année du livre" value='{{old('year')}}' required>
        @if($errors->has('year'))
            <p>{{$errors->first('year')}}</p>
        @endif
        <br>
       Genre:<select name="gender_id">
            @foreach ($genders as $gender)
                <option value='{{$gender['id']}}'
                    @if ($gender['id']==old('gender_id'))
                    selected
                    @endif
                >{{$gender['name']}}</option>
            @endforeach
        </select>
        @if($errors->has('gender_id'))
            <p>{{$errors->first('gender_id')}}</p>
        @endif
        <br>
        <input type='submit' value='Créer'>
    </form>
@endsection