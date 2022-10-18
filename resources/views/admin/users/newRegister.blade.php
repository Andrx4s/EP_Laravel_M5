@extends('welcome')

{{--Секция для создания нового аккаунта--}}
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
                            <label for="inputFullName" class="form-label">Ваше ФИО:</label>
                            <input type="text" name="fullName" class="form-control @error('fullName') is-invalid @enderror " id="inputFullName" aria-describedby="invalidFullNameFeedback" value="{{ old('fullName')}}">
                            @error('fullName') <div id="invalidFullNameFeedback" class="invalid-feedback">{{$message}}</div> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="inputEmail" class="form-label">Электронная почта:</label>
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror " id="inputEmail" aria-describedby="invalidEmailFeedback" value="{{old('email')}}">
                            @error('email') <div id="invalidEmailFeedback" class="invalid-feedback">{{$message}}</div> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="inputBirthday" class="form-label">Дата рождения:</label>
                            <input type="date" name="birthday" class="form-control @error('birthday') is-invalid @enderror " id="inputBirthday" aria-describedby="invalidBirthdayFeedback" value="{{old('birthday')}}">
                            @error('birthday') <div id="invaliBirthdaylFeedback" class="invalid-feedback">{{$message}}</div> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="inputPhoneNumber" class="form-label">Номер телефона:</label>
                            <input minlength="10" maxlength="11" type="tel" name="phoneNumber" class="form-control @error('phoneNumber') is-invalid @enderror " id="inputPhoneNumber" aria-describedby="invaliPhoneNumberlFeedback" value="{{old('phoneNumber')}}">
                            @error('phoneNumber') <div id="invaliPhoneNumberlFeedback" class="invalid-feedback">{{$message}}</div> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="inputPassword" class="form-label">Пароль:</label>
                            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror " id="inputPassword" aria-describedby="invalidPasswordFeedback">
                            @error('password') <div id="invalidPasswordFeedback" class="invalid-feedback">{{$message}}</div> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="inputPasswordConfirmation" class="form-label">Повторите пароль:</label>
                            <input type="password" name="password_confirmation" class="form-control @error('password') is-invalid @enderror " id="inputPasswordConfirmation" aria-describedby="invalidPasswordConfirmationFeedback">
                            @error('password') <div id="invalidPasswordConfirmationFeedback" class="invalid-feedback">{{$message}}</div> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="inputGender" class="form-label">Пол:</label>
                            <select id="inputGender" name="gender" class="form-select @error('gender') is-invalid @enderror" aria-describedby="invalidInputGender">
                                <option value="Мужчина">Мужчина</option>
                                <option value="Женщина">Женщина</option>
                            </select>
                            @error('gender') <div id="invalidInputGender" class="invalid-feedback">{{$message}}</div> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="inputRole" class="form-label">Роль:</label>
                            <select id="inputRole" name="role_id" class="form-select @error('role_id') is-invalid @enderror" aria-describedby="invalidInputRole">
                                @foreach($roles as $role)
                                    <option value="{{$role->id}}">{{$role->name}}</option>
                                @endforeach
                            </select>
                            @error('role_id') <div id="invalidInputRole" class="invalid-feedback">{{$message}}</div> @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Регистрация</button>
                    </form>
            </div>
            <div class="col"></div>
        </div>
    </div>
@endsection
