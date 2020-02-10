<?php

/**
 * This file is part of prooph/event-store.
 * (c) 2014-2020 Alexander Miertsch <kontakt@codeliner.ws>
 * (c) 2015-2020 Sascha-Oliver Prolic <saschaprolic@googlemail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Prooph\EventStore\Exception;

class MaxQueueSizeLimitReached extends RuntimeException
{
    public static function with(string $connectionName, int $maxQueueSize): MaxQueueSizeLimitReached
    {
        return new self(
            \sprintf(
                'EventStoreNodeConnection \'%s\': reached max queue size limit: \'%s\'',
                $connectionName,
                $maxQueueSize
            )
        );
    }
}
