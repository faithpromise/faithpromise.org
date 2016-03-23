<?php

namespace App\Http\Controllers\Api;

use FaithPromise\Shared\Models\Campus;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class CampusesController extends Controller {

    public function __construct() {
        $this->middleware('auth', [ 'except' => 'index' ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {

        return Campus::orderBy('name')->get();

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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request $request
     * @param  int $id
     * @return Response
     */
    public function update(Request $request, $id) {
        //
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
