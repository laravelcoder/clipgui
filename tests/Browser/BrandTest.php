<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;

class BrandTest extends DuskTestCase
{

    public function testCreateBrand()
    {
        $admin = \App\User::find(1);
        $brand = factory('App\Brand')->make();

        $relations = [
            factory('App\Clip')->create(), 
            factory('App\Clip')->create(), 
        ];

        $this->browse(function (Browser $browser) use ($admin, $brand, $relations) {
            $browser->loginAs($admin)
                ->visit(route('admin.brands.index'))
                ->clickLink('Add new')
                ->type("name", $brand->name)
                ->type("slug", $brand->slug)
                ->select('select[name="clips[]"]', $relations[0]->id)
                ->select('select[name="clips[]"]', $relations[1]->id)
                ->press('Save')
                ->assertRouteIs('admin.brands.index')
                ->assertSeeIn("tr:last-child td[field-key='name']", $brand->name)
                ->assertSeeIn("tr:last-child td[field-key='slug']", $brand->slug)
                ->assertSeeIn("tr:last-child td[field-key='clips'] span:first-child", $relations[0]->label)
                ->assertSeeIn("tr:last-child td[field-key='clips'] span:last-child", $relations[1]->label)
                ->logout();
        });
    }

    public function testEditBrand()
    {
        $admin = \App\User::find(1);
        $brand = factory('App\Brand')->create();
        $brand2 = factory('App\Brand')->make();

        $relations = [
            factory('App\Clip')->create(), 
            factory('App\Clip')->create(), 
        ];

        $this->browse(function (Browser $browser) use ($admin, $brand, $brand2, $relations) {
            $browser->loginAs($admin)
                ->visit(route('admin.brands.index'))
                ->click('tr[data-entry-id="' . $brand->id . '"] .btn-info')
                ->type("name", $brand2->name)
                ->type("slug", $brand2->slug)
                ->select('select[name="clips[]"]', $relations[0]->id)
                ->select('select[name="clips[]"]', $relations[1]->id)
                ->press('Update')
                ->assertRouteIs('admin.brands.index')
                ->assertSeeIn("tr:last-child td[field-key='name']", $brand2->name)
                ->assertSeeIn("tr:last-child td[field-key='slug']", $brand2->slug)
                ->assertSeeIn("tr:last-child td[field-key='clips'] span:first-child", $relations[0]->label)
                ->assertSeeIn("tr:last-child td[field-key='clips'] span:last-child", $relations[1]->label)
                ->logout();
        });
    }

    public function testShowBrand()
    {
        $admin = \App\User::find(1);
        $brand = factory('App\Brand')->create();

        $relations = [
            factory('App\Clip')->create(), 
            factory('App\Clip')->create(), 
        ];

        $brand->clips()->attach([$relations[0]->id, $relations[1]->id]);

        $this->browse(function (Browser $browser) use ($admin, $brand, $relations) {
            $browser->loginAs($admin)
                ->visit(route('admin.brands.index'))
                ->click('tr[data-entry-id="' . $brand->id . '"] .btn-primary')
                ->assertSeeIn("td[field-key='name']", $brand->name)
                ->assertSeeIn("td[field-key='slug']", $brand->slug)
                ->assertSeeIn("tr:last-child td[field-key='clips'] span:first-child", $relations[0]->label)
                ->assertSeeIn("tr:last-child td[field-key='clips'] span:last-child", $relations[1]->label)
                ->logout();
        });
    }

}
