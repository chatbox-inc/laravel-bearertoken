<?php


namespace Chatbox\Laravel\BearerAuth;


interface Authenticatable
{
    public function authWithToken(string $token):?Authenticatable;

}
