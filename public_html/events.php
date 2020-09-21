<?php
include_once('content/header.php');
include_once('content/nav.php');

if(!isset($_GET['pg']) || is_null($_GET['pg']) || $_GET['pg'] == ''){
    $pg = 1;
}else{
    $pg = $_GET['pg'];
}
require_once('../processamento/processamento.php');

$response = GetResposeApi('events', 'offset=' . $pg);

// var_dump($response);
?>

<div class="container">
    <main class="row">
        <?php include_once('content/sidebar.php'); ?>
        <article class="col-lg-8 pt-3">
            <div class="row row-cols-1 row-cols-md-3">
                <?php foreach ($response as $card) { ?>
                <div class="col-lg-4 col-md-2 col-sm-12 mb-4">
                    <div class="card h-100">
                        <a href="event.php?id=<?php echo $card->id; ?>" class="text-marvel">
                            <img src="<?php echo SaveImage($card->thumbnail->path, $card->thumbnail->extension);?>"
                                class="card-img-top" alt="Capa <? echo $card->title; ?>">
                        </a>
                        <div class="card-body">
                            <h5 class="card-title">
                                <a href="event.php?id=<?php echo $card->id; ?>" class="text-marvel">
                                    <? echo $card->title; ?>
                                </a>
                            </h5>
                            <p class="card-text"><?php echo $card->description ?></p>
                        </div>
                    </div>
                </div>
                <? } ?>
            </div>
            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center">
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </article>
    </main>
</div>

<?php 
    include_once('content/footer.php');
?>