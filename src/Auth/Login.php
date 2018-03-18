<?php

namespace Ldap\Auth;

use Adldap\Adldap;
use Adldap\Models\ModelNotFoundException;
use Ldap\Contract\Auth\Login as LoginContract;
use Ldap\Hashing\BcryptHasher;

class Login implements LoginContract
{
    private $connection;
    private $bcrypt;
    private $record;

    public function __construct(Adldap $adldap, $config)
    {
        $adldap->addProvider($config);
        $this->connection = $adldap->connect();
        $this->bcrypt = new BcryptHasher();
    }

    public function authenticate($username, $password)
    {
       try{
           $record = $this->connection->search()->findByOrFail('uid', $username);
       }catch (ModelNotFoundException $e){
           return false;
       }

       if ($this->bcrypt->check($password, $record->userpassword[0])){
           $this->record = $record;
           return true;
       }

       return false;
    }

    public function getUser()
    {
        return [
            'cn' => $this->record->cn,
            'gidnumber' => $this->record->gidnumber,
            'homedirectory' => $this->record->homedirectory,
            'uidnumber' => $this->record->uidnumber,
            'mail' => $this->record->mail,
            'objectclass' => $this->record->objectclass,
            'uid' => $this->record->uid,
        ];
    }
}