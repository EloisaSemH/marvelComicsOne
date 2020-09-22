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

$response = GetResposeApi('series/' . $id);
?>

<div class="container">
    <main class="row">
        <?php include_once('content/sidebar.php'); ?>
        <article class="col-lg-8 pt-3">
            <?php if($response->code == 200){
                    $response = $response->data;
                    foreach ($response->results as $serie) { ?>
            <div class="row">
                <div class="col-lg-6 col-md-12 col-sm-12">
                    <img src="<?php echo (!is_null($serie->thumbnail)) ? SaveImage($serie->thumbnail->path, $serie->thumbnail->extension) : 'images/content/image_not_available-landscape_incredible.jpg';?>"
                        class="w-100 mb-3" alt="Capa <? echo $serie->title; ?>">
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12">
                    <h2 class="text-marvel">
                        <? echo $serie->title; ?>
                    </h2>
                    <p class="">
                        <?php echo ($serie->description); // (!is_null($serie->description)) ? TraduzirTexto($serie->description) : ''; ?>
                    </p>
                    <?php if (!is_null($serie->urls)) { ?>
                    <h5>Saiba mais:</h5>
                    <ul>
                        <?php foreach($serie->urls as $link) { ?>
                        <li><a href="<?php echo $link->url; ?>" target="_blank"
                                class="text-capitalize"><?php echo $link->type; ?></a></li>
                        <?php } ?>
                    </ul>
                    <?php } ?>
                </div>
                <?php if (is_object($serie->creators) && $serie->creators->available > 0){?>
                <aside class="col-lg-6 col-md-12 col-sm-12">
                    <h3 class="">Criadores</h3>
                    <small class="text-muted text-wrap">Os criadores da série!</small>
                    <ul class="">
                        <?php foreach ($serie->creators->items as $card) { ?>
                        <li class="text-wrap">
                            <a href="creator.php?id=<?php echo basename($card->resourceURI); ?>" class="text-marvel">
                                <? echo $card->name; ?>
                            </a> -
                            <span class="text-muted">
                                <? echo $card->role; ?>
                            </span>
                        </li>
                        <? } ?>
                    </ul>
                </aside>
                <? } ?>
                <?php if (is_object($serie->stories) && $serie->stories->available > 0){?>
                <aside class="col-lg-6 col-md-12 col-sm-12">
                    <h3>Estórias</h3>
                    <small class="text-muted text-wrap">Estórias contidas na série!</small>
                    <ul class="">
                        <?php foreach ($serie->stories->items as $card) { ?>
                        <li class="text-wrap">
                            <a href="story.php?id=<?php echo basename($card->resourceURI); ?>" class="text-marvel">
                                <? echo $card->name; ?>
                            </a>
                        </li>
                        <? } ?>
                    </ul>
                </aside>
                <? } ?>
                <?php if (is_object($serie->events) && $serie->events->available > 0){?>
                <aside class="col-lg-6 col-md-12 col-sm-12">
                    <h3>Eventos</h3>
                    <small class="text-muted text-wrap">Eventos contidos nessa série!</small>
                    <ul class="">
                        <?php foreach ($serie->events->items as $card) { ?>
                        <li class="text-wrap">
                            <a href="event.php?id=<?php echo basename($card->resourceURI); ?>" class="text-marvel">
                                <? echo $card->name; ?>
                            </a>
                        </li>
                        <? } ?>
                    </ul>
                </aside>
                <? } ?>

                <?php if (is_object($serie->comics) && $serie->comics->available > 0){?>
                <aside class="col-lg-6 col-md-12 col-sm-12">
                    <h3>Quadrinhos</h3>
                    <small class="text-muted text-wrap">Quadrinhos que contém essa série!</small>
                    <ul class="">
                        <?php foreach ($serie->comics->items as $card) { ?>
                        <li class="text-wrap">
                            <a href="comic.php?id=<?php echo basename($card->resourceURI); ?>" class="text-marvel">
                                <? echo $card->name; ?>
                            </a>
                        </li>
                        <? } ?>
                    </ul>
                </aside>
                <? } ?>
                <?php if (is_object($serie->characters) && $serie->characters->available > 0){?>
                <aside class="col-lg-6 col-md-12 col-sm-12">
                    <h3>Personagens</h3>
                    <small class="text-muted text-wrap">Personagens que aparecem nessa série! (Limite de 20)</small>
                    <ul class="">
                        <?php foreach ($serie->characters->items as $card) { ?>
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
            }  ?>
        </article>
    </main>
</div>

<?php include_once('content/footer.php'); ?>