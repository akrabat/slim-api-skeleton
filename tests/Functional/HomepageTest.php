<?php

namespace Test\Functional;

class HomepageTest extends BaseTestCase
{
    /**
     * Test that the index route returns the JSON {"hello": "world" }
     */
    public function testGetRoot()
    {
        $response = $this->runApp('GET', '/');

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertContains('application/json', $response->getHeaderLine('Content-type'));
        $this->assertEquals(['hello' => 'world'], json_decode($response->getBody(), true));
    }

    /**
     * Test that the index route won't accept a post request
     */
    public function testPostHomepageNotAllowed()
    {
        $response = $this->runApp('POST', '/', ['test']);

        $this->assertEquals(405, $response->getStatusCode());
        $this->assertContains('Method not allowed', (string)$response->getBody());
    }
}
