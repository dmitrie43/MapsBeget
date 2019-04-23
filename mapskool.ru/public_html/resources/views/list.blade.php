@extends('adminlte::page')

@section('title', 'AdminPanel')

@section('content')
    <div class="form-group">
        <a href="{{ route('create') }}" class="btn btn-success">Добавить</a>
    </div>
    <table id="example1" class="table table-bordered table-striped" style="max-width: 70%">
        <thead>
        <tr>
            <th>ID</th>
            <th>Наименование организации</th>
            <th>Дата создания</th>
            <th>Дата изменения</th>
            <th style="text-align: center">Изменить</th>
            <th style="text-align: center">Удалить</th>
        </tr>
        </thead>
        <tbody>
        @foreach($lists as $list)
                <tr>
                    <td>{{ $list->id }}</td>
                    <td width="300px;"><a href="{{route('fullData', $list->id)}}">{{ $list->nameOrganization }}</a></td>
                    <td>{{ $list->created_at }}</td>
                    <td>{{ $list->updated_at }}</td>
                    <td style="text-align: center">
                        <a href="{{ route('edit', $list) }}" class="fa fa-pencil"></a>
                    </td>
                    <td style="text-align: center">{{Form::open(['route' => ['destroy', $list], 'method' => 'delete'])}}
                        {{--<form action="{{route('posts.destroy', [$post->id])}}" method="post">--}}
                        <button onclick="return confirm('Удаление необратимо, вы уверены?')" type="submit" class="delete">
                            <a class="fa fa-remove"></a>
                        </button>
                        {{--</form>--}}
                        {{Form::close()}}
                    </td>
                </tr>
        @endforeach
        </tbody>
    </table>
@stop