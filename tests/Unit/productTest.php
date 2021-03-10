<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class productTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample()
    {
        $an = 1;
        $ba = 2;
        $this->assertEquals($an, $ba);

    }
    public function testCreateProducts()
    {
    	$user = ProductsController::create([
            'product_name' => 'admin',
            'product_desc' => '1234567890',
        ]);
        $this->assertEquals(1,count($user));
    }
    public function testEditProducts(){
    	$user = ProductsController::create([
            'product_name' => 'admin',
            'product_desc' => '1234567890',
        ]);
        $result = $user->update([
            'product_name' => 'admin11',
        ]);
        $this->assertEquals(true, $result);

    }
    public function testDeleteproducts(){
    	$user = ProductsController::create([
            'product_name' => 'admin',
            'product_desc' => '1234567890',
        ]);
        $result = $user->delete();
        $this->assertEquals(true, $result);
    }
}
