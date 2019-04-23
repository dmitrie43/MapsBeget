@extends('adminlte::page')

@section('title', 'AdminPanel')

@section('content_header')
    <h1>Администратор</h1>
@stop

@section('content')
    <section class="content">
    {{Form::open([
    'route' => ['updateUser', $user->id],
    'method' => 'put',
    ])}}
    <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Меняем данные</h3>
                @include('errors')
            </div>
            <div class="box-body">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Почта</label>
                        <input name="email" type="text" class="form-control" id="exampleInputEmail1" placeholder="" value="{{$user->email}}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Пароль</label>
                        <input name="password" type="password" class="form-control" id="exampleInputEmail1" placeholder="" value="">
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <a href="{{route('profile')}}" class="btn btn-default">Назад</a>
                <button class="btn btn-warning pull-right">Изменить</button>
            </div>
            <!-- /.box-footer-->
        </div>
        <!-- /.box -->
        {{Form::close()}}
    </section>
@stop