<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class ObservationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'capybara_name' => $this->capybara->name,
            'city' => $this->city->name,
            'observed_on' => $this->observed_on->format('Y-m-d'),
            'wearing_hat' => $this->wearing_hat
        ];
    }
}
