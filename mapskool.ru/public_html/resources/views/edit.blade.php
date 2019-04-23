@extends('adminlte::page')

@section('title', 'AdminPanel')

@section('content')
    <section class="content">
        {{ Form::open([
            'route' => ['update', $org->id],
            'method' => 'put'
        ]) }}
        <style>
            .teach td, th {
                padding: 10px 0 15px 10px;
            }
            textarea {
                resize: none;
            }
        </style>
        <div class="box">
            <div class="box-header with-border">
                <h2 class="box-title">Изменяем организацию</h2>
                @include('errors')
            </div>
            <div class="box-body">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Наименование образовательной организации(обязательно)</label>
                        <input name="nameOrganization" value="{{ $org->nameOrganization }}" type="text" class="form-control" id="exampleInputEmail1" placeholder="">
                    </div>
                    @foreach($dir as $item)
                    <div class="form-group">
                        <label for="exampleInputEmail1">Фамилия директора образовательной организации</label>
                        <input name="Director[]" value="{{ $item->surname }}" type="text" class="form-control" id="exampleInputEmail1" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Имя директора</label>
                        <input name="Director[]" value="{{ $item->name }}" type="text" class="form-control" id="exampleInputEmail1" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Отчество директора</label>
                        <input name="Director[]" value="{{ $item->patronymic }}" type="text" class="form-control" id="exampleInputEmail1" placeholder="">
                    </div>
                    @endforeach
                    @foreach($resp as $item)
                    <div class="form-group">
                        <label for="exampleInputEmail1">Фамилия лица, ответственного в образовательной организации за этнокультурную
                            составляющую образовательного процесса</label>
                        <input name="Responsible[]" value="{{ $item->surname }}" type="text" class="form-control" id="exampleInputEmail1" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Имя ответственного</label>
                        <input name="Responsible[]" value="{{ $item->name }}" type="text" class="form-control" id="exampleInputEmail1" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Отчество ответственного</label>
                        <input name="Responsible[]" value="{{ $item->patronymic }}" type="text" class="form-control" id="exampleInputEmail1" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Номер телефона ответственного</label>
                        <input name="Responsible[]" value="{{ $item->telephone }}" type="text" class="form-control" id="exampleInputEmail1" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Введите аббревиатуру организации</label>
                        <input name="reduction" value="{{ $org->reduction }}" type="text" class="form-control" id="exampleInputEmail1">
                    </div>
                    @endforeach
                    <div class="form-group">
                        <label for="exampleInputEmail1">Выберите район: </label>
                        @foreach($area as $item)
                        <select name="area_id">
                            @foreach ($areas as $elem)
                                @if($item->name == $elem->name)
                                    <option selected value="{{ $loop->iteration }}">{{ $elem->name }}</option>
                                @endif
                                <option value="{{ $loop->iteration }}">{{ $elem->name }}</option>
                            @endforeach
                        @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Статус образовательной организации</label>
                        <textarea  class="form-control" rows="3" cols="40" name="statusOrganization" type="text" id="exampleInputEmail1" placeholder="">{{ $org->statusOrganization }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Номер документа, подтверждающий наличие статуса</label>
                        <textarea  class="form-control" rows="3" cols="40" name="numberDocumentation" type="text" id="exampleInputEmail1" placeholder="">{{ $org->numberDocumentation }}</textarea>
                    </div>
                    <h3>Сведения о наличии:</h3>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Укажите учителей родного (мордовского) языка, их ФИО</label>
                        <table class="table-check tc tc2">
                            <thead>
                            <th>№</th>
                            <th>Фамилия</th>
                            <th>Имя</th>
                            <th>Отчество</th>
                            </thead>
                            <tbody>
                            @if($teach->count() == null)
                                <tr class="teach">
                                    <td class="myIdElement">1</td>
                                    <td>
                                        <input type="text" placeholder="" name="Teacher[]" size="10">
                                    </td>
                                    <td>
                                        <input type="text" placeholder="" name="Teacher[]" size="10">
                                    </td>
                                    <td>
                                        <input type="text" placeholder="" name="Teacher[]" size="10">
                                    </td>
                                </tr>
                            @endif
                            @foreach($teach as $item)
                                <tr class="teach">
                                    <td class="myIdElement">{{ $loop->iteration }}</td>
                                    <td>
                                        <input type="text" value="{{ $item->surname }}" placeholder="" name="Teacher[]" size="10">
                                    </td>
                                    <td>
                                        <input type="text" value="{{ $item->name }}" placeholder="" name="Teacher[]" size="10">
                                    </td>
                                    <td>
                                        <input type="text" value="{{ $item->patronymic }}" placeholder="" name="Teacher[]" size="10">
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <button type="button" class="addNewStr">Добавить ещё</button>
                        <button type="button" class="deleteNewStr">Очистить</button>
                        {{--{{ Form::open() }}--}}
                        {{--<p>--}}
                        {{--<inpu class="countTeachers" type="number" name="rows" max="10" min="1" style="width: 100px">--}}
                        {{--<inpu type="button" name="create-teachers" value="Показать" class="btn btn-default create-teachers">--}}
                        {{--</p>--}}
                        {{--{{ Form::close() }}--}}
                        {{--{{ Form::open([--}}
                        {{--'route' => 'store'--}}
                        {{--]) }}--}}
                        {{--{{ Form::close() }}--}}
                        {{--{{ Form::open([--}}
                        {{--'route' => 'store2'--}}
                        {{--]) }}--}}
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Названия музеев с экспозициями, посвященными истории,
                            культура и быту мордовского народа</label>
                        <table class="table-check tc tc2">
                            <thead>
                            <th>№</th>
                            <th>Описание</th>
                            <th>Экспозиции</th>
                            <th>Руководитель</th>
                            </thead>
                            <tbody>
                            @if($museum->count() == null)
                                <tr class="teach">
                                    <td class="myIdElement">1</td>
                                    <td>
                                        <textarea  class="form-control" rows="3" cols="40" type="text" placeholder="" name="Museum[]" size="10"></textarea>
                                    </td>
                                    <td>
                                        <textarea  class="form-control" rows="3" cols="40" type="text" placeholder="" name="Museum[]" size="10"></textarea>
                                    </td>
                                    <td>
                                        <input type="text" placeholder="" name="Museum[]" size="10">
                                    </td>
                                </tr>
                            @endif
                            @foreach($museum as $item)
                                <tr class="teach">
                                    <td class="myIdElement">{{ $loop->iteration }}</td>
                                    <td>
                                        <textarea  class="form-control" rows="3" cols="40" type="text" placeholder="" name="Museum[]" size="10">{{ $item->description }}</textarea>
                                    </td>
                                    <td>
                                        <textarea  class="form-control" rows="3" cols="40" type="text" placeholder="" name="Museum[]" size="10">{{ $item->exposition }}</textarea>
                                    </td>
                                    <td>
                                        <input type="text" value="{{ $item->head }}" placeholder="" name="Museum[]" size="10">
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <button type="button" class="addNewStr">Добавить ещё</button>
                        <button type="button" class="deleteNewStr">Очистить</button>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Кабинет по изучению родного (мордовского) языка</label>
                        <table class="table-check tc tc2">
                            <thead>
                            <th>№</th>
                            <th>Информация о кабинете</th>
                            <th>Руководитель</th>
                            </thead>
                            <tbody>
                            @if($cab->count() == null)
                                <tr class="teach">
                                    <td class="myIdElement">1</td>
                                    <td>
                                        <textarea  class="form-control" rows="3" cols="40" type="text" placeholder="" name="Cabinets[]" size="10"></textarea>
                                    </td>
                                    <td>
                                        <input type="text" placeholder="" name="Cabinets[]" size="10">
                                    </td>
                                </tr>
                            @endif
                            @foreach($cab as $item)
                                <tr class="teach">
                                    <td class="myIdElement">{{ $loop->iteration }}</td>
                                    <td>
                                        <textarea  class="form-control" rows="3" cols="40" type="text" placeholder="" name="Cabinets[]" size="10">{{ $item->description }}</textarea>
                                    </td>
                                    <td>
                                        <input type="text" value="{{ $item->head }}" placeholder="" name="Cabinets[]" size="10">
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <button type="button" class="addNewStr">Добавить ещё</button>
                        <button type="button" class="deleteNewStr">Очистить</button>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Иное</label>
                        <table class="table-check tc tc2">
                            <thead>
                            <th>№</th>
                            <th>Что именно?</th>
                            </thead>
                            <tbody>
                            @if($other->count() == null)
                                <tr class="teach">
                                    <td class="myIdElement">1</td>
                                    <td>
                                        <textarea  class="form-control" rows="5" cols="50" type="text" placeholder="" name="Others[]"></textarea>
                                    </td>
                                </tr>
                            @endif
                            @foreach($other as $item)
                                <tr class="teach">
                                    <td class="myIdElement">{{ $loop->iteration }}</td>
                                    <td>
                                        <textarea  class="form-control" rows="5" cols="50" type="text" placeholder="" name="Others[]">{{ $item->description }}</textarea>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <button type="button" class="addNewStr">Добавить ещё</button>
                        <button type="button" class="deleteNewStr">Очистить</button>
                    </div>
                    <h3>Указать, есть ли в образовательной деятельности следующее:</h3>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Предмет по изучению родного (мордовского) языка: название предмета, уровень образования
                            (дошкольное, начальное, основное, среднее)</label>
                        <table class="table-check tc tc2">
                            <thead>
                            <th>№</th>
                            <th>Название</th>
                            <th>Уровень</th>
                            </thead>
                            <tbody>
                            @if($sub->count() == null)
                                <tr class="teach">
                                    <td class="myIdElement">1</td>
                                    <td>
                                        <textarea  class="form-control" rows="3" cols="40" type="text" placeholder="" name="Subject[]"  size="10"></textarea>
                                    </td>
                                    <td>
                                        <input type="text" placeholder="" name="Subject[]"  size="10">
                                    </td>
                                </tr>
                            @endif
                            @foreach($sub as $item)
                                <tr class="teach">
                                    <td class="myIdElement">{{ $loop->iteration }}</td>
                                    <td>
                                        <textarea  class="form-control" rows="3" cols="40" type="text" placeholder="" name="Subject[]"  size="10">{{ $item->title }}</textarea>
                                    </td>
                                    <td>
                                        <input type="text" value="{{ $item->level }}" placeholder="" name="Subject[]"  size="10">
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <button type="button" class="addNewStr">Добавить ещё</button>
                        <button type="button" class="deleteNewStr">Очистить</button>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Учебники по изучению родного (мордовского) языка: автор, название, издательство, год выпуска</label>
                        <table class="table-check tc tc2">
                            <thead>
                            <th>№</th>
                            <th>Автор</th>
                            <th>Название</th>
                            <th>Издательство</th>
                            <th>Год выпуска</th>
                            </thead>
                            <tbody>
                            @if($book->count() == null)
                                <tr class="teach">
                                    <td class="myIdElement">1</td>
                                    <td>
                                        <input type="text" placeholder="" name="Book[]"  size="10">
                                    </td>
                                    <td>
                                        <textarea  class="form-control" rows="3" cols="40" type="text" placeholder="" name="Book[]"  size="10"></textarea>
                                    </td>
                                    <td>
                                        <textarea  class="form-control" rows="3" cols="40" type="text" placeholder="" name="Book[]"  size="10"></textarea>
                                    </td>
                                    <td>
                                        <input type="number" placeholder="" name="Book[]"  size="10">
                                    </td>
                                </tr>
                            @endif
                            @foreach($book as $item)
                                <tr class="teach">
                                    <td class="myIdElement">{{ $loop->iteration }}</td>
                                    <td>
                                        <input type="text" value="{{ $item->author }}" placeholder="" name="Book[]"  size="10">
                                    </td>
                                    <td>
                                        <textarea  class="form-control" rows="3" cols="40" type="text" placeholder="" name="Book[]"  size="10">{{ $item->name }}</textarea>
                                    </td>
                                    <td>
                                        <textarea  class="form-control" rows="3" cols="40" type="text" placeholder="" name="Book[]"  size="10">{{ $item->publish }}</textarea>
                                    </td>
                                    <td>
                                        <input type="number" value="{{ $item->year }}" placeholder="" name="Book[]"  size="10">
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <button type="button" class="addNewStr">Добавить ещё</button>
                        <button type="button" class="deleteNewStr">Очистить</button>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Методическое обеспечение по изучению родного (мордовского) языка: автор, название, издательство, год выпуска</label>
                        <table class="table-check tc tc2">
                            <thead>
                            <th>№</th>
                            <th>Автор</th>
                            <th>Название</th>
                            <th>Издательство</th>
                            <th>Год выпуска</th>
                            </thead>
                            <tbody>
                            @if($meth->count() == null)
                                <tr class="teach">
                                    <td class="myIdElement">1</td>
                                    <td>
                                        <input type="text" placeholder="" name="Methodolog[]"  size="10">
                                    </td>
                                    <td>
                                        <textarea  class="form-control" rows="3" cols="40" type="text" placeholder="" name="Methodolog[]"  size="10"></textarea>
                                    </td>
                                    <td>
                                        <textarea  class="form-control" rows="3" cols="40" type="text" placeholder="" name="Methodolog[]"  size="10"></textarea>
                                    </td>
                                    <td>
                                        <input type="number" placeholder="" name="Methodolog[]"  size="10">
                                    </td>
                                </tr>
                            @endif
                            @foreach($meth as $item)
                                <tr class="teach">
                                    <td class="myIdElement">{{ $loop->iteration }}</td>
                                    <td>
                                        <input type="text" value="{{ $item->author }}" placeholder="" name="Methodolog[]"  size="10">
                                    </td>
                                    <td>
                                        <textarea  class="form-control" rows="3" cols="40" type="text" placeholder="" name="Methodolog[]"  size="10">{{ $item->name }}</textarea>
                                    </td>
                                    <td>
                                        <textarea  class="form-control" rows="3" cols="40" type="text" placeholder="" name="Methodolog[]"  size="10">{{ $item->publish }}</textarea>
                                    </td>
                                    <td>
                                        <input type="number" value="{{ $item->year }}" placeholder="" name="Methodolog[]"  size="10">
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <button type="button" class="addNewStr">Добавить ещё</button>
                        <button type="button" class="deleteNewStr">Очистить</button>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Факультатив по изучению родного (мордовского) языка: название, класс</label>
                        <table class="table-check tc tc2">
                            <thead>
                            <th>№</th>
                            <th>Описание</th>
                            <th>Класс</th>
                            <th>Руководитель</th>
                            </thead>
                            <tbody>
                            @if($open->count() == null)
                                <tr class="teach">
                                    <td class="myIdElement">1</td>
                                    <td>
                                        <textarea  class="form-control" rows="3" cols="40" type="text" placeholder="" name="openClassroom[]"  size="10"></textarea>
                                    </td>
                                    <td>
                                        <input type="text" placeholder="" name="openClassroom[]"  size="10">
                                    </td>
                                    <td>
                                        <input type="text" placeholder="" name="openClassroom[]"  size="10">
                                    </td>
                                </tr>
                            @endif
                            @foreach($open as $item)
                                <tr class="teach">
                                    <td class="myIdElement">{{ $loop->iteration }}</td>
                                    <td>
                                        <textarea  class="form-control" rows="3" cols="40" type="text" placeholder="" name="openClassroom[]"  size="10">{{ $item->description }}</textarea>
                                    </td>
                                    <td>
                                        <input type="text" value="{{ $item->class }}" placeholder="" name="openClassroom[]"  size="10">
                                    </td>
                                    <td>
                                        <input type="text" value="{{ $item->head }}" placeholder="" name="openClassroom[]"  size="10">
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <button type="button" class="addNewStr">Добавить ещё</button>
                        <button type="button" class="deleteNewStr">Очистить</button>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Кружки по изучению родного (мордовского) языка: название, класс</label>
                        <table class="table-check tc tc2">
                            <thead>
                            <th>№</th>
                            <th>Название</th>
                            <th>Класс</th>
                            <th>Руководитель</th>
                            <th>Описание</th>
                            </thead>
                            <tbody>
                            @if($soc->count() == null)
                                <tr class="teach">
                                    <td class="myIdElement">1</td>
                                    <td>
                                        <textarea  class="form-control" rows="3" cols="40" type="text" placeholder="" name="Society[]"  size="10"></textarea>
                                    </td>
                                    <td>
                                        <input type="text" placeholder="" name="Society[]"  size="10">
                                    </td>
                                    <td>
                                        <input type="text" placeholder="" name="Society[]"  size="10">
                                    </td>
                                    <td>
                                        <textarea  class="form-control" rows="3" cols="40" type="text" placeholder="" name="Society[]"  size="10"></textarea>
                                    </td>
                                </tr>
                            @endif
                            @foreach($soc as $item)
                                <tr class="teach">
                                    <td class="myIdElement">{{ $loop->iteration }}</td>
                                    <td>
                                        <textarea  class="form-control" rows="3" cols="40" type="text" placeholder="" name="Society[]"  size="10">{{ $item->name }}</textarea>
                                    </td>
                                    <td>
                                        <input type="text" value="{{ $item->class }}" placeholder="" name="Society[]"  size="10">
                                    </td>
                                    <td>
                                        <input type="text" value="{{ $item->head }}" placeholder="" name="Society[]"  size="10">
                                    </td>
                                    <td>
                                        <textarea  class="form-control" rows="3" cols="40" type="text" placeholder="" name="Society[]"  size="10">{{ $item->description }}</textarea>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <button type="button" class="addNewStr">Добавить ещё</button>
                        <button type="button" class="deleteNewStr">Очистить</button>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Коллективы (танцевальные, песенные, иные) связанные с изучением
                            родного (мордовского) языка, его истории и культуры: автор, название, возраст детей</label>
                        <table class="table-check tc tc2">
                            <thead>
                            <th>№</th>
                            <th>Руководитель</th>
                            <th>Название</th>
                            <th>Возраст детей</th>
                            <th>Описание</th>
                            </thead>
                            <tbody>
                            @if($col->count() == null)
                                <tr class="teach">
                                    <td class="myIdElement">1</td>
                                    <td>
                                        <input type="text" placeholder="" name="Collective[]"  size="10">
                                    </td>
                                    <td>
                                        <textarea  class="form-control" rows="3" cols="40" type="text" placeholder="" name="Collective[]"  size="10"></textarea>
                                    </td>
                                    <td>
                                        <input type="text" placeholder="" name="Collective[]"  size="10">
                                    </td>
                                    <td>
                                        <textarea  class="form-control" rows="3" cols="40" type="text" placeholder="" name="Collective[]"  size="10"></textarea>
                                    </td>
                                </tr>
                            @endif
                            @foreach($col as $item)
                                <tr class="teach">
                                    <td class="myIdElement">{{ $loop->iteration }}</td>
                                    <td>
                                        <input type="text" value="{{ $item->head }}" placeholder="" name="Collective[]"  size="10">
                                    </td>
                                    <td>
                                        <textarea  class="form-control" rows="3" cols="40" type="text" placeholder="" name="Collective[]"  size="10">{{ $item->name }}</textarea>
                                    </td>
                                    <td>
                                        <input type="text" placeholder="" value="{{ $item->ageChildren }}" name="Collective[]"  size="10">
                                    </td>
                                    <td>
                                        <textarea  class="form-control" rows="3" cols="40" type="text" placeholder="" name="Collective[]"  size="10">{{ $item->description }}</textarea>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <button type="button" class="addNewStr">Добавить ещё</button>
                        <button type="button" class="deleteNewStr">Очистить</button>
                    </div>
                    <h3>Какие мероприятия по изучению и сохранению мордовской культуры и традиций проводятся в образовательной организации:</h3>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Уровень (международный, всероссийский, областной, муниципальный, школьный),<br>
                            Форма (конкурс, фестиваль, конференции и др), <br>
                            Название, <br>
                            Время проведения</label>
                        <table class="table-check tc tc2">
                            <thead>
                            <th>№</th>
                            <th>Уровень</th>
                            <th>Форма</th>
                            <th>Название</th>
                            <th>Время</th>
                            </thead>
                            <tbody>
                            @if($event->count() == null)
                                <tr class="teach">
                                    <td class="myIdElement">1</td>
                                    <td>
                                        <input type="text" placeholder="" name="Event[]"  size="10">
                                    </td>
                                    <td>
                                        <input type="text" placeholder="" name="Event[]"  size="10">
                                    </td>
                                    <td>
                                        <textarea  class="form-control" rows="3" cols="40" type="text" placeholder="" name="Event[]"  size="10"></textarea>
                                    </td>
                                    <td>
                                        <input type="text" placeholder="" name="Event[]"  size="10">
                                    </td>
                                </tr>
                            @endif
                            @foreach($event as $item)
                                <tr class="teach">
                                    <td class="myIdElement">{{ $loop->iteration }}</td>
                                    <td>
                                        <input type="text" value="{{ $item->level }}" placeholder="" name="Event[]"  size="10">
                                    </td>
                                    <td>
                                        <input type="text" value="{{ $item->form }}" placeholder="" name="Event[]"  size="10">
                                    </td>
                                    <td>
                                        <textarea  class="form-control" rows="3" cols="40" type="text" placeholder="" name="Event[]"  size="10">{{ $item->name }}</textarea>
                                    </td>
                                    <td>
                                        <input type="text" value="{{ $item->date }}" placeholder="" name="Event[]"  size="10">
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <button type="button" class="addNewStr">Добавить ещё</button>
                        <button type="button" class="deleteNewStr">Очистить</button>
                    </div>
                    <h3>Дополнительная информация:</h3>
                    @if($add->count() == null)
                        <textarea  class="form-control" rows="5" cols="50" name="additionalInfo" type="text" id="exampleInputEmail1" placeholder="">{{ $item->description }}</textarea>
                    @endif
                    @foreach($add as $item)
                        <div class="form-group">
                            <textarea  class="form-control" rows="5" cols="50" name="additionalInfo" type="text" id="exampleInputEmail1" placeholder="">{{ $item->description }}</textarea>
                        </div>
                    @endforeach
                    <!-- Date -->
                </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <a href="{{route('list')}}" class="btn btn-default">Отменить</a>
                <button class="btn btn-success pull-right">Изменить</button>
            </div>
            <!-- /.box-footer-->
        </div>
        {{ Form::close() }}
    </section>
    <script src="{{ asset('js/zzz.js') }}"></script>
@stop