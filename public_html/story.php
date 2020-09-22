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

$response = GetResposeApi('stories/' . $id);
?>

<div class="container">
    <main class="row">
        <?php include_once('content/sidebar.php'); ?>
        <article class="col-lg-8 pt-3">
            <?php if($response->code == 200){
                    $response = $response->data;
                    foreach ($response->results as $story) { ?>
            <div class="row">
                <div class="col-lg-6 col-md-12 col-sm-12">
                    <img src="<?php echo (!is_null($story->thumbnail)) ? SaveImage($story->thumbnail->path, $story->thumbnail->extension) : 'images/content/image_not_available-landscape_incredible.jpg';?>"
                        class="w-100 mb-3" alt="Capa <? echo $story->title; ?>">
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12">
                    <p class="">
                        <? echo $story->title; ?>
                    </p>
                    <p class="">
                        <?php echo ($story->description); // (!is_null($story->description)) ? TraduzirTexto($story->description) : ''; ?>
                    </p>

                </div>
                <?php if (is_object($story->comics) && $story->comics->available > 0){?>
                <aside class="col-lg-6 col-md-12 col-sm-12">
                    <h3>Quadrinhos</h3>
                    <small class="text-muted text-wrap">Quadrinhos com essa estória!</small>
                    <ul class="">
                        <?php foreach ($story->comics->items as $card) { ?>
                        <li class="text-wrap">
                            <a href="comic.php?id=<?php echo basename($card->resourceURI); ?>" class="text-marvel">
                                <? echo $card->name; ?>
                            </a>
                        </li>
                        <? } ?>
                    </ul>
                </aside>
                <? } ?>
                <?php if (is_object($story->events) && $story->events->available > 0){?>
                <aside class="col-lg-6 col-md-12 col-sm-12">
                    <h3>Eventos</h3>
                    <small class="text-muted text-wrap">Eventos contidos nessa estória!</small>
                    <ul class="">
                        <?php foreach ($story->events->items as $card) { ?>
                        <li class="text-wrap">
                            <a href="event.php?id=<?php echo basename($card->resourceURI); ?>" class="text-marvel">
                                <? echo $card->name; ?>
                            </a>
                        </li>
                        <? } ?>
                    </ul>
                </aside>
                <? } ?>
                <?php if (is_object($story->creators) && $story->creators->available > 0){?>
                <aside class="col-lg-6 col-md-12 col-sm-12">
                    <h3 class="">Criadores</h3>
                    <small class="text-muted text-wrap">Os criadores do quadrinhho!</small>
                    <ul class="">
                        <?php foreach ($story->creators->items as $card) { ?>
                        <li class="text-wrap">
                            <a href="creator.php?id=<?php echo basename($card->resourceURI); ?>" class="text-marvel">
                                <? echo $card->name; ?>
                            </a> - 
                            <span class="text-muted"><? echo $card->role; ?></span>
                        </li>
                        <? } ?>
                    </ul>
                </aside>
                <? } ?>
                <?php if (is_object($story->characters) && $story->characters->available > 0){?>
                <aside class="col-lg-6 col-md-12 col-sm-12">
                    <h3>Personagens</h3>
                    <small class="text-muted text-wrap">Personagens que aparecem nessa estória! (Limite de 20)</small>
                    <ul class="">
                        <?php foreach ($story->characters->items as $card) { ?>
                        <li class="text-wrap">
                            <a href="character.php?id=<?php echo basename($card->resourceURI); ?>" class="text-marvel">
                                <? echo $card->name; ?>
                            </a>
                        </li>
                        <? } ?>
                    </ul>
                </aside>
                <? } ?>
                <?php if (is_object($story->series) && $story->series->available > 0){?>
                <aside class="col-lg-6 col-md-12 col-sm-12">
                    <h3>Series</h3>
                    <small class="text-muted text-wrap">Séries dessa estória!</small>
                    <ul class="">
                        <?php foreach ($story->series->items as $card) { ?>
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