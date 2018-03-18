<?php

namespace Ldap\Contract\Auth;

interface Login
{
    public function authenticate($username, $password);
}