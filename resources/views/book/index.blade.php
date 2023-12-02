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


<div>
    <form action="/filter" method="GET">
        {{ csrf_field() }}
        <div>
           
            <select name="authorFilter">
                <option selected="selected" value="">Auteur</option>
                <option value="???">données à recup</option>
            </select>

            <select name="genderFilter">
                <option selected="selected" value="">Genre</option>
                <option value="???">données à recup</option>
            </select>

            <select name="yearFilter">
                <option selected="selected" value="">Année</option>
                <option value="???">données à recup</option>
            </select>

            <span>
                <button type="submit">🔎</button>
            </span>
        </div>
    </form>
</div>

              <!-- Select pour l'auteur -->
{{-- <div class="form-group">
    <label for="authorFilter">Auteur :</label>
    <select name="author" id="author" class="form-input">
        @foreach ($authors as $author)
            <option value='{{ $author->id }}'
                @if ($author->id == old('author'))
                    selected
                @endif
            >{{ $author->name }}</option>
        @endforeach
    </select>
</div> --}}


                <!-- Select pour le genre -->
                {{-- <div class="form-group"> --}}
                    {{-- <label for="genreFilter">Genre :</label>
                    <select name="gender_id" id="gender_id" class="form-input">
                        @foreach ($genders as $gender)
                            <option value='{{ $gender['id'] }}'
                                @if ($gender['id'] == old('gender_id'))
                                    selected
                                @endif
                            >{{ $gender['name'] }}</option>
                        @endforeach
                    </select> --}}
                {{-- </div> --}}

                <!-- Select pour l'année -->
                {{-- <div class="form-group">
                    <label for="yearFilter">Année :</label>
                    <select class="form-control" id="yearFilter" name="yearFilter">
                        <option value="">Choisir</option>
                
                        @foreach ($years as $year)
                            <option value="{{ $year }}"
                                @if ($year == old('yearFilter'))
                                    selected
                                @endif
                            >{{ $year }}</option>
                        @endforeach
                    </select>
                </div>

                <span>
                    <button class="btnFilter" type="submit">🔎</button>
                </span>
            </div>
        </form>
    </div>
</div> --}}


    {{-- <form action="{{ route('book.filter') }}" method="GET">
        <!-- Champ d'auteur -->
        <div class="form-group filter-field">
            <label for="author_filter">Auteur :</label>
            <input type="text" name="author_filter" id="author_filter" class="form-control" value="{{ old('author_filter') }}">
        </div>

        <!-- Champ de genre -->
        <div class="form-group filter-field">
            <label for="genre_filter">Genre :</label>
            <input type="text" name="genre_filter" id="genre_filter" class="form-control" value="{{ old('genre_filter') }}">
        </div>

        <!-- Champ d'année -->
        <div class="form-group filter-field">
            <label for="year_filter">Année :</label>
            <input type="number" name="year_filter" id="year_filter" class="form-control" value="{{ old('year_filter') }}" min="1455">
        </div>

        <!-- Bouton de soumission -->
        <button type="submit" class="btn btn-primary filter-btn">Filtrer</button>
    </form> --}}

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