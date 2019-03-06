<?php
declare(strict_types=1);


namespace Eos\Bundle\ComView\Client\DependencyInjection;

use Eos\ComView\Client\ComViewClient;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;
use Symfony\Component\HttpKernel\DependencyInjection\ConfigurableExtension;

/**
 * @author Paul Martin Gütschow <guetschow@esonewmedia.de>
 */
class EosComViewClientExtension extends ConfigurableExtension
{

    /**
     * @param array $mergedConfig
     * @param ContainerBuilder $container
     */
    protected function loadInternal(array $mergedConfig, ContainerBuilder $container): void
    {

        foreach ($mergedConfig['clients'] as $name => $config) {

            $container
                ->autowire('enm.com_view_client.' . $name, ComViewClient::class)
                ->setArgument('$baseUrl', $config['base_uri'])
                ->setArgument('$httpClient', new Reference($config['http_client']))
                ->setPublic(false);
        }

    }


}
