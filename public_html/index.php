<?php
require_once('../processamento/processamento.php');
// $characters = GetResposeApi('characters', array ('nameStartsWith' => 'Spider', 'orderBy' => '-name'));

// var_dump($characters);

include_once('content/header.php');
?>
<div id="index">
<div id="grandeImg" class="mb-4">

    <?php include_once('content/nav.php'); ?>

    <div class="text-center text-white mt-4 pt-4">
        <img src="../images/logotipoMarvelComicsOne3.png" class="w-50"><br>
        <p class="text-center d-inline-block font-weight-bold px-3" style="max-width: 600px;">Tenha acesso a
            informações sobre o vasto arquivo de quadrinhos da Marvel, construido durante mais de 70 anos - e o que
            ainda está por vir!</p>
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
            <div style="background-image: url(../images/image-bg.jpg);" class="entry-cover image-grid-cover has-image">
                <a href="categories.php?cat=creators" class="image-grid-clickbox"></a>
                <a href="categories.php?cat=creators" class="cover-wrapper">Criadores</a>
            </div>
        </section>
        <section class="col-12 col-sm-6 col-md-4 image-grid-item">
            <div style="background-image: url(../images/image-bg.jpg);" class="entry-cover image-grid-cover has-image">
                <a href="categories.php?cat=events" class="image-grid-clickbox"></a>
                <a href="categories.php?cat=events" class="cover-wrapper">Eventos e crossovers</a>
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
                <a href="categories.php?cat=comics" class="image-grid-clickbox"></a>
                <a href="categories.php?cat=comics" class="cover-wrapper">Quadrinhos</a>
            </div>
        </section>
        <section class="col-12 col-sm-6 col-md-4 image-grid-item">
            <div style="background-image: url(../images/image-bg.jpg);" class="entry-cover image-grid-cover has-image">
                <a href="categories.php?cat=series" class="image-grid-clickbox"></a>
                <a href="categories.php?cat=series" class="cover-wrapper">Séries de quadrinhos</a>
            </div>
        </section>
        <section class="col-12 col-sm-6 col-md-4 image-grid-item">
            <div style="background-image: url(../images/image-bg.jpg);" class="image-grid-cover">
                <a href="categories.php?cat=lucky" class="image-grid-clickbox"></a>
                <a href="categories.php?cat=lucky" class="cover-wrapper">Estou com sorte!</a>
            </div>
        </section>
    </div>
</div>
</div>

<?php include_once('content/footer.php'); ?>
<!-- https://bootsnipp.com/snippets/PDbVm Cards -->
<!-- https://bootsnipp.com/snippets/rlXdE Footer -->
<!-- https://bootsnipp.com/snippets/VgZq8 Estatisticas -->