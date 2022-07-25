@extends('layouts.app')

@section('title-block', 'Создать автомобиль')
@section('title', 'Создать автомобиль')

@section('content')

    <div class="container">
        <h1>Автомобиль</h1>
        <form method="post" action="{{route('cars.store')}}">
            @csrf
            <div class="mb-3">
                <label for="mark">Марка Автомобиля</label>
                <input type="text" name="mark" placeholder="Введите название марки Автомобиля" id="mark" class="form-control" value="{{ old('mark')}}">
                @error('mark')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="model">Модель Автомобиля</label>
                <input type="text" name="model" placeholder="Введите название модели Автомобиля" id="model" class="form-control" value="{{ old('model')}}">
                @error('model')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="color">Цвет Кузова</label>
                <input type="text" name="color" placeholder="Введите цвет Кузова" id="color" class="form-control" value="{{ old('color')}}">
                @error('color')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="car_num">Гос Номер РФ</label>
                <input type="text" name="car_num" placeholder="Введите номер автомобиля" id="car_num" class="form-control" value="{{ old('car_num')}}">
                @error('car_num')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>

            <label for="id_client">Владелец</label>
            <select name="id_client" class="form-select form-select mb-3" aria-label=".form-select-lg example">
                <?php use App\Models\Client;$clients = Client::all();?>
                @foreach($clients as $client)
                <option value="{{$client->id}}">{{$client->fio}}</option>
                @endforeach
                @error('id_client')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </select>

            <div class="mb-3">
                <label for="status">Статус автомобиля</label>
                <input name="status" class="form-check-input" type="checkbox" value="" id="status">
                <label class="form-check-label" for="status">На стоянке</label>
            </div>

            <button type="submit" class="btn btn-success" >Сохранить</button>
        </form>

    </div>

@endsection


