@extends('welcome')

{{--Секция для редактирования аккаунта--}}
@section('content')
    <div class="container">
        <div class="row">
            <div class="col"></div>
            <div class="col-6">
                @if(isset($user))
                    <h1>Редактирование {{$user->name}}</h1>
                    @if(session()->has('success'))
                        <div class="alert alert-success">Аккаунт успешно отредактирован!</div>
                    @endif
                @else
                    <h1 class="mt-2">Создание нового аккаунта</h1>
                    @if(session()->has('success'))
                        <div class="alert alert-success">Аккаунт успешно создан!</div>
                    @endif
                @endif
                <form method="POST" action="{{route('admin.user.update', ['user' => $user->id])}}">
                    @csrf
                    @isset($user)
                        <input type="hidden" name="_method" value="PUT">
                    @endisset
                    <div class="mb-3">
                        <label for="inputFullName" class="form-label">ФИО:</label>
                        <input type="text" name="fullName" class="form-control @error('fullName') is-invalid @enderror" id="inputFullName" placeholder="ФИО" aria-describedby="invalidInputFullName" value="{{old('fullName')}}">
                        @error('fullName') <div id="invalidInputFullName" class="invalid-feedback">{{$message}}</div> @enderror
                    </div>
                    <div class="mb-3">
                        <label for="inputEmail" class="form-label">Почта:</label>
                        <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" id="inputEmail" placeholder="test@gmail.com" aria-describedby="invalidInputEmail" value="{{old('email')}}">
                        @error('email') <div id="invalidInputEmail" class="invalid-feedback">{{$message}}</div> @enderror
                    </div>
                    <div class="mb-3">
                        <label for="inputPhoneNumber" class="form-label">Номер телефона:</label>
                        <input type="tel" maxlength="11" name="phoneNumber" class="form-control @error('phoneNumber') is-invalid @enderror " id="inputPhoneNumber" aria-describedby="invaliPhoneNumberlFeedback" value="{{old('phoneNumber')}}">
                        @error('phoneNumber') <div id="invaliPhoneNumberlFeedback" class="invalid-feedback">{{$message}}</div> @enderror
                    </div>
                    <div class="mb-3">
                        <label for="inputRole" class="form-label">Роль:</label>
                        <select id="inputRole" name="role_id" class="form-select @error('role_id') is-invalid @enderror" aria-describedby="invalidInputRole">
                            @foreach($roles as $role)
                                <option value="{{$role->id}}" @if($role->id == $user->role_id) selected @endif>{{$role->name}}</option>
                            @endforeach
                        </select>
                        @error('role_id') <div id="invalidInputRole" class="invalid-feedback">{{$message}}</div> @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">
                        @if(isset($user))
                            Отредактировать аккаунт
                        @else
                            Создать новый аккаунт
                        @endif
                    </button>
                </form>
            </div>
            <div class="col"></div>
        </div>
    </div>
@endsection
