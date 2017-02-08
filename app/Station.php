<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Station extends Model
{
    protected $table="stations";
    protected $primaryKey = 'id';
    protected $fillable = [
        'name'
    ];

    public $rules = [
      'name' => 'required|max:255|unique:stations,name'
    ];

    public function schedule()
    {
        return $this->hasMany('App\Schedule');
    }
}
