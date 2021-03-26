<?php require APPROOT . "/views/inc/header.php"; ?>
<div class="container pt-9">
    <?php if (!empty($data['critere_err'])) : ?>
        <div class="error-message">
            <?php echo $data['critere_err']; ?>
        </div>
    <?php else : ?>
        <h1 class="heading-1 pt-3">Vos recherches</h1>
        <div class="bottom-line"></div>
        <?php flash('search_success'); ?>
        <div class="row pages-articles pt-3">
            <?php foreach ($data['items'] as $item) : ?>
                <?php if (strpos($item->titre, 'nouveautes') !== false) : ?>
                    <div class="content-pages-articles">
                        <img src="<?php echo URLROOT ?>/img/<?php echo $item->categorie ?>/<?php echo $item->titre ?>/<?php echo $item->photo ?>" alt="">
                        <a href="<?php echo URLROOT ?>/products/index/<?php echo $item->id_produit ?>">
                            <div class="new-items-headband text-center"><span>New</span></div>
                            <img src="<?php echo URLROOT ?>/img/<?php echo $item->categorie ?>/<?php echo $item->titre ?>/<?php echo $item->photo_2 ?>" alt="">
                        </a>
                        <p class="articles-title"><?php echo $item->reference ?></p>
                        <hr>
                        <p>prix: <?php echo $item->prix ?></p>
                    </div>
                <?php else : ?>
                    <div class="content-pages-articles">
                        <img src="<?php echo URLROOT ?>/img/<?php echo $item->categorie ?>/<?php echo $item->titre ?>/<?php echo $item->photo ?>" alt="">
                        <a href="<?php echo URLROOT ?>/products/index/<?php echo $item->id_produit ?>">
                            <img src="<?php echo URLROOT ?>/img/<?php echo $item->categorie ?>/<?php echo $item->titre ?>/<?php echo $item->photo_2 ?>" alt="">
                        </a>
                        <p class="articles-title"><?php echo $item->titre ?></p>
                        <hr>
                        <p>prix: <?php echo $item->prix ?></p>
                    </div>
                <?php endif ?>
            <?php endforeach; ?>
        </div>
    <?php endif ?>
</div>
<?php require APPROOT . "/views/inc/footer.php";
