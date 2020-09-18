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
    <title>Marvel One</title>
</head>

<body class="bg-light">
    <div id="grandeImg" class="mb-4">
        <nav class="navbar navbar-expand-lg navbar-dark" id="navbar">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
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
                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
            </div>
        </nav>
    </div>

    <!-- <div class="container bg-light pt-4"> -->
        <div class="row mx-3">
            <section class="col-12 col-sm-6 col-md-4 image-grid-item">
                <div style="background-image: url(https://cdn.beam.usnews.com/dims4/USNEWS/59f1d50/2147483647/thumbnail/970x647/quality/90/?url=http%3A%2F%2Fcom-usnews-beam-media.s3.amazonaws.com%2F28%2F21%2F37a23a5f40048594e7e1209a842d%2F150427-networking-stock.jpg	);"
                    class="image-grid-cover">
                    <a href="categories.php?cat=" class="image-grid-clickbox"></a>
                    <a href="categories.php?cat=" class="cover-wrapper">Etkinlikler</a>
                </div>
            </section>
            <section class="col-12 col-sm-6 col-md-4 image-grid-item">
                <div style="background-image: url(https://cdn.bolgegundem.com/d/news/333778.jpg	);"
                    class="entry-cover image-grid-cover has-image">
                    <a href="categories.php?cat=" class="image-grid-clickbox"></a>
                    <a href="categories.php?cat=" class="cover-wrapper">Düğünler</a>
                </div>
            </section>
            <section class="col-12 col-sm-6 col-md-4 image-grid-item">
                <div style="background-image: url(https://www.trthaber.com/resimler/218000/218798.jpg	);"
                    class="entry-cover image-grid-cover has-image">
                    <a href="categories.php?cat=" class="image-grid-clickbox"></a>
                    <a href="categories.php?cat=" class="cover-wrapper">Gezi / Tur</a>
                </div>
            </section>
            <section class="col-12 col-sm-6 col-md-4 image-grid-item">
                <div style="background-image: url(http://www.technocrazed.com/wp-content/uploads/2015/12/Airplane-wallpaper-112-640x360.jpg);"
                    class="entry-cover image-grid-cover has-image">
                    <a href="categories.php?cat=" class="image-grid-clickbox"></a>
                    <a href="categories.php?cat=" class="cover-wrapper">Havalimanı Transferi</a>
                </div>
            </section>
            <section class="col-12 col-sm-6 col-md-4 image-grid-item">
                <div style="background-image: url(https://img-s2.onedio.com/id-5738f74cb6efafb314a46f07/rev-0/w-600/h-300/s-d707c9ec5af8f66dc5506a2796ac14fce1fbb35b.jpg	);"
                    class="entry-cover image-grid-cover has-image">
                    <a href="categories.php?cat=" class="image-grid-clickbox"></a>
                    <a href="categories.php?cat=" class="cover-wrapper">Günlük Seyahat</a>
                </div>
            </section>
            <section class="col-12 col-sm-6 col-md-4 image-grid-item">
                <div style="background-image: url(https://image.stern.de/8205460/16x9-940-529/3c6ed305ea6e6f63c0454fda4dbc5d02/hx/pic-grand-calfornia-2018--9-.jpg	);"
                    class="entry-cover image-grid-cover has-image">
                    <a href="categories.php?cat=" class="image-grid-clickbox"></a>
                    <a href="categories.php?cat=" class="cover-wrapper">Karavan Kiralama </a>
                </div>
            </section>
        </div>
    <!-- </div> -->
    <footer id="footer">
    <div class="container">
			<div class="row text-center text-xs-center text-sm-left text-md-left">
				<div class="col-xs-12 col-sm-4 col-md-4">
                    <h5>Quem somos</h5>
                    <p class="text-white">Somos a QWERTY Code, uma empresa de desenvolvimento web criada para realizar os trabalhos do curso Sistemas para a Internet, na Faculdade de Tecnologia de São Roque (FATEC-SR). Seus idealizadores são a dupla de amigos Cesar August e Eloísa Carbalho.</p>
				</div>
				<div class="col-xs-12 col-sm-4 col-md-4">
					<h5>Quick links</h5>
					<ul class="list-unstyled quick-links">
						<li><a href="#"><i class="fa fa-angle-double-right"></i>Criadores</a></li>
						<li><a href="#"><i class="fa fa-angle-double-right"></i>Eventos e crossovers</a></li>
						<li><a href="#"><i class="fa fa-angle-double-right"></i>Personagens</a></li>
						<li><a href="#"><i class="fa fa-angle-double-right"></i>Quadrinhos</a></li>
						<li><a href="#"><i class="fa fa-angle-double-right"></i>Séries de quadrinhos</a></li>
					</ul>
				</div>
				<div class="col-xs-12 col-sm-4 col-md-4">
					<h5>Quick links</h5>
					<ul class="list-unstyled quick-links">
						<li><a href="index.php"><i class="fa fa-angle-double-right"></i>Home</a></li>
						<li><a href="#"><i class="fa fa-angle-double-right"></i>Sobre</a></li>
						<li><a href="mailto:flordecactocomunicacao@gmail.com"><i class="fa fa-angle-double-right"></i>Contato</a></li>
						<li><a href="https://github.com/EloisaSemH/marvelComicsOne"><i class="fa fa-angle-double-right"></i>Colabore</a></li>
					</ul>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 mt-2 mt-sm-5">
					<ul class="list-unstyled list-inline social text-center">
						<li class="list-inline-item"><a href="https://github.com/EloisaSemH/marvelComicsOne" target="_blank"><i class="fa fa-github"></i></a></li>
						<li class="list-inline-item"><a href="https://www.instagram.com/flordecactocomunicacao/" target="_blank"><i class="fa fa-instagram"></i></a></li>
						<li class="list-inline-item"><a href="mailto:flordecactocomunicacao@gmail.com" target="_blank"><i class="fa fa-envelope"></i></a></li>
					</ul>
				</div>
				<hr>
			</div>	
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 mt-2 mt-sm-2 text-center text-white">
					<p>Site elaborado por <b>QWERTY Code</b>/<b>Flor de Cacto Comunicação</b>. Desenvolvedores: <b><a href="https://www.about.me/EloisaSemH" target="_blank">Eloísa Carvalho</a></b> e <b>Cesar August</b>.</p>
					<p class="h6">© Todos os direitos reservados.<a class="text-green" href="https://www.sunlimetech.com" target="_blank"> QWERTY Code <?php echo date('Y'); ?></a>.</p>
					<p class="h6">Data provided by <a class="text-green" href="http://www.marvel.com" target="_blank">Marvel. © <?php echo date('Y'); ?> MARVEL. All right Reversed.</a></p>
				</div>
				<hr>
			</div>	
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