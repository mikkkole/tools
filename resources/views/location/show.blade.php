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
                    <td>{{ $location->location_type_id }}</td>
                    <td>{{ $location->location_status_id }}</td>
                    <td>{{ $location->location_hierarchy_id }}</td>
                    <td>{{ $location->location_manager_id }}</td>
                    <td>{{ $location->location_parent_id }}</td>                    
                    <td>{{ $location->company_id }}</td>
                    <td>{{ $location->created_at }}</td>
                    <td>{{ $location->updated_at }}</td>
                </tr>
            @endforeach
    </x-slot>       
</x-layout>