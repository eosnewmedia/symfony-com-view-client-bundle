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
        $container->autowire(ComViewClientRegistry::class)->setPublic(false);
        $container->setAlias(ComViewClientRegistryInterface::class, ComViewClientRegistry::class)->setPublic(false);

        foreach ($mergedConfig['clients'] as $name => $config) {
            $serviceId = 'eos.com_view.client.' . $name;

            $container->autowire($serviceId, ComViewClient::class)
                ->setArgument('$baseUrl', $config['base_uri'])
                ->setPublic(false)
                ->addTag('com_view.client', ['client' => $name]);

            if (!$container->hasDefinition(ComViewClient::class) && !$container->hasAlias(ComViewClient::class)) {
                $container->setAlias(ComViewClient::class, $serviceId)->setPublic(false);
            }
        }
    }
}
