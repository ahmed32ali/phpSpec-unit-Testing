<?php

namespace spec\Acme;

use Acme\TasksController;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Acme\Authorizer ;

class TasksControllerSpec extends ObjectBehavior
{

    function let( \Acme\Authorizer $authorizer ){
        $this->beConstructedWith( $authorizer ) ;
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(TasksController::class);
    }

    function it_disallows_guest_from_creating_tasks( \Acme\Authorizer $authorizer)
    {
        $authorizer->guest()->willReturn( true ) ;

        // I prefer making this object of class called task but gor the sake if understanding how stubs work in testing
        // I will assume it's array
        $task = ["name" => "task name" , "desc" => "task description"] ;

        $this->createTask( $task )->shouldReturn( "redirect" ) ;
    }

}
