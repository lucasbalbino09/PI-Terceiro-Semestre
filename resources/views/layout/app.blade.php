<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

     <!-- Icone na barra de navegação -->
    <link rel="icon" type="image/png" href="/img/logoOficialOficial.png"/>

    <!-- Link CSS -->
    <link rel="stylesheet" type="text/css" href="/css/style.css" media="screen"/>
    <link rel="stylesheet" type="text/css" href="/css/index.css" media="screen"/>

    <!-- Link Favicon -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">

    <!--Link das Imagens.css-->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">

    <!--Google-Fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Chakra+Petch:wght@300&family=Poppins:wght@600&family=Space+Mono&display=swap" rel="stylesheet">

    <!-- Link do favcon -->
    <link rel="shortcut icon" href="./LOGO/logo-favicon.png" type="image/x-icon">

    <title>Charlie</title>
</head>
    <body>

        <!-- Barra de navegação -->
        <header>
            <div>
                <a href="/">
                    <img src="/img/logoOficialOficial.png" class="logo-teste">
                </a>                
            </div>
                        <!--Lista para classificar itens contidos dentro do menu-->
            <!--Pode ser editavel-->
            <ul class="navbar">
                <li><a href="/" class="active"><strong style="font-size: 17px; font-weight:bold;">Home</strong></a></li>
                <li><a href="/todos"><strong style="font-size: 17px;  font-weight:bold;">Novidades</strong></a></li>
                
                

           
                <li><a href="/promocoes"><strong style="font-size: 17px; font-weight:bold;">Promoções </strong> </a></li>

                <div class="dropdown">
  <button class="btn btn-transparent dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false" style="border: none;">
   <strong style="font-size: 17px;  font-weight:bold;"> Categorias</strong>
  </button>
  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
  @foreach(\App\Models\Categoria::all() as $categoria)
    <li>
 <a class="dropdown-item" href="{{route('categoria.show', $categoria->CATEGORIA_ID)}}"> {{$categoria->CATEGORIA_NOME}}</a>
    </li>
    @endforeach
  </ul>
</div>

            </ul>
            @if(!Auth::check())
            <div class="main">

                <!-- Arrumar botão transparente de pesquisa -->
                <form action="../produto" class="d-flex" role="search" method="GET">
                    <input class="form-control me-2" type="text" id="search" name="search"  aria-label="Search" style=" border: solid black 2px;">                    
                    <button class="btn btn-outline-danger" type="submit"><i class="ri-search-line"></i></button>
                  </form>

                <a href="../login" class="user"><i class="ri-user-fill"></i>Fazer Login</a>


                <a href="../register" class="bxmenu"><i class="ri-user-add-fill"></i>Criar conta</a>
                <div class="bx bx-menu" id="menu-icon"></div>
            </div>
            @else

            <div class="main">

                <!-- Arrumar botão transparente de pesquisa -->
                <form action="../produto" class="d-flex" role="search" method="GET">
                    <input class="form-control me-2" type="text" id="search" name="search"  aria-label="Search" style=" border: solid black 2px;">
                    <button class="btn btn-outline-danger" type="submit"><i class="ri-search-line"></i></button>
                  </form>

                  <button class="btn btn-transparent dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                  Olá, {{Auth::user()->USUARIO_NOME}}
                </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li>
                    <a class="dropdown-item"  href="/endereco">Meus Endereços</a>
                        </li>
                        <li>
                    <a class="dropdown-item"  href="/pedido">Meus Pedidos</a>
                        </li>
                        <li>
                    <a class="dropdown-item" href="{{route('usuarios.show', Auth::user()->USUARIO_ID)}}">Ver perfil</a>
                     </li>


                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="buttonsair"onclick="event.preventDefault();this.closest('form').submit();">Sair</button>
                </form>
                <div class="bx bx-menu" id="menu-icon"></div>
            </div>
</ul>

            @endif
        </header>

        <main>@yield('main')</main>

            <!--Footer-->
            <footer>

        <div class="wrapper">
            <div class="footer-box">
             <div class="company-footer">

                <img class="logo-yyt-log" src="/img/logoOficialOficial.png">
         

            </div>
        </div>

        <div class="footer-box">
            <div class="articles-footer">

                <h3>Formas de pagamento</h3>
                <div class="footer-list footer-article-list">
                    <div>                        
                        <img class="cardreey-boleto" src="/img/boleto.jpg">
                    </div>
                    <div>
                        <img class="cardreey" src="/img/cardvisa.png">                        
                    </div>
                        <div>
                            <img class="cardreey-pix" src="/img/cardpix.png">
                    </div>
                   
                </div>
            </div>
        </div>

            <div class="footer-box">
                <div class="footer-social">
                    <h3>Redes Sociais</h3>
                    <ul class="footer-list">
                        <li>
                            <a class="icon-face" href="#">
                                <!-- Icon facebook -->
                                <i class="ri-facebook-box-fill"></i>
                                <span>Facebook</span>
                            </a>
                        </li>
                        <li>
                            <a class="icon-insta" href="#">
                                <!-- Icon Instagram -->
                                <i class="ri-instagram-line"></i>
                                <span>Instagram</span>
                            </a>
                        </li>
                        <li>
                            <a class="icon-you" href="#">
                                <!-- Icon youtube -->
                                <i class="ri-youtube-fill"></i>
                                <span>Youtube</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    
    </footer>
<!-- FIM FOOTER -->

     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    </body>
</html>
