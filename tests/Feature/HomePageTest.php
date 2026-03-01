<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HomePageTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_home_page_is_working(): void
    {
        $response = $this->get('/');
        dd($response);

        $response->assertStatus(200);
    }
}
