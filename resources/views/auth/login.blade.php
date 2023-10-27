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
        <div class="formulario">
            <div>
                <label for="email" class="label-email">Email: </label>
                <input class="inputLogin" type="email" name="email" :value="old('email')" required autofocus autocomplete="username">
            </div>
    
            <!-- Password -->
            <div>
                <label for="password" class="label-senha">Senha: </label>
                <input id="password" class="inputLogin"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />
            </div>
    
            <!-- Remember Me -->
            <div class="senhmiy">
    
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

        </div>
        

    </form>
</div>

</div>
</html>
