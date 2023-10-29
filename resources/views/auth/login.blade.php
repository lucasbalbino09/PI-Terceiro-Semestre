<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="http://127.0.0.1:8000/css/login.css">
    <title>Charlie</title>
</head>
<body>

<div>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">

        @csrf


    <div class="login">
        <div class="logo-yyt-logo-lo">
            <img class="logo-yyt-logo-login" src="/img/logoOficialOficial.png">
        </div>
        <!-- Email Address -->
        <div>
            <label for="email">Email </label>
            <input class="inputLogin" type="email" name="email" :value="old('email')" required autofocus autocomplete="username">
        </div>

        <!-- Password -->
        <div>
            <label for="password">Senha </label>
            <input id="password" class="inputLogin"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />
        </div>

        <!-- Remember Me -->
        <div >
            <!-- <div>
                <a href="/forgot-password" class="esqueceu-senha">Esqueceu sua senha ?</a>
            </div> -->
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                    {{ __('Esqueceu sua senha ?') }}
                </a>
            @endif
        </div>
            <div>
                <button class="buttonLogin">
                    login
                </button>

                <a class="link-yut" href="/register">
                    Cadastrar
                </a>
            </div>
        </div>

    </form>
</div>

</div>
</html>
