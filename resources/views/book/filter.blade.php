@extends('layouts.app')
@section('title', 'Filtrer Livre')
@section('titlePage')
<h2>Resultats concernants la recherche {{$key}}</h2>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-8">

            <h1 class="filterTitle my-4">Résultat de recherche pour:
                <small>{{$key}}</small>
            </h1>
        </div>
        <div class="component">
            <ul class="align">
                @foreach($filteredBooks as $filteredBook)
                    <li>
                        <figure class='book'>        
                            <!-- Front -->        
                            <ul class='hardcover_front'>
                                <li>
                                    <img src="/storage/images/{{$filteredBook['image']}}" alt="" width="100%" height="100%">
                                </li>
                                <li></li>
                            </ul>        
                            <!-- Pages -->        
                            <ul class='page'>
                                <li></li>
                                <li>
                                    <a class="btn" href="{{route('book.show', $filteredBook)}}">Découvrir ce livre</a>
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
                            {{-- <figcaption>
                                <h1>{{$filteredBook['title']}}</h1>
                            </figcaption> --}}
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