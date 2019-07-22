<?php
declare(strict_types=1);

namespace Eos\Bundle\ComView\Client\Exception;

use RuntimeException;

/**
 * @author Philipp Marien <marien@eosnewmedia.de>
 */
class MissingClientException extends RuntimeException
{
    /**
     * @param string $name
     */
    public function __construct(string $name)
    {
        parent::__construct('Missing com view client "' . $name . '"');
    }
}
