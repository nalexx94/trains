<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ScheduleService;


class ScheduleController extends Controller
{
    private $_schedule;
    public function __construct()
    {
        $this->init();
    }

    private function init() {
        $this->_schedule = new ScheduleService();
    }

    public function index() {
        $shedule = $this->_schedule->getAllShedule();
        $stations = $this->_schedule->getAllStations();

        return view('schedule.index')->with([
            'titlePage' => 'Расписание',
            'schedule' => $shedule->toArray(),
            'stations' => $stations
        ]);
    }

    public function getAdd() {
        $stations = $this->_schedule->getAllStations();


        return view('schedule.add')->with([
            'titlePage' => 'Добавление расписания',
            'stations' => $stations
        ]);
    }

    public function postAdd(Request $request) {
        return $this->_schedule->add($request);

    }

    public function getDelete($id){
        return $this->_schedule->delete($id);
    }

    public function getEdit($id){

        $shedule = $this->_schedule->getSheduleById($id);
        $stations = $this->_schedule->getAllStations();

        return view('schedule.edit')->with([
            'titlePage' => 'Редактировние расписания',
            'schedule' => $shedule->toArray(),
            'stations' => $stations,
        ]);
    }

    public function postEdit(Request $request,$id){
        return $this->_schedule->edit($request,$id);
    }
}
