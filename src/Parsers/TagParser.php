<?php

namespace Acme\Parsers;

class TagParser
{
    public function parse( $string ){
        return preg_split("/ ?[|,] ?/" , $string );
    }
}
