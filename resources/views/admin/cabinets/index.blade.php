@extends('welcome')

{{--Секция для вывода всех кабинетов--}}
@section('content')
    <div class="container">
        <div class="row">
            <div class="col"></div>
            <div class="col-11">
                @if(session()->has('update'))
                    @if(session()->get('update'))
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

                <h2 class="mt-2">Роли: </h2>

                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Номер кабинета</th>
                        <th scope="col">Название кабинета на русском</th>
                        <th scope="col">Название кабинета на английском</th>
                        <th scope="col">Редактирование</th>
                        <th scope="col">Удаление</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($cabinets as $cabinet)
                            <tr>
                                <td>{{$cabinet->cabinetNumber}}</td>
                                <td>{{$cabinet->name}}</td>
                                <td>{{$cabinet->en_name}}</td>
                                <td><a href="{{route('admin.cabinets.edit', ['cabinet' => $cabinet->id])}}" class="btn btn-primary w-100">Редактирование</a></td>
                                <td><button class="btn btn-danger w-100" id="roleDelete_{{$cabinet->id}}" data-bs-toggle="modal" data-bs-target="#roleDestroy_{{$cabinet->id}}" type="button"><i class="fi-trash"></i></button></td>
                            </tr>
                            <div class="modal fade" id="roleDestroy_{{$cabinet->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Удалить роль {{$cabinet->en_name}}</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Вы точно хотите удалить роль
                                            {{$cabinet->en_name}}
                                        </div>
                                        <div class="modal-footer">
                                            <div class="btn-group" role="group" aria-label="Solid button group">
                                                <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                                                <form action="{{route('admin.cabinets.destroy', ['cabinet' => $cabinet->id])}}" method="POST">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    @csrf
                                                    <button type="submit" class="btn btn-sm btn-danger">Да, я точно хочу удалить данную роль</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center">Пока кабинетов нет!</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="col"></div>
        </div>
    </div>
@endsection
