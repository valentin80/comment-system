<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use function PHPUnit\Framework\assertIsArray;
use function PHPUnit\Framework\assertTrue;

class ExampleTest extends TestCase
{
    /**
     * A basic test example that tests comments api response.
     *
     * @return void
     */
    public function testCommentsTest()
    {
        $response = $this->get('/api/post');

        $body = $response->decodeResponseJson();

        assertIsArray($body['data']);
        assertIsArray($body['data'][0]['comments']);
        assertTrue(count($body['data'][0]['comments']) > 0);

        $response->assertStatus(200);
    }
}
