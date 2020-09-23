<?php
include_once('content/header.php');
include_once('content/nav.php');

if(!isset($_GET['search']) ||
    is_null($_GET['search']) ||
    $_GET['search'] == '' ||
    is_numeric($_GET['search']) ||
    !isset($_GET['cat']) ||
    is_null($_GET['cat']) ||
    $_GET['cat'] == '')
    {
        include_once('content/footer.php');
    ?>
<script>
Swal.fire({
    icon: 'error',
    title: 'Oops...',
    html: '<p>Nenhuma pesquisa válida foi realizada!</p><a href="index.php" class="btn btn-outline-danger mb-3">Voltar ao início</a>',
    allowOutsideClick: false,
    allowEscapeKey: false,
    allowEnterKey: false,
    showConfirmButton: false
})
</script>
<?php
}else{
    if(!isset($_GET['pg']) || is_null($_GET['pg']) || $_GET['pg'] == '' || $_GET['pg'] <= 0){
        $pg = 1;
        $previusStyle = 'disabled';
    }else{
        $pg = $_GET['pg'];
        $previusStyle = '';
    }

    $search = $_GET['search'];
    $cat = $_GET['cat'];

    $query = [];
    $query['offset'] = ($pg * 18);
    $query['limit'] = 18;
    
    if($cat == 'characters' || $cat == 'events'){
        $query['nameStartsWith'] = $_GET['search'];
        $titlename = 'name';
    }else{
        // Series e comics = title
        $query['titleStartsWith'] = $_GET['search'];
        $titlename = 'title';
    }

    switch ($_GET['orderby']){
        case 'a':
            if($cat == 'characters' || $cat == 'events'){
                $query['orderBy'] =  'name';
            }else{
                // Series e comics = title
                $query['orderBy'] =  'title';
            }
        break;
        case 'z':
            if($cat == 'characters' || $cat == 'events'){
                $query['orderBy'] =  '-name';
            }else{
                // Series e comics = title
                $query['orderBy'] =  '-title';
            }
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
    require_once('../processamento/processamento.php');
    $response = GetResposeApi($cat, $query);
    if(count($response->data->results) == 0){
        $response = GetResposeApi($cat, array($titlename => $search));
    }
?>

<div class="container">
    <main class="row">
        <?php include_once('content/sidebar.php'); ?>
        <article class="col-lg-8 pt-3">
            <div class="row row-cols-1 row-cols-md-3">
                <small class="text-muted pl-3 mb-1"><?php echo $response->data->total; ?> resultados encontrados em <?php echo intval($response->data->total / 18); ?> páginas</small>
                <?php 
                include_once('content/searchbar.php');
                if($response->code == 200 && count($response->data->results) > 0){
                    $response = $response->data;
                    foreach ($response->results as $card) {
                        if($cat == 'characters' || $cat == 'events'){
                            $titlename = $card->name;
                        }else{
                            $titlename = $card->title;
                        }
                ?>
                <div class="col-lg-4 col-md-2 col-sm-12 mb-4">
                    <div class="card h-100">
                        <a href="character.php?id=<?php echo $card->id; ?>" class="text-marvel">
                            <img src="<?php echo (!is_null($card->thumbnail)) ? SaveImage($card->thumbnail->path, $card->thumbnail->extension, 'landscape_incredible') : 'images/content/image_not_available-landscape_incredible.jpg';?>"
                                class="card-img-top" alt="Capa <? echo $titlename; ?>">
                        </a>
                        <div class="card-body">
                            <h5 class="card-title">
                                <a href="character.php?id=<?php echo $card->id; ?>" class="text-marvel">
                                    <? echo $titlename; ?>
                                </a>
                            </h5>
                            <p class="card-text">
                                <?php echo (!is_null($card->description)) ? $card->description : ''; ?>
                            </p>
                        </div>
                    </div>
                </div>
                <?php if(count($response->results) > 18) { ?>
                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-center">
                        <li class="page-item <?php echo $previusStyle; ?>">
                            <a class="page-link" href="&pg=<?php echo $pg - 1;?>" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                        <?php if ($pg > 1) { ?>
                        <li class="page-item"><a class="page-link"
                                href="&pg=<?php echo $pg - 1;?>"><?php echo $pg - 1;?></a></li>
                        <? } ?>
                        <li class="page-item active"><a class="page-link" href="#"><?php echo $pg ?></a></li>
                        <li class="page-item"><a class="page-link"
                                href="&pg=<?php echo $pg + 1;?>"><?php echo $pg + 1;?></a></li>
                        <li class="page-item">
                            <a class="page-link" href="&pg=<?php echo $pg + 1;?>" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
            <? } ?>
            <? } } elseif (!is_null($response)){
                    if($response->status == 'Ok'){
                        ?>
            <section class="pl-3">
                <h1 class="text-marvel"> Oops... </h1>
                <p>Desculpe, não foi possível encontrar o resultado da sua pesquisa :(</p>
            </section>
            <?php
                    }else{
                        echo $response->status;
                    }
                }else{
                    include_once('content/404.php');
                } ?>
        </article>
    </main>
</div>

<?php include_once('content/footer.php'); } ?>