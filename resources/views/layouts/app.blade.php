<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}" />

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!--Facebook share-->
        <meta property="og:url"           content="https://shiwaki.net" />
        <meta property="og:type"          content="website" />
        <meta property="og:title"         content="Shiwaki />
        <meta property="og:description"   content="SHIWAKI (Shirika La Waandishi wa Kiswahili) ni muungano wa waandishi wa lugha ya kiswahili. Jukumu kubwa la muungano huu ni kutoa nafasi ya kuonyesha kwa ufasaha kazi za Fasihi kutoka kwa waandishi mbalimbali pamoja na kufasiri kazi zilizo kwenye lugha tofauti.Ufasiri huu, umelengwa katika kuongeza hadhira ya wasomaji wa nathari na shairi katika lugha ya kiswahili.SHIWAKI ina malengo ya kuipeleka Fasihi ya Kiswahili duniani kote kutokana na uongezeko wa kuthaminiwa kwa lugha hii ulimwenguni." />
        <meta property="og:image"         content="https://shiwaki.net/" />
        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        {{-- <script src="https://unpkg.com/turbolinks"></script> --}}
        <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.js" defer></script>
        <script src="https://www.unpkg.com/trix@1.2.3/dist/trix.js"></script>


        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com" />
        <link
            href="https://fonts.googleapis.com/css?family=Nunito"
            rel="stylesheet"
        />

        <!-- Styles -->
        <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">


        <script src="https://kit.fontawesome.com/ec6e0bb911.js" crossorigin="anonymous"></script>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet" />
        <link href="{{ asset('css/main.css') }}" rel="stylesheet" />
        @livewireStyles
        <link rel="stylesheet" href="https://www.unpkg.com/trix@1.2.3/dist/trix.css">
        <link rel="shortcut icon" href="{{ URL::asset('favicon.ico') }}">
    </head>

    <body class="">
        <div id="app" class="">
            
            @include('includes._nav')

            <main class="">
                @yield('content')
                @include('includes._footer')
            </main>
        </div>
          <div id="fb-root"></div>
  <script>(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));</script>
        @include('sweetalert::alert')
        @livewireScripts
    </body>
</html>
