<?php
declare(strict_types=1);


namespace Eos\Bundle\ComView\Client;

use Eos\Bundle\ComView\Client\Exception\MissingClientException;
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
     */
    public function add(string $name, ComViewClient $apiClient): void
    {
        $this->clients[$name] = $apiClient;
    }

    /**
     * @param string $name
     * @return ComViewClient
     * @throws MissingClientException
     */
    public function getClient(string $name): ComViewClient
    {
        if (array_key_exists($name, $this->clients)) {
            return $this->clients[$name];
        }

        throw new MissingClientException($name);
    }
}
