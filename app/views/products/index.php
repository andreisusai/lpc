<?php if (isset($data["rate_success"]) && $data["rate_success"] === true) {
    redirect('products/index/' . $data["product"]->id_produit . '?checkingRate=1');
}

?>
<?php require APPROOT . "/views/inc/header.php"; ?>
<div class="container pt-9">

    <h1 class="heading-1 pt-3">Fiche produit</h1>
    <div class="bottom-line"></div>
    <?php if (!empty($_SESSION['cart']['product_id'])) {
        flash('cart_set');
    }
    ?>
    <?php
    if (isset($_GET["checkingRate"]) && $_GET["checkingRate"] == 1) {

        flash('score_success_message', 'Merci d\'avoir déposé votre avis', 'score-rated-post-message');
        $_GET["checkingRate"] = '';
        flash('score_success_message');
    }
    ?>
    <div id="forRange" class="row pt-3">
        <div id="productImage" class="text-center">

            <!-- Red articles -->
            <label for="first_red_product">
                <img data-image="red" class="active mr-1" src="<?php echo URLROOT ?>/img/color_products/red_product_1.jpg" alt="red_product_1">
            </label>
            <input type="radio" name="red_product" id="first_red_product">
            <label for="second_red_product">
                <img data-image="red" class="active mr-1 mt-1" src="<?php echo URLROOT ?>/img/color_products/red_product_2.jpg" alt="red_product_2">
            </label>
            <input type="radio" name="red_product" id="second_red_product">
            <label for="third_red_product">
                <img data-image="red" class="active mr-1 mt-1" src="<?php echo URLROOT ?>/img/color_products/red_product_3.jpg" alt="red_product_3">
            </label>
            <input type="radio" name="red_product" id="third_red_product">
            <label for="forth_red_product">
                <img data-image="red" class="active mr-1 mt-1" src="<?php echo URLROOT ?>/img/color_products/red_product_4.jpg" alt="red_product_4">
            </label>
            <input type="radio" name="red_product" id="forth_red_product">
            <!-- End red articles -->

            <!-- Blue articles -->
            <label for="first_blue_product">
                <img data-image="blue" class="mr-1" src="<?php echo URLROOT ?>/img/color_products/blue_product_1.jpg" alt="blue_product_1">
            </label>
            <input type="radio" name="blue_product" id="first_blue_product">
            <label for="second_blue_product">
                <img data-image="blue" class="mr-1 mt-1" src="<?php echo URLROOT ?>/img/color_products/blue_product_2.jpg" alt="blue_product_2">
            </label>
            <input type="radio" name="blue_product" id="second_blue_product">
            <label for="third_blue_product">
                <img data-image="blue" class="mr-1 mt-1" src="<?php echo URLROOT ?>/img/color_products/blue_product_3.jpg" alt="blue_product_3">
            </label>
            <input type="radio" name="blue_product" id="third_blue_product">
            <label for="forth_blue_product">
                <img data-image="blue" class="mr-1 mt-1" src="<?php echo URLROOT ?>/img/color_products/blue_product_4.jpg" alt="blue_product_4">
            </label>
            <input type="radio" name="blue_product" id="forth_blue_product">
            <!-- End blue articles -->

            <!-- Black articles -->
            <label for="first_black_product">
                <img data-image="black" class="mr-1" src="<?php echo URLROOT ?>/img/color_products/black_product_1.jpg" alt="black_product_1">
            </label>
            <input type="radio" name="black_product" id="first_black_product">
            <label for="second_black_product">
                <img data-image="black" class="mr-1 mt-1" src="<?php echo URLROOT ?>/img/color_products/black_product_2.jpg" alt="black_product_2">
            </label>
            <input type="radio" name="black_product" id="second_black_product">
            <label for="third_black_product">
                <img data-image="black" class="mr-1 mt-1" src="<?php echo URLROOT ?>/img/color_products/black_product_3.jpg" alt="black_product_3">
            </label>
            <input type="radio" name="black_product" id="third_black_product">
            <label for="forth_black_product">
                <img data-image="black" class="mr-1 mt-1" src="<?php echo URLROOT ?>/img/color_products/black_product_4.jpg" alt="black_product_4">
            </label>
            <input type="radio" name="black_product" id="forth_black_product">
            <!-- End black articles -->

            <div id="articles">
                <!-- Red images articles -->
                <img data-image="red" class="active" src="<?php echo URLROOT ?>/img/color_products/red_product_1.jpg" id="red_product_1" alt="red_product_1">
                <img data-image="red" class="active" src="<?php echo URLROOT ?>/img/color_products/red_product_2.jpg" id="red_product_2" alt="red_product_2">
                <img data-image="red" class="active" src="<?php echo URLROOT ?>/img/color_products/red_product_3.jpg" id="red_product_3" alt="red_product_3">
                <img data-image="red" class="active" src="<?php echo URLROOT ?>/img/color_products/red_product_4.jpg" id="red_product_4" alt="red_product_4">
                <!-- Red images articles -->

                <!-- Blue images articles -->
                <img data-image="blue" src="<?php echo URLROOT ?>/img/color_products/blue_product_1.jpg" id="blue_product_1" alt="blue_product_1">
                <img data-image="blue" src="<?php echo URLROOT ?>/img/color_products/blue_product_2.jpg" id="blue_product_2" alt="blue_product_2">
                <img data-image="blue" src="<?php echo URLROOT ?>/img/color_products/blue_product_3.jpg" id="blue_product_3" alt="blue_product_3">
                <img data-image="blue" src="<?php echo URLROOT ?>/img/color_products/blue_product_4.jpg" id="blue_product_4" alt="blue_product_4">
                <!-- Blue images articles -->

                <!-- Black images articles -->
                <img data-image="black" src="<?php echo URLROOT ?>/img/color_products/black_product_1.jpg" id="black_product_1" alt="black_product_1">
                <img data-image="black" src="<?php echo URLROOT ?>/img/color_products/black_product_2.jpg" id="black_product_2" alt="black_product_2">
                <img data-image="black" src="<?php echo URLROOT ?>/img/color_products/black_product_3.jpg" id="black_product_3" alt="black_product_3">
                <img data-image="black" src="<?php echo URLROOT ?>/img/color_products/black_product_4.jpg" id="black_product_4" alt="black_product_4">
                <!-- Black images articles -->
            </div>
        </div>
        <!-- Right Column -->
        <div class="right-column">
            <!-- Product Description -->
            <div class="product-description">
                <span><?php echo $data["product"]->titre ?> <?php echo $data["product"]->categorie ?></span>
                <h2><?php echo ucfirst($data["product"]->titre) ?></h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            </div>
            <!-- Product Configuration -->
            <div class="product-configuration">
                <!-- Product Color -->
                <div class="product-color">
                    <span>Color</span>
                    <div class="color-choose">
                        <form action="<?php echo URLROOT; ?>/products/settingCart" method="post">
                            <div>
                                <input data-image="red" type="radio" id="red" name="color" value="red" checked>
                                <label for="red"><span></span></label>
                            </div>
                            <div>
                                <input data-image="blue" type="radio" id="blue" name="color" value="blue">
                                <label for="blue"><span></span></label>
                            </div>
                            <div>
                                <input data-image="black" type="radio" id="black" name="color" value="black">
                                <label for="black"><span></span></label>
                            </div>
                    </div>
                </div>
                <!-- Cable Configuration -->
                <div class="cable-config">
                    <span>Trouvez votre taille</span>
                    <div class="cable-choose">
                        <input type="radio" name="size" value="xs" id="size-xs" required>
                        <label for="size-xs">XS</label>
                        <input type="radio" name="size" value="s" id="size-s">
                        <label for="size-s">S</label>
                        <input type="radio" name="size" value="l" id="size-l">
                        <label for="size-l">L</label>
                        <input type="radio" name="size" value="xl" id="size-xl">
                        <label for="size-xl">XL</label>
                        <input type="radio" name="size" value="xxl" id="size-xxl">
                        <label for="size-xxl">XXL</label>
                    </div>
                    <a href="#">Guide des tailles</a>
                </div>
            </div>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js" charset="utf-8"></script>
            <script charset="utf-8">
                $(document).ready(function() {

                    $('.color-choose input').on('click', function() {
                        var headphonesColor = $(this).attr('data-image');

                        $('.active').removeClass('active');
                        $('#productImage img[data-image = ' + headphonesColor + ']').addClass('active');
                        $(this).addClass('active');
                    });

                });
            </script>
            <!-- Product Pricing -->
            <div class="product-price">
                <?php if ($data['product']->stock > 0) : ?>
                    <input type="hidden" name="product_id" value="<?php echo $data['product']->id_produit ?>">
                    <div>
                        <span><?php echo number_format($data['product']->prix, 2, ',', ' '); ?>€</span>
                        <select name="quantity" id="stock-quantity">
                            <?php for ($i = 1; $i <= $data['product']->stock && $i <= 5; $i++) : ?>
                                <option value="<?php echo $i ?>"><?php echo $i ?></option>
                            <?php endfor ?>
                        </select>
                        <input type="submit" name="add_cart" class="cart-btn" value="Ajouter au panier">
                    </div>
                    </form>
                    <?php if (!empty($_SESSION['cart']['product_id'])) : ?>
                        <a href="<?php echo URLROOT; ?>/products/cart" id="btn-see-cart">Voir le panier</a>
                    <?php endif ?>
                <?php else : ?>
                    <div class="empty-stock-message">
                        Produit indisponible
                    </div>
                <?php endif ?>
                <?php
                $check_rate = '';
                $user_rate = '';
                $user_description = '';
                $scoresNumber = 0;
                $sumRating = 0;
                if (!empty($data["avis"])) {
                    foreach ($data["avis"] as $avis) {
                        $scoresNumber++;
                        $sumRating += $avis->rating;
                        if (isset($_SESSION["user_id"]) && $avis->id_membre == $_SESSION["user_id"] && $avis->id_produit == $data["product"]->id_produit) {
                            $check_rate = true;
                            $user_rate = $avis->rating;
                            $user_description = $avis->avis;
                        }
                    }
                    $scoresAverage = $sumRating / $scoresNumber;
                    $scoresAverage = round($scoresAverage);
                }

                ?>
                <button id="open-score-rated" class="go-to-score-rated flex-items">
                    <h3 class="px-1">Avis (<?php echo $scoresNumber ?>)</h3>
                    <div class="go-to-score-rated-stars">
                        <?php if (!empty($data["avis"])) : ?>
                            <?php for ($i = 0; $i < 5; $i++) : ?>
                                <?php if ($i < $scoresAverage) : ?>
                                    <label for="rate-<?php echo $i ?>" class="fas fa-star"></label>
                                <?php else : ?>
                                    <label for="rate-<?php echo $i ?>" class="fas fa-star not-checked"></label>
                                <?php endif ?>
                            <?php endfor ?>
                        <?php endif ?>
                    </div>
                    <span class="px-1">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 13.1 13.1">
                            <path d="M12.1 5.6H7.6V1c0-.6-.4-1-1-1s-1 .4-1 1v4.6H1c-.6 0-1 .4-1 1s.4 1 1 1h4.6v4.6c0 .6.4 1 1 1s1-.4 1-1V7.6h4.6c.6 0 1-.4 1-1s-.5-1-1.1-1z" />
                        </svg>
                    </span>
                </button>
            </div>
        </div>
    </div>

    <div class="score-rated text-center">
        <div id="form-stars" class="py-3">
            <button class="close-btn px-3" id="close"><i class="fa fa-times"></i></button>
            <h3 class="px-3">Publier un avis sur cet article</h3>
            <div class="score-rated-article flex-items px-3 mb-3">
                <div class="score-rated-article-image">
                    <img class="mr-1" src="<?php echo URLROOT ?>/img/<?php echo $data["product"]->categorie ?>/<?php echo $data["product"]->titre ?>/<?php echo $data["product"]->photo ?>" alt="bottes-le-petit-commerce">
                </div>
                <div class="score-rated-article-infos flex-items-columns">
                    <span>Dénomination: <?php echo $data["product"]->titre ?></span>
                    <span>Référence: <?php echo $data["product"]->reference ?></span>
                    <?php if (empty($_SESSION['user_id'])) : ?>
                        <span style="color:red;">Vous devez être connecté pour laisser un avis</span>
                    <?php endif ?>
                </div>
            </div>

            <?php if ($check_rate === true) : ?>
                <div class="invalid-feedback py-3">Vous avez déjà déposé votre avis sur ce produit</div>
                <div class="show-score-rated-messages py-1 mb-3">
                    <div class="show-stars">
                        <?php for ($i = 1; $i <= $user_rate; $i++) : ?>
                            <label for="rate-<?php echo $i ?>" class="fas fa-star"></label>
                        <?php endfor ?>
                        <br>
                        <span><?php echo ucfirst($_SESSION['user_pseudo']) ?></span>
                    </div>
                    <div class="show-message">
                        <p><?php echo ucfirst($user_description) ?></p>
                    </div>
                </div>
        </div>
    <?php else : ?>
        <h4>Déposez votre avis</h4>
        <form action="<?php echo URLROOT . "/scores/index" ?>" method="post" autocomplete="off">
            <header></header>
            <div id="stars-reverse" class="flex-items py-1">
                <input type="radio" name="rate" value="5" id="rate-1" autocomplete="off">
                <label for="rate-1" class="fas fa-star"></label>
                <input type="radio" name="rate" value="4" id="rate-2" autocomplete="off">
                <label for="rate-2" class="fas fa-star"></label>
                <input type="radio" name="rate" value="3" id="rate-3" autocomplete="off">
                <label for="rate-3" class="fas fa-star"></label>
                <input type="radio" name="rate" value="2" id="rate-4" autocomplete="off">
                <label for="rate-4" class="fas fa-star"></label>
                <input type="radio" name="rate" value="1" id="rate-5" autocomplete="off">
                <label for="rate-5" class="fas fa-star"></label>
            </div>
            <?php if (!empty($data["rate_err"]) && isset($data["rate_success"]) && $data["rate_success"] === false) : ?>
                <span class="invalid-feedback"><?php echo $data["rate_err"] ?></span>
            <?php endif ?>
            <input type="hidden" name="product_id" value="<?php echo (isset($data["product"]->id_produit)) ? $data["product"]->id_produit : '' ?>">
            <input type="hidden" name="user_id" value="<?php echo (isset($_SESSION['user_id'])) ? $_SESSION['user_id'] : '' ?>">
            <div class="flex-items-columns">
                <textarea name="avis" id="" cols="50" rows="6" placeholder="Déposez votre avis..." class="<?php echo (!empty($data["avis_err"]) && isset($data["rate_success"]) && $data["rate_success"] === false) ? 'is-invalid' : ''; ?>"></textarea>
                <?php if (!empty($data["avis_err"]) && isset($data["rate_success"]) && $data["rate_success"] === false) : ?>
                    <span class="invalid-feedback"><?php echo $data["avis_err"] ?></span>
                <?php endif ?>
                <button type="submit" id="submit-score" class="btn mt-1">Envoyer</button>
            </div>
        </form>
    </div>
<?php endif ?>
<h4>Avis (<?php echo $scoresNumber ?>)</h4>
<div class="bottom-line"></div>
<div class="score-rated-messages-content mt-3">
    <?php foreach ($data["avis"] as $avis) : ?>
        <div class="show-score-rated-messages py-1">
            <div class="show-stars">
                <?php for ($i = 1; $i <= $avis->rating; $i++) : ?>
                    <label for="rate-<?php echo $i ?>" class="fas fa-star"></label>
                <?php endfor ?>
                <br>
                <span><?php echo ucfirst($avis->pseudo) ?></span>
            </div>
            <div class="show-message">
                <p><?php echo ucfirst($avis->avis) ?></p>
            </div>
        </div>
    <?php endforeach ?>
</div>
</div>
<script>
    const btn = document.querySelector("#open-score-rated");
    const scoreRated = document.querySelector(".score-rated");
    const closeScoreRated = document.querySelector("#close");

    btn.onclick = () => {

        scoreRated.style.display = "block";
        if (scoreRated.style.display == "block") {
            // Verify and uncheck if a button is already checked
            setTimeout(() => {
                const radios = document.getElementsByName('rate');
                for (let i = 0, length = radios.length; i < length; i++) {

                    if (radios[i].checked) {
                        radios[i].checked = false;
                        break;
                    }
                };
            }, 20);
        }

    }

    // Hide Modal
    closeScoreRated.addEventListener("click", () => scoreRated.style.display = "none");
</script>
<h3 class="related-products heading-1 pt-3">Produits apparentés</h3>
<div class="bottom-line"></div>
<div class="screen-slider wow bounceInRight py-3" data-wow-duration="1s">
    <div class="container">
        <div class="row">
            <div class="bxslider">
                <?php foreach ($data["suggestions"] as $suggestion) : ?>
                    <div class="item">
                        <a href="<?php echo URLROOT ?>/products/index/<?php echo $suggestion->id_produit ?>">
                            <img src="<?php echo URLROOT ?>/img/<?php echo $suggestion->categorie ?>/<?php echo $suggestion->titre ?>/<?php echo $suggestion->photo ?>" alt="screen">
                        </a>
                    </div>
                <?php endforeach ?>
            </div>
        </div>
    </div>
</div>
</div>
<?php require APPROOT . "/views/inc/footer.php";
