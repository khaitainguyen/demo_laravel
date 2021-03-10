<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class httpTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
    public function testIndex()
    {
        $response = $this->get('/backend/product/index');

        $response->assertStatus(200);
    }
    public function testCreate()
    {
        $response = $this->get('/backend/product/create');

        $response->assertStatus(200);
    }
    
}