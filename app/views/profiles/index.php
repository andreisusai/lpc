<?php require APPROOT . "/views/inc/header.php"; ?>

<div class="container pt-9">
    <h1 class="heading-1 pt-3">Mon profil</h1>
    <div class="bottom-line"></div>
    <?php if (!empty($_SESSION['user_id'])) : ?>
        <?php if (isset($_GET['action']) && $_GET['action'] == 'display-profile' || isset($data['update_profile']) && $data['update_profile'] === false) : ?>
            <div class="action-change-details-profile px-2">
                <h3>Modifier mes coordonnées</h3>
                <form action="<?php echo URLROOT; ?>/profiles/index" method="post">
                    <div class="civility-content flex-items py-2">
                        <div class="form-check-input px-1">
                            <input type="radio" name="civilite" value="f" id="radiof" <?php echo ($_SESSION['user_civilite'] == 'f') ? 'checked' : ''; ?>>
                            <label class="<?php echo (!empty($data['civilite_err'])) ? 'is-invalid' : ''; ?>" for="radiof">Madame</label>
                        </div>
                        <div class="form-check-input px-1">
                            <input type="radio" name="civilite" value="m" id="radiom" <?php echo ($_SESSION['user_civilite'] == 'm') ? 'checked' : ''; ?>>
                            <label class="<?php echo (!empty($data['civilite_err'])) ? 'is-invalid' : ''; ?>" for="radiom">Monsieur</label>
                        </div>
                    </div>
                    <span class="civility-invalid-feedback"><?php echo $data['civilite_err']; ?></span>
                    <div class="form-group flex-items-columns py-1">
                        <label>Pseudo:<sup>*</sup></label>
                        <input type="text" name="pseudo" class="py-1 <?php echo (!empty($data['pseudo_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo ($_SESSION['user_pseudo'] ?? $_POST['pseudo']); ?>">
                        <span class="invalid-feedback"><?php echo $data['pseudo_err']; ?></span>
                    </div>
                    <div class="form-group flex-items-columns py-1">
                        <label>Prénom:<sup>*</label>
                        <input type="text" name="prenom" class="py-1 <?php echo (!empty($data['prenom_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo ($_SESSION['user_prenom'] ?? $_POST['prenom']); ?>">
                        <span class="invalid-feedback"><?php echo $data['prenom_err']; ?></span>
                    </div>
                    <div class="form-group flex-items-columns py-1">
                        <label>Nom:<sup>*</label>
                        <input type="text" name="nom" class="py-1 <?php echo (!empty($data['nom_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo ($_SESSION['user_nom'] ?? $_POST['nom']); ?>">
                        <span class="invalid-feedback"><?php echo $data['nom_err']; ?></span>
                    </div>

                    <div class="form-group flex-items-columns py-1">
                        <label>Adresse:<sup>*</label>
                        <input type="text" name="adresse" class="py-1 <?php echo (!empty($data['adresse_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo ($_SESSION['user_adresse'] ?? $_POST['adresse']); ?>">
                        <span class="invalid-feedback"><?php echo $data['adresse_err']; ?></span>
                    </div>
                    <div class="form-group flex-items-columns py-1">
                        <label>Code postal:<sup>*</label>
                        <input type="text" name="code_postal" class="py-1 <?php echo (!empty($data['code_postal_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo ($_SESSION['user_code_postal'] ?? $_POST['code_postal']); ?>">
                        <span class="invalid-feedback"><?php echo $data['code_postal_err']; ?></span>
                    </div>
                    <div class="form-group flex-items-columns py-1">
                        <label>Ville:<sup>*</label>
                        <input type="text" name="ville" class="py-1 <?php echo (!empty($data['ville_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo ($_SESSION['user_ville'] ?? $_POST['ville']); ?>">
                        <span class="invalid-feedback"><?php echo $data['ville_err']; ?></span>
                    </div>
                    <div class="form-content-btn flex-items py-1">
                        <div>
                            <input class="form-btn-success" type="submit" value="Modifier">
                        </div>
                        <div>
                            <a class="form-btn-account" href="<?php echo URLROOT . "/profiles/index?action=" ?>">Fermer le formulaire</a>
                        </div>
                    </div>
                </form>
            </div>
        <?php endif ?>
        <?php if (isset($_GET['action']) && $_GET['action'] == 'display-security' || isset($data['update_password']) && $data['update_password'] === false) : ?>
            <div class="action-change-security-profile px-2">
                <h3>Modifer mot de passe</h3>
                <form action="<?php echo URLROOT; ?>/profiles/changepassword" method="post">
                    <div class="form-group flex-items-columns py-1">
                        <label>Ancien mot de passe:<sup>*</sup></label>
                        <input type="password" name="old_mdp" class="py-1 <?php echo (!empty($data['old_mdp_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['old_mdp']; ?>">
                        <span class="invalid-feedback"><?php echo $data['old_mdp_err']; ?></span>
                    </div>
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
                    <div class="form-content-btn flex-items py-1">
                        <div>
                            <input class="form-btn-success" type="submit" value="Modifier">
                        </div>
                        <div>
                            <a class="form-btn-account" href="<?php echo URLROOT . "/profiles/index?action=" ?>">Fermer le formulaire</a>
                        </div>
                    </div>
                </form>
            </div>
        <?php endif ?>
        <?php if (isset($_GET['action']) && $_GET["action"] == 'display_user_image' || isset($data['update_image']) && $data['update_image'] === false) : ?>
            <div class="action-change-details-profile px-2">
                <form action="<?php echo URLROOT; ?>/profiles/updateUserImage" method="post" enctype="multipart/form-data">
                    <div class="form-group flex-items-columns py-1">
                        <label>Choisir une photo<sup>*</sup></label>
                        <input type="file" name="user_image" class="py-1 <?php echo (!empty($data['user_image_err'])) ? 'is-invalid' : ''; ?>">
                        <span class="invalid-feedback"><?php echo (!empty($data["user_image_err"])) ? $data["user_image_err"] : '' ?></span>
                        <span class="invalid-feedback"><?php echo (!empty($data["user_id_err"])) ? $data["user_id_err"] : '' ?></span>
                    </div>
                    <div class="form-content-btn flex-items py-1">
                        <div>
                            <input class="form-btn-success" type="submit" value="Ajouter la photo">
                        </div>
                        <div>
                            <a class="form-btn-account" href="<?php echo URLROOT . "/profiles/index?action=" ?>">Fermer le formulaire</a>
                        </div>
                    </div>
                </form>
            </div>
        <?php endif ?>
        <?php if (isset($data['update_profile']) && $data['update_profile'] === true) {
            flash('change_profile_success');
        } ?>
        <?php if (isset($data['update_password']) && $data['update_password'] === true) {
            flash('change_password_success');
        } ?>
        <?php if (isset($data['update_image']) && $data['update_image'] === true) {
            flash('change_image_success');
        } ?>
        <?php if (isset($data['remove_image']) && $data['remove_image'] === true) {
            flash('change_remove_success');
        } ?>
        <div class="content-profile">
            <aside class="profile-aside">
                <?php if (isset($_SESSION['user_image']) && $_SESSION['user_image'] !== NULL) : ?>
                    <img src="<?php echo URLROOT . "/img/users/" . $_SESSION['user_image'] . "" ?>" alt="" class="profile-image">
                    <div style="margin: 0 auto 0 auto;">
                        <form action="<?php echo URLROOT . "/profiles/removeImage" ?>" method="post">
                            <input type="hidden" name="remove_image" value="<?php echo 1 ?>">
                            <input type="submit" value="Modifer ma photo" id="btn-remove-image-profile">
                        </form>
                    </div>

                <?php else : ?>
                    <img src="<?php echo URLROOT . "/img/users/photo_profil_defaut.png" ?>" alt="" class="profile-image">
                    <a href="<?php echo URLROOT . "/profiles/index?action=display_user_image" ?>" style="text-align: center;">Ajouter une photo</a>
                <?php endif ?>
                <span class="last-and-first-name-profile py-1"><?php echo ucfirst($_SESSION['user_prenom']) . ' ' . ucfirst($_SESSION['user_nom']) ?></span>
                <a href="<?php echo URLROOT . "/profiles/index?action=display-profile" ?>" class="profile-links"><i class="fas fa-user"></i> Profil</a>
                <a href="<?php echo URLROOT . "/profiles/index?action=display-security" ?>" class="profile-links"><i class="fas fa-lock"></i> Sécurité</a>
            </aside>
            <div class="profile-details">
                <div>
                    <h3 class="py-3">Mes coordonnées</h3>
                    <p>Civilité: <?php echo ($_SESSION['user_civilite'] == 'f') ? 'Madame' : 'Monsieur' ?></p>
                    <p>Nom: <?php echo $_SESSION['user_nom'] ?></p>
                    <p>Prénom: <?php echo $_SESSION['user_prenom'] ?></p>
                    <p>Email: <?php echo $_SESSION['user_email'] ?></p>
                    <p>Adresse:</p>
                    <address class="ml-3">
                        <span> <?php echo $_SESSION['user_adresse'] ?></span><br>
                        <span> <?php echo $_SESSION['user_code_postal'] ?></span><br>
                        <span> <?php echo $_SESSION['user_ville'] ?></span>
                    </address>
                </div>
            </div>
        </div>
    <?php else : ?>
        <div class="profile-not-connected">
            Vous devez vous <a href="<?php echo URLROOT . "/users/login" ?>">connecter</a> pour accéder à votre profil !
        </div>
    <?php endif ?>
</div>

<?php require APPROOT . "/views/inc/footer.php";
