<?php
class Products extends Controller
{
    public function __construct()
    {
        $this->productModel = $this->model('Product');
        $this->scoreModel = $this->model('Score');
    }

    public function index($id)
    {
        $product = $this->productModel->getProductById($id);
        $suggestions = $this->productModel->getProductsSuggestions($id, $product->titre);
        $avis = $this->scoreModel->getScores($id);


        $data = [
            "product" => $product,
            "suggestions" => $suggestions,
            "avis" => $avis
        ];

        $this->view('products/index', $data);
    }

    public function search()
    {
        // Check if Post
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanitize the Post
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                "critere" => trim($_POST['critere']),
                "critere_err" => ''
            ];

            // Check if empty Post
            if (empty($data['critere'])) {
                $data['critere_err'] =  'Veuillez entrer le nom d\'un article...';
                $this->view('products/search', $data);
            } else {
                // Check if there is a match
                if (!$this->productModel->getSearchingProduct($data['critere'])) {
                    $data['critere_err'] = 'Nous sommes désolés, mais il n\'y a pas de produits correspondant à votre recherche...';
                    $this->view('products/search', $data);
                }
            }

            if (empty($data['critere_err'])) {
                // Execute
                if (!empty($this->productModel->getSearchingProduct($data['critere']))) {
                    $data = [
                        "items" => $this->productModel->getSearchingProduct($data['critere'])
                    ];
                    // Redirect to search page
                    flash('search_success', 'Résultas de votre recherche', "search_success_done");
                    $this->view('products/search', $data);
                } else {
                    die('Désolé, il semble qu\'il y ait eu une erreur...');
                }
            }
        }
    }

    public function settingCart()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanitize the Post
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data_post_product_cart = [
                "color" => trim($_POST['color']),
                "size" => trim($_POST['size']),
                "product_id" => trim($_POST['product_id']),
                "quantity" => trim($_POST['quantity']),
                "color_err" => '',
                "size_err" => '',
                "quantity_err" => ''
            ];

            if ($this->productModel->getProductCartById($data_post_product_cart['product_id'])) {

                $data_cart = [
                    "cart" => $this->productModel->getProductCartById($data_post_product_cart['product_id'])
                ];

                $this->addCart($data_post_product_cart['color'], $data_post_product_cart['size'], $data_post_product_cart['product_id'],   $data_cart['cart']->titre, $data_cart['cart']->categorie, $data_post_product_cart['quantity'], $data_cart['cart']->prix, $data_cart['cart']->photo);

                // Load updated view
                if ($this->productModel->getProductById($data_post_product_cart['product_id'])) {

                    $product = $this->productModel->getProductById($data_post_product_cart['product_id']);

                    $suggestions = $this->productModel->getProductsSuggestions($data_post_product_cart['product_id'], $product->titre);
                    $avis = $this->scoreModel->getScores($data_post_product_cart['product_id']);

                    $data = [
                        "product" => $product,
                        "suggestions" => $suggestions,
                        "avis" => $avis
                    ];

                    flash('cart_set', '<a href="' . URLROOT . '/products/cart" id="link-cart-set-done">Voir le panier</a>', 'cart_set_done');
                    $this->view('products/index', $data);
                } else {
                    die('Désolé, il semble qu\'il y ait eu une erreur... Veuillez réessayer !');
                }
            } else {
                die('Désolé, il semble qu\'il y ait eu une erreur... Veuillez réessayer !');
            }
        }
    }

    // Create cart
    function createCart()
    {
        if (empty($_SESSION['cart'])) {
            $_SESSION['cart'] = array();
            $_SESSION['cart']['color'] = array();
            $_SESSION['cart']['size'] = array();
            $_SESSION['cart']['product_id'] = array();
            $_SESSION['cart']['titre'] = array();
            $_SESSION['cart']['categorie'] = array();
            $_SESSION['cart']['quantity'] = array();
            $_SESSION['cart']['prix'] = array();
            $_SESSION['cart']['photo'] = array();
        }
    }

    // Add to cart
    public function addCart($color, $size, $product_id, $titre, $categorie, $quantity, $prix, $photo)
    {
        $this->createCart();
        $product_position = array_search($product_id, $_SESSION['cart']['product_id']);

        if ($product_position === false) {
            $_SESSION['cart']['color'][] = $color;
            $_SESSION['cart']['size'][] = $size;
            $_SESSION['cart']['product_id'][] = $product_id;
            $_SESSION['cart']['titre'][] = $titre;
            $_SESSION['cart']['categorie'][] = $categorie;
            $_SESSION['cart']['quantity'][] = $quantity;
            $_SESSION['cart']['prix'][] = $prix;
            $_SESSION['cart']['photo'][] = $photo;
        } else {
            $_SESSION['cart']['color'][$product_position] .= ", " . $color;
            $_SESSION['cart']['size'][$product_position] .= ", " . $size;
            $_SESSION['cart']['quantity'][$product_position] += $quantity;
        }
    }

    // Load cart view
    public function cart()
    {
        $this->view('products/cart', $data = []);
    }

    // Retire from cart
    public function retireProductCart()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $product_id = trim($_POST['product_id']);
            $product_position = array_search($product_id, $_SESSION['cart']['product_id']);

            if ($product_position !== false) {

                array_splice($_SESSION['cart']['color'], $product_position, 1);
                array_splice($_SESSION['cart']['size'], $product_position, 1);
                array_splice($_SESSION['cart']['product_id'], $product_position, 1);
                array_splice($_SESSION['cart']['titre'], $product_position, 1);
                array_splice($_SESSION['cart']['categorie'], $product_position, 1);
                array_splice($_SESSION['cart']['quantity'], $product_position, 1);
                array_splice($_SESSION['cart']['prix'], $product_position, 1);
                array_splice($_SESSION['cart']['photo'], $product_position, 1);

                flash('cart_retire_product', 'Votre produit a été retiré avec succès', 'cart_retire_product_done');

                $data = [
                    'check_cart_retire_product' => true
                ];

                $this->view('products/cart', $data);
            }
        }
    }

    public function validatecart()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $data = [
                "user_id" => trim($_POST['user_id']),
                "user_id_err" => ''
            ];

            if (empty($data["user_id"])) {
                $data["user_id_err"] = "Veuillez vous <a href='" . URLROOT . "/users/login' class='err-link-before-validate-cart'>connecter</a> ou vous <a href='" . URLROOT . "/users/register' class='err-link-before-validate-cart'>inscrire</a> afin de poursuivre votre commande";

                $this->view('products/cart', $data);
            }

            if (empty($data['user_id_err'])) {

                $this->view('products/validatecart', $data);
            }
        }
    }
}
