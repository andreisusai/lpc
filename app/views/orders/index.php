<?php require APPROOT . "/views/inc/header.php"; ?>
<div class="container pt-9">
    <h1 class="heading-1 pt-3">Mes commandes</h1>
    <div class="bottom-line"></div>
    <!-- Check connexion -->
    <?php if (empty($data["not_connected"])) : ?>
        <!-- If connected check for orders -->
        <!-- No orders -->
        <?php if (isset($data["no_orders"])) :  ?>
            <div class="no-orders"><?php echo $data["no_orders"] ?></div>
        <?php else : ?>
            <?php if (isset($data_payment["success-message"]) && $data_payment["success-message"] === true) {
                flash('stripe_payment');
            }
            ?>
            <div class="content-orders">
                <div class="individual-order">
                    <?php
                    $oldOrder = 0;
                    for ($i = 0; $i < count($data); $i++) : ?>
                        <?php
                        // Configuration format date 
                        $dateTimeOrder = new DateTime($data[$i]->date_enregistrement); ?>
                        <?php if ($oldOrder != $data[$i]->order_number) : ?>
                            <header class="order-header">
                                <div class="order-number">Commande: <?php echo $data[$i]->order_number ?></div>
                                <div class="order-date-time">Date: <?php echo $dateTimeOrder->format('d/m/Y à H:i:s') ?></div>
                                <div class="order-status"><?php echo $data[$i]->etat ?></div>
                                <div class="total">Total: <?php echo $data[$i]->montant ?>€</div>
                            </header>
                        <?php endif  ?>
                        <div class="content-individual-order">
                            <div class="product-details-order">
                                <div class="ml-1">
                                    <p class="order-product-title"><?php echo ucfirst($data[$i]->titre) ?></p>
                                </div>
                                <img class="product-image-order ml-1" src="<?php echo URLROOT ?>/img/<?php echo $data[$i]->categorie ?>/<?php echo $data[$i]->titre ?>/<?php echo $data[$i]->photo ?>" alt="">

                                <div class="ml-3">
                                    <p>Référence: <?php echo $data[$i]->reference ?></p>
                                    <p>Taille: <?php echo $data[$i]->taille ?></p>
                                    <p>Catégorie: <?php echo $data[$i]->categorie ?></p>
                                    <p>Prix: <?php echo $data[$i]->prix ?> €</p>
                                    <p>Nombres d'articles x <?php echo $data[$i]->quantite ?></p>
                                    <p class="mt-1 order-total-article">Total article: <?php echo $data[$i]->prix * $data[$i]->quantite ?> €</p>
                                </div>
                            </div>
                        </div>

                        <?php $oldOrder = $data[$i]->order_number; ?>
                    <?php endfor ?>
                </div>
            </div>
            <!-- End Check orders -->
        <?php endif ?>
    <?php else : ?>
        <div class="orders-page-not-connected"><?php echo $data["not_connected"] ?></div>
        <!-- End Check connexion -->
    <?php endif ?>
</div>

<?php require APPROOT . "/views/inc/footer.php";
