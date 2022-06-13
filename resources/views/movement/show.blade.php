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
                <tr>
                    <td>{{ $movement->id }}</td>
                    <td>{{ $movement->comments }}</td>
                    <td>{{ $movement->app_used }}</td>
                    <td>
                        @foreach ($movement->assetsList as $list)
                        {{ $list->asset->name }} </br>
                        @endforeach
                    </td>
                    <td>{{ $movement->locationFrom->name }}</td>
                    <td>{{ $movement->locationTo->name }}</td>                    
                    <td>{{ $movement->movementStatus->name }}</td>
                    <td>{{ $movement->confirmed_at }}</td>
                    <td>{{ $movement->userComfirmed->name }}</td>
                    <td>{{ $movement->userSend->name }}</td>
                    <td>{{ $movement->userRecieved->name }}</td>
                    <td>{{ $movement->userWrited->name }}</td>
                    <td>{{ $movement->returned_at }}</td>
                    <td>{{ $movement->movementCostCenter->name }}</td>
                    <td>{{ $movement->movementTaskCode->name }}</td>
                    <td>{{ $movement->company->name }}</td>
                    <td>{{ $movement->created_at }}</td>
                    <td>{{ $movement->updated_at }}</td>
                </tr>
            @endforeach
    </x-slot>       
</x-layout>