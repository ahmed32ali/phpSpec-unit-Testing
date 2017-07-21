<?php

namespace spec\Acme\Parsers;

use Acme\Parsers\TagParser;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class TagParserSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(TagParser::class);
    }

    function it_parsers_tags_spearated_by_comma_into_array()
    {
        $this->parse("welcome,ahmed,ali")->shouldReturn( ["welcome" ,"ahmeda" ,"ali"] );
    }

}
