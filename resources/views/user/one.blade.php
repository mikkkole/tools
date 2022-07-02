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
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->patronymic }}</td>
                    <td>{{ $user->surname }}</td>
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
    </x-slot>    
</x-layout>