<?php
namespace Gander\Symfony\Component\HttpFoundation;

/**
 * Class TransparentPixelResponseTest
 * @package Gander\Symfony\Component\HttpFoundation
 * @author Adam Gąsowski <adam.gasowski@gander.pl>
 */
class TransparentPixelResponseTest extends \PHPUnit\Framework\TestCase
{
    public function testCreate()
    {
        $response = new TransparentPixelResponse();

        $this->assertEquals(TransparentPixelResponse::IMAGE_CONTENT, base64_encode($response->getContent()));
        $this->assertEquals(TransparentPixelResponse::CONTENT_TYPE, $response->headers->get('Content-type'));

        $this->assertTrue($response->headers->hasCacheControlDirective('private'));
        $this->assertEquals(true, $response->headers->getCacheControlDirective('private'));

        $this->assertFalse($response->headers->hasCacheControlDirective('public'));
        $this->assertNull($response->headers->getCacheControlDirective('public'));

        $this->assertTrue($response->headers->hasCacheControlDirective('no-cache'));
        $this->assertEquals(true, $response->headers->getCacheControlDirective('no-cache'));

        $this->assertTrue($response->headers->hasCacheControlDirective('must-revalidate'));
        $this->assertEquals(true, $response->headers->getCacheControlDirective('must-revalidate'));

    }
}
