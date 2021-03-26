<?php

// Import PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer;

class Users extends Controller
{
    public function __construct()
    {
        $this->userModel = $this->model('User');
    }

    public function register()
    {
        // Check if logged in
        if ($this->isLoggedIn()) {
            redirect('pages/index');
        }
        // Check if post
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanitize POST
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'pseudo' => (preg_match('#^[a-zA-Z0-9._-]{3,20}$#', $_POST['pseudo'])) ? trim($_POST['pseudo']) : '',
                'mdp' => trim($_POST['mdp']),
                'confirm_mdp' => trim($_POST['confirm_mdp']),
                'nom' => trim($_POST['nom']),
                'prenom' => trim($_POST['prenom']),
                'email' => (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) ? trim($_POST['email']) : '',
                'civilite' => (trim($_POST['civilite']) === 'f' || trim($_POST['civilite']) === 'm') ? trim($_POST['civilite']) : '',
                'ville' => trim($_POST['ville']),
                'code_postal' => (preg_match('#^[0-9]{5}$#', $_POST['code_postal'])) ? trim($_POST['code_postal']) : '',
                'adresse' => trim($_POST['adresse']),
                'pseudo_err' => '',
                'mdp_err' => '',
                'confirm_mdp_err' => '',
                'nom_err' => '',
                'prenom_err' => '',
                'email_err' => '',
                'civilite_err' => '',
                'ville_err' => '',
                'code_postal_err' => '',
                'adresse_err' => ''
            ];

            // Validate email
            if (empty($data['email'])) {
                $data['email_err'] = 'L\'email n\'est pas valide';
                // Validate pseudo
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
            } else {
                // Check email
                if ($this->userModel->findUserByEmail($data['email'])) {
                    $data['email_err'] = 'Email déjà utilisé, merci d\'en choisir un autre';
                }
                // Validate pseudo
                if (empty($data['pseudo'])) {
                    $data['pseudo_err'] = 'Le pseudo doit comporter entre 3 et 20 caractères (a à z, 0 à 9 et ._-)';
                }

                // Validate zip code
                if (empty($data['code_postal'])) {
                    $data['code_postal_err'] = 'Le code postal n\'est pas valide';
                }
            }

            // Validate password
            if (empty($data['mdp'])) {
                $data['mdp_err'] = 'Veuillez entrer un mot de passe';
            } elseif (strlen($data['mdp']) < 6) {
                $data['mdp_err'] = 'Le mot de passe doit contenir au moins 6 caractère';
            }

            // Validate confirm password
            if (empty($data['confirm_mdp'])) {
                $data['confirm_mdp_err'] = 'Veuillez confirmer votre mot de passe';
            } elseif ($data['mdp'] != $data['confirm_mdp']) {
                $data['confirm_mdp_err'] = 'Les mots de passe ne correspondent pas';
            }

            // Make sure errors are empty
            if (empty($data['pseudo_err']) && empty($data['mdp_err']) && empty($data['confirm_mdp_err']) && empty($data['nom_err']) && empty($data['prenom_err']) && empty($data['civilite_err']) && empty($data['ville_err']) && empty($data['code_postal_err']) && empty($data['adresse_err']) && empty($data['email_err'])) {
                // SUCCESS - Proceed to insert
                // Options for encrypt password
                $options = [
                    'cost' => 12,
                ];
                // Hash Password
                $data['mdp'] = password_hash($data['mdp'] . SALT, PASSWORD_BCRYPT, $options);

                // Execute
                if ($this->userModel->register($data)) {

                    // Redirect to login
                    flash('register_success', 'Vous êtes désormais inscrit et vous pouvez vous connecter', 'register_success_done');
                    redirect('users/login');
                } else {
                    die('Désolé, il semble qu\'il y ait eu une erreur');
                }
            } else {
                // Load view
                $this->view('users/register', $data);
            }
        } else {
            // If NOT a POST REQUEST

            $data = [
                'pseudo' => '',
                'mdp' => '',
                'confirm_mdp' => '',
                'nom' => '',
                'prenom' => '',
                'email' => '',
                'civilite' => '',
                'code_postal' => '',
                'adresse' => '',
                'ville' => '',
                'pseudo_err' => '',
                'mdp_err' => '',
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
            $this->view('users/register', $data);
        }
    }

    public function login()
    {
        // Check if logged in
        if ($this->isLoggedIn()) {
            redirect('pages/index');
        }

        // Check if POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanitize POST
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'email' => (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) ? trim($_POST['email']) : null,
                'mdp' => trim($_POST['mdp']),
                'email_err' => '',
                'mdp_err' => ''
            ];

            // Check for name
            if (empty($data['prenom'])) {
                $data['prenom_err'] = 'Veuillez entrer votre nom';
            }

            // Check for user
            if ($this->userModel->findUserByEmail($data['email'])) {
                // User found
            } elseif ($data['email'] === null) {
                // Check for email
                $data['email_err'] = 'L\'email n\'est pas valide';
            } else {
                $data['email_err'] = 'L\'email n\'est pas enregistré';
            }

            // Make sure errors are empty
            if (empty($data['email_err']) && empty($data['mdp_err'])) {
                // Check and set logged in user
                $loggedInUser = $this->userModel->login($data['email'], $data['mdp']);

                if ($loggedInUser) {
                    // User Authenticated!
                    $this->createUserSession($loggedInUser);
                } else {
                    $data['mdp_err'] = 'Mot de passe incorrecte';
                    // Load view
                    $this->view('users/login', $data);
                }
            } else {
                // Load view
                $this->view('users/login', $data);
            }
        } else {
            // If not a POST

            // Init data
            $data = [
                'email' => '',
                'mdp' => '',
                'email_err' => '',
                'mdp_err' => ''
            ];

            // Load view
            $this->view('users/login', $data);
        }
    }

    // Create session with user info
    public function createUserSession($user)
    {
        $_SESSION['user_id'] = $user->id_membre;
        $_SESSION['user_pseudo'] = $user->pseudo;
        $_SESSION['user_nom'] = $user->nom;
        $_SESSION['user_prenom'] = $user->prenom;
        $_SESSION['user_email'] = $user->email;
        $_SESSION['user_civilite'] = $user->civilite;
        $_SESSION['user_image'] = $user->photo;
        $_SESSION['user_ville'] = $user->ville;
        $_SESSION['user_code_postal'] = $user->code_postal;
        $_SESSION['user_adresse'] = $user->adresse;
        $_SESSION['user_statut'] = $user->statut;
        // Redirect to login
        flash('loggedIn_success', 'Contents de te voir ' . ucfirst($_SESSION['user_prenom']), 'loggedIn_succes_done');
        redirect('pages/index');
    }

    // Logout & destroy session
    public function logout()
    {
        unset($_SESSION['user_id']);
        unset($_SESSION['user_pseudo']);
        unset($_SESSION['user_nom']);
        unset($_SESSION['user_prenom']);
        unset($_SESSION['user_email']);
        unset($_SESSION['user_civilite']);
        unset($_SESSION['user_image']);
        unset($_SESSION['user_ville']);
        unset($_SESSION['user_code_postal']);
        unset($_SESSION['user_adresse']);
        unset($_SESSION['user_statut']);
        session_destroy();
        redirect('pages/index');
    }

    // Check logged in
    public function isLoggedIn()
    {
        if (isset($_SESSION['user_id'])) {
            return true;
        } else {
            return false;
        }
    }

    // Password forgot

    public function passwordforgot()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'email' => (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) ? trim($_POST['email']) : null,
                'email_err' => '',
                'auth' => '',
                'user' => ''
            ];

            if ($data['email'] === null) {
                // Check for email
                $data['email_err'] = 'L\'email n\'est pas valide';
                $data['auth'] = false;
            }

            if (empty($data['email_err'])) {
                if ($this->userModel->findUserByEmail($data['email'])) {

                    $data['user'] = $this->userModel->findUserByEmailForgotPassword($data['email']);
                    $membre = $data['user'];
                    $timestamp = time();
                    $tkn = md5($timestamp . $data['user']->id_membre . $data['user']->nom);
                    $link = $_SERVER['HTTP_HOST'] . '/lpc/users/verifyToken' . "?token=" . $tkn . "&id=" . $membre->id_membre;

                    $this->userModel->setTokenPasswordForgot($tkn, $membre->id_membre, $timestamp);

                    $this->setMailPasswordForgot($membre, $link);

                    $data['auth'] = true;
                    $this->view('users/login', $data);
                } else {
                    $data['email_err'] = 'L\'email n\'est pas enregistré';
                    $data['auth'] = false;
                    $this->view('users/login', $data);
                }
            } else {
                $this->view('users/login', $data);
            }
        }
    }

    public function verifyToken()
    {
        if (isset($_GET['token']) && isset($_GET['id']) && is_numeric($_GET['id']) && $_GET['id'] > 0 && !isset($_GET['email'])) {
            if (!empty($_GET['error']) && ('email' == $_GET['error'])) {
                $user = $this->userModel->getUserById($_GET['id']);

                if ($user !== false) {
                    $data = [
                        "user" => $user,
                        "user_err_message_password" => 'Nous avons bien pris en compte votre signalement<br>
                    Bien à vous !',
                        "err_message_password" => true,
                        "link" => '',
                        "case" => 2
                    ];
                    $this->setMailPasswordForgot($data["user"], $data["link"], $data["case"]);
                    $this->view('users/login', $data);
                } else {
                    $data = [
                        "user_err_message_password" => 'Nous avons rencontré une erreur',
                        "err_message_password" => false,
                    ];
                    $this->view('users/login', $data);
                }
            } else {

                $currentTime = time();
                $token = $this->userModel->getToken($_GET['token'], $_GET['id']);

                $difference = $currentTime - $token->timestamp_token;

                if ($difference <= TKN_TTL) {

                    $data = [
                        "user_id" => $_GET['id'],
                        "token_validation" => true,
                        "new_mdp" => '',
                        "confirm_mdp" => '',
                        'new_mdp_err' => '',
                        'confirm_mdp_err' => ''
                    ];

                    $this->view('users/login', $data);
                } else {

                    $data = [
                        "token_validation" => false
                    ];

                    $this->view('users/login', $data);
                }
            }
        }
    }

    public function changepassword()
    {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'user_id' => trim($_POST['user_id']),
                'new_mdp' => trim($_POST['new_mdp']),
                'confirm_mdp' => trim($_POST['confirm_mdp']),
                'new_mdp_err' => '',
                'confirm_mdp_err' => '',
                'update_password' => false
            ];

            // Validate password
            if (empty($data['new_mdp'])) {
                $data['new_mdp_err'] = 'Veuillez entrer un mot de passe';
            } elseif (strlen($data['new_mdp']) < 6) {
                $data['new_mdp_err'] = 'Le mot de passe doit contenir au moins 6 caractère';
            }

            // Validate confirm password
            if (empty($data['confirm_mdp'])) {
                $data['confirm_mdp_err'] = 'Veuillez confirmer votre mot de passe';
            } elseif ($data['new_mdp'] != $data['confirm_mdp']) {
                $data['confirm_mdp_err'] = 'Le nouveau mot de passe et la confirmation ne concordent pas';
            }

            if (empty($data['new_mdp_err']) && empty($data['confirm_mdp_err'])) {
                // Options for encrypt password
                $options = [
                    'cost' => 12,
                ];
                // Hash Password
                $data['new_mdp'] = password_hash($data['new_mdp'] . SALT, PASSWORD_BCRYPT, $options);

                if ($this->userModel->changeUserPassword($data['user_id'], $data['new_mdp'])) {

                    $this->userModel->removeToken($data['user_id']);

                    $data["update_password"] = true;
                    // Redirect to login and set default
                    $data['email'] = '';
                    $data['mdp'] = '';
                    $data['email_err'] = '';
                    $data['mdp_err'] = '';
                    flash('change_password_success', 'Votre mot de passe a été changé avec succès !', 'change_profile_success_done');
                    $this->view('users/login', $data);
                } else {
                    die('Désolé, il semble qu\'il y ait eu une erreur');
                }
            } else {
                $this->view('users/login', $data);
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


    public function setMailPasswordForgot($membre, $lnk, $case = 1)
    {
        // Instantiation and passing `true` enables exceptions
        $mail = new PHPMailer(true);
        //Server settings
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = 'smtp.phpnet.org';   // Specify main and backup SMTP servers

        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'no-reply@andrei-susai.com';        // SMTP username
        $mail->Password   = 'UMc.00fnl';               // SMTP password
        // $mail->SMTPSecure = 'TSL';                  // Enable TLS encryption, `ssl` also accepted
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
        //Recipients
        $mail->CharSet = 'UTF-8';
        //Recipients
        $mail->setFrom('no-reply@andrei-susai.com', 'Le Petit Commerce');
        $mail->addReplyTo('no-reply@andrei-susai.com', 'No reply');

        if (1 == $case) {
            $mail->addAddress($membre->email);
            // Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'Le Petit Commerce - Réinitialisation de votre Mot de passe';
            $mail->Body    = '
                    <h1>Réinitialisation de votre mot de passe</h1>
                    
                    <h2>Bonjour ' . $membre->prenom . ' ' . $membre->nom . '</h2>
                    <p>
                      Pour terminer la réinitialisation du mot de passe de votre compte,<br>
                      nous vous invitons à <a href="' . $lnk . '">cliquer sur ce lien</a>, valable 30 min. 
                    </p>
                    <p>
                      Vous pensez qu\'il s\'agit d\'une erreur ou vous n\'êtes pas le titulaire de ce compte ?<br>
                      <a href="' . $lnk . '&&error=email">Cliquez ici pour nous le signaler</a>.
                    </p>
                    <p>
                      Cordialement,<br>
                      Le Petit Commerce
                    </p>';
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
        } else {
            $mail->addAddress("andreisusai14@gmail.com");
            $mail->isHTML(true);
            $mail->Subject = '[LE_PETIT_COMMERCE] Réinitialisation de votre Mot de passe - Erreur Mail';
            $mail->Body    = '
                    <h1>L\'email n\'est pas celui de l\'utilisateur</h1>
                    
                    <h2>Bonjour Andrei Susai</h2>
                    <p>
                      Il semblerait que l\'email : ' . $membre->email . ' <br>
                      ne correspond pas à l\'utilisateur : ' . $membre->prenom . ' ' . $membre->nom . '. 
                    </p>
                    <p>
                      Cordialement,<br>
                      Le Petit Commerce
                    </p>';
        }

        $mail->send();
    }

    public function contact()
    {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                "contact_user_name" => trim($_POST['contact_user_name']),
                "contact_user_email" => (filter_var($_POST['contact_user_email'], FILTER_VALIDATE_EMAIL)) ? trim($_POST['contact_user_email']) : null,
                "contact_user_message" => trim($_POST["contact_user_message"]),
                "contact_user_name_err" => '',
                "contact_user_email_err" => '',
                "contact_user_message_err" => '',
                "contact_err" => true
            ];

            if (empty($data["contact_user_name"])) {
                $data["contact_user_name_err"] = 'Veuillez entrer votre nom et prénom';
            }

            if (empty($_POST['contact_user_email'])) {
                $data["contact_user_email_err"] = 'Veuillez entrer votre adresse e-mail';
            } elseif ($data["contact_user_email"] === null) {
                $data["contact_user_email_err"] = 'L\'email n\'est pas valide';
            }

            if (empty($data["contact_user_message"])) {
                $data["contact_user_message_err"] = 'Veuillez entrer un message';
            }

            if (empty($data["contact_user_name_err"]) && empty($data["contact_user_email_err"]) && empty($data["contact_user_message_err"])) {

                // Instantiation and passing `true` enables exceptions
                $mail = new PHPMailer(true);
                //Server settings
                $mail->isSMTP();                                            // Send using SMTP
                $mail->Host       = 'smtp.phpnet.org';   // Specify main and backup SMTP servers

                $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
                $mail->Username   = 'no-reply@andrei-susai.com';        // SMTP username
                $mail->Password   = 'UMc.00fnl';               // SMTP password

                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
                $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
                //Recipients
                $mail->CharSet = 'UTF-8';
                //Recipients
                $mail->setFrom('no-reply@andrei-susai.com', 'Le Petit Commerce');
                $mail->addReplyTo('no-reply@andrei-susai.com', 'No reply');

                $mail->addAddress("andreisusai14@gmail.com");
                // Content
                $mail->isHTML(true);                                  // Set email format to HTML
                $mail->Subject = 'CONTACT - Le Petit Commerce';
                $mail->Body    = '
                    <h2>Bonjour,</h2>
                    <p>
                      L\'utilisateur ayant l\'adresse e-mail : ' . $data["contact_user_email"] . ' vous a transmis le message ci-dessous.
                    </p>
                    <p>
                    ' . nl2br($data["contact_user_message"]) . '.
                    </p>
                    <p>
                      Cordialement,<br>
                      Le Petit Commerce
                    </p>';
                $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
                $mail->send();

                $data["contact_err"] = false;

                flash('contact_message_success', 'Merci de votre message, nous vous contacteront au plus vite', 'contact_message_success');

                $this->view('pages/index', $data);
            } else {

                $this->view('pages/index', $data);
            }
        }
    }
}
