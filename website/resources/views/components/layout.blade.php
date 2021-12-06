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
            <a id="homepage-link" href="/"><li>Recipes from Home</li></a>
            @auth
                <a href="/favourites"><li>Favourites</li></a>
                <a href="/u/{{auth()->user()->id}}"><li style="font-size:x-small;word-wrap: anywhere">Welcome {{auth()->user()->first_name}}!</li></a>
                <a href="/logout"><li>Log out</li></a>
            @endauth
            @guest
                <a href="/login"><li>Log in</li></a>
                <a href="/register"><li>Register</li></a>
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
                <h4 class="footer-h3">Links?</h4>
            </div>
            <div class="p-3 col-4 justify-content-center">
                <h4 class="footer-h3">Sign up for the newsletter!</h4>
                <form id="footer-subscribe">
                    <label for="footer-email">E-mail</label>
                    <br>
                    <input id="footer-email" name="email" type="email" placeholder="example@email.com">
                    <input id="footer-submit" name="post" type="submit" value="Subscribe">
                </form>
            </div>
            <div class="p-3 col-4">
                <h4 class="footer-h3">Optioneel</h4>
            </div>
        </div>
    </div>
</footer>
</body>
<script src="/app.js"></script>
</html>