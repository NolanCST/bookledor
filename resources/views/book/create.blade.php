@extends('layouts.app')

@section('title', 'Création d\'un nouveau livre')

@section('content')
<style>
    .book-form {
      
        max-width: 600px;
        margin: 20px auto;
        background-color: #f9f9f9;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .book-form label {
        font-weight: bold;
        display: block;
        margin-bottom: 5px;
    }

    .form-input {
        width: 100%;
        padding: 10px;
        margin-bottom: 15px;
        box-sizing: border-box;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    .error-message {
        color: #ff0000;
        margin-top: -10px;
        margin-bottom: 15px;
    }

    .submit-btn {
        background-color: rgb(173, 32, 32);
        color: white;
        padding: 10px 15px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    .submit-btn:hover {
        background-color: #e9b31f;
    }
</style>

<form class="book-form" action='{{ route("book.store") }}' method='post' enctype="multipart/form-data">
    @csrf
   

    <label for="title">Titre:</label>
    <input type='text' name='title' id="title" placeholder='Titre du livre' value='{{ old('title') }}' class="form-input" required>
    @if($errors->has('title'))
        <p class="error-message">{{ $errors->first('title') }}</p>
    @endif

    <label for="description">Description:</label>
    <textarea name='description' id="description" placeholder='Description du livre' value='{{ old('description') }}' class="form-input" style="height:125px;"></textarea>
    @if($errors->has('description'))
    <p class="error-message">{{ $errors->first('description') }}</p>
    @endif

    <label for="author">Auteur:</label>
    <select name="author" id="author" class="form-input">
        @foreach ($authors as $author)
            <option value='{{ $author['id'] }}'
                @if ($author['id'] == old('gender_id'))
                    selected
                @endif
            >{{ $author['name'] }}</option>
        @endforeach
    </select>
    <p>Vous ne trouvez pas votre auteur ? Contactez nous !</p>
    @if($errors->has('author'))
        <p class="error-message">{{ $errors->first('author') }}</p>
    @endif

    <label for="year">Année:</label>
    <input type='number' name='year' id="year" placeholder="Année du livre" value='{{ old('year') }}' class="form-input" required>
    @if($errors->has('year'))
        <p class="error-message">{{ $errors->first('year') }}</p>
    @endif

    <label for="gender_id">Genre:</label>
    <select name="gender_id" id="gender_id" class="form-input">
        @foreach ($genders as $gender)
            <option value='{{ $gender['id'] }}'
                @if ($gender['id'] == old('gender_id'))
                    selected
                @endif
            >{{ $gender['name'] }}</option>
        @endforeach
    </select>
    @if($errors->has('gender_id'))
        <p class="error-message">{{ $errors->first('gender_id') }}</p>
    @endif

    <label for="tags">Tags:</label>
    <input type='text' name='tags' id="tags" placeholder="Tags" value='{{ old('tags') }}' class="form-input" data-role="tagsinput">
    @if ($errors->has('tags'))
        <p class="error-message">{{ $errors->first('tags') }}</p>
    @endif

    <label for="image">Image:</label>
    <input type='file' name='image' id="image" class="form-input">
    @if($errors->has('image'))
        <p class="error-message">{{ $errors->first('image') }}</p>
    @endif

    <input type='submit' value='Créer' class="submit-btn">
</form>
@endsection
