<x-layout>
    <x-slot name='title'>
        {{ $title }}
    </x-slot>
    {{ $slot }}
    <br>
    <x-slot name='table'>
        <form action="/asset/{{ $asset->id ?? 0 }} " method="POST" enctype="multipart/form-data">
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
                    <select name="newAssetsGroupId">
                        <option value="{{ $asset->assetsGroup->id ?? NULL }}">
                            {{ $asset->assetsGroup->name ?? 'УДАЛЕН' }}
                        </option>
                        @foreach ($assetsGroups as $assetsGroup)
                            @continue($assetsGroup->id == ($asset->assetsGroup->id ?? ''))
                            <option value="{{ $assetsGroup->id }}">
                                {{ $assetsGroup->name }}
                            </option>
                        @endforeach
                    </select>
                </td>
                <td>
                    <select name="newAssetsManufacturerId">
                        <option value="{{ $asset->assetsManufacturer->id ?? NULL }}">
                            {{ $asset->assetsManufacturer->name ?? 'УДАЛЕН' }}
                        </option>
                        @foreach ($assetsManufacturers as $assetsManufacturer)
                            @continue($assetsManufacturer->id == ($asset->assetsManufacturer->id ?? ''))
                            <option value="{{ $assetsManufacturer->id }}">
                                {{ $assetsManufacturer->name }}
                            </option>
                        @endforeach
                    </select>
                </td>
                <td>
                    <select name="newAssetsStatusId">
                        <option value="{{ $asset->assetsStatus->id ?? NULL }}">
                            {{ $asset->assetsStatus->name ?? 'УДАЛЕН' }}
                        </option>
                        @foreach ($assetsStatuses as $assetsStatus)
                            @continue($assetsStatus->id == ($asset->assetsStatus->id ?? ''))
                            <option value="{{ $assetsStatus->id }}">
                                {{ $assetsStatus->name }}
                            </option>
                        @endforeach
                    </select>
                </td>
                <td>
                    <select name="newAssetsCategoryId">
                        <option value="{{ $asset->assetsCategory->id ?? NULL }}">
                            {{ $asset->assetsCategory->name ?? 'УДАЛЕН' }}
                        </option>
                        @foreach ($assetsCategories as $assetsCategory)
                            @continue($assetsCategory->id == ($asset->assetsCategory->id ?? ''))
                            <option value="{{ $assetsCategory->id }}">
                                {{ $assetsCategory->name }}
                            </option>
                        @endforeach
                    </select>
                </td>
                <td>
                    <select name="newDefaultLocationId">
                        <option value="{{ $asset->defaultLocation->id ?? NULL }}">
                            {{ $asset->defaultLocation->name ?? 'УДАЛЕН' }}
                        </option>
                        @foreach ($locations as $location)
                            @continue($location->id == ($asset->defaultLocation->id ?? ''))
                            <option value="{{ $location->id }}">
                                {{ $location->name }}
                            </option>
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
                    <select name="newCurrentLocationId">
                        <option value="{{ $asset->currentLocation->id ?? NULL }}">
                            {{ $asset->currentLocation->name ?? 'УДАЛЕН' }}
                        </option>
                        @foreach ($locations as $location)
                            @continue($location->id == ($asset->currentLocation->id ?? ''))
                            <option value="{{ $location->id }}">
                                {{ $location->name }}
                            </option>
                        @endforeach
                    </select>
                </td>
                <td><input name="newScancode" value="{{ $asset->scancode }}"></td>
                <td>
                    <select name="newAssetsScancodeTypeId">
                        <option value="{{ $asset->assetsScancodeType->id ?? NULL }}">
                            {{ $asset->assetsScancodeType->name ?? 'УДАЛЕН' }}
                        </option>
                        @foreach ($assetsScancodeTypes as $assetsScancodeType)
                            @continue($assetsScancodeType->id == ($asset->assetsScancodeType->id ?? ''))
                            <option value="{{ $assetsScancodeType->id }}">
                                {{ $assetsScancodeType->name }}
                            </option>
                        @endforeach
                    </select>
                </td>
                <td>
                    <select name="newAssetsOwnershipTypeId">
                        <option value="{{ $asset->assetsOwnershipType->id ?? NULL }}">
                            {{ $asset->assetsOwnershipType->name ?? 'УДАЛЕН' }}
                        </option>
                        @foreach ($assetsOwnershipTypes as $assetsOwnershipType)
                            @continue($assetsOwnershipType->id == ($asset->assetsOwnershipType->id ?? ''))
                            <option value="{{ $assetsOwnershipType->id }}">
                                {{ $assetsOwnershipType->name }}
                            </option>
                        @endforeach
                    </select>
                </td>
                <td>
                    <select name="newAssetsUseTermsId">
                        <option value="{{ $asset->assetsUseTerms->id ?? NULL }}">
                            {{ $asset->assetsUseTerms->name ?? 'УДАЛЕН' }}
                        </option>
                        @foreach ($assetsUseTermses as $assetsUseTerms)
                            @continue($assetsUseTerms->id == ($asset->assetsUseTerms->id ?? ''))
                            <option value="{{ $assetsUseTerms->id }}">
                                {{ $assetsUseTerms->name }}
                            </option>
                        @endforeach
                    </select>
                </td>
                <td>
                    <select name="newAssetsCostCodeId">
                        <option value="{{ $asset->assetsCostCode->id ?? NULL }}">
                            {{ $asset->assetsCostCode->name ?? 'УДАЛЕН' }}
                        </option>
                        @foreach ($assetsCostCodes as $assetsCostCode)
                            @continue($assetsCostCode->id == ($asset->assetsCostCode->id ?? ''))
                            <option value="{{ $assetsCostCode->id }}">
                                {{ $assetsCostCode->name }}
                            </option>
                        @endforeach
                    </select>
                </td>
                <td>
                    <select name="newCompanyId">
                        <option value="{{ $asset->company->id ?? NULL }}">
                            {{ $asset->company->name ?? 'УДАЛЕН' }}
                        </option>
                        @foreach ($companies as $company)
                            @continue($company->id == ($asset->company->id ?? ''))
                            <option value="{{ $company->id }}">
                                {{ $company->name }}
                            </option>
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
                        alt="{{ $asset->name }}" height=100px></img></a>
                        <input type="checkbox" name="imgDelete[]" value="{{ $image->id }}">
                        @if ($image->deleted_at == NULL)
                        Удалить
                        @else
                        Восстановить
                        @endif
                    @endforeach
                    <input type="file" name="imgAdd">Добавить
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