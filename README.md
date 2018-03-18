# ldap-authentication
This repo is used for authenticate user via LDAP using [Adldap2 Package](https://github.com/Adldap2/Adldap2)

## Installation

### Requirements

To use this repo, your server must support:

- PHP 5.5.9 or greater
- PHP LDAP Extension
- An LDAP Server

### Installing

- Clone this repo
- Run `composer install`
- Run `cp config/config.example.php config/config.php`
- Set configuration that match with your LDAP server.
