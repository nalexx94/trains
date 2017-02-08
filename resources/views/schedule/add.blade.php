@extends('layouts.app')

@section('title')
    {{ $titlePage }}
@endsection

@section('titlePage')
    {{ $titlePage }}
@endsection



@section('content')
    <div class="actions-toolbar">
        <a href="{{ route('home') }}" class="btn btn-primary">Назад к записям</a>
    </div>
    <div class="forms">
        <form method="POST" action="{{ route('add-schedule') }}">
            {{ csrf_field() }}
            <div class="form-group">
                <div class="row">
                    <div class="col-xs-6">
                        <label for="train-time">Время</label>
                        <div class="input-group">

                            <input id="train-time" type="time" value="{{ old('train-time') }}" name="train-time" required class="form-control">
                            <span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span>
                        </div>
                    </div>
                </div>

            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-xs-6">
                        <label for="train-station">Станция</label>
                        <select id="train-station" name="train-station" class="form-control">
                            @foreach($stations as $station)
                                <option value="{{ $station['id'] }}" {{ (old('train-station')==$station['id'])?'selected':'' }}>{{ $station['name'] }}</option>
                                @endforeach
                        </select>
                    </div>
                    <div class="col-xs-6">
                        <label for="new-train-station">Новая станция</label>
                        <input type="text" id="new-train-station" name="new-train-station" value="{{ old('new-train-station') }}" placeholder="Введите название" class="form-control">
                    </div>
                </div>
            </div>


            <div class="form-group">
                <label for="">Регулярность рейса</label>
                <div class="checkbox">
                    <label for="reg-0">
                        <input type="checkbox" id="reg-0" name="regularity[]"  value="0">Пн
                    </label>
                </div>
                <div class="checkbox">
                    <label for="reg-1">
                        <input type="checkbox" id="reg-1" name="regularity[]" value="1">Вт
                    </label>
                </div>
                <div class="checkbox">
                    <label for="reg-2">
                        <input type="checkbox" id="reg-2" name="regularity[]" value="2">Ср
                    </label>
                </div>
                <div class="checkbox">
                    <label for="reg-3">
                        <input type="checkbox" id="reg-3" name="regularity[]" value="3">Чт
                    </label>
                </div>
                <div class="checkbox">
                    <label for="reg-4">
                        <input type="checkbox" id="reg-4" name="regularity[]" value="4">Пт
                    </label>
                </div>
                <div class="checkbox">
                    <label for="reg-5">
                        <input type="checkbox" id="reg-5" name="regularity[]" value="5">Сб
                    </label>
                </div>
                <div class="checkbox">
                    <label for="reg-6">
                        <input type="checkbox" id="reg-6" name="regularity[]" value="6">Вс
                    </label>
                </div>
                <div class="checkbox">
                    <label for="reg-7">
                        <input type="checkbox" id="reg-6" name="regularity[]" value="7">Ежедневно
                    </label>
                </div>
            </div>
            <input type="submit" name="add-marshrut" value="Создать рейс" class="btn btn-primary">
        </form>
    </div>
@endsection



