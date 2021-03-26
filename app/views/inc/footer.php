<!-- Modal Contact -->

<?php

if (isset($data["contact_err"]) && $data["contact_err"] === true) {
    // Check and send down errors messages
} elseif (isset($data["contact_err"]) && $data["contact_err"] === false) {
    // Check if succeeded and clear data 
    $data = [
        "contact_user_name" => '',
        "contact_user_email" => '',
        "contact_user_message" => '',
        "contact_user_name_err" => '',
        "contact_user_email_err" => '',
        "contact_user_message_err" => '',
        "contact_err" => false
    ];
} else {
    // Initialisation of the contact data
    $data = [
        "contact_user_name" => '',
        "contact_user_email" => '',
        "contact_user_message" => '',
        "contact_user_name_err" => '',
        "contact_user_email_err" => '',
        "contact_user_message_err" => '',
        "contact_err" => ''
    ];
}
?>
<div class="modal-container <?php echo (!empty($data["contact_err"]) && $data["contact_err"] === true || $data["contact_err"] === false) ? 'show-modal' : ''; ?>" id="contact-modal">
    <div class="modal">
        <button class="contact-close-btn" id="contact-close"><i class="fa fa-times"></i></button>
        <div class="modal-header">
            <h3>Contact</h3>
        </div>
        <div class="modal-content">
            <?php if (isset($data["contact_err"]) && $data["contact_err"] === false) {
                flash('contact_message_success');
            } ?>
            <p>Pour toutes informations conntactez-nous par téléphone: 01 01 01 01 01 ou par email en complétant le formulaire ci-dessous</p>
            <form action="<?php echo URLROOT . '/users/contact' ?>" method="post" class="modal-form">
                <div>
                    <label for="name">Nom et Prénom<sup>*</sup></label>
                    <input type="text" name="contact_user_name" class="form-input <?php echo (!empty($data['contact_user_name_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['contact_user_name']; ?>" placeholder="Votre nom et prénom...">
                    <span class="invalid-feedback"><?php echo $data['contact_user_name_err']; ?></span>
                </div>
                <div>
                    <label>Adresse email<sup>*</sup></label>
                    <input type="text" name="contact_user_email" class="form-input <?php echo (!empty($data['contact_user_email_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['contact_user_email']; ?>" placeholder="Votre email...">
                    <span class="invalid-feedback"><?php echo $data['contact_user_email_err']; ?></span>
                </div>
                <div>
                    <label for="message">Votre message<sup>*</sup></label>
                    <textarea name="contact_user_message" id="message" cols="30" rows="5" class="form-input <?php echo (!empty($data['contact_user_message_err'])) ? 'is-invalid' : ''; ?>" placeholder="Votre message..."><?php echo $data['contact_user_message']; ?></textarea>
                    <span class="invalid-feedback"><?php echo $data['contact_user_message_err']; ?></span>
                </div>
                <input type="submit" value="Envoyer" class="submit-btn">
            </form>
        </div>
    </div>
</div>

<!-- End Modal Contact -->

<!-- Modal Contact -->

<div class="cookies-modal-container <?php echo (!isset($_COOKIE['acceptCookies'])) ? 'show-modal' : ''; ?>" id="cookies-modal">
    <div class="cookies-modal">
        <div class="cookies-modal-header">
            <h3 class="pt-1">Le Petit Commerce</h3>
            <div class="bottom-line"></div>
        </div>
        <div class="cookies-modal-content">
            <h3>Cookies</h3>
            <p>Ce site utilise des cookies pour améliorer votre confort de navigation. Voir nos conditions d'utilisation dans la Charte Relative aux Cookies</p>
            <button id="accept" class="btn btn-cookies">J'ai compris</button>
        </div>
    </div>
</div>

<!-- End Modal Cookies -->

<div class="insurance-content py-1">
    <div class="container">
        <ul class="insurance row px-1">
            <li class="insurance-reimbursement flex-items-columns">
                <svg xmlns="http://www.w3.org/2000/svg" width="30px" height="30px" viewBox="0 0 30.5 29.1">
                    <path d="M25.1 0H5.4L0 7.6v21.5h30.5V7.6L25.1 0zm2.4 6.9H16.2V2H24l3.5 4.9zM6.4 2h7.8v4.9H2.9L6.4 2zM2 27.1V8.9h26.5v18.2H2z" />
                    <path d="M14.3 14.2l-1.4-1.4-5.4 5.3 5.4 5.4 1.4-1.4-2.9-3h10.1v-2H11.4z" /></svg>
                <p>Satisfait ou remboursé</p>
                <p>14 jours pour changer d'avis</p>
            </li>
            <li class="insurance-quick-delivery flex-items-columns">
                <svg xmlns="http://www.w3.org/2000/svg" width="37px" height="24px" viewBox="0 0 38.1 24">
                    <path d="M26.1 24c-6.6 0-12-5.4-12-12s5.4-12 12-12 12 5.4 12 12-5.4 12-12 12zm0-22c-5.5 0-10 4.5-10 10s4.5 10 10 10 10-4.5 10-10-4.5-10-10-10z" />
                    <path d="M27.8 14.6l-2.7-2.8V5.2h2V11l2.1 2.2zM0 5.3h11.5v2H0zM4.1 11h7.4v2H4.1zM7.1 16.7h4.4v2H7.1z" /></svg>
                <p>Livraison rapide</p>
                <p>Domicile ou point relais</p>
            </li>
            <li class="insurance-free-delivery flex-items-columns">
                <svg xmlns="http://www.w3.org/2000/svg" width="35px" height="22px" viewBox="0 0 36.2 22.1">
                    <path d="M36.2 10.4L30.1 0H0v19.4h5.5c.4 1.6 1.8 2.7 3.5 2.7s3.1-1.1 3.5-2.7h12.3c.4 1.6 1.9 2.7 3.5 2.7s3.1-1.1 3.5-2.7H36v-9zM28.9 2l4.5 7.7H22.8V2h6.1zM9 20.1c-.9 0-1.7-.8-1.7-1.7s.8-1.7 1.7-1.7 1.7.8 1.7 1.7-.8 1.7-1.7 1.7zm0-5.4a3.5 3.5 0 0 0-3.5 2.7H2V2h18.8v15.4h-8.2A3.9 3.9 0 0 0 9 14.7zm19.4 5.4c-.9 0-1.7-.8-1.7-1.7s.8-1.7 1.7-1.7 1.7.8 1.7 1.7-.7 1.7-1.7 1.7zm3.6-2.7c-.4-1.6-1.9-2.7-3.5-2.7s-3.1 1.1-3.5 2.7h-2.1v-5.7h11.4v5.7H32z" />
                    <path d="M14.8 4.9L10 9.7 8.2 7.9 6.7 9.3l3.3 3.2 6.2-6.2z" /></svg>
                <p>Livraison gratuite</p>
                <p>dès 99€</p>
            </li>
            <li class="insurance-payment flex-items-columns">
                <svg xmlns="http://www.w3.org/2000/svg" width="23px" height="28px" viewBox="0 0 23.6 28.7">
                    <path d="M12 28.7l-.4-.2C-.1 22.9 0 11.9 0 7.7V6h1C3.8 6 9.2 2 11.1.5l.6-.5.6.5c1.9 1.5 7.4 5.3 10.2 5.3h1v1.7c.1 4.1.4 15.1-11.2 21l-.3.2zM2 7.9c0 4.2 0 13.5 9.9 18.6 9.8-5.2 9.7-14.6 9.6-18.8a29 29 0 0 1-9.8-5.2A27 27 0 0 1 2 7.9z" />
                    <path d="M10.1 19l-3.6-3.6L7.9 14l2.2 2.2 5.6-5.6 1.4 1.4z" /></svg>
                <p>Paiement en ligne sécurisé</p>
            </li>
        </ul>
    </div>
</div>
<footer class="footer">
    <div class="container">
        <ul class="nav">
            <li class="nav__item"><a href="#!" class="nav__link" id="contact-open">Contact</a></li>
            <!-- <li class="nav__item"><a href="#" class="nav__link">Avis</a></li>
        <li class="nav__item"><a href="#" class="nav__link">Recrutement</a></li>
        <li class="nav__item"><a href="#" class="nav__link">Plan du site</a></li> -->
            <li class="nav__item"><a href="<?php echo URLROOT . '/pages/salesterms' ?>" class="nav__link">Conditions générales de ventes</a></li>
            <li class="nav__item"><a href="<?php echo URLROOT . '/pages/legalnotices' ?>" class="nav__link">Mentions légales</a></li>
        </ul>
        <div class="social">
            <a class="px-1" href="https://facebook.com/" target="_blank"><i class="fab fa-facebook fa-3x"></i></a>
            <a class="px-1" href="https://twitter.com/" target="_blank"><i class="fab fa-twitter fa-3x"></i></a>
            <a class="px-1" href="https://www.youtube.com/" target="_blank"><i class="fab fa-youtube fa-3x"></i></a>
            <a class="px-1" href="https://www.linkedin.com/in/andrei-susai-5641a1198/" target="_blank"><i class="fab fa-linkedin fa-3x"></i></a>
        </div>
        <p class="copyright">
            &copy; Copyright <?= date('Y') ?> by Andrei Susai
        </p>
    </div>
</footer>

<script>
    // Modal Cookies

    const cookiesModal = document.getElementById("cookies-modal");
    const accept = document.getElementById("accept");

    // Hide Modal
    accept.addEventListener("click", () => {
        cookiesModal.classList.remove("show-modal");
        d = new Date();
        d.setTime(d.getTime() + 1000 * 60 * 60 * 24); // 90 jours
        document.cookie = "acceptCookies=true;expires=" + d.toGMTString();
    });
</script>

<script>
    // Modal Contact
    const close = document.getElementById("contact-close");
    const open = document.getElementById("contact-open");
    const modal = document.getElementById("contact-modal");

    // Show Modal
    open.addEventListener("click", () => modal.classList.add("show-modal"));

    // Hide Modal
    close.addEventListener("click", () => modal.classList.remove("show-modal"));

    // Hide modal on outside click

    window.addEventListener("click", e =>
        e.target == modal ? modal.classList.remove("show-modal") : false
    );
</script>
<script src="<?php echo URLROOT ?>/js/jquery.js"></script>
<script src="<?php echo URLROOT ?>/js/bootstrap.min.js"></script>
<!-- Bx Slider JS -->
<script src="<?php echo URLROOT ?>/js/jquery.bxslider.min.js"></script>
<!-- Add JS counter lib -->
<script src="<?php echo URLROOT ?>/js/jquery.waypoints.min.js"></script>
<script src="<?php echo URLROOT ?>/js/jquery.counterup.min.js"></script>
<script src="<?php echo URLROOT ?>/js/wow.min.js"></script>
<!-- Custom Js -->
<script src="<?php echo URLROOT ?>/js/custom.js"></script>
</body>

</html>