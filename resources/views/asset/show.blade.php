<x-layout>
    <x-slot name='title'>
        {{ $title }}
    </x-slot>
    {{ $slot }}
    <br>
    <x-slot name='table'>
            <tr>
                <td>Изображение</td>
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
                @if ($asset->deleted_at !== NULL)
                <tr bgcolor="red">
                @else
                <tr>
                @endif
                    <td>
                    @if ($asset->assetsImageFirst($asset->id))
                    <a href="/images/{{ $asset->assetsImageFirst($asset->id)->filename }}">
                    <img src="/images/{{ $asset->assetsImageFirst($asset->id)->filename }}"
                    alt="{{ $asset->name }}" max-height=100px width=100px></img></a>
                    @endif

                    </td>
                    <td><a href="/asset/{{ $asset->id }}">{{ $asset->name }}</a></td>
                    <td>{{ $asset->model }}</td>
                    <td>{{ $asset->description }}</td>
                    <td>{{ $asset->serial_number }}</td>
                    <td>{{ $asset->assetsGroup->name ?? 'УДАЛЕН' }}</td>
                    <td>{{ $asset->assetsManufacturer->name ?? 'УДАЛЕН' }}</td>
                    <td>{{ $asset->assetsStatus->name ?? 'УДАЛЕН' }}</td>
                    <td>{{ $asset->assetsCategory->name ?? 'УДАЛЕН' }}</td>
                    <td>
                        <a href="/location/{{ $asset->defaultLocation->id ?? 'УДАЛЕН' }}">{{ $asset->defaultLocation->name ?? 'УДАЛЕН' }}</a>
                    </td>
                    <td>
                        <a href="/location/{{ $asset->currentLocation->id ?? 'УДАЛЕН' }}">{{ $asset->currentLocation->name ?? 'УДАЛЕН' }}</a>
                    </td>
                    <td>{{ $asset->scancode }}</td>
                    <td>{{ $asset->assetsScancodeType->name ?? 'УДАЛЕН' }}</td>
                    <td>{{ $asset->assetsOwnershipType->name ?? 'УДАЛЕН' }}</td>
                    <td>{{ $asset->assetsUseTerms->name ?? 'УДАЛЕН' }}</td>
                    <td>{{ $asset->assetsCostCode->name ?? 'УДАЛЕН' }}</td>
                    <td>{{ $asset->company->name ?? 'УДАЛЕН' }}</td>
                    <td>{{ $asset->created_at }}</td>
                    <td>{{ $asset->updated_at }}</td>
                </tr>
            @endforeach
            <td  colspan="19">
                <form action="/asset/addNew" method="POST">
                    @csrf
                    Выбрать шаблон: 
                    <select name="newAssetsTemplate">
                    <option>Нет</option>
                    <option>Шаблон 1</option>
                    <option>Шаблон 2</option>
                    </select>
                    <input type="submit" value="Добавить новый актив">
                </form>
                </td>
    </x-slot>
</x-layout>