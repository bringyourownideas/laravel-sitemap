<?php

namespace BringYourOwnIdeas\LaravelSitemap\Filters;

use VDB\Spider\Filter\PostFetchFilterInterface;
use VDB\Spider\Resource;

class UrlFilter implements PostFetchFilterInterface
{
    /**
     * @var string
     */
    protected $url = '';

    public function __construct($url)
    {
        $this->url = $url;
    }

    public function match(Resource $resource)
    {
        return
            parse_url($this->url, PHP_URL_HOST) !== parse_url($resource->getUri(), PHP_URL_HOST);
    }
}
