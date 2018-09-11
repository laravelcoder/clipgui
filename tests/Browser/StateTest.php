<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;

class StateTest extends DuskTestCase
{

    public function testCreateState()
    {
        $admin = \App\User::find(1);
        $state = factory('App\State')->make();

        $relations = [
            factory('App\Clip')->create(), 
            factory('App\Clip')->create(), 
        ];

        $this->browse(function (Browser $browser) use ($admin, $state, $relations) {
            $browser->loginAs($admin)
                ->visit(route('admin.states.index'))
                ->clickLink('Add new')
                ->type("state", $state->state)
                ->type("slug", $state->slug)
                ->select('select[name="clips[]"]', $relations[0]->id)
                ->select('select[name="clips[]"]', $relations[1]->id)
                ->press('Save')
                ->assertRouteIs('admin.states.index')
                ->assertSeeIn("tr:last-child td[field-key='state']", $state->state)
                ->assertSeeIn("tr:last-child td[field-key='slug']", $state->slug)
                ->assertSeeIn("tr:last-child td[field-key='clips'] span:first-child", $relations[0]->label)
                ->assertSeeIn("tr:last-child td[field-key='clips'] span:last-child", $relations[1]->label)
                ->logout();
        });
    }

    public function testEditState()
    {
        $admin = \App\User::find(1);
        $state = factory('App\State')->create();
        $state2 = factory('App\State')->make();

        $relations = [
            factory('App\Clip')->create(), 
            factory('App\Clip')->create(), 
        ];

        $this->browse(function (Browser $browser) use ($admin, $state, $state2, $relations) {
            $browser->loginAs($admin)
                ->visit(route('admin.states.index'))
                ->click('tr[data-entry-id="' . $state->id . '"] .btn-info')
                ->type("state", $state2->state)
                ->type("slug", $state2->slug)
                ->select('select[name="clips[]"]', $relations[0]->id)
                ->select('select[name="clips[]"]', $relations[1]->id)
                ->press('Update')
                ->assertRouteIs('admin.states.index')
                ->assertSeeIn("tr:last-child td[field-key='state']", $state2->state)
                ->assertSeeIn("tr:last-child td[field-key='slug']", $state2->slug)
                ->assertSeeIn("tr:last-child td[field-key='clips'] span:first-child", $relations[0]->label)
                ->assertSeeIn("tr:last-child td[field-key='clips'] span:last-child", $relations[1]->label)
                ->logout();
        });
    }

    public function testShowState()
    {
        $admin = \App\User::find(1);
        $state = factory('App\State')->create();

        $relations = [
            factory('App\Clip')->create(), 
            factory('App\Clip')->create(), 
        ];

        $state->clips()->attach([$relations[0]->id, $relations[1]->id]);

        $this->browse(function (Browser $browser) use ($admin, $state, $relations) {
            $browser->loginAs($admin)
                ->visit(route('admin.states.index'))
                ->click('tr[data-entry-id="' . $state->id . '"] .btn-primary')
                ->assertSeeIn("td[field-key='state']", $state->state)
                ->assertSeeIn("td[field-key='slug']", $state->slug)
                ->assertSeeIn("tr:last-child td[field-key='clips'] span:first-child", $relations[0]->label)
                ->assertSeeIn("tr:last-child td[field-key='clips'] span:last-child", $relations[1]->label)
                ->logout();
        });
    }

}
