<?php

namespace App\Http\Controllers;

use App\Models\Capybara;
use Illuminate\Http\Request;
use App\Http\Resources\CapybaraResource;
use App\Http\Requests\AddCapybaraRequest;

class CapybaraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // show all capybaras
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // retrieve a specific capybara
    }
}
