<x-layout>
    <x-slot name='title'>
        {{ $title }}
    </x-slot>
    {{ $slot }}
    <br>
    <x-slot name='table'>
            <form action="/asset/{{ $asset->id }}" method="POST">
            @csrf
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
                <td><input name="newName" value="{{ $asset->name }}"></td>
                <td><input name="newModel" value="{{ $asset->model }}"></td>
                <td><textarea name="newDescription">{{ $asset->description }}</textarea></textarea></td>
                <td><input name="newSerialNumber" value="{{ $asset->serial_number }}"></td>
                <td>
                    <select name="newAssetsGroupName">
                    <option>{{ $asset->assetsGroup->name ?? 'УДАЛЕН' }}</option>
                        @foreach ($assetsGroups as $assetsGroup)
                            @continue($assetsGroup->name == ($asset->assetsGroup->name ?? ''))
                            <option>{{ $assetsGroup->name }}</option>
                        @endforeach
                    </select>
                </td>
                <td>
                    <select name="newAssetsManufacturerName">
                    <option>{{ $asset->assetsManufacturer->name ?? 'УДАЛЕН' }}</option>
                        @foreach ($assetsManufacturers as $assetsManufacturer)
                            @continue($assetsManufacturer->name == ($asset->assetsManufacturer->name ?? ''))
                            <option>{{ $assetsManufacturer->name }}</option>
                        @endforeach
                    </select>
                </td>
                <td>
                    <select name="newAssetsStatusName">
                    <option>{{ $asset->assetsStatus->name ?? 'УДАЛЕН' }}</option>
                        @foreach ($assetsStatuss as $assetsStatus)
                            @continue($assetsStatus->name == ($asset->assetsStatus->name ?? ''))
                            <option>{{ $assetsStatus->name }}</option>
                        @endforeach
                    </select>
                </td>
                <td>
                    <select name="newAssetsCategoryName">
                    <option>{{ $asset->assetsCategory->name ?? 'УДАЛЕН' }}</option>
                        @foreach ($assetsCategorys as $assetsCategory)
                            @continue($assetsCategory->name == ($asset->assetsCategory->name ?? ''))
                            <option>{{ $assetsCategory->name }}</option>
                        @endforeach
                    </select>
                </td>
                <td>
                    <select name="newDefaultLocationName">
                    <option>{{ $asset->defaultLocation->name ?? 'УДАЛЕН' }}</option>
                        @foreach ($locations as $location)
                            @continue($location->name == ($asset->defaultLocation->name ?? ''))
                            <option>{{ $location->name }}</option>
                        @endforeach
                    </select>
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
                    <select name="newCurrentLocationName">
                    <option>{{ $asset->currentLocation->name ?? 'УДАЛЕН' }}</option>
                        @foreach ($locations as $location)
                            @continue($location->name == ($asset->currentLocation->name ?? ''))
                            <option>{{ $location->name }}</option>
                        @endforeach
                    </select>
                </td>
                <td><input name="newScancode" value="{{ $asset->scancode }}"></td>
                <td>
                    <select name="newAssetsScancodeTypeName">
                    <option>{{ $asset->assetsScancodeType->name ?? 'УДАЛЕН' }}</option>
                        @foreach ($assetsScancodeTypes as $assetsScancodeType)
                            @continue($assetsScancodeType->name == ($asset->assetsScancodeType->name ?? ''))
                            <option>{{ $assetsScancodeType->name }}</option>
                        @endforeach
                    </select>
                </td>
                <td>
                    <select name="newAssetsOwnershipTypeName">
                    <option>{{ $asset->assetsOwnershipType->name ?? 'УДАЛЕН' }}</option>
                        @foreach ($assetsOwnershipTypes as $assetsOwnershipType)
                            @continue($assetsOwnershipType->name == ($asset->assetsOwnershipType->name ?? ''))
                            <option>{{ $assetsOwnershipType->name }}</option>
                        @endforeach
                    </select>
                </td>
                <td>
                    <select name="newAssetsUseTermsName">
                    <option>{{ $asset->assetsUseTerms->name ?? 'УДАЛЕН' }}</option>
                        @foreach ($assetsUseTermses as $assetsUseTerms)
                            @continue($assetsUseTerms->name == ($asset->assetsUseTerms->name ?? ''))
                            <option>{{ $assetsUseTerms->name }}</option>
                        @endforeach
                    </select>
                </td>
                <td>
                    <select name="newAssetsCostCodeName">
                    <option>{{ $asset->assetsCostCode->name ?? 'УДАЛЕН' }}</option>
                        @foreach ($assetsCostCodes as $assetsCostCode)
                            @continue($assetsCostCode->name == ($asset->assetsCostCode->name ?? ''))
                            <option>{{ $assetsCostCode->name }}</option>
                        @endforeach
                    </select>
                </td>
                <td>
                    <select name="newCompanyName">
                    <option>{{ $asset->company->name ?? 'УДАЛЕН' }}</option>
                        @foreach ($companies as $company)
                            @continue($company->name == ($asset->company->name ?? ''))
                            <option>{{ $company->name }}</option>
                        @endforeach
                    </select>
                </td>
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
                    <input type="hidden" name="edit" value="true">
                    <input type="submit" value="Сохранить">
                </td>
            </tr>
            </form>
    </x-slot>
</x-layout>