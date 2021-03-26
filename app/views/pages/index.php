<?php require APPROOT . "/views/inc/header.php"; ?>
<div class="container">

    <section class="section-fashions py-3">
        <ul class="fashions-showcase clearfix">
            <li>
                <figure class="fashion-photo">
                    <img src="<?php echo URLROOT ?>/img/home-articles/couple-in-love.jpg" alt="couple-in-love">
                </figure>
            </li>
            <li>
                <figure class="fashion-photo">
                    <img src="<?php echo URLROOT ?>/img/home-articles/mens-business-fashion.jpg" alt="mens-business-fashion">
                </figure>
            </li>
            <li>
                <figure class="fashion-photo">
                    <img src="<?php echo URLROOT ?>/img/home-articles/model-poses-with-neon-reflection.jpg" alt="model-poses-with-neon-reflection">
                </figure>
            </li>
            <li>
                <figure class="fashion-photo">
                    <img src="<?php echo URLROOT ?>/img/home-articles/casual-man-sits-on-rock.jpg" alt="casual-man-sits-on-rock">
                </figure>
            </li>
        </ul>
        <ul class="fashions-showcase clearfix">
            <li>
                <figure class="fashion-photo">
                    <img src="<?php echo URLROOT ?>/img/home-articles/woman-poses-in-strappy-skirt.jpg" alt="woman-poses-in-strappy-skirt">
                </figure>
            </li>
            <li>
                <figure class="fashion-photo">
                    <img src="<?php echo URLROOT ?>/img/home-articles/three-woman-stand-in-front-of-a-pink-backdrop.jpg" alt="three-woman-stand-in-front-of-a-pink-backdrop">
                </figure>
            </li>
            <li>
                <figure class="fashion-photo">
                    <img src="<?php echo URLROOT ?>/img/home-articles/man-in-leather-graffiti-bricks.jpeg" alt="man-in-leather-graffiti-bricks">
                </figure>
            </li>
            <li>
                <figure class="fashion-photo">
                    <img src="<?php echo URLROOT ?>/img/home-articles/woman-in-park-afternoon.jpeg" alt="woman-in-park-afternoon">
                </figure>
            </li>
        </ul>
    </section>

    <section id="home-articles" class="text-center px-2">
        <h2>Les styles du moment</h2>
        <div class="bottom-line"></div>
        <div class="py-3">
            <div class="articles-container">
                <article class="card">
                    <img src="<?php echo URLROOT ?>/img/home-articles/woman-in-summer-fashion.jpg" alt="">
                    <div>
                        <div class="category category-ent">Entertainment</div>
                        <h3 class="py-2">
                            <a href="<?php echo URLROOT . '/women/newAccessoires' ?>">F E M M E S</a>
                        </h3>
                        <p class="py-1">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla quam eius ducimus optio veniam sit nihil beatae ea autem. Doloribus.</p>

                        <img src="<?php echo URLROOT ?>/img/home-articles/fashion-model-under-carnival-lights.jpg" alt="">
                    </div>
                </article>
                <article class="card bg-dark">
                    <img src="<?php echo URLROOT ?>/img/home-articles/beach-boardwalk-selfie.jpg" alt="beach-boardwalk-selfie">
                    <img src="<?php echo URLROOT ?>/img/home-articles/womens-fashion-woman-denim-shorts-holding-pockets.jpg" alt="">
                </article>
                <article class="card bg-dark">
                    <img src="<?php echo URLROOT ?>/img/home-articles/mens-casual-fashion-denim-and-sneakers.jpg" alt="">
                    <img src="<?php echo URLROOT ?>/img/home-articles/casual-mens-fashion-in-urban-back-yard.jpg" alt="">
                </article>
                <article class="card">
                    <div>
                        <div class="category category-ent">Entertainment</div>
                        <h3>
                            <a href="<?php echo URLROOT . '/men/newAccessoires' ?>">H O M M E S</a>
                        </h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla quam eius ducimus optio veniam sit nihil beatae ea autem. Doloribus.</p>
                    </div>
                    <img src="<?php echo URLROOT ?>/img/home-articles/mens-fashion-stood-in-vineyard-shirt-and-shorts.jpg" alt="">
                </article>
            </div>
        </div>
    </section>

    <section class="text-center py-3">
        <h2>Collection limitée</h2>
        <div class="bottom-line"></div>
        <div class="container">
            <div class="new-collection py-3">
                <div class="story__pictures">
                    <img src="<?php echo URLROOT ?>/img/home-articles/posing-in-denim-and-leather.jpg" alt="model-posing-on-purple-velvet-couch" class="story__img--1">
                    <img src="<?php echo URLROOT ?>/img/home-articles/model-posing-on-purple-velvet-couch.jpg" alt="posing-in-denim-and-leather" class="story__img--2">
                </div>

                <div class="story__content">
                    <h2 class="heading-2 heading-2--dark mb-md">&ldquo;Lorem ipsum dolor sit amet consectetur&rdquo;</h2>
                    <p class="story__text">
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Tenetur distinctio necessitatibus pariatur voluptatibus. Quidem consequatur harum volupta!
                    </p>
                    <form action="<?php echo URLROOT . '/women/newAccessoires' ?>">
                        <button type="submit" class="btn">Voir la collection</button>
                    </form>
                </div>
            </div>
        </div>

    </section>

    <section class="looks text-center py-3">
        <h2>Nos meilleurs looks !</h2>
        <div class="bottom-line"></div>
    </section>

    <section class="gallery">
        <figure class="gallery__item gallery__item--1"><img src="<?php echo URLROOT ?>/img/home-articles/woman-poses-in-the-corner-of-a-room-of-mirrors.jpg" alt="woman-poses-in-the-corner-of-a-room-of-mirrors" class="gallery__img"></figure>
        <figure class="gallery__item gallery__item--2"><img src="<?php echo URLROOT ?>/img/home-articles/women-pose-with-gold.jpg" alt="women-pose-with-gold" class="gallery__img"></figure>
        <figure class="gallery__item gallery__item--3"><img src="<?php echo URLROOT ?>/img/home-articles/summer-fashion-model-with-braids.jpg" alt="summer-fashion-model-with-braids" class="gallery__img"></figure>
        <figure class="gallery__item gallery__item--4"><img src="<?php echo URLROOT ?>/img/home-articles/man-in-a-party-hat.jpg" alt="man-in-a-party-hat" class="gallery__img"></figure>
        <figure class="gallery__item gallery__item--5"><img src="<?php echo URLROOT ?>/img/home-articles/casual-sweater-and-jeans-mens-fashion.jpg" alt="casual-sweater-and-jeans-mens-fashion" class="gallery__img"></figure>
        <figure class="gallery__item gallery__item--6"><img src="<?php echo URLROOT ?>/img/home-articles/woman-and-girls-walk-grassy-path.jpg" alt="woman-and-girls-walk-grassy-path" class="gallery__img"></figure>
        <figure class="gallery__item gallery__item--7"><img src="<?php echo URLROOT ?>/img/home-articles/rooftop-city-fashion.jpg" alt="rooftop-city-fashion7" class="gallery__img"></figure>
        <figure class="gallery__item gallery__item--8"><img src="<?php echo URLROOT ?>/img/home-articles/man-with-hands-together.jpg" alt="man-with-hands-together" class="gallery__img"></figure>
        <figure class="gallery__item gallery__item--9"><img src="<?php echo URLROOT ?>/img/home-articles/sunglasses-making-a-splash.jpg" alt="sunglasses-making-a-splash" class="gallery__img"></figure>
        <figure class="gallery__item gallery__item--10"><img src="<?php echo URLROOT ?>/img/home-articles/stylish-woman-smiling.jpg" alt="stylish-woman-smiling" class="gallery__img"></figure>
        <figure class="gallery__item gallery__item--11"><img src="<?php echo URLROOT ?>/img/home-articles/indian-couple-christmas-morning-portrait.jpg" alt="indian-couple-christmas-morning-portrait" class="gallery__img"></figure>
        <figure class="gallery__item gallery__item--12"><img src="<?php echo URLROOT ?>/img/home-articles/twirling-hair-and-batting-eyes.jpg" alt="twirling-hair-and-batting-eyes" class="gallery__img"></figure>
        <figure class="gallery__item gallery__item--13"><img src="<?php echo URLROOT ?>/img/home-articles/friends-backpacking-together.jpg" alt="friends-backpacking-together" class="gallery__img"></figure>
        <figure class="gallery__item gallery__item--14"><img src="<?php echo URLROOT ?>/img/home-articles/friends-laughing-on-beach.jpg" alt="friends-laughing-on-beach" class="gallery__img"></figure>
    </section>
</div>
<?php require APPROOT . "/views/inc/footer.php";
