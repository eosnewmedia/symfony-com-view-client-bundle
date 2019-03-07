<?php
declare(strict_types=1);


namespace Eos\Bundle\ComView\Client\DependencyInjection;

use Eos\Bundle\ComView\Client\ComViewClientRegistry;
use Eos\Bundle\ComView\Client\ComViewClientRegistryInterface;
use Eos\ComView\Client\ComViewClient;
use Symfony\Component\DependencyInjection\ContainerBuilder;
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

        $registry = $container->autowire(ComViewClientRegistry::class)->setPublic(false);
        $container->setAlias(ComViewClientRegistryInterface::class, ComViewClientRegistry::class)->setPublic(true);

        foreach ($mergedConfig['clients'] as $name => $config) {

            $client = $container
                ->autowire('enm.com_view_client.'.$name, ComViewClient::class)
                ->setArgument('$baseUrl', $config['base_uri'])
                ->setPublic(false);

            $registry->addMethodCall(
                'addClient',
                [$name, $client,]
            );
        }

    }


}
