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
            </tr>
            <tr>
                <td>{{ $asset->name }}</td>
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
            </tr>
            <tr><td></td></tr>
            <tr class="first">
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
            <tr>
                <td>
                        <a href="/location/{{ $asset->currentLocation->id }}">{{ $asset->currentLocation->name ?? 'УДАЛЕН' }}</a>
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
            <tr>
                <td colspan="8">
                    @foreach ($asset->assetsImage as $image)
                        <a href="/images/{{ $image->filename }}">
                        <img src="/images/{{ $image->filename }}" 
                        alt="{{ $asset->name }}" height=100px></img>
                        </a>
                    @endforeach
                </td>
                <td>
                    История обслуживания
                </td>
            </tr>
            <tr>
            <td colspan="9">
                <form action="/asset/edit" method="POST">
                    @csrf
                    <input type="hidden" name="id" value="{{ $asset->id }}">
                    <input type="submit" value="Изменить">
                </form>
                <form action="" method="POST">
                    @csrf
                    <input type="hidden" name="delete" value="true">
                    @if ($asset->deleted_at == NULL)
                        <input type="submit" value="Удалить">
                    @else
                        <input type="submit" value="Восстановить">
                    @endif
                </form>                
            </td>
            </tr>
     </x-slot>    
</x-layout>