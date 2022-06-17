<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Agency;

class AgencyApiController extends Controller
{

    public function __construct(Agency $agency, Request $request)
    {
        $this->agency = $agency;
        $this->request = $request;
    }

    public function index()
    {
        $agency = $this->agency->all();

        return response()->json($agency, 200);
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
