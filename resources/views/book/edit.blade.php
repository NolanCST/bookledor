@extends('layouts.app')
@section('title', 'Modifier Livre')
@section('titlePage')
    <h2>Modification du livre {{$book['title']}}</h2>
@endsection
@section('content')
    <form action="{{route('book.update', $book['id'])}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')
        image: <input type='file' name='image'>
        @if($errors->has('image'))
            <p>{{$errors->first('image')}}</p>
            @endif
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
        <input type='submit' value='Valider'>
    </form>
@endsection