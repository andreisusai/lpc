<?php

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;

class Payments extends Controller
{

    public function __construct()
    {
        $this->paymentModel = $this->model('Payment');
    }

    public function index()
    {

        if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST["token"])) {

            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $stripePayment = new StripePayment();

            $stripeResponse = $stripePayment->chargeAmountFromCard($_POST);

            if ($stripeResponse['amount_refunded'] == 0 && empty($stripeResponse['failure_code']) && $stripeResponse['paid'] == 1 && $stripeResponse['captured'] == 1 && $stripeResponse['status'] == 'succeeded') {

                $data = [
                    "email" => trim($_POST['email']),
                    "item_number" => trim($_POST['item_number']),
                    "amount" => $stripeResponse["amount"] / 100,
                    "currency_code" => $stripeResponse["currency"],
                    "txn_id" => $stripeResponse["balance_transaction"],
                    "payment_status" => $stripeResponse["status"],
                    "payment_response" => json_encode($stripeResponse)
                ];

                if ($this->paymentModel->registerOrder($data)) {

                    $total = totalCart();

                    $order_id =  $this->paymentModel->insertOrder($_SESSION['user_id'], $total);

                    // Iteration cart 
                    for ($i = 0; $i < count($_SESSION['cart']['product_id']); $i++) {

                        $product_id = $_SESSION['cart']['product_id'][$i];
                        $quantity = $_SESSION['cart']['quantity'][$i];
                        $prix = $_SESSION['cart']['prix'][$i];

                        $this->paymentModel->setOrderDetails($order_id, $product_id, $quantity, $prix);

                        $this->paymentModel->setStock($product_id, $quantity);

                        $this->paymentModel->setBestSeller($product_id, $quantity);
                    }

                    // Unset the cart
                    unset($_SESSION['cart']);

                    if ($_SESSION['user_email'] == $data["email"]) {
                        // Send e-mail order confirmation
                        $this->setMailOrderConfirmation($_SESSION['user_email'], $_SESSION['user_prenom'], $_SESSION['user_nom'], $order_id);
                    } else {
                        $this->setMailOrderConfirmation($data["email"], $_SESSION['user_prenom'], $_SESSION['user_nom'], $order_id);
                        $case = 2;
                        $this->setMailOrderConfirmation($_SESSION['user_email'], $_SESSION['user_prenom'], $_SESSION['user_nom'], $order_id, $case);
                    }

                    flash('stripe_payment', 'Votre paiement a été traité avec succès <br> Merci pour vos achats !', 'stripe-payment-success-message');

                    // $data_payment = [
                    //     "success_message" => true
                    // ];

                    redirect('orders/index');
                    // $this->view('orders/index', $data_payment);
                }
            }
        }
    }

    public function verifyorder()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                "product_id" => trim($_POST["product_id"]),
                "check_product" => true,
                "quantity_err" => '',
                "stock_err" => '',
                "prix_err" => ''
            ];

            if (!empty($data["product_id"])) {
                for ($i = 0; $i < count($_SESSION['cart']['product_id']); $i++) {

                    $product = $this->paymentModel->getProductById($_SESSION['cart']['product_id'][$i]);

                    if ($_SESSION['cart']['quantity'][$i] > 5) {
                        $data["check_product"] = false;
                    }

                    if ($product->stock < $_SESSION['cart']['quantity'][$i]) {
                        $data["check_product"] = false;
                    }

                    if ($_SESSION['cart']['prix'][$i] != $product->prix) {
                        $data["check_product"] = false;
                    }
                }
            }

            if ($data["check_product"] === true) {
                $this->view('payments/index', $data);
            } else {

                // Regulate cart for security buying

                for ($i = 0; $i < count($_SESSION['cart']['product_id']); $i++) {

                    $product = $this->paymentModel->getProductById($_SESSION['cart']['product_id'][$i]);

                    if ($_SESSION['cart']['quantity'][$i] > 5) {
                        $_SESSION['cart']['quantity'][$i] = 5;
                        $data["quantity_err"] = 'La quantité a été réajustée dans la limite de 5 maximum par article';
                    }

                    if ($product->stock < $_SESSION['cart']['quantity'][$i]) {
                        $_SESSION['cart']['quantity'][$i] = $product->stock;
                        $data["stock_err"] = 'La quantité a été réajustée en fonction du stock';
                    }

                    if ($_SESSION['cart']['prix'][$i] != $product->prix) {
                        $_SESSION['cart']['prix'][$i] = $product->prix;
                        $data["prix_err"] = 'Le prix a été réactualisé';
                    }
                }

                flash('stock_price_contrast_products', 'La commande n\'a pas été validée en raison de modifications concernant le stock ou les prix des produits de votre panier. Merci de valider à nouveau votre panier après vérification.', 'message-stock_price_contrast_products');

                $this->view('products/cart', $data);
            }
        }
    }

    public function setMailOrderConfirmation($email, $firstName, $lastName, $order_id, $case = 1)
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
            $mail->addAddress($email);
            // Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'Confirmation de commande - Le Petit Commerce';
            $mail->Body    = '
                <h1>Confirmation de votre commande</h1>
                
                <h2>Bonjour ' . ucfirst($firstName) . ' ' . ucfirst($lastName) . '</h2>
                <p>
                Merci pour votre commande. Votre numéro de suivi est ' . $order_id . '. 
                </p>
                <p>
                  Pour tout complément d\'informations veuillez nous écrire dans la rubrique
                  <a href="' . URLROOT . '">contact</a> sur notre site.
                </p>
                <p>
                  Cordialement,<br>
                  Le Petit Commerce
                </p>';
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
        } else {
            $mail->addAddress("andreisusai14@gmail.com");
            $mail->isHTML(true);
            $mail->Subject = 'Erreur Mail Commande - Le petit commerce';
            $mail->Body    = '
                <h1>L\'email n\'est pas celui de l\'utilisateur</h1>
                
                <h2>Bonjour Andrei Susai</h2>
                <p>
                  Il semblerait que l\'email : ' . $email . ' <br>
                  ne correspond pas à l\'utilisateur : ' . $firstName . ' ' . $lastName . '. 
                </p>
                <p>
                  Cordialement,<br>
                  Le Petit Commerce
                </p>';
        }

        $mail->send();
    }
}
