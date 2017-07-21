<?php

namespace Acme;

use Acme\Authorizer ;

class TasksController
{
    private $authorizer ;

    function __construct( Authorizer $authorizer )
    {
        $this->authorizer = $authorizer ;
    }

    public function createTask( $task ){
        if( $this->authorizer->guest() ){
            return "redirect" ;
        }
    }
}
