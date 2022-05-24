<?php

namespace Tests\Unit;

use Tests\TestCase;

class HomePageTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_home_page_exist()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }
}
