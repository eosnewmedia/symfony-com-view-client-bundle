<?php
declare(strict_types=1);

namespace Eos\Bundle\ComView\Client;


use Eos\ComView\Client\ComViewClient;

/**
 * @author Paul Martin Gütschow <guetschow@esonewmedia.de>
 */
interface ComViewClientRegistryInterface
{
    /**
     * @param string $name
     * @param ComViewClient $apiClient
     *
     * @return \Eos\Bundle\ComView\Client\ComViewClientRegistry
     */
    public function addClient(string $name, ComViewClient $apiClient): ComViewClientRegistry;

    /**
     * @param string $name
     *
     * @return ComViewClient
     * @throws \RuntimeException
     */
    public function getClient(string $name): ComViewClient;
}
