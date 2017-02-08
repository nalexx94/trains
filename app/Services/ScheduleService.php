<?php


namespace App\Services;

use App\Schedule;
use App\Station;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ScheduleService
{
    private $errors = [];

    /*
   * mechanism add shedule
   * */
    public function add(Request $data) {

        $station = false;
        if ($data->has('new-train-station')) { // create new station if exist


            $postNewStation = [
                'name' => $data['new-train-station']
            ];

            $validator = Validator::make($postNewStation, (new Station())->rules);
            if ($validator->fails()) {

                $this->errors = array_merge($this->errors, $validator->errors()->all());
            } else {
                $station = Station::create($postNewStation);
            }

        }
        else if ($data->has('train-station')) { // or use selected station

          $station = Station::find($data['train-station']);
        }
        else {

            $this->errors = array_merge($this->errors, 'Station not found!');
        }

        if ($station) { // create schedule for station


            $postSchedule = [
                'station_id' => $station->id,
                'train_time' => $data['train-time'],
                'train_reg' => App('GLHelper')->checkEveryDay($data['regularity'])
            ];



            $validator = Validator::make($postSchedule, (new Schedule())->rules,(new Schedule())->messages);

            if ($validator->fails()) {

                $this->errors = array_merge($this->errors, $validator->errors()->all());

            } else {

                $shedule = Schedule::create($postSchedule);

            }

            if (!empty($this->errors)) {

                return redirect()->back()->withErrors($this->errors)->withInput();
            }
            else {
                flash('Запись добавлена', 'success');
                return redirect()->route('add-schedule');
            }


        }

        else {
            return redirect()->back()->withErrors($this->errors);
        }




    }


    // for main index table
    public function getAllShedule() {
        return Schedule::with('stations')->orderBy('train_time')->get();
    }

    // find one shedule
    public function getSheduleById($id) {
        return Schedule::find($id);
    }

    // edit shedule record
    public function edit(Request $data,$id) {
        $station = $schedule = false;

        $schedule = Schedule::find($id);

        if ($schedule) {
            if ($data->has('new-train-station')) {


                $postNewStation = [ // create new station for this schedule
                    'name' => $data['new-train-station']
                ];

                $validator = Validator::make($postNewStation, (new Station())->rules);
                if ($validator->fails()) {

                    $this->errors = array_merge($this->errors, $validator->errors()->all());
                } else {
                    $station = Station::create($postNewStation);
                }

            }
            else if ($data->has('train-station')) { // or use current

                $station = Station::find($data['train-station']);
            }
            else {

                $this->errors = array_merge($this->errors, 'Station not found!');
            }

            if ($station) {


                $postSchedule = [
                    'station_id' => $station->id,
                    'train_time' => $data['train-time'],
                    'train_reg' => App('GLHelper')->checkEveryDay($data['regularity'])
                ];

                $validator = Validator::make($postSchedule, (new Schedule())->rules,(new Schedule())->messages);

                if ($validator->fails()) {

                    $this->errors = array_merge($this->errors, $validator->errors()->all());

                } else {

                    $schedule->station_id = $station->id;
                    $schedule->train_time = $data['train-time'];
                    $schedule->train_reg = $data['regularity'];
                    $schedule->save();

                }

                if (!empty($this->errors)) {

                    return redirect()->back()->withErrors($this->errors)->withInput();
                }
                else {
                    flash('Запись обновлена', 'success');
                    return redirect()->route('edit-schedule',['id'=>$id]);
                }


            }

            else {
                return redirect()->back()->withErrors($this->errors);
            }
        }

    }

    // delete record schedule
    public function delete($id) {
        $schedule = false;
        $schedule = Schedule::find($id);

        if ($schedule) {
            $schedule->delete();
            flash('Запись удалена', 'success');

        }
        else {
            flash('Ошибка удаления', 'danger');

        }

        return redirect()->back();
    }


    public function getAllStations()
    {
        return \App\Station::all();
    }
}