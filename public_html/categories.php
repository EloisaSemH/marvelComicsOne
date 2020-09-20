<?php
include_once('content/header.php');
include_once('content/nav.php');

if(!isset($_GET['cat']) || is_null($_GET['cat']) || $_GET['cat'] == ''){
    include_once('content/footer.php');
?>
<script>
Swal.fire({
    icon: 'error',
    title: 'Oops...',
    html: '<p>Nenhuma categoria foi selecionada!</p><a href="index.php" class="btn btn-outline-danger mb-3">Voltar ao início</a>',
    allowOutsideClick: false,
    allowEscapeKey: false,
    allowEnterKey: false,
    showConfirmButton: false
})
</script>
<?php
}else{
require_once('../processamento/processamento.php');
?>

<div class="container">
    <main class="row">
    <?php include_once('content/sidebar.php'); ?>
        <article class="col-lg-8">

        </article>
    </main>
</div>

<?php 
}
include_once('content/footer.php');
?>