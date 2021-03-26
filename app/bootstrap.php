<?php
// Load Config
require_once 'config/config.php';

// Load PhpMailer

require_once 'PHPMailer/src/Exception.php';
require_once 'PHPMailer/src/PHPMailer.php';
require_once 'PHPMailer/src/SMTP.php';

// Load vendor Stripe Payment
require_once 'vendor/autoload.php';
// Load helpers
require_once 'helpers/session_helper.php';
require_once 'helpers/url_helper.php';
// Autoload Core Libraries
spl_autoload_register(function ($className) {
  require_once 'libraries/' . $className . '.php';
});
