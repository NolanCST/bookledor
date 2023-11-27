<!DOCTYPE html>
<html>
<head>
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
    <script src="https://kit.fontawesome.com/f9d009cb2a.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/style.css">
</head>
<body>
    <header>
        <h1>@yield('title')</h1>
        <nav>
            <p>logo</p>
            <a href="{{route('book.index')}}">Liste des livres</a> 
            <a href="{{route('book.create')}}">Ajouter un nouveau livre</a>
        </nav>
    </header>
    <main>
        @yield('content')
    </main>
    <footer>
        <p> Adresse, num tel + pages</p>
        &copy; Le Bocal Academy 2023
    </footer>
</body>
</html>