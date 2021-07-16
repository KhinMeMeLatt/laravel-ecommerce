<?php

namespace Tests\Unit;

use App\Models\Product;
use Tests\TestCase;

class HelpersTest extends TestCase
{
    /** @test */
    public function can_get_formatted_price()
    {
        $product = Product::factory()->make([
            'name' => 'Product 1',
            'price' => 29999
        ]);

        $this->assertEquals('$299.99', presentPrice($product->price));
    }
}
