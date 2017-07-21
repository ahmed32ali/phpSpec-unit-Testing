<?php

namespace spec\Acme;

use Acme\TasksController;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Acme\Authorizer ;
use Acme\taskRepository ;

class TasksControllerSpec extends ObjectBehavior
{

    function let( \Acme\Authorizer $authorizer , \Acme\taskRepository $taskRepository ){
        $this->beConstructedWith( $authorizer , $taskRepository ) ;
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(TasksController::class);
    }

    function it_disallows_guest_from_creating_tasks( \Acme\Authorizer $authorizer , \Acme\taskRepository $taskRepository)
    {
        $authorizer->guest()->willReturn( true ) ;

        // I prefer making this object of class called task but gor the sake if understanding how stubs work in testing
        // I will assume it's array
        $task = ["name" => "task name" , "desc" => "task description"] ;


        $this->createTask( $task )->shouldReturn( "redirect" ) ;


        $this->store( $task ) ;

        // mock
        $taskRepository->store( $task )->shouldBeCalled() ;
    }

}
