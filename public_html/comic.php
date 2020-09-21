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

$response = GetResposeApi('comics/' . $id);
?>

<div class="container">
    <main class="row">
        <?php include_once('content/sidebar.php'); ?>
        <article class="col-lg-8 pt-3">
            <?php 
            if($response->code == 200){
                    $response = $response->data;
                    foreach ($response->results as $comic) { ?>
            <div class="row">
                <div class="col-lg-6 col-md-12 col-sm-12">
                    <img src="<?php echo (!is_null($comic->thumbnail)) ? SaveImage($comic->thumbnail->path, $comic->thumbnail->extension) : '../images/content/image_not_available-landscape_incredible.jpg';?>"
                        class="w-100 mb-3" alt="Capa <? echo $comic->title; ?>">
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12">
                    <h2 class="text-marvel">
                        <? echo $comic->title; ?>
                    </h2>
                    <p class="">
                        <?php echo ($comic->description); // (!is_null($comic->description)) ? TraduzirTexto($comic->description) : ''; ?>
                    </p>

                </div>
                <?php if (is_object($comic->stories) && $comic->stories->available > 0){?>
                <aside class="col-lg-6 col-md-12 col-sm-12">
                    <h3>Estórias</h3>
                    <small class="text-muted text-wrap">Estórias contidas no quadrinho!</small>
                    <ul class="">
                        <?php foreach ($comic->stories->items as $card) { ?>
                        <li class="text-wrap">
                            <a href="story.php?id=<?php echo basename($card->resourceURI); ?>" class="text-marvel">
                                <? echo $card->name; ?>
                            </a>
                        </li>
                        <? } ?>
                    </ul>
                </aside>
                <? } ?>
                <?php if (is_object($comic->events) && $comic->events->available > 0){?>
                <aside class="col-lg-6 col-md-12 col-sm-12">
                    <h3>Eventos</h3>
                    <small class="text-muted text-wrap">Eventos contidos nesse quadrinho!</small>
                    <ul class="">
                        <?php foreach ($comic->events->items as $card) { ?>
                        <li class="text-wrap">
                            <a href="event.php?id=<?php echo basename($card->resourceURI); ?>" class="text-marvel">
                                <? echo $card->name; ?>
                            </a>
                        </li>
                        <? } ?>
                    </ul>
                </aside>
                <? } ?>
                <?php if (is_object($comic->creators) && $comic->creators->available > 0){?>
                <aside class="col-lg-6 col-md-12 col-sm-12">
                    <h3 class="">Criadores</h3>
                    <small class="text-muted text-wrap">Os criadores do quadrinho!</small>
                    <ul class="">
                        <?php foreach ($comic->creators->items as $card) { ?>
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
                <?php if (is_object($comic->characters) && $comic->characters->available > 0){?>
                <aside class="col-lg-6 col-md-12 col-sm-12">
                    <h3>Personagens</h3>
                    <small class="text-muted text-wrap">Personagens que aparecem nesse quadrinho! (Limite de 20)</small>
                    <ul class="">
                        <?php foreach ($comic->characters->items as $card) { ?>
                        <li class="text-wrap">
                            <a href="character.php?id=<?php echo basename($card->resourceURI); ?>" class="text-marvel">
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