@extends('welcome')

{{--Секция для создания и редактирования ролей--}}
@section('content')
    <div class="container">
        <div class="row">
            <div class="col"></div>
            <div class="col-6">
                @if(isset($role))
                    <h1>Редактирование {{$role->name}}</h1>
                    @if(session()->has('success'))
                        <div class="alert alert-success">Роль успешно отредактирована!</div>
                    @endif
                @else
                    <h1 class="mt-2">Создание новой роли</h1>
                    @if(session()->has('success'))
                        <div class="alert alert-success">Роль успешно создана!</div>
                    @endif
                @endif
                <form method="post" action="{{(isset($role) ? route('admin.roles.update', ['role' => $role->id]) : route('admin.roles.store'))}}" enctype="multipart/form-data">
                    @csrf
                    @isset($role)
                        <input type="hidden" name="_method" value="PUT">
                    @endisset
                    <div class="mb-3">
                        <label for="inputName" class="form-label">Наименование:</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="inputName" placeholder="Наименование роли: Пациент" aria-describedby="invalidInputName" value="{{ old('name') }}">
                        @error('name') <div id="invalidInputName" class="invalid-feedback"> {{ $message }} </div> @enderror
                    </div>
                    <div class="mb-3">
                        <label for="inputEn_name" class="form-label">Английское наименование:</label>
                        <input type="text" name="en_name" class="form-control @error('en_name') is-invalid @enderror" id="inputEn_name" placeholder="Patient" aria-describedby="invalidInputEn_name" value="{{ old('en_name') }}">
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
