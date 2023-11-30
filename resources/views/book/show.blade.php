@extends('layouts.app')
@section('title', 'Details livre')
@section('titlePage')
 
@endsection
@section('content')
    <style>
        .showContainer {
            display: flex;
            flex-direction: column;
            margin: 5%
        }

        .elementsBookContainer {
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            border-bottom: 1px solid gray;
            padding-bottom: 3%;
            margin-bottom: 3%;
        }

        .showLeftSection{
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .showImage {
            max-width: 40vw;
            max-height: 50vh;
            margin-bottom: 3%;
            border: 2px solid black;
        }

        .detailsBookContainer {
            display: flex;
            flex-direction: column;
            width: 55vw;
        }

        .showTitle {
            text-align: center;
            margin-bottom: 3%;
            font-size: xx-large;
        }

        .showDescription {
            text-align: justify;
            margin-bottom: 3%;
        }

        .precisionBookContainer {
            display: flex;
            flex-direction: row;
            justify-content: space-evenly;
            margin-bottom: 3%;
        }

        .averageRate {
            margin-bottom: 3%;
        }

        .showBtnModif {
            display: flex;
            flex-direction: column;
            row-gap: 2%;
        }


        .btnEdit, .btnDelete, .btnComment {
            background-color: rgb(173, 32, 32);
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 15vw;
        }

        .btnEdit:hover, .btnDelete:hover, .btnComment:hover {
            background-color: #e9b31f;
        }

        .btnEdit {
            margin-bottom: 3%;
        }

        .form-horizontal {
            display: flex;
            flex-direction: row;
            align-items: center;
            justify-content: space-around;
        }

        .form-group {
            display: flex;
            flex-direction: row;
            align-items: center;
            gap:5%;
        }

        #review {
            display: flex;
            flex-direction: column;
        }

        .span1, span2 {
            margin-bottom: 3%;
        }

        .span2 {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .titleComment {
            margin-bottom: 3%;
            text-align: center;
            font-size: x-large;
        }

        .commentArea {
            width:500px;
            height:75px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .usersComments {
            display: flex;
            flex-direction: column;
            width: 25vw;
            column-gap: 3%;
            margin-bottom: 2%;
        }

        .starsComment {
            display: flex;
            flex-direction: row;
        }

        .noComment {
            margin-bottom: 3%;
        }

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
    <div class="showContainer">
        <div class="elementsBookContainer">
            <div class="showLeftSection">
                <img class="showImage" src="/storage/images/{{$book['image']}}"/>
                <div class="averageRate">
                    Note générale: {{$avgRating}}/5
                    <?php
                    $star = 1;
                    while($star<=$avgStarRating) { ?>
                        <span>&#9733;</span>
                    <?php $star++;
                    } ?>
                    ({{$ratingsCount}})
                </div>
                <div class="showBtnModif">
                    @if($id == $book['user_id'])
                        <form action="{{route('book.edit', $book['id'])}}" method="get">
                            @csrf
                            <input class="btnEdit" type="submit" value="Modifier"/>
                        </form>
                        <form action="{{route('book.destroy', $book['id'])}}" method="post">
                            @csrf
                            @method('delete')
                            <input class="btnDelete" type="submit" value="Supprimer"/>
                        </form>
                    @endif
                </div>
            </div>
            <div class="detailsBookContainer">
                <h1 class="showTitle">{{$book['title']}}</h1>
                <p class="showDescription">{{$book['description']}}<p>
                <div class="precisionBookContainer">
                    <h4>Auteur: {{$book['author']}}</h4>
                    <p>Genre: {{$book['gender']}}<p>
                    <p>Annee: {{$book['year']}}<p>
                </div>
            </div>
        </div>
        <div id="review">
            <div class="span1">
                <h2 class="titleComment">Donnez nous votre avis !</h2>
                <form class="form-horizontal" id="ratingForm" method="POST" action="{{url('/add-rating')}}" name="ratingForm">
                    @csrf
                    <input type="hidden" name="book_id" value="{{$book['id']}}"/>
                    <label>Votre note</label>
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
                        <textarea class="commentArea" name="review" required></textarea>
                    </div>
                    <div>&nbsp;</div>
                    <div class="form-group">
                        <input class="btnComment" type="submit" name="Envoyer">
                    </div>
                </form>
            </div>
            <div class="span2">
                <h2 class="titleComment">Commentaires</h2>
                @if(count($ratings)>0)
                    @foreach($ratings as $rating)
                        <div class="usersComments">
                            <div class="starsComment">
                            <?php
                                $count=1;
                                while($count<=$rating['rate']) {?>
                                    <span>&#9733;</span>
                            <?php $count++; }?>
                            </div>
                            <p>{{$rating['review']}}</p>
                            <p>Par {{$rating['user']['name']}}</p>
                            <p>Posté le: {{date("d-m-Y H:i", strtotime($rating['created_at']))}}</p>
                        </div>
                    @endforeach
                @else
                    <p class="noComment"><b>Aucun commentaires n'est disponible pour ce livre</b></p>
                @endif
            </div>
        </div>
    </div>
@endsection