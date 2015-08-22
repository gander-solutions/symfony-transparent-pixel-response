<?php
namespace Gander\Tools\TransparentPixelResponse;

use Symfony\Component\HttpFoundation\Response;

/**
 * Class TransparentPixelResponse
 * @package Gander\Tools\TransparentPixelResponse
 * @author Luciano Mammino <lucianomammino@gmail.com>
 * @author Adam Gąsowski <adam.gasowski@gander.pl>
 */
class TransparentPixelResponse extends Response
{
    /**
     * Base 64 encoded contents for 1px transparent gif
     * @var string
     */
    const IMAGE_CONTENT =
        'R0lGODlhAQABAJAAAP8AAAAAACH5BAUQAAAALAAAAAABAAEAAAICBAEAOw=='
    ;

    /**
     * The response content type
     * @var string
     */
    const CONTENT_TYPE = 'image/gif';

    /**
     * Constructor
     */
    public function __construct()
    {
        parent::__construct(base64_decode(static::IMAGE_CONTENT));
        $this->headers->set('Content-Type', static::CONTENT_TYPE);
        $this->setPrivate();
        $this->headers->addCacheControlDirective('no-cache', true);
        $this->headers->addCacheControlDirective('must-revalidate', true);
    }
}