<?php

/**
 * This file is part of prooph/event-store.
 * (c) 2014-2021 Alexander Miertsch <kontakt@codeliner.ws>
 * (c) 2015-2021 Sascha-Oliver Prolic <saschaprolic@googlemail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Prooph\EventStore\Async;

use Amp\Promise;
use Prooph\EventStore\EventId;
use Prooph\EventStore\Internal\ResolvedEvent;
use Prooph\EventStore\PersistentSubscriptionNakEventAction;

interface EventStorePersistentSubscription
{
    public const DEFAULT_BUFFER_SIZE = 10;

    /**
     * Acknowledge that a message have completed processing (this will tell the server it has been processed)
     * Note: There is no need to ack a message if you have Auto Ack enabled
     */
    public function acknowledge(ResolvedEvent $event): void;

    /**
     * Acknowledge that a message have completed processing (this will tell the server it has been processed)
     * Note: There is no need to ack a message if you have Auto Ack enabled
     *
     * @param list<ResolvedEvent> $events
     */
    public function acknowledgeMultiple(array $events): void;

    /**
     * Acknowledge that a message have completed processing (this will tell the server it has been processed)
     * Note: There is no need to ack a message if you have Auto Ack enabled
     */
    public function acknowledgeEventId(EventId $eventId): void;

    /**
     * Acknowledge that a message have completed processing (this will tell the server it has been processed)
     * Note: There is no need to ack a message if you have Auto Ack enabled
     *
     * @param list<EventId> $eventIds
     */
    public function acknowledgeMultipleEventIds(array $eventIds): void;

    /**
     * Mark a message failed processing. The server will be take action based upon the action paramter
     */
    public function fail(
        ResolvedEvent $event,
        PersistentSubscriptionNakEventAction $action,
        string $reason
    ): void;

    /**
     * Mark n messages that have failed processing. The server will take action based upon the action parameter
     *
     * @param list<ResolvedEvent> $events
     */
    public function failMultiple(
        array $events,
        PersistentSubscriptionNakEventAction $action,
        string $reason
    ): void;

    /**
     * Mark a message failed processing. The server will be take action based upon the action paramter
     */
    public function failEventId(
        EventId $eventId,
        PersistentSubscriptionNakEventAction $action,
        string $reason
    ): void;

    /**
     * Mark n messages that have failed processing. The server will take action based upon the action parameter
     *
     * @param list<EventId> $eventIds
     */
    public function failMultipleEventIds(
        array $eventIds,
        PersistentSubscriptionNakEventAction $action,
        string $reason
    ): void;

    public function stop(?int $timeout = null): Promise;
}
