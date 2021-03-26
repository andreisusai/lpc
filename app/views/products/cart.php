<?php
require APPROOT . "/views/inc/header.php";
?>
<div id="cart-page" class="container pt-9">
    <h1 class="heading-1 pt-3">Mon panier</h1>
    <div class="bottom-line"></div>
    <!-- Messages check constrast products and reset -->
    <?php
    if (isset($data["check_product"]) && $data["check_product"] === false) : ?>
        <?php if (!empty($data["quantity_err"])) : ?>
            <div class="message-stock_price_contrast_products">
                <?php echo $data["quantity_err"]; ?>
            </div>
            <?php flash('stock_price_contrast_products'); ?>
        <?php endif ?>
        <?php if (!empty($data["stock_err"])) : ?>
            <div class="message-stock_price_contrast_products">
                <?php echo $data["stock_err"] ?>
            </div>
            <?php flash('stock_price_contrast_products'); ?>
        <?php endif ?>
        <?php if (!empty($data["prix_err"])) : ?>
            <div class="message-stock_price_contrast_products">
                <?php echo $data["prix_err"] ?>
            </div>
            <?php flash('stock_price_contrast_products'); ?>
        <?php endif ?>
    <?php endif ?>
    <!-- End of messages check constrast products and reset -->

    <?php if (!empty($data["user_id_err"])) : ?>
        <div class="err-before-validate-link">
            <?php echo  $data["user_id_err"];
            unset($data["user_id_err"]); ?>
        </div>
    <?php endif ?>
    <?php if (!empty($_SESSION['cart']['product_id'])) : ?>
        <?php if (!empty($data["check_cart_retire_product"]) && $data["check_cart_retire_product"] === true) {
            flash('cart_retire_product');
            unset($data["check_cart_retire_product"]);
        }
        ?>
        <div class="cart-content">
            <div class="cart-purchase">
                <h3>Total</h3>
                <span><strong>Nombre d'articles: <?php echo numberOfProductsCart() ?></strong></span>
                <p class="pb-1"><strong><span>Sous-total: <?php echo number_format(totalCart(), 2, ',', ' '); ?> €</span></strong></p>
                <hr>
                <p class="last-child-cart-purchase py-1"><strong><span>Total: <?php echo number_format(totalCart(), 2, ',', ' '); ?> €</span></strong></p>
                <form action="<?php echo URLROOT ?>/products/validatecart" method="post">
                    <input type="hidden" name="user_id" value="<?php echo (!empty($_SESSION['user_id'])) ? $_SESSION['user_id'] : '' ?>">
                    <button type="submit" class="validation-cart-btn">Valider mon panier</button>
                </form>
            </div>
            <?php for ($i = 0; $i < count($_SESSION['cart']['product_id']); $i++) : ?>
                <div class="cart-product-details">
                    <div class="cart-img">
                        <div>
                            <img src="<?php echo URLROOT ?>/img/<?php echo $_SESSION['cart']['categorie'][$i] ?>/<?php echo $_SESSION['cart']['titre'][$i] ?>/<?php echo $_SESSION['cart']['photo'][$i] ?>" alt="">
                        </div>
                        <div class="cart-infos">
                            <p class="ml-1"><strong><span><?php echo strtoupper($_SESSION['cart']['titre'][$i]) ?></span></strong></p>
                            <p class="ml-1"><strong>Color: <span><?php echo $_SESSION['cart']['color'][$i] ?></span></strong></p>
                            <p class="ml-1"><strong>Taille: <span><?php echo strtoupper($_SESSION['cart']['size'][$i]) ?></span></strong></p>
                            <p class="ml-1"><strong>Quantité: <span><?php echo $_SESSION['cart']['quantity'][$i] ?></span></strong></p>
                        </div>
                    </div>
                    <div class="cart-infos-left-side px-1">
                        <p class="ml-1 py-1"><strong>Prix: <span><?php echo number_format($_SESSION['cart']['prix'][$i], 2, ',', ' '); ?> €</span></strong></p>
                        <form action="<?php echo URLROOT ?>/products/retireProductCart" method="post">
                            <input type="hidden" name="product_id" value="<?php echo $_SESSION['cart']['product_id'][$i] ?>">
                            <button type="submit" id="cart-delete-product" class="py-1">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 17.7">
                                    <path d="M13.9 17.7H2.1c-.5 0-.8-.4-.8-.9v-10H3V16h10.2V6.8h1.7v10.1a1 1 0 0 1-1 .8zM12.9 2.8h-1.7V1.7H4.8v1.1H3.1v-2c0-.4.3-.8.8-.8h8.2c.5 0 .8.4.8.9v1.9zM0 4h16v1.7H0z" />
                                    <path d="M5.1 14.6c-.3 0-.5-.2-.5-.5v-6c0-.3.2-.5.5-.5s.5.2.5.5V14c0 .4-.2.6-.5.6zM8 14.6c-.3 0-.5-.2-.5-.5v-6c0-.3.2-.5.5-.5s.5.2.5.5V14c0 .4-.2.6-.5.6zM10.9 14.6c-.3 0-.5-.2-.5-.5v-6c0-.3.2-.5.5-.5s.5.2.5.5V14c0 .4-.3.6-.5.6z" />
                                </svg>
                            </button>
                        </form>
                    </div>
                </div>
            <?php endfor ?>
        </div>
    <?php else : ?>
        <div class="cart-unset">
            Votre panier est vide... :(
        </div>
    <?php endif ?>
</div>
<?php require APPROOT . "/views/inc/footer.php";
