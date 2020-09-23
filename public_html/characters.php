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

$query = [];
$query['offset'] = ($pg * 18);
$query['limit'] = 18;

if(isset($_GET['orderby']) && !is_null($_GET['orderby']) && $_GET['orderby'] != ''){
    switch ($_GET['orderby']){
        case 'a':
            $query['orderBy'] =  'name';
        break;
        case 'z':
            $query['orderBy'] =  '-name';
        break;
        case 'modified':
            $query['orderBy'] = 'modified';
        break;
        case '-modified':
            $query['orderBy'] = '-modified';
        break;
        default:
        break;
    }
}

$response = GetResposeApi('characters', $query);
?>

<div class="container">
    <main class="row">
        <?php include_once('content/sidebar.php'); ?>
        <article class="col-lg-8 pt-3">
            <div class="row row-cols-1 row-cols-md-3">
                <small class="text-muted pl-3 mb-1"><?php echo $response->data->total; ?> resultados encontrados em <?php echo intval($response->data->total / 18); ?> páginas</small>
                <?php
                include_once('content/searchbar.php');
                if($response->code == 200){
                    $response = $response->data;
                    RefreshNumbers('characters', $response->total);
                    foreach ($response->results as $card) { ?>
                <div class="col-lg-4 col-md-2 col-sm-12 mb-4">
                    <div class="card h-100">
                        <a href="character.php?id=<?php echo $card->id; ?>" class="text-marvel">
                            <img src="<?php echo (!is_null($card->thumbnail)) ? SaveImage($card->thumbnail->path, $card->thumbnail->extension, 'landscape_incredible') : 'images/content/image_not_available-landscape_incredible.jpg';?>"
                                class="card-img-top" alt="Capa <? echo $card->name; ?>">
                        </a>
                        <div class="card-body">
                            <h5 class="card-title">
                                <a href="character.php?id=<?php echo $card->id; ?>" class="text-marvel">
                                    <? echo $card->name; ?>
                                </a>
                            </h5>
                            <p class="card-text">
                                <?php echo (!is_null($card->description)) ? TraduzirTexto($card->description) : ''; ?>
                            </p>
                        </div>
                    </div>
                </div>
                <? } } elseif (!is_null($response)){
                    echo $response;
                }else{
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
                    <li class="page-item"><a class="page-link"
                            href="?pg=<?php echo $pg - 1;?>"><?php echo $pg - 1;?></a></li>
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