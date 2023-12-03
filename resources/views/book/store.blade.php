@extends('layouts.app')
@section('title', 'Affichage creation de livre')
@section('titlePage')
    <h2>Votre livre {{$title}} a bien ete cree</h2>
@endsection
@section('content')
    <style>
        
        .storeContainer {
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

        .storeImage {
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

        .storeTitle {
            text-align: center;
            margin-bottom: 3%;
            font-size: xx-large;
        }

        .storeDescription {
            text-align: justify;
            margin-bottom: 3%;
        }

        .precisionBookContainer {
            display: flex;
            flex-direction: row;
            justify-content: space-evenly;
            margin-bottom: 3%;
        }
    </style>
    <div class="storeContainer">
        <div class="elementsBookContainer">
            <div class="storeLeftSection">
                <img class="storeImage" src="/storage/images/{{$image}}" alt="Image du livre"/>
            </div>
            <div class="detailsBookContainer">
                <h1 class="storeTitle">{{$title}}</h1>
                <p class="storeDescription">{{$description}}<p>
                <div class="precisionBookContainer">
                    <h4>Auteur: {{$author}}</h4>
                    <p>Genre: {{$gender}}<p>
                    <p>Annee: {{$year}}<p>
                    <p>Tags:
                    @foreach ($tags as $tag)
                        {{$tag}}
                    @endforeach
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection