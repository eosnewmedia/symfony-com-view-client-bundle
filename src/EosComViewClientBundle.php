<?php
declare(strict_types=1);


namespace Eos\Bundle\ComView\Client;


use Eos\Bundle\ComView\Client\DependencyInjection\Compiler\ComViewClientPass;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

/**
 * @author Paul Martin Gütschow <guetschow@esonewmedia.de>
 */
class EosComViewClientBundle extends Bundle
{
    /**
     * @param ContainerBuilder $container
     */
    public function build(ContainerBuilder $container): void
    {
        $container->addCompilerPass(new ComViewClientPass());
    }
}
