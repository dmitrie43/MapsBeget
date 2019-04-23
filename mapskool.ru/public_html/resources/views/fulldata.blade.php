@extends('adminlte::page')

@section('title', 'AdminPanel')

@section('content')
    <style>
        @media screen and (max-width: 600px) {
            .table-wrap {
                overflow-x: auto;
                overflow-y: scroll;
            }
        }
        table {
            font-family: "Lucida Sans Unicode", "Lucida Grande", Sans-Serif;
            font-size: 14px;
            border-collapse: collapse;
            text-align: center;
        }
        th, td:first-child {
            background: #AFCDE7;
            color: white;
            padding: 10px 20px;

        }
        th, td {
            border-style: solid;
            border-width: 0 1px 1px 0;
            border-color: white;
        }
        td {
            background: #D8E6F3;
        }
        th:first-child, td:first-child {
            text-align: left;
        }
    </style>
    <section class="content">
        <table id="example1" class="table_blur table-wrap">
            <th colspan="6"></th>
            @foreach($org as $elem)
                <tr>
                    <th>Наименование организации</th>
                    <td>{{ $elem->nameOrganization }}</td>
                    <th colspan="4"></th>
                </tr>
                <tr>
                    <th>Статус организации</th>
                    <td>{{ $elem->statusOrganization }}</td>
                    <th colspan="4"></th>
                </tr>
                <tr>
                    <th>Номер документа</th>
                    <td>{{ $elem->numberDocumentation }}</td>
                    <th colspan="4"></th>
                </tr>
                <tr>
                    <th>Аббревиатура организации</th>
                    <td>{{ $elem->reduction }}</td>
                    <th colspan="4"></th>
                </tr>
            @endforeach
            @foreach($area as $elem)
                <tr>
                    <th>Район</th>
                    <td>{{ $elem->name }}</td>
                    <th colspan="4"></th>
                </tr>
            @endforeach
            @foreach($dir as $elem)
                <tr>
                    <th>ФИО Директора</th>
                    <td>{{ $elem->surname }} {{ $elem->name }} {{ $elem->patronymic }}</td>
                    <th colspan="4"></th>
                </tr>
            @endforeach
            @foreach($resp as $elem)
                <tr>
                    <th>ФИО Ответственного и его номер</th>
                    <td>{{ $elem->surname }} {{ $elem->name }} {{ $elem->patronymic }}</td>
                    <td>{{ $elem->telephone }}</td>
                    <th colspan="3"></th>
                </tr>
            @endforeach
                <tr>
                    <th>Учителя</th>
                    <th>ФИО</th>
                    <th colspan="4"></th>
                    @foreach($teach as $elem)
                        <tr>
                            <td>№{{ $loop->iteration }}</td>
                            <td>{{ $elem->surname }} {{ $elem->name }} {{ $elem->patronymic }}</td>
                            <th colspan="4"></th>
                        </tr>
                    @endforeach
                </tr>
                <tr>
                    <th>Музеи:</th>
                    <th>Описание</th>
                    <th>Экспозиции</th>
                    <th>Руководитель</th>
                    <th colspan="2"></th>
                    @foreach($museum as $elem)
                        <tr>
                            <td>№{{ $loop->iteration }}</td>
                            <td>{{ $elem->description }}</td>
                            <td>{{ $elem->exposition }}</td>
                            <td>{{ $elem->head }}</td>
                            <th colspan="4"></th>
                        </tr>
                    @endforeach
                </tr>
                <tr>
                    <th>Кабинеты:</th>
                    <th>Описание</th>
                    <th>Руководитель</th>
                    <th colspan="3"></th>
                    @foreach($cab as $elem)
                        <tr>
                            <td>№{{ $loop->iteration }}</td>
                            <td>{{ $elem->description }}</td>
                            <td>{{ $elem->head }}</td>
                            <th colspan="3"></th>
                        </tr>
                    @endforeach
                </tr>
                <th>Иное:</th>
                <th>Наименование</th>
                <th colspan="4"></th>
                @foreach($other as $elem)
                    <tr>
                        <td>№{{ $loop->iteration }}</td>
                        <td>{{ $elem->description }}</td>
                        <th colspan="4"></th>
                    </tr>
                @endforeach
                <tr>
                    <th>Предметы:</th>
                    <th>Название</th>
                    <th>Уровень образования</th>
                    <th colspan="3"></th>
                    @foreach($sub as $elem)
                        <tr>
                            <td>№{{ $loop->iteration }}</td>
                            <td>{{ $elem->title }}</td>
                            <td>{{ $elem->level }}</td>
                            <th colspan="3"></th>
                        </tr>
                    @endforeach
                </tr>
                <tr>
                    <th>Учебники:</th>
                    <th>Автор</th>
                    <th>Название</th>
                    <th>Издательство</th>
                    <th>Год выпуска</th>
                    <th></th>
                    @foreach($book as $elem)
                        <tr>
                            <td>№{{ $loop->iteration }}</td>
                            <td>{{ $elem->author }}</td>
                            <td>{{ $elem->name }}</td>
                            <td>{{ $elem->publish }}</td>
                            <td>{{ $elem->year }}</td>
                            <th></th>
                        </tr>
                    @endforeach
                </tr>
                <tr>
                    <th>Методическое обеспечение:</th>
                    <th>Автор</th>
                    <th>Название</th>
                    <th>Издательство</th>
                    <th>Год выпуска</th>
                    <th></th>
                    @foreach($meth as $elem)
                        <tr>
                            <td>№{{ $loop->iteration }}</td>
                            <td>{{ $elem->author }}</td>
                            <td>{{ $elem->name }}</td>
                            <td>{{ $elem->publish }}</td>
                            <td>{{ $elem->year }}</td>
                            <th></th>
                        </tr>
                    @endforeach
                </tr>
                <tr>
                    <th>Факультативы:</th>
                    <th>Описание</th>
                    <th>Класс</th>
                    <th>Руководитель</th>
                    <th colspan="2"></th>
                    @foreach($open as $elem)
                    <tr>
                        <tr>
                            <td>№{{ $loop->iteration }}</td>
                            <td>{{ $elem->description	}}</td>
                            <td>{{ $elem->class }}</td>
                            <td>{{ $elem->head }}</td>
                            <th colspan="3"></th>
                        </tr>
                    </tr>
                    @endforeach
                </tr>
                <tr>
                    <th>Кружки:</th>
                    <th>Название</th>
                    <th>Класс</th>
                    <th>Руководитель</th>
                    <th>Описание</th>
                    <th colspan="1"></th>
                    @foreach($soc as $elem)
                    <tr>
                        <td>№{{ $loop->iteration }}</td>
                        <td>{{ $elem->name }}</td>
                        <td>{{ $elem->class }}</td>
                        <td>{{ $elem->head }}</td>
                        <td>{{ $elem->description }}</td>
                        <th colspan="1"></th>
                    </tr>
                    @endforeach
                </tr>
                <tr>
                    <th>Коллективы:</th>
                    <th>Руководитель</th>
                    <th>Название</th>
                    <th>Участники</th>
                    <th>Описание</th>
                    <th colspan="1"></th>
                    @foreach($col as $elem)
                    <tr>
                        <td>№{{ $loop->iteration }}</td>
                        <td>{{ $elem->head }}</td>
                        <td>{{ $elem->name }}</td>
                        <td>{{ $elem->ageChildren }}</td>
                        <td>{{ $elem->description }}</td>
                        <th colspan="1"></th>
                    </tr>
                    @endforeach
                </tr>
                <tr>
                    <th>Мероприятия:</th>
                    <th>Уровень</th>
                    <th>Форма</th>
                    <th>Название</th>
                    <th>Дата проведения</th>
                    <th></th>
                    @foreach($event as $elem)
                    <tr>
                        <td>№{{ $loop->iteration }}</td>
                        <td>{{ $elem->level }}</td>
                        <td>{{ $elem->form }}</td>
                        <td>{{ $elem->name }}</td>
                        <td>{{ $elem->date }}</td>
                        <th></th>
                    </tr>
                    @endforeach
                </tr>
                @foreach($add as $elem)
                <tr>
                <th>Дополнительная информация:</th>
                    <td colspan="4">{{ $elem->description }}</td>
                    <th></th>
                </tr>
                @endforeach
            <th colspan="6"></th>
        </table>
    </section>
@stop




