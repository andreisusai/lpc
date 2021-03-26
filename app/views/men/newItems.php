<?php require APPROOT . "/views/inc/header.php";
?>

<div class="container pt-9">
    <h1 class="heading-1 pt-3"><?php echo ucfirst(substr($data['second_folder'], 0, -3)) . 'és' ?></h1>
    <div class="bottom-line"></div>
    <div class="row pages-articles pt-3">
        <?php foreach ($data['products'] as $product) : ?>
            <div class="content-pages-articles">
                <img src="<?php echo URLROOT ?>/img/<?php echo $data['main_folder'] ?>/<?php echo $data['second_folder'] ?>/<?php echo $product->photo ?>" alt="">
                <a href="<?php echo URLROOT ?>/products/index/<?php echo $product->id_produit ?>">
                    <div class="new-items-headband text-center"><span>New</span></div>
                    <img src="<?php echo URLROOT ?>/img/<?php echo $data['main_folder'] ?>/<?php echo $data['second_folder'] ?>/<?php echo $product->photo_2 ?>" alt="">
                </a>
                <p class="articles-title"><?php echo $product->reference ?></p>
                <hr>
                <p>prix: <?php echo $product->prix ?></p>
            </div>
        <?php endforeach; ?>
    </div>
</div>


<?php require APPROOT . "/views/inc/footer.php";
