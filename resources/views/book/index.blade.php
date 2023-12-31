@extends('layouts.app')

@section('title', 'Bibliothèque Bookledor')

@section('content')
    <style>
        p.text-sm.text-gray-700.leading-5 {
        display:none;
        }
        .sm\:justify-between{
            justify-content: center
        }
    </style>
        <div class="component">
            <ul class="align">
            <!-- Book 1 -->
                @foreach($books as $book)
                    <li>
                        <figure class='book'>        
                            <!-- Front -->        
                            <ul class='hardcover_front'>
                                <li>
                                    <img src="/storage/images/{{$book['image']}}" alt="" width="100%" height="100%">
                                </li>
                                <li></li>
                            </ul>        
                            <!-- Pages -->        
                            <ul class='page'>
                                <li></li>
                                <li>
                                    <a class="btn" href="{{route('book.show', $book)}}">Découvir ce livre</a>
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
                                <h1>{{$book['title']}}</h1>
                            </figcaption>
                        </figure>
                    </li>
                @endforeach
                <div>
                    <div class="pagination">
                        {{ $books->appends(request()->query())->links() }}
                    </div>
                </div>
            </ul>  
        </div>
@endsection