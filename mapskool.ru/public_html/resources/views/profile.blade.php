@extends('adminlte::page')

@section('title', 'AdminPanel')

@section('content_header')
    <h1>Администратор</h1>
@stop

@section('content')
    <section class="content">
        <div class="box">
            <table id="example1" class="table_blur">
                @foreach($user as $elem)
                    <tr>
                        <th>Ваша почта:<br></th>
                        <td>{{ $elem->email }}</td>
                    </tr>
                    <tr>
                        <th>
                            <br>
                            <a href="{{ route('editUser', $elem->id) }}">Поменять пароль или почту</a>
                        </th>
                    </tr>
                @endforeach
            </table>
        </div>
    </section>
@stop