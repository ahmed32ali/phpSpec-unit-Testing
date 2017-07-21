<?php

namespace Acme\Oauth;

use \Acme\Mailer;
use \Acme\UserRepository ;

class RegisterUser
{

    public $repository ;
    public $mailer ;

    function __construct( UserRepository $UserRepository , \Acme\Mailer $mailer)
    {
        $this->repository = $UserRepository ;
        $this->mailer = $mailer ;
    }

    public function register( $user )
    {
        $this->repository->create( $user );
        $this->mailer->sendWelcomeEmail( $user["email"] );
    }

}
