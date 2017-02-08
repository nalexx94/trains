<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $table="schedule";

    protected $fillable = [
        'station_id',
        'train_time',
        'train_reg'
    ];

    public $rules = [
        'station_id' => 'required|exists:stations,id',
        'train_time' => 'required|date_format:H:i',
        'train_reg' => 'required|array'
    ];

    public $messages = [
        'train_time.required' => 'Поле Время обязательно для заполнения',
        'train_time.date_format' => 'Поле Время не соответствует формату 00:00',
        'train_reg.required' => 'Выберите регулярность рейса',
        'train_reg.array' => 'Выберите регулярность рейса',
        'station_id.required' => 'Должна быть вырана станция назначения',
        'station_id.exists' => 'Не существует выбраной станции'
    ];

    protected $casts = [
        'train_reg' => 'array',
    ];

    public function stations()
    {
        return $this->belongsTo('App\Station','station_id');
    }
}
