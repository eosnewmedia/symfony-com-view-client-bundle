<?php
declare(strict_types=1);


namespace Eos\Bundle\ComView\Client\DependencyInjection;

use Psr\Http\Client\ClientInterface;
use Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition;
use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * @author Paul Martin Gütschow <guetschow@esonewmedia.de>
 */
class Configuration implements ConfigurationInterface
{

    /**
     * @return TreeBuilder|\Symfony\Component\Config\Definition\Builder\TreeBuilder
     */
    public function getConfigTreeBuilder(): TreeBuilder
    {
        $treeBuilder = new TreeBuilder();

        $root = $treeBuilder->root('eos_com_view_client')->children();

        /** @var ArrayNodeDefinition $clients */
        $clients = $root->arrayNode('clients')
            ->useAttributeAsKey('name')
            ->requiresAtLeastOneElement()
            ->prototype('array');

        $client = $clients->addDefaultsIfNotSet()->children();

        $client->scalarNode('base_uri')
            ->isRequired()
            ->cannotBeEmpty()
            ->info('The base uri which should be used on api calls.');

        $client->scalarNode('http_client')
            ->defaultValue(ClientInterface::class)
            ->info('The http client for this api client instance.');

        return $treeBuilder;
    }


}
