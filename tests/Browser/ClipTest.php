<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;

class ClipTest extends DuskTestCase
{

    public function testCreateClip()
    {
        $admin = \App\User::find(1);
        $clip = factory('App\Clip')->make();

        

        $this->browse(function (Browser $browser) use ($admin, $clip) {
            $browser->loginAs($admin)
                ->visit(route('admin.clips.index'))
                ->clickLink('Add new')
                ->type("label", $clip->label)
                ->type("description", $clip->description)
                ->type("notes", $clip->notes)
                ->attach("clip_upload", base_path("tests/_resources/test.jpg"))
                ->select("industry_id", $clip->industry_id)
                ->select("brand_id", $clip->brand_id)
                ->press('Save')
                ->assertRouteIs('admin.clips.index')
                ->assertSeeIn("tr:last-child td[field-key='label']", $clip->label)
                ->assertSeeIn("tr:last-child td[field-key='industry']", $clip->industry->name)
                ->assertSeeIn("tr:last-child td[field-key='brand']", $clip->brand->name)
                ->logout();
        });
    }

    public function testEditClip()
    {
        $admin = \App\User::find(1);
        $clip = factory('App\Clip')->create();
        $clip2 = factory('App\Clip')->make();

        

        $this->browse(function (Browser $browser) use ($admin, $clip, $clip2) {
            $browser->loginAs($admin)
                ->visit(route('admin.clips.index'))
                ->click('tr[data-entry-id="' . $clip->id . '"] .btn-info')
                ->type("label", $clip2->label)
                ->type("description", $clip2->description)
                ->type("notes", $clip2->notes)
                ->attach("clip_upload", base_path("tests/_resources/test.jpg"))
                ->select("industry_id", $clip2->industry_id)
                ->select("brand_id", $clip2->brand_id)
                ->press('Update')
                ->assertRouteIs('admin.clips.index')
                ->assertSeeIn("tr:last-child td[field-key='label']", $clip2->label)
                ->assertSeeIn("tr:last-child td[field-key='industry']", $clip2->industry->name)
                ->assertSeeIn("tr:last-child td[field-key='brand']", $clip2->brand->name)
                ->logout();
        });
    }

    public function testShowClip()
    {
        $admin = \App\User::find(1);
        $clip = factory('App\Clip')->create();

        


        $this->browse(function (Browser $browser) use ($admin, $clip) {
            $browser->loginAs($admin)
                ->visit(route('admin.clips.index'))
                ->click('tr[data-entry-id="' . $clip->id . '"] .btn-primary')
                ->assertSeeIn("td[field-key='label']", $clip->label)
                ->assertSeeIn("td[field-key='description']", $clip->description)
                ->assertSeeIn("td[field-key='notes']", $clip->notes)
                ->assertSeeIn("td[field-key='industry']", $clip->industry->name)
                ->assertSeeIn("td[field-key='brand']", $clip->brand->name)
                ->logout();
        });
    }

}
