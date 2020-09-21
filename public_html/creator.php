<?php
include_once('content/header.php');
include_once('content/nav.php');

if(!isset($_GET['id']) || is_null($_GET['id']) || $_GET['id'] == '' || $_GET['id'] <= 0){
    ?>
<script>
Swal.fire({
    icon: 'error',
    fullName: 'Oops...',
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

$response = GetResposeApi('creators/' . $id);
?>

<div class="container">
    <main class="row">
        <?php include_once('content/sidebar.php'); ?>
        <article class="col-lg-8 pt-3">
            <?php 
            if($response->code == 200){
                    $response = $response->data;
                    foreach ($response->results as $creator) { ?>
            <div class="row">
                <div class="col-lg-6 col-md-12 col-sm-12">
                    <img src="<?php echo (!is_null($creator->thumbnail)) ? SaveImage($creator->thumbnail->path, $creator->thumbnail->extension) : '../images/content/image_not_available-landscape_incredible.jpg';?>"
                        class="w-100 mb-3" alt="Capa <? echo $creator->fullName; ?>">
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12">
                    <h2 class="text-marvel">
                        <? echo $creator->fullName; ?>
                    </h2>
                    <?php if (!is_null($creator->urls)) { ?>
                    <h5>Saiba mais:</h5>
                    <ul>
                        <?php foreach($creator->urls as $link) { ?>
                        <li><a href="<?php echo $link->url; ?>" target="_blank" class="text-capitalize"><?php echo $link->type; ?></a></li>
                        <?php } ?>
                    </ul>
                    <?php } ?>
                </div>
                <?php if (is_object($creator->stories) && $creator->stories->available > 0){?>
                <aside class="col-lg-6 col-md-12 col-sm-12">
                    <h3>Estórias</h3>
                    <small class="text-muted text-wrap">Estórias criadas por esse criador!</small>
                    <ul class="">
                        <?php foreach ($creator->stories->items as $card) { ?>
                        <li class="text-wrap">
                            <a href="story.php?id=<?php echo basename($card->resourceURI); ?>" class="text-marvel">
                                <? echo $card->name; ?>
                            </a>
                        </li>
                        <? } ?>
                    </ul>
                </aside>
                <? } ?>
                <?php if (is_object($creator->events) && $creator->events->available > 0){?>
                <aside class="col-lg-6 col-md-12 col-sm-12">
                    <h3>Eventos</h3>
                    <small class="text-muted text-wrap">Eventos contidos nesse criador!</small>
                    <ul class="">
                        <?php foreach ($creator->events->items as $card) { ?>
                        <li class="text-wrap">
                            <a href="event.php?id=<?php echo basename($card->resourceURI); ?>" class="text-marvel">
                                <? echo $card->name; ?>
                            </a>
                        </li>
                        <? } ?>
                    </ul>
                </aside>
                <? } ?>
                <?php if (is_object($creator->comics) && $creator->comics->available > 0){?>
                <aside class="col-lg-6 col-md-12 col-sm-12">
                    <h3 class="">Quadrinhos</h3>
                    <small class="text-muted text-wrap">Os quadrinhos do criador!</small>
                    <ul class="">
                        <?php foreach ($creator->comics->items as $card) { ?>
                        <li class="text-wrap">
                            <a href="comic.php?id=<?php echo basename($card->resourceURI); ?>" class="text-marvel">
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