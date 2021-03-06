<x-layout>
    <x-slot name='title'>
        {{ $title }}
    </x-slot>
    {{ $slot }}
    <x-slot name='table'>
            <tr>
                <td>Номер перемещения</td>
                <td>Комментарии</td>
                <td>Приложение</td>
                <td>Активы</td>
                <td>Откуда</td>
                <td>Куда</td>
                <td>Статус</td>
                <td>Подтверждено</td>
                <td>Кто подтвердил</td>
                <td>Отправитель</td>
                <td>Получатель</td>
                <td>Кто внес</td>
                <td>Дата возврата</td>
                <td>Центр затрат</td>
                <td>Задача</td>
                <td>Компания</td>
                <td>Создан</td>
                <td>Изменен</td>
            </tr>
            @foreach ($movements as $movement)
                @if ($movement->deleted_at !== NULL)
                <tr bgcolor="red">
                @else
                <tr>
                @endif
                    <td><a href="/movement/{{ $movement->id }}">{{ $movement->id }}</a></td>
                    <td>{{ $movement->comments }}</td>
                    <td>{{ $movement->app_used }}</td>
                    <td>
                        @foreach ($movement->assetsList as $list)
                        <a href="/asset/{{ $list->asset->id ?? 'УДАЛЕН' }}">{{ $list->asset->name ?? 'УДАЛЕН' }}</a> </br>
                        @endforeach
                    </td>
                    <td>
                        <a href="/location/{{ $movement->locationFrom->id ?? 'УДАЛЕН' }}">{{ $movement->locationFrom->name ?? 'УДАЛЕН' }}
                    </td>
                    <td>
                        <a href="/location/{{ $movement->locationTo->id ?? 'УДАЛЕН' }}">{{ $movement->locationTo->name ?? 'УДАЛЕН' }}                            
                    </td>
                    <td>{{ $movement->movementStatus->name ?? 'УДАЛЕН' }}</td>
                    <td>{{ $movement->confirmed_at }}</td>
                    <td>
                        <a href="/user/{{ $movement->userComfirmed->id ?? 'УДАЛЕН' }}">{{ $movement->userComfirmed !== NULL ? $movement->userComfirmed->fullName() : 'УДАЛЕН' }}
                    </td>
                    <td>
                        <a href="/user/{{ $movement->userSend->id ?? 'УДАЛЕН' }}">{{ $movement->userSend !== NULL ? $movement->userSend->fullName() : 'УДАЛЕН' }}
                    </td>
                    <td>
                        <a href="/user/{{ $movement->userRecieved->id ?? 'УДАЛЕН' }}">{{ $movement->userRecieved !== NULL ? $movement->userRecieved->fullName() : 'УДАЛЕН' }}
                    </td>
                    <td>
                        <a href="/user/{{ $movement->userWrited->id ?? 'УДАЛЕН' }}">{{ $movement->userWrited !== NULL ? $movement->userWrited->fullName() : 'УДАЛЕН' }}
                    </td>
                    <td>{{ $movement->returned_at }}</td>
                    <td>{{ $movement->movementCostCenter->name ?? 'УДАЛЕН' }}</td>
                    <td>{{ $movement->movementTaskCode->name ?? 'УДАЛЕН' }}</td>
                    <td>{{ $movement->company->name ?? 'УДАЛЕН' }}</td>
                    <td>{{ $movement->created_at }}</td>
                    <td>{{ $movement->updated_at }}</td>
                </tr>
            @endforeach
            <td  colspan="18">
                <form action="/movement/addNew" method="POST">
                    @csrf
                    Выбрать шаблон: 
                    <select name="newMovementTemplate">
                    <option>Нет</option>
                    <option>Шаблон 1</option>
                    <option>Шаблон 2</option>
                    </select>
                    <input type="submit" value="Добавить новое перемещение">
                </form>
            </td>
    </x-slot>
</x-layout>