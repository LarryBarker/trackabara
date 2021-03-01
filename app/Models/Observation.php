<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Observation extends Model
{
    use HasFactory;

    /**
     * The attributes that should be cast as their type
     *
     * @var array
     */
    protected $casts = ['observed_on' => 'date'];

    protected $fillable = ['capybara_id', 'city_id', 'wearing_hat', 'observed_on'];

    public function capybara()
    {
        return $this->belongsTo(Capybara::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }
}
