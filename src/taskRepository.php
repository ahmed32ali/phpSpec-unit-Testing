<?php
/**
 * Created by PhpStorm.
 * User: ahmed
 * Date: 22/07/17
 * Time: 01:05 ص
 */

namespace Acme;


interface taskRepository
{
    public function store( array $task) ;
}