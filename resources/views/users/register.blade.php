@extends('welcome')

{{--Секция для регистрации аккаута--}}
@section('content')
    <div class="container">
        <div class="row">
            <div class="col"></div>
            <div class="col10">
                <h1>Регистрация нового пользователя</h1>
                @auth
                    <div class="alert alert-primary">Вы уже авторизованы. Регистрация невозможна</div>
                @endauth
                @guest
                    <form method="POST" action="{{route('register')}}" enctype="multipart/form-data">
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
                            <input type="tel" name="phoneNumber" class="form-control @error('phoneNumber') is-invalid @enderror " id="inputPhoneNumber" aria-describedby="invaliPhoneNumberlFeedback" value="{{old('phoneNumber')}}">
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
                        <div class="mb-3 form-check">
                            <input type="checkbox" name="privacy" class="form-check-input @error('privacy') is-invalid @enderror " id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">Согласие с политикой конфиденциальности.</label>
                            @error('privacy') <div id="invalidEmailFeedback" class="invalid-feedback">{{$message}}</div> @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Регистрация</button>
                    </form>
                @endguest
            </div>
            <div class="col"></div>
        </div>
    </div>
@endsection
