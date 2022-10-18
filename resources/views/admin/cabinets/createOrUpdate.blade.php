@extends('welcome')

{{--Секция для создания и редактирования кабинетов--}}
@section('content')
    <div class="container">
        <div class="row">
            <div class="col"></div>
            <div class="col-6">
                @if(isset($cabinet))
                    <h1>Редактирование {{$cabinet->name}}</h1>
                    @if(session()->has('success'))
                        <div class="alert alert-success">Кабинет успешно отредактирован!</div>
                    @endif
                @else
                    <h1 class="mt-2">Создание нового кабинета</h1>
                    @if(session()->has('success'))
                        <div class="alert alert-success">Кабинет успешно создан!</div>
                    @endif
                @endif
                <form method="post" action="{{(isset($cabinet) ? route('admin.cabinets.update', ['cabinet' => $cabinet->id]) : route('admin.cabinets.store'))}}" enctype="multipart/form-data">
                    @csrf
                    @isset($cabinet)
                        <input type="hidden" name="_method" value="PUT">
                    @endisset
                    <div class="mb-3">
                        <label for="inputCabinetNumber" class="form-label">Номер кабинета:</label>
                        <input type="text" name="cabinetNumber" class="form-control @error('cabinetNumber') is-invalid @enderror" id="inputCabinetNumber" placeholder="Номер кабинета: 101" aria-describedby="invalidInputCabinetNumber" value="{{ old('cabinetNumber') }}">
                        @error('cabinetNumber') <div id="invalidInputCabinetNumber" class="invalid-feedback"> {{ $message }} </div> @enderror
                    </div>
                    <div class="mb-3">
                        <label for="inputName" class="form-label">Наименование:</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="inputName" placeholder="Терапевт" aria-describedby="invalidInputName" value="{{ old('name') }}">
                        @error('name') <div id="invalidInputName" class="invalid-feedback"> {{ $message }} </div> @enderror
                    </div>
                    <div class="mb-3">
                        <label for="inputEn_name" class="form-label">Английское наименование:</label>
                        <input type="text" name="en_name" class="form-control @error('en_name') is-invalid @enderror" id="inputEn_name" placeholder="Therapist" aria-describedby="invalidInputEn_name" value="{{ old('en_name') }}">
                        @error('en_name') <div id="invalidInputEn_name" class="invalid-feedback"> {{ $message }} </div> @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">
                        @if(isset($role))
                            Отредактировать роль
                        @else
                            Создать новую роль
                        @endif
                    </button>
                </form>
            </div>
            <div class="col"></div>
        </div>
    </div>
@endsection
