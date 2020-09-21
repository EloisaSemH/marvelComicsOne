<?php
include_once('content/header.php');
include_once('content/nav.php');

if(!isset($_GET['cat']) || is_null($_GET['cat']) || $_GET['cat'] == ''){
    include_once('content/footer.php');
?>
<script>
Swal.fire({
    icon: 'error',
    title: 'Oops...',
    html: '<p>Nenhuma categoria foi selecionada!</p><a href="index.php" class="btn btn-outline-danger mb-3">Voltar ao início</a>',
    allowOutsideClick: false,
    allowEscapeKey: false,
    allowEnterKey: false,
    showConfirmButton: false
})
</script>
<?php
}else{
require_once('../processamento/processamento.php');

$response = GetResposeApi($_GET['cat'], 'limit=1');

// var_dump($response);
?>

<div class="container">
    <main class="row">
        <?php include_once('content/sidebar.php'); ?>
        <article class="col-lg-8">
            <div class="row row-cols-1 row-cols-md-3">
                <?php foreach ($response as $card) { ?>
                <div class="col-lg-4 col-md-2 col-sm-12 mb-4">
                    <div class="card h-100">
                        <!-- <img src=""                            class="card-img-top" alt="..."> -->
                        <?php $image = SaveImage($card->thumbnail->path, $card->thumbnail->extension); echo $image;?>
                        <div class="card-body">
                            <h5 class="card-title">
                                <? echo $card->title; ?>
                            </h5>
                            <p class="card-text"><?php echo $card->description ?></p>
                        </div>
                    </div>
                </div>
                <? } ?>
            </div>
        </article>
    </main>
</div>

<?php 
include_once('content/footer.php');
}
?>