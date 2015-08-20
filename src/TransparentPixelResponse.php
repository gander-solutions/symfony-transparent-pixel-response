<?php
namespace Gander\Tools\TransparentPixelResponse;

use Symfony\Component\HttpFoundation\Response;

/**
 * Class TransparentPixelResponse
 * @package Gander\Tools\TransparentPixelResponse
 * @author Adam Gąsowski <adam.gasowski@gander.pl>
 */
class TransparentPixelResponse extends Response
{
    /**
     * Base 64 encoded contents for 1px transparent gif and png
     * @var string
     */
    const PIXEL_CONTENT =
        'R0lGODlhAQABAIABAP///wAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=='
    ;

    /**
     * The response content type
     * @var string
     */
    const PIXEL_CONTENT_TYPE = 'image/gif';

    /**
     * Constructor
     */
    public function __construct()
    {
        parent::__construct(base64_decode(static::PIXEL_CONTENT));
        $this->headers->set('Content-Type', static::PIXEL_CONTENT_TYPE);
        $this->setPrivate();
        $this->headers->addCacheControlDirective('no-cache', true);
        $this->headers->addCacheControlDirective('must-revalidate', true);
    }
}