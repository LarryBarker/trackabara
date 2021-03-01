<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddCapybaraRequest;
use App\Models\Capybara;
use Illuminate\Http\Request;
use App\Http\Resources\CapybaraResource;

class AddCapybaraController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:capybaras',
            'color' => 'required|in:brown,gray,yellow,black',
            'size' => 'required|in:small,medium,large',
        ]);

        $capybara = Capybara::create([
            'name' => request('name'),
            'color' => request('color'),
            'size' => request('size')
        ]);

        return response([
            'capybara' => new CapybaraResource($capybara),
            'message' => 'Successfully added a new capybara to the database.'
        ], 201);
    }
}
