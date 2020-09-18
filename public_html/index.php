<?php
require_once('../processamento/processamento.php');
// $characters = GetResposeApi('characters', array ('nameStartsWith' => 'Spider', 'orderBy' => '-name'));

// var_dump($characters);
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="shortcut icon" href="../image/favicon.ico">
    <title>Marvel One</title>
</head>

<body class="bg-light">
    <div id="grandeImg" class="mb-4">
        <nav class="navbar navbar-expand-lg navbar-dark" id="navbar">
            <a class="navbar-brand text-left" href="index.php"><img src="../images/logotipoMarvelComicsOne3.png" class="w-5 m-0 p-0"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">início <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Dropdown
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="text-center text-white mt-4 pt-4">
            <img src="../images/logotipoMarvelComicsOne3.png" class="w-50"><br>
            <p class="text-center d-inline-block font-weight-bold px-3" style="max-width: 600px;">Tenha acesso a informações sobre o vasto arquivo de quadrinhos da Marvel, construido durante mais de 70 anos - e o que ainda está por vir!</p>
        </div>
    </div>

    <div class="bg-light text-center">
        <h1 class="pt-4 font-weight-bold text-marvel">Marvel Comics One</h1>
        <div class="container">
            <!-- Row -->
            <div class="row counter-box text-center">
                <!-- column  -->
                <div class="col-lg-3 col-6 aos-init aos-animate" data-aos="fade-right" data-aos-duration="1200">
                    <div class="">
                        <h2 class="font-medium text-marvel m-b-0">+<span class="counter">70</span></h2>
                        <h6 class="text-dark font-14 op-7">Anos de históra</h6>
                    </div>
                </div>
                <!-- column  -->
                <div class="col-lg-3 col-6 aos-init aos-animate" data-aos="fade-up" data-aos-duration="1200">
                    <div class="">
                        <h2 class="font-medium text-marvel m-b-0"><span class="counter">1</span></h2>
                        <h6 class="text-dark font-14 op-7">Só lugar</h6>
                    </div>
                </div>
                <!-- column  -->
                <div class="col-lg-3 col-6 aos-init aos-animate" data-aos="fade-up" data-aos-duration="1200">
                    <div class="">
                        <h2 class="font-medium text-marvel m-b-0"><span class="counter">24</span>h</h2>
                        <h6 class="text-dark font-14 op-7">Por dia</h6>
                    </div>
                </div>
                <!-- column  -->
                <div class="col-lg-3 col-6 aos-init aos-animate" data-aos="fade-left" data-aos-duration="1200">
                    <div class="">
                        <h2 class="font-medium text-marvel m-b-0">R$ <span class="counter">0,00</span></h2>
                        <h6 class="text-dark font-14 op-7">Sem nehum custo</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="px-4 pb-3 bg-light">
        <div class="divider"></div>
    </div>

    <div class="bg-light pt-4">
        <div class="row mx-3 bg-light">
            <section class="col-12 col-sm-6 col-md-4 image-grid-item">
                <div style="background-image: url(../images/image-bg.jpg);"
                    class="entry-cover image-grid-cover has-image">
                    <a href="categories.php?cat=" class="image-grid-clickbox"></a>
                    <a href="categories.php?cat=" class="cover-wrapper">Criadores</a>
                </div>
            </section>
            <section class="col-12 col-sm-6 col-md-4 image-grid-item">
                <div style="background-image: url(../images/image-bg.jpg);"
                    class="entry-cover image-grid-cover has-image">
                    <a href="categories.php?cat=" class="image-grid-clickbox"></a>
                    <a href="categories.php?cat=" class="cover-wrapper">Eventos e crossovers</a>
                </div>
            </section>
            <section class="col-12 col-sm-6 col-md-4 image-grid-item">
                <div style="background-image: url(../images/characters-spiderman.jpeg);"
                    class="entry-cover image-grid-cover has-image">
                    <a href="categories.php?cat=" class="image-grid-clickbox"></a>
                    <a href="categories.php?cat=" class="cover-wrapper">Personagens</a>
                </div>
            </section>
            <section class="col-12 col-sm-6 col-md-4 image-grid-item">
                <div style="background-image: url(../images/comics-xmen-daysoffuture.jpeg);"
                    class="entry-cover image-grid-cover has-image">
                    <a href="categories.php?cat=" class="image-grid-clickbox"></a>
                    <a href="categories.php?cat=" class="cover-wrapper">Quadrinhos</a>
                </div>
            </section>
            <section class="col-12 col-sm-6 col-md-4 image-grid-item">
                <div style="background-image: url(../images/image-bg.jpg);"
                    class="entry-cover image-grid-cover has-image">
                    <a href="categories.php?cat=" class="image-grid-clickbox"></a>
                    <a href="categories.php?cat=series" class="cover-wrapper">Séries de quadrinhos</a>
                </div>
            </section>
            <section class="col-12 col-sm-6 col-md-4 image-grid-item">
                <div style="background-image: url(../images/image-bg.jpg);" class="image-grid-cover">
                    <a href="categories.php?cat=" class="image-grid-clickbox"></a>
                    <a href="categories.php?cat=" class="cover-wrapper">Estou com sorte!</a>
                </div>
            </section>
        </div>
    </div>

    <footer id="footer">
        <div class="container">
            <section class="row text-center text-xs-center text-sm-left text-md-left">
                <div class="col-xs-12 col-sm-4 col-md-4">
                    <h5>Quem somos</h5>
                    <p class="text-white">Somos a QWERTY Code, uma empresa de desenvolvimento web criada para realizar
                        os trabalhos do curso Sistemas para a Internet, na Faculdade de Tecnologia de São Roque
                        (FATEC-SR). Seus idealizadores são a dupla de amigos Cesar August e Eloísa Carbalho.</p>
                </div>
                <div class="col-xs-12 col-sm-4 col-md-4">
                    <h5>Mapa do site</h5>
                    <ul class="list-unstyled quick-links">
                        <li><a href="#"><i class="fa fa-angle-double-right"></i>Criadores</a></li>
                        <li><a href="#"><i class="fa fa-angle-double-right"></i>Eventos e crossovers</a></li>
                        <li><a href="#"><i class="fa fa-angle-double-right"></i>Personagens</a></li>
                        <li><a href="#"><i class="fa fa-angle-double-right"></i>Quadrinhos</a></li>
                        <li><a href="#"><i class="fa fa-angle-double-right"></i>Séries de quadrinhos</a></li>
                    </ul>
                </div>
                <div class="col-xs-12 col-sm-4 col-md-4">
                    <h5>Outros links</h5>
                    <ul class="list-unstyled quick-links">
                        <li><a href="index.php"><i class="fa fa-angle-double-right"></i>Home</a></li>
                        <li><a href="#"><i class="fa fa-angle-double-right"></i>Sobre</a></li>
                        <li><a href="mailto:flordecactocomunicacao@gmail.com"><i
                                    class="fa fa-angle-double-right"></i>Contato</a></li>
                        <li><a href="https://github.com/EloisaSemH/marvelComicsOne"><i
                                    class="fa fa-angle-double-right"></i>Colabore</a></li>
                    </ul>
                </div>
            </section>
            <section class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 mt-2 mt-sm-5">
                    <ul class="list-unstyled list-inline social text-center">
                        <li class="list-inline-item"><a href="https://github.com/EloisaSemH/marvelComicsOne"
                                target="_blank"><i class="fa fa-github"></i></a></li>
                        <li class="list-inline-item"><a href="https://www.instagram.com/flordecactocomunicacao/"
                                target="_blank"><i class="fa fa-instagram"></i></a></li>
                        <li class="list-inline-item"><a href="mailto:flordecactocomunicacao@gmail.com"
                                target="_blank"><i class="fa fa-envelope"></i></a></li>
                    </ul>
                </div>
                <hr>
            </section>
            <section class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 mt-2 mt-sm-2 text-center text-white">
                    <p>Site elaborado por <b>QWERTY Code</b>/<b>Flor de Cacto Comunicação</b>. Desenvolvedores: <b><a
                                href="https://www.about.me/EloisaSemH" target="_blank">Eloísa Carvalho</a></b> e
                        <b>Cesar August</b>.
                    </p>
                    <p class="h6">© Todos os direitos reservados.<a class="text-green"
                            href="https://www.sunlimetech.com" target="_blank"> QWERTY Code
                            <?php echo date('Y'); ?></a>.</p>
                    <p class="h6">Data provided by <a class="text-green" href="http://www.marvel.com"
                            target="_blank">Marvel. © <?php echo date('Y'); ?> MARVEL. All right Reversed.</a></p>
                </div>
                <hr>
            </section>
        </div>
    </footer>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
</body>

</html>

<!-- https://bootsnipp.com/snippets/PDbVm Cards -->
<!-- https://bootsnipp.com/snippets/rlXdE Footer -->
<!-- https://bootsnipp.com/snippets/VgZq8 Estatisticas -->