@extends('layouts.app')

@section('title-block', 'Редактировать данные')
@section('title', 'Редактировать данные: '.$car->client->fio)

@section('content')

    <div class="container">
        <h1>Клиент</h1>
        <form method="post"
              @if(isset($car))
              action="{{ route('clients.update', $car->client) }}"
              @endif
              class="mt-3">
            @csrf
            @isset($car)
                @method('put')
            @endisset
            <div class="mb-3">
                <label for="fio">ФИО</label>
                <input type="text" name="fio" placeholder="Введите ФИО" id="fio" class="form-control" value="{{ old('fio', $car->client->fio) }}">
                @error('fio')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>

            <label for="gender">Пол</label>
            <select name="gender" class="form-select form-select mb-3" aria-label=".form-select-lg example">
                <option value="Муж."{{old('gender', $car->client->gender == "Муж." ? 'selected="selected' : null)}}>Муж.</option>
                <option value="Жен."{{old('gender', $car->client->gender == "Жен." ? 'selected="selected' : null)}}>Жен.</option>
            </select>

            <div class="mb-3">
                <label for="phone">Номер телефона</label>
                <input type="text" name="phone" placeholder="Введите номер телефона" id="phone" class="form-control" value="{{ old('phone', $car->client->phone)}}">
                @error('phone')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="address">Адрес проживания</label>
                <input type="text" name="address" placeholder="Введите Адрес проживания" id="address" class="form-control" value="{{old('address', $car->client->address)}}">
                @error('address')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-success">Сохранить</button>
        </form>
        <?php use App\Models\Car;use App\Models\Client;$cars = Car::all();?>
        @foreach($cars as $key)
            @if($key->id_client == $car->client->id)
                <h1>Автомобиль {{$key->mark}}</h1>
                <form method="post"
                      @if(isset($key))
                      action="{{ route('cars.update', $key) }}"
                      @endif
                      class="mt-3">
                    @csrf
                    @isset($key)
                        @method('put')
                    @endisset
                    <div class="mb-3">
                        <label for="mark">Марка Автомобиля</label>
                        <input type="text" name="mark" placeholder="Введите название марки Автомобиля" id="mark" class="form-control" value="{{ old('mark', $key->mark)}}">
                        @error('mark')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="model">Модель Автомобиля</label>
                        <input type="text" name="model" placeholder="Введите название модели Автомобиля" id="model" class="form-control" value="{{ old('model', $key->model)}}">
                        @error('model')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="color">Цвет Кузова</label>
                        <input type="text" name="color" placeholder="Введите цвет Кузова" id="color" class="form-control" value="{{ old('color', $key->color)}}">
                        @error('color')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="car_num">Гос Номер РФ</label>
                        <input type="text" name="car_num" placeholder="Введите номер автомобиля" id="car_num" class="form-control" value="{{ old('car_num', $key->car_num)}}">
                        @error('car_num')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>

                    <label for="id_client">Владелец</label>
                    <select name="id_client" class="form-select form-select mb-3" aria-label=".form-select-lg example">

                    <?php $clients = Client::all();?>
                        @foreach($clients as $client)
                            <option value="{{$client->id}}"
                                    @if($client->fio == $key->client->fio)
                                    selected="selected">
                                    @endif
                                {{$client->fio}}</option>
                        @endforeach
                        @error('id_client')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </select>
                    <div class="mb-3">
                        <label for="status">Статус автомобиля</label>
                        <input name="status" class="form-check-input" type="checkbox"
                               @if($key->status == 1)
                               checked="checked"
                               @endif
                               value="" id="status">
                        <label class="form-check-label" for="status">На стоянке</label>
                    </div>
                    <button type="submit" class="btn btn-success" >Сохранить</button>
                </form>
            @endif
        @endforeach

        <h1>Создать новый автомобиль</h1>
        <form method="post"
              action="{{route('cars.store')}}">
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
                <?php $clients = Client::all();?>
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

            <button type="submit" class="btn btn-success" >Создать</button>
        </form>

    </div>

@endsection
