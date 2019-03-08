<?php
declare(strict_types=1);

namespace Eos\Bundle\ComView\Client;


use Eos\Bundle\ComView\Client\Exception\MissingClientException;
use Eos\ComView\Client\ComViewClient;

/**
 * @author Paul Martin Gütschow <guetschow@esonewmedia.de>
 */
interface ComViewClientRegistryInterface
{
    /**
     * @param string $name
     *
     * @return ComViewClient
     * @throws MissingClientException
     */
    public function getClient(string $name): ComViewClient;
}
