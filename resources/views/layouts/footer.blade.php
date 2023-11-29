
<div>

    <a href="{{ url('https://www.google.com/maps/place/26+Bd+Carabacel,+06000+Nice/@43.7042617,7.2743648,17z/data=!3m1!4b1!4m6!3m5!1s0x12cddaafbc1f660f:0x665cc91f30f6b249!8m2!3d43.7042617!4d7.2743648!16s%2Fg%2F11c1klq5c7?entry=ttu') }}" target="_blank">Adresse : 26 boulevard Carabacel 06000 Nice</a>
</div>
<div>
    <a href="tel:@php echo '0493624458'; @endphp">0493624458</a>
</div>
&copy; Nolan Costa & Andréa Baglieri

<nav>
    <div>
        <x-nav-link :href="route('book.index')" :active="request()->routeIs('book.index')">
            {{ __('Accueil') }}
        </x-nav-link>
    </div>

                <!-- Create Links -->
    <div>
         <x-nav-link :href="route('book.create')" :active="request()->routeIs('book.create')">
            {{ __('Publier un livre') }}
        </x-nav-link>
    </nav>
</div>

</body>
</html>