<?php
class Profiles extends Controller
{

    public function __construct()
    {
        $this->profileModel = $this->model('Profile');
        $this->userModel = $this->model('User');
    }

    public function index()
    {
        // Check if post
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanitize POST
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'id' => trim($_SESSION['user_id']),
                'pseudo' => (preg_match('#^[a-zA-Z0-9._-]{3,20}$#', $_POST['pseudo'])) ? trim($_POST['pseudo']) : '',
                'nom' => trim($_POST['nom']),
                'prenom' => trim($_POST['prenom']),
                'civilite' => (trim($_POST['civilite']) === 'f' || trim($_POST['civilite']) === 'm') ? trim($_POST['civilite']) : '',
                'ville' => trim($_POST['ville']),
                'code_postal' => (preg_match('#^[0-9]{5}$#', $_POST['code_postal'])) ? trim($_POST['code_postal']) : '',
                'adresse' => trim($_POST['adresse']),
                'pseudo_err' => '',
                'nom_err' => '',
                'prenom_err' => '',
                'civilite_err' => '',
                'ville_err' => '',
                'code_postal_err' => '',
                'adresse_err' => '',
                'update_profile' => false
            ];

            if (empty($data['pseudo'])) {
                $data['pseudo_err'] = 'Le pseudo doit comporter entre 3 et 20 caractères (a à z, 0 à 9 et ._-)';
            }
            // Validate last name
            if (empty($data['nom'])) {
                $data['nom_err'] = 'Veuillez entrer un nom';
            }
            // Validate first name
            if (empty($data['prenom'])) {
                $data['prenom_err'] = 'Veuillez entrer un prénom';
            }
            // Validate civility
            if (empty($data['civilite'])) {
                $data['civilite_err'] = 'Veuillez choisir votre civilité';
            }
            // Validate town
            if (empty($data['ville'])) {
                $data['ville_err'] = 'Veuillez entrer la ville';
            }
            // Validate zip code
            if (empty($data['code_postal'])) {
                $data['code_postal_err'] = 'Le code postal n\'est pas valide';
            }
            // Validate adress
            if (empty($data['adresse'])) {
                $data['adresse_err'] = 'Veuillez entrer votre adresse';
            }

            // Make sure errors are empty
            if (empty($data['pseudo_err']) && empty($data['nom_err']) && empty($data['prenom_err']) && empty($data['civilite_err']) && empty($data['ville_err']) && empty($data['code_postal_err']) && empty($data['adresse_err'])) {
                // SUCCESS - Proceed to update

                // Execute
                if ($this->profileModel->updateUserProfile($data)) {

                    $user = $this->userModel->getUserById($data['id']);

                    $this->updateUserSession($user);
                    $data["update_profile"] = true;
                    // Redirect to login
                    flash('change_profile_success', 'Vos coordonnées ont été modifiées avec succès', 'change_profile_success_done');
                    $this->view('profiles/index', $data);
                } else {
                    die('Désolé, il semble qu\'il y ait eu une erreur');
                }
            } else {
                // Load view
                $this->view('profiles/index', $data);
            }
        } else {
            // If NOT a POST REQUEST

            $data = [
                'pseudo' => '',
                'old_mdp' => '',
                'new_mdp' => '',
                'confirm_mdp' => '',
                'nom' => '',
                'prenom' => '',
                'email' => '',
                'civilite' => '',
                'photo' => '',
                'code_postal' => '',
                'adresse' => '',
                'ville' => '',
                'pseudo_err' => '',
                'old_mdp_err' => '',
                'new_mdp_err' => '',
                'confirm_mdp_err' => '',
                'nom_err' => '',
                'prenom_err' => '',
                'email_err' => '',
                'civilite_err' => '',
                'code_postal_err' => '',
                'adresse_err' => '',
                'ville_err' => '',
            ];
            // Load View
            $this->view('profiles/index', $data);
        }
    }

    public function changepassword()
    {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'id' => trim($_SESSION['user_id']),
                'old_mdp' => trim($_POST['old_mdp']),
                'new_mdp' => trim($_POST['new_mdp']),
                'confirm_mdp' => trim($_POST['confirm_mdp']),
                'old_mdp_err' => '',
                'new_mdp_err' => '',
                'confirm_mdp_err' => '',
                'update_password' => false
            ];

            if (empty($data['old_mdp'])) {
                $data['old_mdp_err'] = 'Veuillez entrer votre mot de passe';
            }

            if (empty($data['old_mdp_err']) && !empty($data['old_mdp'])) {
                if ($this->profileModel->getUserByPassword($data['id'], $data['old_mdp']) === false) {
                    $data['old_mdp_err'] = 'Ancien mot de passe incorrect';
                }
            }

            // Validate password
            if (empty($data['new_mdp'])) {
                $data['new_mdp_err'] = 'Veuillez entrer un mot de passe';
            } elseif (strlen($data['new_mdp']) < 6) {
                $data['new_mdp_err'] = 'Le mot de passe doit contenir au moins 6 caractère';
            } elseif ($data['old_mdp'] == $data['new_mdp']) {
                $data['new_mdp_err'] = 'Le nouveau mot de passe ne peut pas être identique à l\'ancien mot de passe';
            }

            // Validate confirm password
            if (empty($data['confirm_mdp'])) {
                $data['confirm_mdp_err'] = 'Veuillez confirmer votre mot de passe';
            } elseif ($data['new_mdp'] != $data['confirm_mdp']) {
                $data['confirm_mdp_err'] = 'Le nouveau mot de passe et la confirmation ne concordent pas';
            }

            if (empty($data['old_mdp_err']) && empty($data['new_mdp_err']) && empty($data['confirm_mdp_err'])) {
                // Options for encrypt password
                $options = [
                    'cost' => 12,
                ];
                // Hash Password
                $data['new_mdp'] = password_hash($data['new_mdp'] . SALT, PASSWORD_BCRYPT, $options);

                if ($this->profileModel->changeUserPassword($data['id'], $data['new_mdp'])) {

                    $data["update_password"] = true;
                    // Redirect to login
                    flash('change_password_success', 'Votre mot de passe a été changé avec succès !', 'change_profile_success_done');
                    $this->view('profiles/index', $data);
                } else {
                    die('Désolé, il semble qu\'il y ait eu une erreur');
                }
            } else {
                $this->view('profiles/index', $data);
            }
        } else {
            // If NOT a POST REQUEST

            $data = [
                'pseudo' => '',
                'old_mdp' => '',
                'new_mdp' => '',
                'confirm_mdp' => '',
                'nom' => '',
                'prenom' => '',
                'email' => '',
                'civilite' => '',
                'photo' => '',
                'code_postal' => '',
                'adresse' => '',
                'ville' => '',
                'pseudo_err' => '',
                'old_mdp_err' => '',
                'new_mdp_err' => '',
                'confirm_mdp_err' => '',
                'nom_err' => '',
                'prenom_err' => '',
                'email_err' => '',
                'civilite_err' => '',
                'code_postal_err' => '',
                'adresse_err' => '',
                'ville_err' => '',
            ];
            // Load View
            $this->view('profiles/index', $data);
        }
    }

    public function updateUserImage()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                "user_image" => trim($_FILES['user_image']['name']),
                "user_id" => $_SESSION['user_id'],
                "user_image_err" => '',
                "user_id_err" => '',
                "update_image" => false
            ];

            if (empty($data["user_image"])) {
                $data["user_image_err"] = 'Veuillez choisir une photo !';
            }

            if (empty($data["user_id"])) {
                $data["user_id_err"] = 'Vous devez vous connecter pour accéder à votre profil';
            }

            if (empty($data["user_id_err"]) && empty($data["user_image_err"])) {

                $ext_auto = ['image/jpeg', 'image/png', 'image/gif'];

                if (in_array($_FILES['user_image']['type'], $ext_auto)) {
                    // Execute
                    if ($this->profileModel->updateUserImage($data)) {

                        move_uploaded_file($_FILES['user_image']['tmp_name'], $_SERVER['DOCUMENT_ROOT'] . USERS_IMAGES . $data["user_image"]);

                        $user = $this->userModel->getUserById($data['user_id']);

                        $this->updateUserSession($user);
                        $data["update_image"] = true;
                        // Redirect to login
                        flash('change_image_success', 'La photo a été enregistrée', 'change_profile_success_done');
                        $this->view('profiles/index', $data);
                    } else {
                        die('Désolé, il semble qu\'il y ait eu une erreur');
                    }
                } else {
                    $data["update_image"] = false;
                    $data["user_image_err"] = 'La photo n\'a pas été enregistrée. Formats acceptés : jpg, png,gif';
                    $this->view('profiles/index', $data);
                }
            } else {
                // Load view
                $this->view('profiles/index', $data);
            }
        } else {
            // If NOT a POST REQUEST

            $data = [
                'pseudo' => '',
                'old_mdp' => '',
                'new_mdp' => '',
                'confirm_mdp' => '',
                'nom' => '',
                'prenom' => '',
                'email' => '',
                'civilite' => '',
                'photo' => '',
                'code_postal' => '',
                'adresse' => '',
                'ville' => '',
                'pseudo_err' => '',
                'old_mdp_err' => '',
                'new_mdp_err' => '',
                'confirm_mdp_err' => '',
                'nom_err' => '',
                'prenom_err' => '',
                'email_err' => '',
                'civilite_err' => '',
                'code_postal_err' => '',
                'adresse_err' => '',
                'ville_err' => '',
            ];
            // Load View
            $this->view('profiles/index', $data);
        }
    }

    public function removeImage()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                "image" => $_POST['remove_image'],
                "user_id" => $_SESSION['user_id'],
                "remove_image_err" => '',
                "remove_image" => false
            ];

            if (!empty($data["image"]) && !empty($data["user_id"])) {

                if ($this->profileModel->removeImage($data)) {

                    $user = $this->userModel->getUserById($data['user_id']);

                    $this->updateUserSession($user);
                    $data["remove_image"] = true;
                    // Redirect to login
                    flash('change_remove_success', 'La photo a été supprimée', 'change_profile_success_done');
                    $this->view('profiles/index', $data);
                } else {
                    die('Désolé, il semble qu\'il y ait eu une erreur');
                }
            } else {
                $data["remove_image"] = false;
                $data["remove_image_err"] = 'Vous devez vous connecter pour accéder à votre profil';
                $this->view('profiles/index', $data);
            }
        } else {
            // If NOT a POST REQUEST

            $data = [
                'pseudo' => '',
                'old_mdp' => '',
                'new_mdp' => '',
                'confirm_mdp' => '',
                'nom' => '',
                'prenom' => '',
                'email' => '',
                'civilite' => '',
                'photo' => '',
                'code_postal' => '',
                'adresse' => '',
                'ville' => '',
                'pseudo_err' => '',
                'old_mdp_err' => '',
                'new_mdp_err' => '',
                'confirm_mdp_err' => '',
                'nom_err' => '',
                'prenom_err' => '',
                'email_err' => '',
                'civilite_err' => '',
                'code_postal_err' => '',
                'adresse_err' => '',
                'ville_err' => '',
            ];
            // Load View
            $this->view('profiles/index', $data);
        }
    }

    public function updateUserSession($user)
    {
        $_SESSION['user_pseudo'] = $user->pseudo;
        $_SESSION['user_nom'] = $user->nom;
        $_SESSION['user_prenom'] = $user->prenom;
        $_SESSION['user_civilite'] = $user->civilite;
        $_SESSION['user_image'] = $user->photo;
        $_SESSION['user_ville'] = $user->ville;
        $_SESSION['user_code_postal'] = $user->code_postal;
        $_SESSION['user_adresse'] = $user->adresse;
    }
}
