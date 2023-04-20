<?php

namespace GPDLogTrace\Graphql\Types;

use GraphQL\Doctrine\Types;
use GPDLogTrace\Entities\LogTrace;
use GPDCore\Library\ICustomTypeFactory;
use GPDCore\Graphql\ConnectionTypeFactory;
use GPDCore\Library\AbstractCustomTypeFactory;
use GPDCore\Library\IContextService;
use GraphQL\Type\Definition\ObjectType;
use GPDLogTrace\Graphql\Types\LogTraceEdgeTypeFactory;

class LogTraceConnectionTypeFactory extends AbstractCustomTypeFactory{


    private static  $type = null;
    protected static $name = null;
    protected static $description = '';
    protected static $context;

    public static function get(?IContextService $context = null, ?string $name = null, ?string $description = null): callable {
        static::setValues($context, $name, $description);
        return function ()  {
            $context = static::$context;
            $types = $context->getTypes();
            $name = static::$name;
            $description = static::$description;
            $edgeType = LogTraceEdgeTypeFactory::get()();
        if (static::$type === null) {
            static::$type = ConnectionTypeFactory::createConnectionType($context, $edgeType, $name, $description);
        } 
        return static::$type;
        };
    }



}