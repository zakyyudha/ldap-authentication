<?php
// Call require file
require __DIR__.'/../vendor/autoload.php';
require __DIR__.'/../config/ldap.php';

// Call class that use for login
use Ldap\Auth\Login;
use Adldap\Adldap;

$adldap = new Adldap();

$login = new Login($adldap, $config);

// User credentials
$username = 'some-username';
$password = 'some-password';

// Authenticate user from LDAP
var_dump($login->authenticate($username, $password));

// If authenticated get user data from LDAP
print_r($login->getUser());