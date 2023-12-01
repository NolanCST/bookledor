<style>
   
    .container {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 20px;
        max-width: 1200px;
       
        margin: 0 auto;
    }
    
    /* Logo Styles */
    .logo {
        grid-column: 1;
    }
    
    /* infos Styles */
    .infos {
        grid-column: 2;
        text-align: left;
    }
    
    /* Links Styles */
    .links {
        grid-column: 3;
        text-align: right;
        display: flex;
        flex-direction: column;
        align-items: left;
    }
    
    .links div {
        margin-bottom: 10px;
    }
    .copy {
        text-align: center;
        padding-top: 3px;
        padding-top: 3px;
        background-color: rgba(221, 221, 221, 0.993);
    }
    
    
    @media (max-width: 500px) {
    
    .logo {
        display: none;
    }
      .container{
        display:flex;
      padding: 0 8% 0 8%;
      }
    
    .infos {
        font-size: 80%;
    }
    .links {
        font-size: 80%
    }
    
    }
    </style>
    
    
    <div class="container">
        <div class='logo'>
            <img src="/images/logoNavBar.png" alt="Logo" />
        </div>
        <div class="infos">
                <p><u>Contact :</u></p>
                <a href="tel:@php echo '0493624458'; @endphp">Téléphone: 0493624458</a></br>
                <a href="mailto:community@lebocal.academy">community@lebocal.academy</a></br>
                <a href="{{ url('https://www.google.com/maps/place/26+Bd+Carabacel,+06000+Nice/@43.7042617,7.2743648,17z/data=!3m1!4b1!4m6!3m5!1s0x12cddaafbc1f660f:0x665cc91f30f6b249!8m2!3d43.7042617!4d7.2743648!16s%2Fg%2F11c1klq5c7?entry=ttu') }}" target="_blank">26 boulevard Carabacel 06000 Nice</a>       
        </div>
        <nav class='links'>
            <div>
                <x-nav-link :href="route('book.index')" :active="request()->routeIs('book.index')">
                    {{ __('Accueil') }}
                </x-nav-link>
            </div>
            <div>
                 <x-nav-link :href="route('book.create')" :active="request()->routeIs('book.create')">
                    {{ __('Publier un livre') }}
                </x-nav-link>
            </div>
        </nav>
    </div>
    <div class='copy'>
            &copy; Nolan Costa & Andréa Baglieri
            </div
    </body>
    </html>