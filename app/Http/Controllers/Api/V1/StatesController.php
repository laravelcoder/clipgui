<?php

namespace App\Http\Controllers\Api\V1;

use App\State;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreStatesRequest;
use App\Http\Requests\Admin\UpdateStatesRequest;

class StatesController extends Controller
{
    public function index()
    {
        return State::all();
    }

    public function show($id)
    {
        return State::findOrFail($id);
    }

    public function update(UpdateStatesRequest $request, $id)
    {
        $state = State::findOrFail($id);
        $state->update($request->all());
        

        return $state;
    }

    public function store(StoreStatesRequest $request)
    {
        $state = State::create($request->all());
        

        return $state;
    }

    public function destroy($id)
    {
        $state = State::findOrFail($id);
        $state->delete();
        return '';
    }
}
