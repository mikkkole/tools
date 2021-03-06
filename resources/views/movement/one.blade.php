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
            @if ($movement->deleted_at !== NULL)
            <tr>
                <td colspan="19" bgcolor="red">Объект удален</td>
            </tr>
            @endif
            <tr>
                <td>{{ $movement->id }}</td>
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
                <td>{{ $movement->confirmed_at ?? 'УДАЛЕН' }}</td>
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
            <tr>
                <td colspan="19">
                    <form action="/movement/edit" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{ $movement->id }}">
                        <input type="submit" value="Изменить">
                    </form>
                    <form action="" method="POST">
                         @csrf
                        <input type="hidden" name="delete" value="true">
                        @if ($movement->deleted_at == NULL)
                            <input type="submit" value="Удалить">
                        @else
                            <input type="submit" value="Восстановить">
                        @endif
                    </form>
                </td>
            </tr>
    </x-slot>
</x-layout>