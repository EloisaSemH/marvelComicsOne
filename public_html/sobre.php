<?php
include_once('content/header.php');
include_once('content/nav.php');
?>
<div id="index">
<main class="container bg-light pt-4 pb-4">

    <div class="row justify-content-center">
        <h1 class="text-marvel font-weight-bold">Sobre</h1>
    </div>
    <div class="row justify-content-center">
        <article class="col-sm-12 col-md-8 col-lg-6 text-center">
            <img src="/images/logotipoMarvelComicsOne1.png" class="w-50">
            <p>O MarvelComicsOne é um site de consumo da API da Marvel, desenvolvido como atividade avaliativa da
                matéria de desenvolvimento para servidores, do quarto semestre do curso de Sistemas para a Internet, da
                Faculdade de Tecnologia de São Roque (FATEC-SR), ministrado pelo professor Fernando Leonid.</p>
        </article>
    </div>
    <hr>
    <div class="row justify-content-center mt-4 mb-3">
        <section class="col-sm-12 col-md-8 col-lg-6 text-center">
        <h2 class="text-marvel font-weight-bold">Desenvolvedores</h2>
        <p>A responsável pelo desenvolvimento deste website é a QWERTY Code, idealizada pelos seguintes membros:</p>
        </section>
    </div>
    <div class="row justify-content-center">
        <section class="col-sm-12 col-md-12 col-lg-11 text-right">
            <div class="float-right ml-3">
                <img src="/images/cesar.jpg" alt="" class="rounded-circle">
            </div>
            <h2 class="mb-0 text-marvel">Cesar August Silva Barbosa</h2>
            <h5 class="mb-0 font-italic">Designer e coder</h5>
            <small class="mb-3 text-muted">Mr. Marvel</small>
            <p>PAULISTA, de Vargem Grande. Formado em Tecnico de Rede de Computadores, atualmente cursando superior de
                Sistemas para Internet.</p>
        </section>
    </div>
    <div class="row justify-content-center mt-4">
        <section class="col-sm-12 col-md-12 col-lg-11 ">
            <div class="float-left mr-3">
                <img src="/images/eloisa.jpg"
                    alt="Foto da desenvolvedora Eloísa, que usa um óculos preto levemente arredondado, tem olhos castanho-escuros e cabelo castanho com azul."
                    class="rounded-circle">
            </div>
            <h2 class="mb-0 text-marvel">Eloísa de Carvalho Trindade</h2>
            <h5 class="mb-0 font-italic">Líder, coder e designer</h5>
            <small class="mb-3 text-muted">@EloisaSemH</small>
            <p>Nascida em Itu, com <?php echo (date('m') == 12 && date('d') >= 21) ? date('Y') - 2000 : (date('Y') - 2000) - 1;?> anos é técnica em Web, faz faculdade de Sistemas para a Internet, é amante de
                audiovisual, games e de seu gatinho, Leon.</p>
        </section>
    </div>
</main>
</div>
<?php include_once('content/footer.php'); ?>