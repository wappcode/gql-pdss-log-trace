<?php

namespace GPDLogTrace\Graphql;

use GPDCore\Library\EntityBuffer;
use GPDLogTrace\Entities\LogTrace;

class BufferLogTrace{
    
    private static $instance;

    public static function getInstance(): EntityBuffer
    {

        if (static::$instance === null) {
            static::$instance = new EntityBuffer(LogTrace::class, LogTrace::RELATIONS_MANY_TO_ONE);
        }
        return static::$instance;
       
    }
}