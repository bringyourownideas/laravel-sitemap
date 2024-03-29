<?php

namespace BringYourOwnIdeas\LaravelSitemap\Handlers;

use VDB\Uri\UriInterface;
use VDB\Spider\Event\SpiderEvents;
use Symfony\Component\EventDispatcher\GenericEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

/**
 * Class StatsHandler
 *
 * @package BringYourOwnIdeas\LaravelSitemap\Handlers
 */
class StatsHandler implements EventSubscriberInterface
{
    /** @var string */
    protected $spiderId;

    protected $persisted = array();

    protected $queued = array();

    protected $filtered = array();

    protected $failed = array();

    public static function getSubscribedEvents(): array
    {
        return array(
            SpiderEvents::SPIDER_CRAWL_FILTER_POSTFETCH => 'addToFiltered',
            SpiderEvents::SPIDER_CRAWL_FILTER_PREFETCH => 'addToFiltered',
            SpiderEvents::SPIDER_CRAWL_POST_ENQUEUE => 'addToQueued',
            SpiderEvents::SPIDER_CRAWL_RESOURCE_PERSISTED => 'addToPersisted',
            SpiderEvents::SPIDER_CRAWL_ERROR_REQUEST => 'addToFailed'
        );
    }

    public function addToQueued(GenericEvent $event)
    {
        $this->queued[] = $event->getArgument('uri');
    }

    public function addToPersisted(GenericEvent $event)
    {
        $this->persisted[] = $event->getArgument('uri');
    }

    public function addToFiltered(GenericEvent $event)
    {
        $this->filtered[] = $event->getArgument('uri');
    }

    public function addToFailed(GenericEvent $event)
    {
        $this->failed[$event->getArgument('uri')->toString()] = $event->getArgument('message');
    }

    /**
     * @return UriInterface[]
     */
    public function getQueued(): array
    {
        return $this->queued;
    }

    /**
     * @return UriInterface[]
     */
    public function getPersisted(): array
    {
        return $this->persisted;
    }

    /**
     * @return FilterableInterface[]
     */
    public function getFiltered(): array
    {
        return $this->filtered;
    }

    /**
     * @return array of form array($uriString, $reason)
     */
    public function getFailed(): array
    {
        return $this->failed;
    }

    public function toString(): string
    {
        $spiderId = $this->getSpiderId();
        $queued = $this->getQueued();
        $filtered = $this->getFiltered();
        $failed = $this->getFailed();

        $string = '';

        $string .= "\n\nSPIDER ID: " . $spiderId;
        $string .= "\n  ENQUEUED:  " . count($queued);
        $string .= "\n  SKIPPED:   " . count($filtered);
        $string .= "\n  FAILED:    " . count($failed);

        return $string;
    }
}
