<x-layout>
    <x-slot name='title'>
        {{ $title }}
    </x-slot>
    {{ $slot }}
    <x-slot name='table'>
            <tr>
                <td>Название</td>
                <td>Тип</td>
                <td>Статус</td>
                <td>Иерархия</td>
                <td>Менеджер</td>
                <td>Головная локация</td>
                <td>Компания</td>
                <td>Создан</td>
                <td>Изменен</td>
            </tr>
            @if ($location->deleted_at !== NULL)
            <tr>
                <td colspan="9" bgcolor="red">Объект удален</td>
            </tr>
            @endif
                <tr>
                    <td>{{ $location->name }}</td>
                    <td>{{ $location->locationType->name ?? 'УДАЛЕН' }}</td>
                    <td>{{ $location->locationStatus->name ?? 'УДАЛЕН' }}</td>
                    <td>{{ $location->locationHierarchy->name ?? 'УДАЛЕН' }}</td>
                    <td>
                        <a href="/user/{{ $location->locationManager->id ?? 'УДАЛЕН' }}">{{ $location->locationManager !== NULL ?$location->locationManager->fullName() : 'УДАЛЕН' }}</a>
                    </td>
                    <td>
                        <a href="/location/{{ $location->locationParent->id ?? 'УДАЛЕН' }}">{{ $location->locationParent->name ?? 'УДАЛЕН' }}</a>
                    </td>                     
                    <td>{{ $location->company->name ?? 'УДАЛЕН' }}</td>
                    <td>{{ $location->created_at }}</td>
                    <td>{{ $location->updated_at }}</td>
                </tr>
                <tr>
                    <td colspan="9">
                        <form action="/location/edit" method="POST">
                            @csrf
                            <input type="hidden" name="id" value="{{ $location->id }}">
                            <input type="submit" value="Изменить">
                        </form>
                        <form action="" method="POST">
                            @csrf
                            <input type="hidden" name="delete" value="true">
                            @if ($location->deleted_at == NULL)
                                <input type="submit" value="Удалить">
                            @else
                                <input type="submit" value="Восстановить">
                            @endif
                        </form>
                    </td>
                </tr>
    </x-slot>
</x-layout>