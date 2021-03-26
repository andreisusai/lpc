<?php
require APPROOT . "/views/inc/header.php";
?>

<div class="container pt-9">
    <h1 class="heading-1 pt-3">Valider ma commande</h1>
    <div class="bottom-line"></div>
    <div class="content-validate-cart">
        <div class="adresse-invoice-details">
            <h3 class="py-1">Détails de facturation</h3>
            <div class="invoice">
                <p class="details-invoice">Civilité: <?php echo ($_SESSION['user_civilite'] == 'f') ? ucfirst('madame') : ucfirst('monsieur') ?></p>
                <p class="details-invoice">Prénom: <?php echo ucfirst($_SESSION['user_prenom']) ?></p>
                <p class="details-invoice">Nom: <?php echo ucfirst($_SESSION['user_nom']) ?></p>
                <p class="details-invoice">Email: <?php echo $_SESSION['user_email'] ?></p>
                <p class="details-invoice">Adresse:
                    <address>
                        <?php
                        echo $_SESSION['user_adresse'] . '<br>';
                        echo $_SESSION['user_code_postal'] . '<br>';
                        echo $_SESSION['user_ville'] . '<br>';
                        ?>
                    </address>
                </p>
            </div>
        </div>
        <div class="my-order">
            <h3 class="py-1">Votre commande</h3>
            <p class="py-1">Produits</p>
            <?php for ($i = 0; $i < count($_SESSION['cart']['product_id']); $i++) : ?>
                <div class="details-my-order">
                    <p><?php echo $_SESSION['cart']['titre'][$i] . ' x ' .  $_SESSION['cart']['quantity'][$i] ?></p>
                    <p><?php echo number_format($_SESSION['cart']['prix'][$i], 2, ',', '') ?> €</p>
                </div>
            <?php endfor ?>
            <hr>
            <p class="total-my-order py-1 mb-1">Total: <span><?php echo number_format(totalCart(), 2, ',', ''); ?> €</span></p>
            <form action="<?php echo URLROOT ?>/payments/verifyorder" method="post">
                <input type="hidden" name="product_id" value="<?php echo (!empty($_SESSION['cart']['product_id'])) ? true : '' ?>">
                <button type="submit" class="payment-order">Commander</button>
            </form>
        </div>
    </div>
</div>

<?php require APPROOT . "/views/inc/footer.php";
