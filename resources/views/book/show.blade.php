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
    <div id="review">
        <div class="row">
            <div class="span4">
                <h3>Ecrivez un commentaire</h3>
                <form method="POST" action="{{url('/add-rating')}}" name="ratingForm" id="ratingForm" class="form-horizontal">
                    @csrf
                    <input type="hidden" name="book_id" value="{{$book['id']}}"/>
                    <div class="rate">
                        <input type="radio" id="star5" name="rate" value="5" />
                        <label for="star5" title="text">5 stars</label>
                        <input type="radio" id="star4" name="rate" value="4" />
                        <label for="star4" title="text">4 stars</label>
                        <input type="radio" id="star3" name="rate" value="3" />
                        <label for="star3" title="text">3 stars</label>
                        <input type="radio" id="star2" name="rate" value="2" />
                        <label for="star2" title="text">2 stars</label>
                        <input type="radio" id="star1" name="rate" value="1" />
                        <label for="star1" title="text">1 star</label>
                    </div>
                    <div class="form-group">
                        <label>Votre commentaire</label>
                        <textarea name="review" style="width:300px; height:50px;" required></textarea>
                    </div>
                    <div>&nbsp;</div>
                    <div class="form-group">
                        <input type="submit" name="Envoyer">
                    </div>
                </form>
            </div>
            <div class="span4">
                <h3>Commentaires</h3>
            </div>
        </div>
    </div>
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