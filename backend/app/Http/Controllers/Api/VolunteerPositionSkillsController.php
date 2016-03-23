<?php

namespace App\Http\Controllers\Api;

use FaithPromise\Shared\Models\VolunteerPosition;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class VolunteerPositionSkillsController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request) {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id) {
        $skills = VolunteerPosition::withDrafts()->withExpired()->find($id)->skills;
        return $skills;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request $request
     * @param  int $id
     * @return Response
     */
    public function update(Request $request, $id) {
        $skill_ids = $request->input('skill_ids');
        VolunteerPosition::withDrafts()->withExpired()->find($id)->skills()->sync($skill_ids);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id) {
        //
    }

}