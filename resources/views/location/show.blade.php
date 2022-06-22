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
                    <td>
                        <a href="/location/{{ $location->id }}">{{ $location->name }}</a>
                    </td>
                    <td>{{ $location->locationType->name }}</td>
                    <td>{{ $location->locationStatus->name }}</td>
                    <td>{{ $location->locationHierarchy->name }}</td>
                    <td>
                        <a href="/user/{{ $location->locationManager->id }}">{{ $location->locationManager->fullName() }}</a>
                    </td>
                    <td>
                        <a href="/location/{{ $location->locationParent->id }}">{{ $location->locationParent->name }}</a>
                    </td>                    
                    <td>{{ $location->company->name }}</td>
                    <td>{{ $location->created_at }}</td>
                    <td>{{ $location->updated_at }}</td>
                </tr>
            @endforeach
    </x-slot>       
</x-layout>