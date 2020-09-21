<?php
include_once('content/header.php');
include_once('content/nav.php');

if(!isset($_GET['pg']) || is_null($_GET['pg']) || $_GET['pg'] == '' || $_GET['pg'] <= 0){
    $pg = 1;
    $previusStyle = 'disabled';
}else{
    $pg = $_GET['pg'];
    $previusStyle = '';
}
require_once('../processamento/processamento.php');

$response = GetResposeApi('series', array('offset' => ($pg * 18), 'limit' => 18));
?>
<div class="container">
    <main class="row">
        <?php include_once('content/sidebar.php'); ?>
        <article class="col-lg-8 pt-3">
            <div class="row row-cols-1 row-cols-md-3">
                <?php if($response->code == 200){
                    $response = $response->data;
RefreshNumbers('series', $response->total);
                    foreach ($response->results as $card) { ?>
                <div class="col-lg-4 col-md-2 col-sm-12 mb-4">
                    <div class="card h-100">
                        <a href="event.php?id=<?php echo $card->id; ?>" class="text-marvel">
                            <img src="<?php echo (!is_null($card->thumbnail)) ? SaveImage($card->thumbnail->path, $card->thumbnail->extension, 'landscape_incredible') : '../images/content/image_not_available-landscape_incredible.jpg';?>"
                                class="card-img-top" alt="Capa <? echo $card->title; ?>">
                        </a>
                        <div class="card-body">
                            <h5 class="card-title">
                                <a href="serie.php?id=<?php echo $card->id; ?>" class="text-marvel">
                                    <? echo $card->title; ?>
                                </a>
                            </h5>
                            <p class="card-text"><?php echo (!is_null($card->description)) ? TraduzirTexto($card->description) : ''; ?></p>
                        </div>
                    </div>
                </div>
                <? } }else{
                include_once('content/404.php');
            } ?>
            </div>
            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center">
                    <li class="page-item <?php echo $previusStyle; ?>">
                        <a class="page-link" href="?pg=<?php echo $pg - 1;?>" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                    <?php if ($pg > 1) { ?>
                    <li class="page-item"><a class="page-link" href="?pg=<?php echo $pg - 1;?>"><?php echo $pg - 1;?></a></li>
                    <? } ?>
                    <li class="page-item active"><a class="page-link" href="#"><?php echo $pg ?></a></li>
                    <li class="page-item"><a class="page-link"
                            href="?pg=<?php echo $pg + 1;?>"><?php echo $pg + 1;?></a></li>
                    <li class="page-item">
                        <a class="page-link" href="?pg=<?php echo $pg + 1;?>" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </article>
    </main>
</div>
<?php include_once('content/footer.php'); ?>