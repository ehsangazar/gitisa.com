<?php

namespace VisualComposer\Framework\Illuminate\Filters;

if (!defined('ABSPATH')) {
    header('Status: 403 Forbidden');
    header('HTTP/1.1 403 Forbidden');
    exit;
}

use VisualComposer\Helpers\Filters as DispatcherContract;
use VisualComposer\Framework\Illuminate\Events\Dispatcher as EventsDispatcher;

/**
 * Class Dispatcher.
 */
class Dispatcher extends EventsDispatcher implements DispatcherContract
{
    /**
     * Fire an event and call the listeners.
     *
     * @param  string|object $filter
     * @param string $body
     * @param  mixed $payload
     *
     * @return array|null
     */
    public function fire($filter, $body = '', $payload = [])
    {
        $response = $body;
        /** @var \VisualComposer\Framework\Application $vcapp */
        $vcapp = vcapp();
        $this->firing[] = $filter;
        foreach ($this->getListeners($filter) as $listener) {
            $response = $vcapp->call($listener, [$response, $payload]);
        }

        array_pop($this->firing);

        return $response;
    }
}
