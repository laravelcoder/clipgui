<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;

class ClipFilterTest extends DuskTestCase
{

    public function testCreateClipFilter()
    {
        $admin = \App\User::find(1);
        $clip_filter = factory('App\ClipFilter')->make();

        

        $this->browse(function (Browser $browser) use ($admin, $clip_filter) {
            $browser->loginAs($admin)
                ->visit(route('admin.clip_filters.index'))
                ->clickLink('Add new')
                ->type("filter_by", $clip_filter->filter_by)
                ->select("filters_id", $clip_filter->filters_id)
                ->press('Save')
                ->assertRouteIs('admin.clip_filters.index')
                ->assertSeeIn("tr:last-child td[field-key='filter_by']", $clip_filter->filter_by)
                ->assertSeeIn("tr:last-child td[field-key='filters']", $clip_filter->filters->label)
                ->logout();
        });
    }

    public function testEditClipFilter()
    {
        $admin = \App\User::find(1);
        $clip_filter = factory('App\ClipFilter')->create();
        $clip_filter2 = factory('App\ClipFilter')->make();

        

        $this->browse(function (Browser $browser) use ($admin, $clip_filter, $clip_filter2) {
            $browser->loginAs($admin)
                ->visit(route('admin.clip_filters.index'))
                ->click('tr[data-entry-id="' . $clip_filter->id . '"] .btn-info')
                ->type("filter_by", $clip_filter2->filter_by)
                ->select("filters_id", $clip_filter2->filters_id)
                ->press('Update')
                ->assertRouteIs('admin.clip_filters.index')
                ->assertSeeIn("tr:last-child td[field-key='filter_by']", $clip_filter2->filter_by)
                ->assertSeeIn("tr:last-child td[field-key='filters']", $clip_filter2->filters->label)
                ->logout();
        });
    }

    public function testShowClipFilter()
    {
        $admin = \App\User::find(1);
        $clip_filter = factory('App\ClipFilter')->create();

        


        $this->browse(function (Browser $browser) use ($admin, $clip_filter) {
            $browser->loginAs($admin)
                ->visit(route('admin.clip_filters.index'))
                ->click('tr[data-entry-id="' . $clip_filter->id . '"] .btn-primary')
                ->assertSeeIn("td[field-key='filter_by']", $clip_filter->filter_by)
                ->assertSeeIn("td[field-key='filters']", $clip_filter->filters->label)
                ->logout();
        });
    }

}
