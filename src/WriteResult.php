<?php

/**
 * This file is part of prooph/event-store.
 * (c) 2014-2018 prooph software GmbH <contact@prooph.de>
 * (c) 2015-2018 Sascha-Oliver Prolic <saschaprolic@googlemail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Prooph\EventStore;

class WriteResult
{
    /** @var int */
    private $nextExpectedVersion;
    /** @var Position */
    private $logPosition;

    public function __construct(int $nextExpectedVersion, Position $logPosition)
    {
        $this->nextExpectedVersion = $nextExpectedVersion;
        $this->logPosition = $logPosition;
    }

    public function nextExpectedVersion(): int
    {
        return $this->nextExpectedVersion;
    }

    public function logPosition(): Position
    {
        return $this->logPosition;
    }
}