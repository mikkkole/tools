<x-layout>
    <x-slot name='title'>
        {{ $title }}
    </x-slot>
    {{ $slot }}
    <x-slot name='table'>
            <tr>
                <td>Имя</td>
                <td>Отчество</td>
                <td>Фамилия</td>
                <td>email</td>
                <td>email_verified_at</td>
                <td>login</td>
                <td>Должность</td>
                <td>Роль</td>
                <td>Тип</td>
                <td>Ответственность</td>
                <td>Язык</td>
                <td>Компания</td>
                <td>Создан</td>
                <td>Изменен</td>
            </tr>
            @foreach ($users as $user)
                <tr>
                    <td><a href="/user/{{ $user->id }}">{{ $user->name }}</a></td>
                    <td><a href="/user/{{ $user->id }}">{{ $user->patronymic }}</a></td>
                    <td><a href="/user/{{ $user->id }}">{{ $user->surname }}</a></td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->email_verified_at }}</td>
                    <td>{{ $user->login }}</td>
                    <td>{{ $user->position }}</td>
                    <td>{{ $user->userRole->name ?? 'УДАЛЕН' }}</td>
                    <td>{{ $user->userType->name ?? 'УДАЛЕН' }}</td>
                    <td>{{ $user->userResponsibility->name ?? 'УДАЛЕН' }}</td>
                    <td>{{ $user->userLanguage->name ?? 'УДАЛЕН' }}</td>
                    <td>{{ $user->company->name ?? 'УДАЛЕН' }}</td>
                    <td>{{ $user->created_at }}</td>
                    <td>{{ $user->updated_at }}</td>
                </tr>
            @endforeach
    </x-slot>    
</x-layout>