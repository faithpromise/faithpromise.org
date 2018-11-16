<?php

namespace App\Http\Controllers\Api;

use FaithPromise\Shared\Models\VolunteerSkill;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class VolunteerSkillsController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        return VolunteerSkill::orderBy('title', 'asc')->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request) {
        $skill = VolunteerSkill::create($request->input());
        $skill->save();
        return ['id' => $skill->id];
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id) {
        return VolunteerSkill::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request $request
     * @param  int $id
     * @return Response
     */
    public function update(Request $request, $id) {
        VolunteerSkill::find($id)->fill($request->input())->save();
        return ['id' => $id];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id) {
        $skill = VolunteerSkill::find($id);
        $skill->positions()->detach();
        $skill->delete();
    }
}
