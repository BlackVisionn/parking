@extends('layouts.app')

@section('title-block')Клиенты@endsection

@section('content')
    <h1>Клиенты</h1>

    <a class="btn btn-outline-success" role="button" href="{{route('clients.create')}}">Создать Клиента</a>
    <a class="btn btn-outline-success" role="button" href="{{route('cars.create')}}">Создать Автомобиль</a>

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
                <tr>
                    <td>{{$car -> client -> fio}}</td>
                    <td>{{$car -> mark}}</td>
                    <td>{{$car -> car_num}}</td>
                    <td>
                            <form method="post" action="{{route('cars.destroy', $car)}}">
                                <a class="btn btn-outline-primary" role="button" href="{{route('cars.edit', $car)}}">Редактировать</a>
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-outline-danger">Удалить</button>
                            </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{$cars->links()}}
@endsection
