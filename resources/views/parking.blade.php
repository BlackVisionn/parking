@extends('layouts.app')

@section('title-block')Стоянка@endsection

@section('content')
    <h1>Автомобили на стоянке</h1>

    <table class="table table-striped" >
        <thead>
        <tr>
            <th scope="col">ФИО</th>
            <th scope="col">Марка авто</th>
            <th scope="col">Гос. Номер РФ</th>
            <th scope="col">Действия</th>
        </tr>
        </thead>
        <tbody>
        @foreach($cars as $car)
            @if($car->status == 1)
            <tr>
                <td>{{$car -> client -> fio}}</td>
                <td>{{$car -> mark}}</td>
                <td>{{$car -> car_num}}</td>
                <td>
                    <a class="btn btn-outline-primary" role="button" href="{{route('cars.edit', $car)}}">Редактировать</a>
                </td>
            </tr>
            @endif
        @endforeach
        </tbody>
    </table>
    {{$cars->links()}}
@endsection
