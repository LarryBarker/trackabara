<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Actions\TrackCapybara;
use App\Http\Resources\ObservationResource;

class NewObservationController extends Controller
{
    /** @var TrackCapybara */
    protected $tracker;

    public function __construct(TrackCapybara $tracker)
    {
        $this->tracker = $tracker;
    }

    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        // Make sure the capybara and city exist in the database
        $data = $request->validate([
            'capybara_name' => 'required|exists:capybaras,name',
            'city' => 'required|exists:cities,name',
            'wearing_hat' => 'sometimes|nullable|boolean',
            'observed_on' => 'required|date'
        ]);

        try {
            $observation = $this->tracker->track($data);
        } catch (\Exception $e) {
            return response([
                'message' => $e->getMessage()
            ], 302);
        }

        return response([
            'observation' => new ObservationResource($observation),
            'message' => 'Successfully added a new capybara observation.'
        ], 201);
    }
}
