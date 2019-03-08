<?php
declare(strict_types=1);

namespace Eos\Bundle\ComView\Client\Exception;

use Eos\ComView\Client\Exception\ComViewException;

/**
 * @author Philipp Marien <marien@eosnewmedia.de>
 */
class MissingClientException extends ComViewException
{
    /**
     * @param string $name
     */
    public function __construct(string $name)
    {
        parent::__construct('Missing com view client "' . $name . '"');
    }
}
