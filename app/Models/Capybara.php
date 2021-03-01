<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Capybara extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'color', 'size'];

    public function rules()
    {
        return [
            'name' => 'required|unique:capybaras|alpha|max:255',
            'color' => 'required|in:brown,gray,yellow,black',
            'size' => 'required|in:small,medium,large'
        ];
    }

    public function observations()
    {
        return $this->hasMany(Observation::class);
    }
}
