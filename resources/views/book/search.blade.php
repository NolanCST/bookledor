@extends('layouts.app')
@section('title', 'Modifier Livre')
@section('titlePage')
<h2>Resultats conernants la recherche {{$key}}</h2>
@endsection

@section('content')
    <style>
        .searchTitle{
            font-size: x-large;
            text-align: center;
        }

        /* p.text-sm.text-gray-700.leading-5 {
        display:none;

        }
        .sm\:justify-between{
            justify-content: center
        } */
    </style>
    <div class="row">
        <div class="col-md-8">

            <h1 class="searchTitle my-4">Résultat de recherche pour:
                <small>{{$key}}</small>
            </h1>
        </div>
        <div class="component">
            <ul class="align">
                @foreach($searchedBooks as $searchedBook)
                    <li>
                        <figure class='book'>        
                            <!-- Front -->        
                            <ul class='hardcover_front'>
                                <li>
                                    <img src="/storage/images/{{$searchedBook['image']}}" alt="" width="100%" height="100%">
                                </li>
                                <li></li>
                            </ul>        
                            <!-- Pages -->        
                            <ul class='page'>
                                <li></li>
                                <li>
                                    <a class="btn" href="{{route('book.show', $searchedBook)}}">Trop chaud les bougres d'or !<br> Il est où le diplôme ?</a>
                                </li>
                                <li></li>
                                <li></li>
                                <li></li>
                            </ul>        
                            <!-- Back -->        
                            <ul class='hardcover_back'>
                                <li></li>
                                <li></li>
                                </ul>
                                <ul class='book_spine'>
                                <li></li>
                                <li></li>
                            </ul>
                            <figcaption>
                                <h1>{{$searchedBook['title']}}</h1>
                            </figcaption>
                        </figure>
                    </li>
                @endforeach
                <div>
                    <div class="pagination">
                        {{-- {{ $searchedBooks->appends(request()->query())->links() }} --}}
                    </div>
                </div>
            </ul>
        </div>
    </div>
@endsection