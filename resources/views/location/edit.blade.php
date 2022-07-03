<x-layout>
    <x-slot name='title'>
        {{ $title }}
    </x-slot>
    {{ $slot }}
    <x-slot name='table'>
        <form action="/location/{{ $location->id ?? 0 }} " method="POST" enctype="multipart/form-data">
        @csrf
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
                <tr>
                    <td><input name="newName" value="{{ $location->name }}"></td>
                    <td>
                        <select name="newLocationTypeId">
                            <option value="{{ $location->locationType->id ?? NULL }}">
                                {{ $location->locationType->name ?? 'УДАЛЕН' }}
                            </option>
                            @foreach ($locationTypes as $locationType)
                                @continue($locationType->id == ($location->locationType->id ?? ''))
                                <option value="{{ $locationType->id }}">
                                    {{ $locationType->name }}
                                </option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <select name="newLocationStatusId">
                            <option value="{{ $location->locationStatus->id ?? NULL }}">
                                {{ $location->locationStatus->name ?? 'УДАЛЕН' }}
                            </option>
                            @foreach ($locationStatuses as $locationStatus)
                                @continue($locationStatus->id == ($location->locationStatus->id ?? ''))
                                <option value="{{ $locationStatus->id }}">
                                    {{ $locationStatus->name }}
                                </option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <select name="newLocationHierarchyId">
                            <option value="{{ $location->locationHierarchy->id ?? NULL }}">
                                {{ $location->locationHierarchy->name ?? 'УДАЛЕН' }}
                            </option>
                            @foreach ($locationHierarchies as $locationHierarchy)
                                @continue($locationHierarchy->id == ($location->locationHierarchy->id ?? ''))
                                <option value="{{ $locationHierarchy->id }}">
                                    {{ $locationHierarchy->name }}
                                </option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <select name="newLocationManagerId">
                            <option value="{{ $location->locationManager->id ?? NULL }}">
                                {{ $location->locationManager !== NULL ?$location->locationManager->fullName() : 'УДАЛЕН' }}
                            </option>
                            @foreach ($locationManagers as $locationManager)
                                @continue($locationManager->id == ($location->locationManager->id ?? ''))
                                <option value="{{ $locationManager->id }}">
                                    {{ $locationManager->fullName() }}
                                </option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <select name="newLocationParentId">
                            <option value="{{ $location->locationParent->id ?? NULL }}">
                                {{ $location->locationParent->name ?? 'УДАЛЕН' }}
                            </option>
                            @foreach ($locationParents as $locationParent)
                                @continue($locationParent->id == ($location->locationParent->id ?? ''))
                                <option value="{{ $locationParent->id }}">
                                    {{ $locationParent->name }}
                                </option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <select name="newCompanyId">
                            <option value="{{ $location->company->id ?? NULL }}">
                                {{ $location->company->name ?? 'УДАЛЕН' }}
                            </option>
                            @foreach ($companies as $company)
                                @continue($company->id == ($location->company->id ?? ''))
                                <option value="{{ $company->id }}">
                                    {{ $company->name }}
                                </option>
                            @endforeach
                        </select>
                    </td>
                    <td>{{ $location->created_at }}</td>
                    <td>{{ $location->updated_at }}</td>
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