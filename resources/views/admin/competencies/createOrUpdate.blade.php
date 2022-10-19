@extends('welcome')

{{--Секция для создания и редактирования компетенций--}}
@section('content')
    <div class="container">
        <div class="row">
            <div class="col"></div>
            <div class="col-6">
                @if(isset($competence))
                    <h1>Редактирование {{$competence->name}}</h1>
                    @if(session()->has('success'))
                        <div class="alert alert-success">Комптенция успешно отредактирована!</div>
                    @endif
                @else
                    <h1 class="mt-2">Создание новой компетенции</h1>
                    @if(session()->has('success'))
                        <div class="alert alert-success">Комптенция успешно создана!</div>
                    @endif
                @endif
                <form method="post" action="{{(isset($competence) ? route('admin.competencies.update',  $competence->id) : route('admin.competencies.store'))}}" enctype="multipart/form-data">
                    @csrf
                    @isset($competence)
                        <input type="hidden" name="_method" value="PUT">
                    @endisset
                    <div class="mb-3">
                        <label for="inputName" class="form-label">Наименование:</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="inputName" placeholder="Наименование компетенции: Нарколог" aria-describedby="invalidInputName" value="{{ old('name') }}">
                        @error('name') <div id="invalidInputName" class="invalid-feedback"> {{ $message }} </div> @enderror
                    </div>
                    <div class="mb-3">
                        <label for="inputEn_name" class="form-label">Английское наименование:</label>
                        <input type="text" name="en_name" class="form-control @error('en_name') is-invalid @enderror" id="inputEn_name" placeholder="Narcologist" aria-describedby="invalidInputEn_name" value="{{ old('en_name') }}">
                        @error('en_name') <div id="invalidInputEn_name" class="invalid-feedback"> {{ $message }} </div> @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">
                        @if(isset($competence))
                            Отредактировать компетенцию
                        @else
                            Создать новую компетенцию
                        @endif
                    </button>
                </form>
            </div>
            <div class="col"></div>
        </div>
    </div>
@endsection
