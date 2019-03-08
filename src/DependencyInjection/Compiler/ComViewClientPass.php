<?php
declare(strict_types=1);

namespace Eos\Bundle\ComView\Client\DependencyInjection\Compiler;

use Eos\Bundle\ComView\Client\ComViewClientRegistry;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;

/**
 * @author Philipp Marien <marien@eosnewmedia.de>
 */
class ComViewClientPass implements CompilerPassInterface
{
    /**
     * @param ContainerBuilder $container
     */
    public function process(ContainerBuilder $container): void
    {
        if (!$container->hasDefinition(ComViewClientRegistry::class)) {
            return;
        }

        $registry = $container->getDefinition(ComViewClientRegistry::class);

        foreach ($container->findTaggedServiceIds('com_view.client') as $id => $tags) {
            foreach ($tags as $tag) {
                $registry->addMethodCall('add', [$tag['client'], $id]);
            }
        }
    }
}
