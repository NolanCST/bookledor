@extends('layouts.app')
@section('title', 'Details livre')
@section('titlePage')
 
@endsection
@section('content')
    <style>
                .rate {
            float: left;
            height: 46px;
            padding: 0 10px;
        }
        .rate:not(:checked) > input {
            position: absolute;
            top: -9999px;
        }
        .rate:not(:checked) > label {
            float: right;
            width: 1em;
            overflow: hidden;
            white-space: nowrap;
            cursor: pointer;
            font-size: 30px;
            color: #ccc;
        }
        .rate:not(:checked) > label:before {
            content: "★ ";
        }
        .rate > input:checked ~ label {
            color: #ffc700;
        }
        .rate:not(:checked) > label:hover,
        .rate:not(:checked) > label:hover ~ label {
            color: #deb217;
        }
        .rate > input:checked + label:hover,
        .rate > input:checked + label:hover ~ label,
        .rate > input:checked ~ label:hover,
        .rate > input:checked ~ label:hover ~ label,
        .rate > label:hover ~ input:checked ~ label {
            color: #c59b08;
        }
    </style>

    <img class="showImage" src="/storage/images/{{$book['image']}}"/>
    <h1>{{$book['title']}}</h1>
    <h4>Ecrit par: {{$book['author']}}</h4>
    <p>Annee de sortie: {{$book['year']}}<p>
    <p>Genre: {{$book['gender']}}<p>
    <div>
        <?php
        $star = 1;
        while($star<=$avgStarRating) { ?>
            <span>&#9733;</span>
        <?php $star++;
        } ?>
        ({{$avgRating}})
    </div>
    <div id="review">
        <div class="row">
            <div class="span4">
                <h3>Ecrivez un commentaire</h3>
                <form method="POST" action="{{url('/add-rating')}}" name="ratingForm" id="ratingForm" class="form-horizontal">
                    @csrf
                    <input type="hidden" name="book_id" value="{{$book['id']}}"/>
                    <div class="rate">
                        <input type="radio" id="star5" name="rate" value="5" />
                        <label for="star5" title="5">5 stars</label>
                        <input type="radio" id="star4" name="rate" value="4" />
                        <label for="star4" title="4">4 stars</label>
                        <input type="radio" id="star3" name="rate" value="3" />
                        <label for="star3" title="3">3 stars</label>
                        <input type="radio" id="star2" name="rate" value="2" />
                        <label for="star2" title="2">2 stars</label>
                        <input type="radio" id="star1" name="rate" value="1" />
                        <label for="star1" title="1">1 star</label>
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
                @if(count($ratings)>0)
                    @foreach($ratings as $rating)
                        <div>
                            <?php
                                $count=1;
                                while($count<=$rating['rate']) {?>
                                    <span>&#9733;</span>
                            <?php $count++; }?>
                            <p>{{$rating['review']}}</p>
                            <p>Par {{$rating['user']['name']}}</p>
                            <p>{{date("d-m-Y H:i", strtotime($rating['created_at']))}}</p>
                        </div>
                    @endforeach
                @else
                    <p><b>Aucun commentaires n'est disponible pour ce livre</b></p>
                @endif
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