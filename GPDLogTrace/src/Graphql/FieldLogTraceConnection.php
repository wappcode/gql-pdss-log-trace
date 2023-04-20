<?php

declare(strict_types=1);

namespace GPDLogTrace\Graphql;

use GPDLogTrace\Entities\LogTrace;
use GPDCore\Graphql\GPDFieldFactory;
use GPDCore\Library\IContextService;
use GPDLogTrace\Graphql\Types\LogTraceConnectionTypeFactory;

class FieldLogTraceConnection
{
    /**
     * Recupera el campo LogTraces connection
     * $proxy ejecuta operaciones antes y/o despues de ejecutar el resolver debe ser compatible con la función resolver
     * @param callable|null $proxy 
     * @return GQLField
     */
    public static function get(IContextService $types, ?callable $proxy)
    {
        $connection = LogTraceConnectionTypeFactory::get()();
        return GPDFieldFactory::buildFieldConnection(
            $types, 
            $connection,
            LogTrace::class,  
            LogTrace::RELATIONS_MANY_TO_ONE, 
            $proxy
        );
    }
}
