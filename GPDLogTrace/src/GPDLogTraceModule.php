<?php

namespace GPDLogTrace;

use GPDCore\Graphql\GPDFieldFactory;
use GPDCore\Library\AbstractModule;
use GPDLogTrace\Entities\LogTrace;
use GPDLogTrace\Graphql\FieldLogTraceConnection;
use GPDLogTrace\Graphql\Types\LogTraceConnectionTypeFactory;
use GPDLogTrace\Graphql\Types\LogTraceEdgeTypeFactory;

class GPDLogTraceModule extends AbstractModule
{

    protected $defaultQueryProxy = null;

    /**
     * Array con la configuración del módulo
     *
     * @return array
     */
    function getConfig(): array
    {
        return require(__DIR__ . '/../config/module.config.php');
    }

    function getServicesAndGQLTypes(): array
    {
        return [
            'factories' => [
                'LogTraceEdge' => LogTraceEdgeTypeFactory::get($this->context, 'LogTraceEdge', ''),
                'LogTraceConnection' => LogTraceConnectionTypeFactory::get($this->context, 'LogTraceConnection'),
            ]
        ];
    }
    /**
     * Array con los resolvers del módulo
     *
     * @return array array(string $key => callable $resolver)
     */
    function getResolvers(): array
    {
        return [];
    }
    /**
     * Array con los graphql Queries del módulo
     *
     * @return array
     */
    function getQueryFields(): array
    {
        return [
            'logTraceConnection' => FieldLogTraceConnection::get($this->context, $this->defaultQueryProxy),
            'logTrace' => GPDFieldFactory::buildFieldItem($this->context, LogTrace::class, LogTrace::RELATIONS_MANY_TO_ONE, $this->defaultQueryProxy)
        ];
    }
    /**
     * Array con los graphql mutations del módulo
     *
     * @return array
     */
    function getMutationFields(): array
    {
        return [];
    }
}
