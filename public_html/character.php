<?php
include_once('content/header.php');
include_once('content/nav.php');

if(!isset($_GET['id']) || is_null($_GET['id']) || $_GET['id'] == '' || $_GET['id'] <= 0){
    ?>
<script>
Swal.fire({
    icon: 'error',
    title: 'Oops...',
    html: '<p>Nenhum personagem foi selecionado!</p><a href="index.php" class="btn btn-outline-danger mb-3">Voltar ao início</a>',
    allowOutsideClick: false,
    allowEscapeKey: false,
    allowEnterKey: false,
    showConfirmButton: false
})
</script>
<?php
}else{
    $id = $_GET['id'];
}
require_once('../processamento/processamento.php');

$response = GetResposeApi('characters/' . $id);
?>

<div class="container">
    <main class="row">
        <?php include_once('content/sidebar.php'); ?>
        <article class="col-lg-8 pt-3">
            <?php 
            if($response->code == 200){
                    $response = $response->data;
                    foreach ($response->results as $character) { ?>
            <div class="row">
                <div class="col-lg-6 col-md-12 col-sm-12">
                    <img src="<?php echo (!is_null($character->thumbnail)) ? SaveImage($character->thumbnail->path, $character->thumbnail->extension) : 'images/content/image_not_available-landscape_incredible.jpg';?>"
                        class="w-100 mb-3" alt="Capa <? echo $character->name; ?>">
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12">
                    <h2 class="text-marvel">
                        <? echo $character->name; ?>
                    </h2>
                    <p class="">
                        <?php echo (!is_null($character->description)) ? TraduzirTexto($character->description) : ''; ?>
                    </p>
                </div>
                <?php if (is_object($character->stories) && $character->stories->available > 0){?>
                <aside class="col-lg-6 col-md-12 col-sm-12">
                    <h3 class="">Estórias</h3>
                    <small class="text-muted text-wrap">As 20 últimas estórias em que o personagem apareceu!</small>
                    <ul class="">
                        <?php foreach ($character->stories->items as $card) { ?>
                        <li class="text-wrap">
                            <a href="story.php?id=<?php echo basename($card->resourceURI); ?>" class="text-marvel">
                                <? echo $card->name; ?>
                            </a>
                        </li>
                        <? } ?>
                    </ul>
                </aside>
                <? } ?>
                <?php if (is_object($character->events) && $character->events->available > 0){?>
                <aside class="col-lg-6 col-md-12 col-sm-12">
                    <h3>Eventos</h3>
                    <small class="text-muted text-wrap">Os 20 últimos eventos em que o personagem apareceu!</small>
                    <ul class="">
                        <?php foreach ($character->events->items as $card) { ?>
                        <li class="text-wrap">
                            <a href="event.php?id=<?php echo basename($card->resourceURI); ?>" class="text-marvel">
                                <? echo $card->name; ?>
                            </a>
                        </li>
                        <? } ?>
                    </ul>
                </aside>
                <? } ?>
                <?php if (is_object($character->comics) && $character->comics->available > 0){?>
                <aside class="col-lg-6 col-md-12 col-sm-12">
                    <h3>Quadrinhos</h3>
                    <small class="text-muted text-wrap">Os 20 últimos quadrinhos em que o personagem apareceu!</small>
                    <ul class="">
                        <?php foreach ($character->comics->items as $card) { ?>
                        <li class="text-wrap">
                            <a href="comic.php?id=<?php echo basename($card->resourceURI); ?>" class="text-marvel">
                                <? echo $card->name; ?>
                            </a>
                        </li>
                        <? } ?>
                    </ul>
                </aside>
                <? } ?>
                <?php if (is_object($character->series) && $character->series->available > 0){?>
                <aside class="col-lg-6 col-md-12 col-sm-12">
                    <h3>Séries</h3>
                    <small class="text-muted text-wrap">As 20 últimas séries em que o personagem apareceu!</small>
                    <ul class="">
                        <?php foreach ($character->series->items as $card) { ?>
                        <li class="text-wrap">
                            <a href="serie.php?id=<?php echo basename($card->resourceURI); ?>" class="text-marvel">
                                <? echo $card->name; ?>
                            </a>
                        </li>
                        <? } ?>
                    </ul>
                </aside>
                <? } ?>
            </div>
            <? } }else{
                include_once('content/404.php');
            } ?>
        </article>
    </main>
</div>

<?php include_once('content/footer.php'); ?>