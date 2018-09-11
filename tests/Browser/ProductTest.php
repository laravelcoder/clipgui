<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;

class ProductTest extends DuskTestCase
{

    public function testCreateProduct()
    {
        $admin = \App\User::find(1);
        $product = factory('App\Product')->make();

        $relations = [
            factory('App\Clip')->create(), 
            factory('App\Clip')->create(), 
        ];

        $this->browse(function (Browser $browser) use ($admin, $product, $relations) {
            $browser->loginAs($admin)
                ->visit(route('admin.products.index'))
                ->clickLink('Add new')
                ->type("name", $product->name)
                ->type("slug", $product->slug)
                ->select('select[name="clips[]"]', $relations[0]->id)
                ->select('select[name="clips[]"]', $relations[1]->id)
                ->press('Save')
                ->assertRouteIs('admin.products.index')
                ->assertSeeIn("tr:last-child td[field-key='name']", $product->name)
                ->assertSeeIn("tr:last-child td[field-key='slug']", $product->slug)
                ->assertSeeIn("tr:last-child td[field-key='clips'] span:first-child", $relations[0]->label)
                ->assertSeeIn("tr:last-child td[field-key='clips'] span:last-child", $relations[1]->label)
                ->logout();
        });
    }

    public function testEditProduct()
    {
        $admin = \App\User::find(1);
        $product = factory('App\Product')->create();
        $product2 = factory('App\Product')->make();

        $relations = [
            factory('App\Clip')->create(), 
            factory('App\Clip')->create(), 
        ];

        $this->browse(function (Browser $browser) use ($admin, $product, $product2, $relations) {
            $browser->loginAs($admin)
                ->visit(route('admin.products.index'))
                ->click('tr[data-entry-id="' . $product->id . '"] .btn-info')
                ->type("name", $product2->name)
                ->type("slug", $product2->slug)
                ->select('select[name="clips[]"]', $relations[0]->id)
                ->select('select[name="clips[]"]', $relations[1]->id)
                ->press('Update')
                ->assertRouteIs('admin.products.index')
                ->assertSeeIn("tr:last-child td[field-key='name']", $product2->name)
                ->assertSeeIn("tr:last-child td[field-key='slug']", $product2->slug)
                ->assertSeeIn("tr:last-child td[field-key='clips'] span:first-child", $relations[0]->label)
                ->assertSeeIn("tr:last-child td[field-key='clips'] span:last-child", $relations[1]->label)
                ->logout();
        });
    }

    public function testShowProduct()
    {
        $admin = \App\User::find(1);
        $product = factory('App\Product')->create();

        $relations = [
            factory('App\Clip')->create(), 
            factory('App\Clip')->create(), 
        ];

        $product->clips()->attach([$relations[0]->id, $relations[1]->id]);

        $this->browse(function (Browser $browser) use ($admin, $product, $relations) {
            $browser->loginAs($admin)
                ->visit(route('admin.products.index'))
                ->click('tr[data-entry-id="' . $product->id . '"] .btn-primary')
                ->assertSeeIn("td[field-key='name']", $product->name)
                ->assertSeeIn("td[field-key='slug']", $product->slug)
                ->assertSeeIn("tr:last-child td[field-key='clips'] span:first-child", $relations[0]->label)
                ->assertSeeIn("tr:last-child td[field-key='clips'] span:last-child", $relations[1]->label)
                ->logout();
        });
    }

}
