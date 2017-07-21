<?php

namespace Acme\Parsers;

class TagParser
{
    public function parse( $string ){
        return explode("," , $string );
    }
}
