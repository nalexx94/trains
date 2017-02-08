@extends('layouts.app')

@section('title')
    {{ $titlePage }}
    @endsection

@section('titlePage')
    {{ $titlePage }}
@endsection

@section('content')
    <div class="actions-toolbar">
        <a href="{{ route('add-schedule') }}" class="btn btn-primary">Добавить расписание</a>
        <div class="filter">
            <div class="row">
                <div class="col-xs-4">
                    <select name="" class="form-control" id="filter-country">
                        @foreach($stations as $station)
                            <option value="{{ $station['id'] }}" >{{ $station['name'] }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-xs-4">
                    <div class="input-group">

                        <input type="text" name="datepicker" id="datepicker" class="form-control">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                    </div>

                </div>

                <div class="col-xs-4">
                    <button id="go-filter" class="btn btn-primary">Применить фильтр</button>
                    <button id="clear-filter" class="btn btn-primary">Очистить фильтр</button>
                </div>
            </div>
        </div>
    </div>
    <table class="table tablesorter">
        <thead>
        <tr>
            <th>Время отправления</th>
            <th>Пункт назначения</th>
            <th class="filter-match">Регулярность рейса</th>
            <th class="filter-false">Управление</th>
        </tr>
        </thead>
        <tbody>

        @if (count($schedule) > 0)
        @foreach($schedule as $row)
        <tr>

            <td>{{ App('GLHelper')->setFormatTime($row['train_time']) }}</td>
            <td>{{ $row['stations']['name'] }}</td>
            <td>{{ App('GLHelper')->regularityByArray($row['train_reg']) }}</td>
            <td>
                <div class="actions">
                    <a href="{{ route('edit-schedule',['id'=>$row['id']]) }}">
                        <span data-toggle="tooltip" data-placement="top" title="Редактировать" class="glyphicon glyphicon-pencil"></span>
                    </a>
                    <a href="{{ route('delete-schedule',['id'=>$row['id']]) }}">
                        <span data-toggle="tooltip" data-placement="top" title="Удалить" class="glyphicon glyphicon-trash"></span>
                        </a>
                </div>
            </td>
        </tr>
            @endforeach
            @else
            <tr>
                <td colspan="4">Нет расписания</td>
            </tr>
            @endif
        </tbody>
    </table>
    @endsection