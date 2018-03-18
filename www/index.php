<?php
// Call require file
require __DIR__.'/../vendor/autoload.php';
require __DIR__.'/../config/ldap.php';

// Call class that use for login
use Ldap\Auth\Login;
use Adldap\Adldap;

$adldap = new Adldap();

$login = new Login($adldap, $config);

// Authenticate user LDAP
var_dump($login->authenticate('zaky0001', 'passwd123123'));

// If authenticated get data user from LDAP
print_r($login->getUser());