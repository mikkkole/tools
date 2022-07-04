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
            @if ($location->deleted_at !== NULL)
                <tr bgcolor="red">
                @else
                <tr>
                @endif
                    <td>
                        <a href="/location/{{ $location->id }}">{{ $location->name }}</a>
                    </td>
                    <td>{{ $location->locationType->name ?? 'УДАЛЕН' }}</td>
                    <td>{{ $location->locationStatus->name ?? 'УДАЛЕН' }}</td>
                    <td>{{ $location->locationHierarchy->name ?? 'УДАЛЕН' }}</td>
                    <td>
                        <a href="/user/{{ $location->locationManager->id ?? 'УДАЛЕН' }}">{{ $location->locationManager !== NULL ?$location->locationManager->fullName() : 'УДАЛЕН' }}</a>
                    </td>
                    <td>
                        <a href="/location/{{ $location->locationParent->id ?? 'УДАЛЕН' }}">{{ $location->locationParent->name ?? 'УДАЛЕН' }}</a>
                    </td>                    
                    <td>{{ $location->company->name ?? 'УДАЛЕН' }}</td>
                    <td>{{ $location->created_at }}</td>
                    <td>{{ $location->updated_at }}</td>
                </tr>
            @endforeach
            <td  colspan="9">
                <form action="/location/addNew" method="POST">
                    @csrf
                    Выбрать шаблон: 
                    <select name="newLocationTemplate">
                    <option>Нет</option>
                    <option>Шаблон 1</option>
                    <option>Шаблон 2</option>
                    </select>
                    <input type="submit" value="Добавить новую локацию">
                </form>
                </td>
    </x-slot>
</x-layout>