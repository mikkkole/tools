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
                    <td>{{ $asset->assetsGroup->name }}</td>
                    <td>{{ $asset->assetsManufacturer->name }}</td>
                    <td>{{ $asset->assetsStatus->name }}</td>
                    <td>{{ $asset->assetsCategory->name }}</td>
                    <td>{{ $asset->defaultLocation->name }}</td>
                    <td>{{ $asset->currentLocation->name }}</td>
                    <td>{{ $asset->scancode }}</td>
                    <td>{{ $asset->assetsScancodeType->name }}</td>
                    <td>{{ $asset->assetsOwnershipType->name }}</td>
                    <td>{{ $asset->assetsUseTerms->name }}</td>
                    <td>{{ $asset->assetsCostCode->name }}</td>
                    <td>{{ $asset->company->name }}</td>
                    <td>{{ $asset->created_at }}</td>
                    <td>{{ $asset->updated_at }}</td>
                </tr>
            @endforeach
    </x-slot>    
</x-layout>