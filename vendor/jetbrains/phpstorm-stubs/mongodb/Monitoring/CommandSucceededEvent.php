<?php

namespace MongoDB\Driver\Monitoring;

use MongoDB\BSON\ObjectId;
use MongoDB\Driver\Server;

/**
 * Encapsulates information about a successful command.
 * @link https://secure.php.net/manual/en/class.mongodb-driver-monitoring-commandsucceededevent.php
 * @since 1.3.0
 */
class CommandSucceededEvent
{
    final private function __construct() {}

    final public function __wakeup() {}

    /**
     * Returns the command name.
     * @link   https://secure.php.net/manual/en/mongodb-driver-monitoring-commandsucceededevent.getcommandname.php
     * @return string The command name (e.g. "find", "aggregate").
     * @throws \InvalidArgumentException on argument parsing errors.
     * @since 1.3.0
     */
    final public function getCommandName(): string {}

    /**
     * Returns the command's duration in microseconds
     * The command's duration is a calculated value that includes the time to send the message and receive the reply from the server.
     * @link   https://secure.php.net/manual/en/mongodb-driver-monitoring-commandsucceededevent.getdurationmicros.php
     * @return int the command's duration in microseconds.
     * @throws \InvalidArgumentException on argument parsing errors.
     * @since 1.3.0
     */
    final public function getDurationMicros(): int {}

    /**
     * Returns the server hostname for the command
     * @link   https://www.php.net/manual/en/mongodb-driver-monitoring-commandsucceededevent.gethost.php
     * @return string
     * @throws \InvalidArgumentException on argument parsing errors.
     * @since 1.20.0
     */
    final public function getHost(): string {}

    /**
     * Returns the command's operation ID.
     * The operation ID is generated by the driver and may be used to link events together such as bulk write operations, which may have been split across several commands at the protocol level.
     * Note: Since multiple commands may share the same operation ID, it is not reliable to use this value to associate event objects with each other. The request ID returned by MongoDB\Driver\Monitoring\CommandSucceededEvent::getRequestId() should be used instead.
     * @link   https://secure.php.net/manual/en/mongodb-driver-monitoring-commandsucceededevent.getoperationid.php
     * @return string the command's operation ID.
     * @throws \InvalidArgumentException on argument parsing errors.
     * @since 1.3.0
     */
    final public function getOperationId(): string {}

    /**
     * Returns the server port for the command
     * @link   https://www.php.net/manual/en/mongodb-driver-monitoring-commandsucceededevent.getport.php
     * @return int
     * @throws \InvalidArgumentException on argument parsing errors.
     * @since 1.20.0
     */
    final public function getPort(): int {}

    /**
     * Returns the command reply document.
     * The reply document will be converted from BSON to PHP using the default deserialization rules (e.g. BSON documents will be converted to stdClass).
     * @link https://secure.php.net/manual/en/mongodb-driver-monitoring-commandsucceededevent.getreply.php
     * @return object the command reply document as a stdClass object.
     * @throws \InvalidArgumentException on argument parsing errors.
     * @since 1.3.0
     */
    final public function getReply(): object {}

    /**
     * Returns the command's request ID.
     * The request ID is generated by the driver and may be used to associate this CommandSucceededEvent with a previous CommandStartedEvent.
     * @link https://secure.php.net/manual/en/mongodb-driver-monitoring-commandsucceededevent.getrequestid.php
     * @return string the command's request ID.
     * @throws \InvalidArgumentException on argument parsing errors.
     * @since 1.3.0
     */
    final public function getRequestId(): string {}

    /**
     * Returns the Server on which the command was executed.
     * @link https://secure.php.net/manual/en/mongodb-driver-monitoring-commandsucceededevent.getserver.php
     * @return \MongoDB\Driver\Server on which the command was executed.
     * @since 1.3.0
     * @deprecated Use getHost and getPort instead.
     */
    final public function getServer(): Server {}

    /**
     * Returns the load balancer service ID for the command
     * @link https://www.php.net/manual/en/mongodb-driver-monitoring-commandsucceededevent.getserviceid.php
     * @since 1.11.0
     */
    final public function getServiceId(): ?ObjectId {}

    /**
     * Returns the server connection ID for the command
     * @link https://www.php.net/manual/en/mongodb-driver-monitoring-commandsucceededevent.getserverconnectionid.php
     * @since 1.14.0
     */
    final public function getServerConnectionId(): ?int {}
}