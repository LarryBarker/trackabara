<?php

namespace App\Actions;

use Carbon\Carbon;
use App\Models\City;
use App\Models\Capybara;
use App\Contracts\Tracker;
use App\Models\Observation;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class TrackCapybara implements Tracker
{
    /**
     * Track an existing capybara
     *
     * @param  array  $data
     * @return \App\Models\Observation
     */
    public function track(array $data)
    {
        Validator::make($data, [
            'capybara_name' => ['required', 'string', 'max:255', 'exists:capybaras,name'],
            'city' => ['required', 'string', 'max:255', 'exists:cities,name'],
            'wearing_hat' => ['sometimes', 'nullable', 'boolean'],
            'observed_on' => ['required', 'date']
        ])->validate();

        $capybara = Capybara::where(['name' => $data['capybara_name']])->first();
        $city = City::where('name', $data['city'])->first();
        $date = Carbon::parse($data['observed_on']);
        $wearingHat = isset($data['wearing_hat']) ? $data['wearing_hat'] : false;

        return $this->findOrCreateObservation($capybara, $city, $date, $wearingHat);
    }

    /**
     * Attempt to create a new capybara obversation if one
     * does not already exist in this city on this date.
     *
     * @param  \App\Models\Capybara  $capybara
     * @param  \App\Models\City  $city
     * @param \Carbon\Carbon  $date
     * @param bool $wearingHat
     * @return void
     */
    protected function findOrCreateObservation(
        Capybara $capybara,
        City $city,
        Carbon $date,
        bool $wearingHat = false
    ) {
        try {
            return Observation::create([
                'capybara_id' => $capybara->id,
                'city_id' => $city->id,
                'wearing_hat' => $wearingHat,
                'observed_on' => $date
            ]);
        } catch (\Exception $e) {
            throw new \Exception('Whoops! Looks like someone has already seen this capybara in ' . $city->name . ' on ' . $date->format('Y-m-d'));
        }
    }
}
