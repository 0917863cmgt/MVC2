<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>Recipes from Home</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="">
    <link rel="stylesheet" href="/app.css">

</head>
<body>
<header>
    <nav id="navigation-top">
        <ul id="navigation-bar" class="container">
            <a id="tennis-club-logo" href="/"><li>Recipes from Home</li></a>
            @auth
                <a href="/highlights"><li>Highlights</li></a>
                <a href="/statistics"><li>Statistieken</li></a>
                <a href="/u/{{auth()->user()->id}}"><li style="font-size:x-small;word-wrap: anywhere">Welcome {{auth()->user()->first_name}}!</li></a>
                <a href="/logout"><li>Log out</li></a>
            @endauth
            @guest
                <a href="/login"><li>Log in</li></a>
                <a href="/register"><li>Registreer</li></a>
            @endguest
        </ul>
    </nav>
</header>
@if(session()->has('succes'))
    <p id="hideMe" class="flash-message">{{session('succes') ?? 'Geen succes flash message in session gevonden'}}</p>

@elseif(session()->has('fail'))
    <p id="hideMe" class="flash-message" style="background-color: darkred;color: black">{{session('fail') ?? 'Geen succes flash message in session gevonden'}}</p>
@endif
@yield('content')
<footer id="footer" class="row">
    <div class="container-fluid px-5">
        <div class="row gx-2">
            <div class="p-3 col-4">
                <h3 class="footer-h3">Openingstijden Park</h3>
                <div class="row">
                    <div class="col-4">
                        <br>
                        <p>Maandag:</p>
                        <p>Dinsdag:</p>
                        <p>Woensdag:</p>
                        <p>Donderdag:</p>
                        <p>Vrijdag:</p>
                        <p>Zaterdag:</p>
                        <p>Zondag:</p>
                    </div>
                    <div class="col-4">
                        <br>
                        <p>12:00-18:00</p>
                        <p>12:00-18:00</p>
                        <p>12:00-18:00</p>
                        <p>12:00-18:00</p>
                        <p>10:00-20:00</p>
                        <p>07:00-20:00</p>
                        <p>12:00-20:00</p>
                    </div>
                </div>
            </div>
            <div class="p-3 col-4">
                <h3 class="footer-h3">Contact en Route</h3>
                <br>
                <b style="margin-top:50px;">Adres</b>
                <p>Wijnhaven 14, 3011WN, Rotterdam</p>
                <b>Telefoon</b>
                <p>010-0123456</p>
                <b>Email</b>
                <p>tennisclub@example.com</p>
            </div>
            <div class="p-3 col-4">
                <h3 class="footer-h3">Schrijf je in voor de nieuwsbrief</h3>
                <br>
                <form>
                    <label for="footer-email">E-mailadres:</label>
                    <br>
                    <input id="footer-email" name="email" type="email" placeholder="E-mail">
                    <br>
                    <input id="footer-submit" name="post" type="submit" value="Aanmelden">
                </form>
            </div>
        </div>
    </div>
</footer>
</body>
<script src="/app.js"></script>
</html>
