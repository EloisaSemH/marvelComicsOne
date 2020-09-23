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

$response = GetResposeApi('events/' . $id);
?>

<div class="container">
    <main class="row">
        <?php include_once('content/sidebar.php'); ?>
        <article class="col-lg-8 pt-3">
            <?php
            if($response->code == 200){
                    $response = $response->data;
                    foreach ($response->results as $event) {
                ?>
            <div class="row">
                <div class="col-lg-6 col-md-12 col-sm-12">
                    <img src="<?php echo (!is_null($event->thumbnail)) ? SaveImage($event->thumbnail->path, $event->thumbnail->extension) : 'images/content/image_not_available-landscape_incredible.jpg';?>"
                        class="w-100 mb-3" alt="Capa <? echo $event->title; ?>">
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12">
                    <h2 class="text-marvel">
                        <? echo $event->title; ?>
                    </h2>
                    <p class="">
                        <?php echo (!is_null($event->description)) ? TraduzirTexto($event->description) : ''; ?>
                    </p>
                    <?php if (!is_null($event->urls)) { ?>
                    <h5>Saiba mais:</h5>
                    <ul>
                        <?php foreach($event->urls as $link) { ?>
                        <li><a href="<?php echo $link->url; ?>" target="_blank" class="text-capitalize"><?php echo $link->type; ?></a></li>
                        <?php } ?>
                    </ul>
                    <?php } ?>
                </div>
                <?php if (is_object($event->stories) && $event->stories->available > 0){?>
                <aside class="col-lg-6 col-md-12 col-sm-12">
                    <h3>Estórias</h3>
                    <small class="text-muted text-wrap">Estórias contidas no evento!</small>
                    <ul class="">
                        <?php foreach ($event->stories->items as $card) { ?>
                        <li class="text-wrap">
                            <a href="story.php?id=<?php echo basename($card->resourceURI); ?>" class="text-marvel">
                                <? echo $card->name; ?>
                            </a>
                        </li>
                        <? } ?>
                    </ul>
                </aside>
                <? } ?>
                <?php if (is_object($event->creators) && $event->creators->available > 0){?>
                <aside class="col-lg-6 col-md-12 col-sm-12">
                    <h3 class="">Criadores</h3>
                    <small class="text-muted text-wrap">Os criadores do evento!</small>
                    <ul class="">
                        <?php foreach ($event->creators->items as $card) { ?>
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
                <?php if (is_object($event->comics) && $event->comics->available > 0){?>
                <aside class="col-lg-6 col-md-12 col-sm-12">
                    <h3>Quadrinhos</h3>
                    <small class="text-muted text-wrap">Quadrinhos que contém esse evento!</small>
                    <ul class="">
                        <?php foreach ($event->comics->items as $card) { ?>
                        <li class="text-wrap">
                            <a href="comic.php?id=<?php echo basename($card->resourceURI); ?>" class="text-marvel">
                                <? echo $card->name; ?>
                            </a>
                        </li>
                        <? } ?>
                    </ul>
                </aside>
                <? } ?>
                <?php if (is_object($event->characters) && $event->characters->available > 0){?>
                <aside class="col-lg-6 col-md-12 col-sm-12">
                    <h3>Personagens</h3>
                    <small class="text-muted text-wrap">Personagens que aparecem nesse evento! (Limite de 20)</small>
                    <ul class="">
                        <?php foreach ($event->characters->items as $card) { ?>
                        <li class="text-wrap">
                            <a href="character.php?id=<?php echo basename($card->resourceURI); ?>" class="text-marvel">
                                <? echo $card->name; ?>
                            </a>
                        </li>
                        <? } ?>
                    </ul>
                </aside>
                <? } ?>
                <?php if (is_object($event->series) && $event->series->available > 0){?>
                <aside class="col-lg-6 col-md-12 col-sm-12">
                    <h3>Series</h3>
                    <small class="text-muted text-wrap">Series desse evento!</small>
                    <ul class="">
                        <?php foreach ($event->series->items as $card) { ?>
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