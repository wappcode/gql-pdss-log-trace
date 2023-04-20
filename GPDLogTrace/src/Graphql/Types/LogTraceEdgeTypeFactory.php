<?php

namespace GPDLogTrace\Graphql\Types;

use GPDLogTrace\Entities\LogTrace;
use GPDCore\Graphql\ConnectionTypeFactory;
use GPDCore\Library\AbstractCustomTypeFactory;
use GPDCore\Library\IContextService;

class LogTraceEdgeTypeFactory extends AbstractCustomTypeFactory{

    protected static $name = null;
    protected static $description = '';
    protected static $context;

    private static  $type = null;

    public  static function get(?IContextService $context = null, ?string $name = null, ?string $description = null): callable {
        static::setValues($context, $name, $description);
        return function () {
            $context = static::$context;
            $types = $context->getTypes();
            $name = static::$name;
            $description = static::$description;
            if (static::$type === null) {
                static::$type = ConnectionTypeFactory::createEdgeType($types->getOutput(LogTrace::class), $name, $description);
            } 
            return static::$type;
        };
    }
}