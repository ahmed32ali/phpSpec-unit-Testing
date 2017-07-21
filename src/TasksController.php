<?php

namespace Acme;

use Acme\Authorizer ;

class TasksController
{
    private $authorizer ;
    private $taskRepository ;

    function __construct( Authorizer $authorizer , taskRepository $taskRepository )
    {
        $this->authorizer = $authorizer ;
        $this->taskRepository = $taskRepository ;
    }

    public function createTask( $task ){
        if( $this->authorizer->guest() ){
            return "redirect" ;
        }
    }


    public function store( $task )
    {
        $this->taskRepository->store( $task );
    }

}
