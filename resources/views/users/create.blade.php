@extends('welcome')

{{--Секция для создания новой записи к врачу--}}
@section('content')
    <div class="container">
        <div class="row">
            <div class="col"></div>
            <div class="col-10">
                @if(session()->has('register'))
                    <div class="alert alert-primary">Аккаунт успешно добавлен!</div>
                @endif
                <h1 class="mt-2">Регистрация нового пользователя</h1>
                <form method="POST" action="{{route('admin.user.store')}}">
                    @csrf
                    <div class="mb-3">
                        <label for="inputDoctor" class="form-label">Роль:</label>
                        <select id="inputDoctor" name="doctor_id" class="form-select @error('doctor_id') is-invalid @enderror" aria-describedby="invalidInputDoctor">
                            @foreach($users as $item)
                                <option value="{{$item->id}}">{{$item->fullName}} / {{$item->competence->name}}</option>
                            @endforeach
                        </select>
                        @error('doctor_id') <div id="invalidInputDoctor" class="invalid-feedback">{{$message}}</div> @enderror
                    </div>
                    <div class="mb-3">
                        <label for="inputDateTime" class="form-label">Роль:</label>
                        <select id="inputDateTime" name="dateTimeRecord" class="form-select @error('dateTimeRecord') is-invalid @enderror" aria-describedby="invalidInputDateTime">

                        </select>
                        @error('dateTimeRecord') <div id="invalidInputDateTime" class="invalid-feedback">{{$message}}</div> @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Регистрация</button>
                </form>
            </div>
            <div class="col"></div>
        </div>
    </div>
@endsection
