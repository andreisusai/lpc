<?php
// DB Params local
define("DB_HOST", "localhost");
define("DB_USER", "root");
define("DB_PASS", "root");
define("DB_NAME", "boutique");

// DB Params extern

// define("DB_HOST", "cl1-sql11");
// define("DB_USER", "zvx31493");
// define("DB_PASS", "hB8Ss4g=t");
// define("DB_NAME", "zvx31493");

// App Root
define('APPROOT', dirname(dirname(__FILE__)));
// URL Root
// define('URLROOT', 'https://zvx3149.webmo.fr');
define('URLROOT', 'http://localhost:8888/lpc');
// Site Name
define('SITENAME', 'Le Petit Commerce');
// SALT
define('SALT', '_l3P3t!tC0mmer5e');

// API STRIPE credentials
define("STRIPE_SECRET_KEY", "sk_test_51HjjOBLtJ0lgM2lYPaSafdOXOXTXkVNZT0mta5o8nE5l0Uq964TcHFxayJyMQVMPaD9fII670a9fjceU3lXsOa2e00dCfGQNLs");
define("STRIPE_PUBLISHABLE_KEY", "pk_test_51HjjOBLtJ0lgM2lY0tiWE1kYpaIzoIicARWZHqXmlabsHHMNZR224YT55aJYGDL0IR9gC2d5jkjBaAOnLN2YMWtn00J2nb9EVM");

/* Token life 30 minutes */
define("TKN_TTL", 1800);

// Folder for user's image

define('USERS_IMAGES', "/lpc/public/img/users/");
// define('USERS_IMAGES', "/public/img/users/");
