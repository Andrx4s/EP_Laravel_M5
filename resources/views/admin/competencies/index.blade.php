@extends('welcome')

{{--Секция для вывода всех компетенций--}}
@section('content')
    <div class="container">
        <div class="row">
            <div class="col"></div>
            <div class="col-8">
                @if(session()->has('success'))
                    @if(session()->get('success'))
                        <div class="alert alert-success mt-2">Компетенция успешно изменена!</div>
                    @else
                        <div class="alert alert-success mt-2">У вас нет доступа!</div>
                    @endif
                @endif
                @if(session()->has('delete'))
                    @if(session()->get('delete'))
                        <div class="alert alert-success mt-2">Компетенция успешно удалена!</div>
                    @else
                        <div class="alert alert-success mt-2">У вас нет доступа!</div>
                    @endif
                @endif
                @if(session()->has('create'))
                    @if(session()->get('create'))
                        <div class="alert alert-success mt-2">Компетенция успешно добавлена!</div>
                    @else
                        <div class="alert alert-success mt-2">У вас нет доступа!</div>
                    @endif
                @endif

                <h2 class="mt-2">Компетенции:</h2>

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
                    @if(isset($competencies))
                        @foreach($competencies as $competence)
                            <tr>
                                <td>{{$competence->name}}</td>
                                <td>{{$competence->en_name}}</td>
                                <td><a href="{{route('admin.competencies.edit', ['competency' => $competence->id])}}" class="btn btn-primary w-100">Редактирование</a> </td>
                                <td><button class="btn btn-danger w-100" id="roleDelete_{{$competence->id}}" data-bs-toggle="modal" data-bs-target="#roleDestroy_{{$competence->id}}" type="button"><i class="fi-trash"></i></button></td>
                            </tr>
                            <div class="modal fade" id="roleDestroy_{{$competence->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Удалить  {{$competence->en_name}}</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Вы точно хотите удалить компетенцию
                                            {{$competence->name}}
                                        </div>
                                        <div class="modal-footer">
                                            <div class="btn-group" role="group" aria-label="Solid button group">
                                                <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                                                <form action="{{route('admin.competencies.destroy', ['competency' => $competence->id])}}" method="POST">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    @csrf
                                                    <button type="submit" class="btn btn-sm btn-danger">Да, я точно хочу удалить данную компетенцию</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="5" class="text-center">Пока компетенций нет!</td>
                        </tr>
                    @endif
                    </tbody>
                </table>
            </div>
            <div class="col"></div>
        </div>
    </div>
@endsection
