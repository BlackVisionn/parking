@extends('layouts.app')

@section('title-block', 'Создать клиента')
@section('title', 'Создать клиента')

@section('content')


    <div class="container">
        <h1>Клиент</h1>
        <form method="post" action="{{route('clients.store')}}">
            @csrf
            <div class="mb-3">
                <label for="fio">ФИО</label>
                <input type="text" name="fio" placeholder="Введите ФИО" id="fio" class="form-control" value="{{ old('fio')}}">
                @error('fio')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>

            <label for="gender">Пол</label>
            <select name="gender" class="form-select form-select mb-3" aria-label=".form-select-lg example">
                <option value="Муж.">Муж.</option>
                <option value="Жен.">Жен.</option>
            </select>

            <div class="mb-3">
                <label for="phone">Номер телефона</label>
                <input type="text" name="phone" placeholder="Введите номер телефона" id="phone" class="form-control" value="{{ old('phone')}}">
                @error('phone')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="address">Адрес проживания</label>
                <input type="text" name="address" placeholder="Введите Адрес проживания" id="address" class="form-control" value="{{old('address')}}">
                @error('address')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-success" >Сохранить</button>
        </form>

    </div>



@endsection
