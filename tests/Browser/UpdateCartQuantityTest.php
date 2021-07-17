<?php

namespace Tests\Browser;

use App\Models\Product;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class UpdateCartQuantityTest extends DuskTestCase
{
    use DatabaseMigrations;

    /** @test  */
    public function testExample()
    {
        $product = Product::factory()->create([
            'name' => 'Laptop 1',
            'slug' => 'laptop-1',
        ]);

        $this->browse(function (Browser $browser) {
            $browser->visit('/shop/laptop-1')
                    ->assertSee('Laptop 1')
                    ->press('Add to Cart')
                    ->assertPathIs('/cart')
                    ->select('.quantity', 2)
                    ->pause(1000)
                    ->assertSee('Quantity was updated successfully');
        });
    }
}
