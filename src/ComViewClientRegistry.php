<?php
declare(strict_types=1);


namespace Eos\Bundle\ComView\Client;

use Eos\ComView\Client\ComViewClient;

/**
 * @author Paul Martin Gütschow <guetschow@esonewmedia.de>
 */
class ComViewClientRegistry implements ComViewClientRegistryInterface
{
    /**
     * @var ComViewClient[]
     */
    private $clients = [];


    /**
     * @param string $name
     * @param ComViewClient $apiClient
     *
     * @return self
     */
    public function addClient(string $name, ComViewClient $apiClient): self
    {
        $this->clients[$name] = $apiClient;

        return $this;
    }

    /**
     * @param string $name
     *
     * @return ComViewClient
     * @throws \RuntimeException
     */
    public function getClient(string $name): ComViewClient
    {
        if (\array_key_exists($name, $this->clients)) {
            return $this->clients[$name];
        }
        throw new \RuntimeException('No client available for "'.$name.'"');
    }
}
