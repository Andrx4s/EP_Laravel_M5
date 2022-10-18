@extends('welcome')

{{--Секция для вывода всех ролей--}}
@section('content')
    <div class="container">
        <div class="row">
            <div class="col"></div>
            <div class="col-8">
                @if(session()->has('success'))
                    @if(session()->get('success'))
                        <div class="alert alert-success mt-2">Роль успешно изменена!</div>
                    @else
                        <div class="alert alert-success mt-2">У вас нет доступа!</div>
                    @endif
                @endif
                @if(session()->has('delete'))
                    @if(session()->get('delete'))
                        <div class="alert alert-success mt-2">Роль успешно удалена!</div>
                    @else
                        <div class="alert alert-success mt-2">У вас нет доступа!</div>
                    @endif
                @endif
                    @if(session()->has('create'))
                        @if(session()->get('create'))
                            <div class="alert alert-success mt-2">Роль успешно добавлена!</div>
                        @else
                            <div class="alert alert-success mt-2">У вас нет доступа!</div>
                       @endif
                    @endif

                <h2 class="mt-2">Роли:</h2>

                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Наименование</th>
                        <th scope="col">Наименование на английском</th>
                        <th scope="col">Редактирование</th>
                        <th scope="col">Удаление</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(isset($roles))
                            @foreach($roles as $role)
                                <tr>
                                    <td>{{$role->name}}</td>
                                    <td>{{$role->en_name}}</td>
                                    <td><a href="{{route('admin.roles.edit', ['role' => $role->id])}}" class="btn btn-primary w-100">Редактирование</a> </td>
                                    <td><button class="btn btn-danger w-100" id="roleDelete_{{$role->id}}" data-bs-toggle="modal" data-bs-target="#roleDestroy_{{$role->id}}" type="button"><i class="fi-trash"></i></button></td>
                                </tr>
                                <div class="modal fade" id="roleDestroy_{{$role->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Удалить роль {{$role->en_name}}</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Вы точно хотите удалить роль
                                                {{$role->en_name}}
                                            </div>
                                            <div class="modal-footer">
                                                <div class="btn-group" role="group" aria-label="Solid button group">
                                                    <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                                                    <form action="{{route('admin.roles.destroy', ['role' => $role->id])}}" method="POST">
                                                        <input type="hidden" name="_method" value="DELETE">
                                                        @csrf
                                                        <button type="submit" class="btn btn-sm btn-danger">Да, я точно хочу удалить данную роль</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                    @else
                        <tr>
                            <td colspan="5" class="text-center">Пока ролей нет!</td>
                        </tr>
                    @endif
                    </tbody>
                </table>
            </div>
            <div class="col"></div>
        </div>
    </div>
@endsection
