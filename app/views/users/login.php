<?php require APPROOT . "/views/inc/header.php"; ?>
<div class="container pt-9">
    <?php if (isset($_GET['action']) && $_GET['action'] == 'password_forgot' || isset($data["auth"]) && $data["auth"] === false) : ?>
        <div class="form-content px-2">
            <h3>Réinitialisation mot de passe</h3>
            <span>Veuillez entrer votre adresse email</span>
            <form action="<?php echo URLROOT; ?>/users/passwordforgot" method="post">
                <div class="form-group flex-items-columns py-1">
                    <label>Email:<sup>*</sup></label>
                    <input type="text" name="email" class="py-1 <?php echo (!empty($data['email_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['email']; ?>">
                    <span class="invalid-feedback"><?php echo $data['email_err']; ?></span>
                </div>
                <div class="form-content-btn flex-items py-1">
                    <div>
                        <input class="form-btn-success" type="submit" value="Envoyer">
                    </div>
                </div>
            </form>
        </div>
    <?php elseif (isset($data["auth"]) && $data["auth"] === true) : ?>
        <h1 class="heading-1 pt-3">Réinitialisation mot de passe</h1>
        <div class="bottom-line"></div>
        <div class="py-3 text-center">
            <span>Nous avons pris en compte votre demande</span>
            <p>Si l'email renseigné est lié à votre compte Le Petit Commerce, vous recevrez dans votre boîte email un lien de modification du mot de passe, valable 30min</p>
        </div>
    <?php elseif (isset($data["user_err_message_password"]) && isset($data["err_message_password"])) : ?>
        <h1 class="heading-1 pt-3">Réinitialisation mot de passe</h1>
        <div class="bottom-line"></div>
        <?php if ($data["err_message_password"] === true) : ?>
            <div class="py-3 text-center">
                <span>Opération annulée</span>
                <p><?php echo $data["user_err_message_password"] ?></p>
            </div>
        <?php else : ?>
            <div class="py-3 text-center">
                <span>Votre signalement n'a pas pu aboutir</span>
                <p><?php echo $data["user_err_message_password"] ?></p>
            </div>
        <?php endif ?>
    <?php elseif (isset($data["token_validation"]) && $data["token_validation"] === true || isset($data["update_password"]) && $data["update_password"] === false) : ?>
        <div class="action-change-security-profile px-2">
            <h3>Réinitialisation mot de passe</h3>
            <form action="<?php echo URLROOT; ?>/users/changepassword" method="post">
                <div class="form-group flex-items-columns py-1">
                    <label>Nouveau mot de passe:<sup>*</sup></label>
                    <input type="password" name="new_mdp" class="py-1 <?php echo (!empty($data['new_mdp_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['new_mdp']; ?>">
                    <span class="invalid-feedback"><?php echo $data['new_mdp_err']; ?></span>
                </div>
                <div class="form-group flex-items-columns py-1">
                    <label>Confirmation du nouveau mot de passe:<sup>*</sup></label>
                    <input type="password" name="confirm_mdp" class="py-1 <?php echo (!empty($data['confirm_mdp_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['confirm_mdp']; ?>">
                    <span class="invalid-feedback"><?php echo $data['confirm_mdp_err']; ?></span>
                </div>
                <input type="hidden" name="user_id" value="<?php echo $data["user_id"] ?>">
                <div class="form-content-btn flex-items py-1">
                    <div>
                        <input class="form-btn-success" type="submit" value="Réinitialiser">
                    </div>
                </div>
            </form>
        </div>
    <?php elseif (isset($data["token_validation"]) && $data["token_validation"] === false) : ?>
        <h1 class="heading-1 pt-3">Réinitialisation mot de passe</h1>
        <div class="bottom-line"></div>
        <div class="py-3 text-center">
            <span>Oups !</span>
            <p>Le délai de validité de votre lien a expiré.<br>
                Veuillez répéter l'action du mot de passe oublier pour obtenir un nouveau lien !
            </p>
        </div>
    <?php else : ?>
        <div class="form-content px-2">
            <?php flash('register_success'); ?>
            <?php if (isset($data["update_password"]) && $data["update_password"] === true) {
                flash('change_password_success');
            } ?>
            <h3>Se connecter</h3>
            <span>Veuillez entrer vos coordonnées</span>
            <form action="<?php echo URLROOT; ?>/users/login" method="post">
                <div class="form-group flex-items-columns py-1">
                    <label>Email:<sup>*</sup></label>
                    <input type="text" name="email" class="py-1 <?php echo (!empty($data['email_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['email']; ?>">
                    <span class="invalid-feedback"><?php echo $data['email_err']; ?></span>
                </div>
                <div class="form-group flex-items-columns py-1">
                    <label>Mot de passe:<sup>*</sup></label>
                    <input type="password" name="mdp" class="py-1 <?php echo (!empty($data['mdp_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['mdp']; ?>">
                    <span class="invalid-feedback"><?php echo $data['mdp_err']; ?></span>
                </div>
                <a href="<?php echo URLROOT . '/users/login?action=password_forgot' ?>">Mot de passe oublié ?</a>
                <div class="form-content-btn flex-items py-1">
                    <div>
                        <input class="form-btn-success" type="submit" value="Se connecter">
                    </div>
                    <div>
                        <a class="form-btn-account" href="<?php echo URLROOT; ?>/users/register">No account? Register</a>
                    </div>
                </div>
            </form>
        </div>
    <?php endif ?>
</div>
<?php require APPROOT . "/views/inc/footer.php";
