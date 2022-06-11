<x-layout>
    <x-slot name='title'>
        {{ $title }}
    </x-slot>
    {{ $slot }}
    <br>
    <x-slot name='table'>
            <tr>
                <td>Название</td>
                <td>Модель</td>
                <td>Описание</td>
                <td>Серийный номер</td>
                <td>Группа</td>
                <td>Производитель</td>
                <td>Статус</td>
                <td>Категория</td>
                <td>Нач.локация</td>
                <td>Тек.локация</td>
                <td>Сканкод</td>
                <td>Тип сканкода</td>
                <td>Владение</td>
                <td>Условия использования</td>
                <td>Код затрат</td>
                <td>Компания</td>
                <td>Создан</td>
                <td>Изменен</td>
            </tr>
            @foreach ($assets as $asset)
                <tr>
                    <td>{{ $asset->name }}</td>
                    <td>{{ $asset->model }}</td>
                    <td>{{ $asset->description }}</td>
                    <td>{{ $asset->serial_number }}</td>
                    <td>{{ $asset->assets_group_id }}</td>
                    <td>{{ $asset->assets_manufacturer_id }}</td>
                    <td>{{ $asset->assets_status_id }}</td>
                    <td>{{ $asset->assets_category_id }}</td>
                    <td>{{ $asset->default_location_id }}</td>
                    <td>{{ $asset->current_location_id }}</td>
                    <td>{{ $asset->scancode }}</td>
                    <td>{{ $asset->assets_scancode_type_id }}</td>
                    <td>{{ $asset->assets_ownership_type_id }}</td>
                    <td>{{ $asset->assets_use_terms_id }}</td>
                    <td>{{ $asset->assets_cost_code_id }}</td>
                    <td>{{ $asset->company_id }}</td>
                    <td>{{ $asset->created_at }}</td>
                    <td>{{ $asset->updated_at }}</td>
                </tr>
            @endforeach
    </x-slot>    
</x-layout>