<?php require APPROOT . "/views/inc/header.php"; ?>
<div class="container pt-9">
    <div class="form-content px-2">
        <h3>Créer un compte</h3>
        <span>Veuillez remplir le formulaire ci-dessous pour vous inscrire</span>
        <form action="<?php echo URLROOT; ?>/users/register" method="post">
            <div class="civility-content flex-items py-2">
                <div class="form-check-input px-1">
                    <input type="radio" name="civilite" value="f" id="radiof" checked>
                    <label class="<?php echo (!empty($data['civilite_err'])) ? 'is-invalid' : ''; ?>" for="radiof">Madame</label>
                </div>
                <div class="form-check-input px-1">
                    <input type="radio" name="civilite" value="m" id="radiom">
                    <label class="<?php echo (!empty($data['civilite_err'])) ? 'is-invalid' : ''; ?>" for="radiom">Monsieur</label>
                </div>
            </div>
            <span class="civility-invalid-feedback"><?php echo $data['civilite_err']; ?></span>
            <div class="form-group flex-items-columns py-1">
                <label>Pseudo:<sup>*</sup></label>
                <input type="text" name="pseudo" class="py-1 <?php echo (!empty($data['pseudo_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['pseudo']; ?>">
                <span class="invalid-feedback"><?php echo $data['pseudo_err']; ?></span>
            </div>
            <div class="form-group flex-items-columns py-1">
                <label>Adresse email:<sup>*</sup></label>
                <input type="text" name="email" class="py-1 <?php echo (!empty($data['email_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['email']; ?>">
                <span class="invalid-feedback"><?php echo $data['email_err']; ?></span>
            </div>
            <div class="form-group flex-items-columns py-1">
                <label>Mot de passe:<sup>*</sup></label>
                <input type="password" name="mdp" class="py-1 <?php echo (!empty($data['mdp_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['mdp']; ?>">
                <span class="invalid-feedback"><?php echo $data['mdp_err']; ?></span>
            </div>
            <div class="form-group flex-items-columns py-1">
                <label>Confirmer votre mot de passe:<sup>*</sup></label>
                <input type="password" name="confirm_mdp" class="py-1 <?php echo (!empty($data['confirm_mdp_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['confirm_mdp']; ?>">
                <span class="invalid-feedback"><?php echo $data['confirm_mdp_err']; ?></span>
            </div>
            <div class="form-group flex-items-columns py-1">
                <label>Prénom:<sup>*</label>
                <input type="text" name="prenom" class="py-1 <?php echo (!empty($data['prenom_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['prenom']; ?>">
                <span class="invalid-feedback"><?php echo $data['prenom_err']; ?></span>
            </div>
            <div class="form-group flex-items-columns py-1">
                <label>Nom:<sup>*</label>
                <input type="text" name="nom" class="py-1 <?php echo (!empty($data['nom_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['nom']; ?>">
                <span class="invalid-feedback"><?php echo $data['nom_err']; ?></span>
            </div>

            <div class="form-group flex-items-columns py-1">
                <label>Adresse:<sup>*</label>
                <input type="text" name="adresse" class="py-1 <?php echo (!empty($data['adresse_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['adresse']; ?>">
                <span class="invalid-feedback"><?php echo $data['adresse_err']; ?></span>
            </div>
            <div class="form-group flex-items-columns py-1">
                <label>Code postal:<sup>*</label>
                <input type="text" name="code_postal" class="py-1 <?php echo (!empty($data['code_postal_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['code_postal']; ?>">
                <span class="invalid-feedback"><?php echo $data['code_postal_err']; ?></span>
            </div>
            <div class="form-group flex-items-columns py-1">
                <label>Ville:<sup>*</label>
                <input type="text" name="ville" class="py-1 <?php echo (!empty($data['ville_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['ville']; ?>">
                <span class="invalid-feedback"><?php echo $data['ville_err']; ?></span>
            </div>
            <div class="form-content-btn flex-items py-1">
                <div>
                    <input class="form-btn-success" type="submit" value="Register">
                </div>
                <div>
                    <a class="form-btn-account" href="<?php echo URLROOT; ?>/users/login">Have an account? Login</a>
                </div>
            </div>
        </form>
    </div>
</div>
<?php require APPROOT . "/views/inc/footer.php";
