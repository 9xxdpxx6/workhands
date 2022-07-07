<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class ProjectTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testHomeRoute()
    {
        $response = $this->get('/');
        $response->assertOk();
    }

    public function testServicesRoute()
    {
        $response = $this->get('/services');
        $response->assertOk();
    }

    public function testCreateService() {
        $this-post('/add-service', [
            'name' => 'testService1',
            'price' => 321,
            'preview_path' => 'img/img1.png',
            'description' => 'test description text'
        ]);
        $this->assertEquals(303, $response->status());
    }
}
