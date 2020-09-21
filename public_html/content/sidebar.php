<?php
$numbers = GetNumbers();
?>
<nav class="col-lg-4 py-3">
    <h2 class="text-marvel text-center">Categorias</h2>
    <ul class="list-group ">
        <li class="list-group-item list-group-item-action quick-links"><a href="creators.php">Criadores
                <span class="badge badge-danger badge-pill text-right"><? echo $numbers['creators']; ?></span></a></li>
        <li class="list-group-item list-group-item-action quick-links"><a href="stories.php">Estórias
                <span class="badge badge-danger badge-pill text-right"><? echo $numbers['stories']; ?></span></a></li>
        <li class="list-group-item list-group-item-action quick-links"><a href="events.php">Eventos e
                crossovers <span class="badge badge-danger badge-pill text-right"><? echo $numbers['events']; ?></span></a></li>
        <li class="list-group-item list-group-item-action quick-links"><a
                href="characters.php">Personagens <span
                    class="badge badge-danger badge-pill text-right"><? echo $numbers['characters']; ?></span></a></li>
        <li class="list-group-item list-group-item-action quick-links"><a href="comics.php">Quadrinhos
                <span class="badge badge-danger badge-pill text-right"><? echo $numbers['comics']; ?></span></a></li>
        <li class="list-group-item list-group-item-action quick-links"><a href="series.php">Séries de
                quadrinhos <span class="badge badge-danger badge-pill text-right"><? echo $numbers['series']; ?></span></a></li>
    </ul>
</nav>