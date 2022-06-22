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
                <tr>
                    <td>{{ $movement->id }}</td>
                    <td>{{ $movement->comments }}</td>
                    <td>{{ $movement->app_used }}</td>
                    <td>
                        @foreach ($movement->assetsList as $list)
                        <a href="/asset/{{ $list->asset->id }}">{{ $list->asset->name }}</a> </br>
                        @endforeach
                    </td>
                    <td>
                        <a href="/location/{{ $movement->locationFrom->id }}">{{ $movement->locationFrom->name }}
                    </td>
                    <td>
                        <a href="/location/{{ $movement->locationTo->id }}">{{ $movement->locationTo->name }}                            
                    </td>                   
                    <td>{{ $movement->movementStatus->name }}</td>
                    <td>{{ $movement->confirmed_at }}</td>
                    <td>
                        <a href="/user/{{ $movement->userComfirmed->id }}">{{ $movement->userComfirmed->fullName() }}
                    </td>
                    <td>
                        <a href="/user/{{ $movement->userSend->id }}">{{ $movement->userSend->fullName() }}
                    </td>
                    <td>
                        <a href="/user/{{ $movement->userRecieved->id }}">{{ $movement->userRecieved->fullName() }}
                    </td>
                    <td>
                        <a href="/user/{{ $movement->userWrited->id }}">{{ $movement->userWrited->fullName() }}
                    </td>
                    <td>{{ $movement->returned_at }}</td>
                    <td>{{ $movement->movementCostCenter->name }}</td>
                    <td>{{ $movement->movementTaskCode->name }}</td>
                    <td>{{ $movement->company->name }}</td>
                    <td>{{ $movement->created_at }}</td>
                    <td>{{ $movement->updated_at }}</td>
                </tr>
    </x-slot>       
</x-layout>