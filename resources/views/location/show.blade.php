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
            @foreach ($locations as $location)
                <tr>
                    <td>{{ $location->name }}</td>
                    <td>{{ $location->locationType->name }}</td>
                    <td>{{ $location->locationStatus->name }}</td>
                    <td>{{ $location->locationHierarchy->name }}</td>
                    <td>{{ $location->locationManager->name }}</td>
                    <td>{{ $location->locationParent->name }}</td>                    
                    <td>{{ $location->company->name }}</td>
                    <td>{{ $location->created_at }}</td>
                    <td>{{ $location->updated_at }}</td>
                </tr>
            @endforeach
    </x-slot>       
</x-layout>