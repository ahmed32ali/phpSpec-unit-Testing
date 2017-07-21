<?php namespace spec\Acme\Oauth;

use Acme\Oauth\RegisterUser;
use Acme\UserRepository;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use \Acme\Mailer ;

class RegisterUserSpec extends ObjectBehavior
{
    private $repo;

    private $mailer;

    function let( UserRepository $user , \Acme\Mailer $mailer ){
        $this->beConstructedWith( $user , $mailer ) ;
        $this->repo = $user;
        $this->mailer = $mailer;
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(RegisterUser::class);
    }

    function it_registers_a_user(){
        $user = ["name"=>"ahmed ali" , "email" => "my_email@gmail.com"] ;

        $this->repo->create( $user )->shouldBeCalled();

        $this->register( $user ) ;
    }

    function it_sends_welcome_email()
    {
        $user = ["name"=>"ahmed ali" , "email" => "my_email@gmail.com"] ;

        $this->mailer->sendWelcomeEmail( $user["email"] )->shouldBeCalled() ;

        $this->register( $user ) ;
    }
}
