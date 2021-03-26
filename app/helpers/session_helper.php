<?php
session_start();

// Flash message helper
function flash($name = '', $message = '', $class = 'alert alert-success')
{
    if (!empty($name)) {
        //No message, create it
        if (!empty($message) && empty($_SESSION[$name])) {
            if (!empty($_SESSION[$name])) {
                unset($_SESSION[$name]);
            }
            if (!empty($_SESSION[$name . '_class'])) {
                unset($_SESSION[$name . '_class']);
            }
            $_SESSION[$name] = $message;
            $_SESSION[$name . '_class'] = $class;
        }
        //Message exists, display it
        elseif (!empty($_SESSION[$name]) && empty($message)) {
            $class = !empty($_SESSION[$name . '_class']) ? $_SESSION[$name . '_class'] : 'success';
            echo '<div class="' . $class . '" id="msg-flash">' . $_SESSION[$name] . '</div>';
            unset($_SESSION[$name]);
            unset($_SESSION[$name . '_class']);
        }
    }
}

// Calculate total cart
function totalCart()
{
    $total = 0;

    for ($i = 0; $i < count($_SESSION['cart']['product_id']); $i++) {
        $total += $_SESSION['cart']['quantity'][$i] * $_SESSION['cart']['prix'][$i];
    }

    return $total;
}

// Count the number of products in the cart
function numberOfProductsCart()
{
    $numbers = '';
    if (isset($_SESSION['cart']['product_id'])) {
        $numbers = array_sum($_SESSION['cart']['quantity']);
        if ($numbers != 0) {
            $numbers = $numbers;
        } else {
            $numbers = '';
        }
    }
    return $numbers;
}
