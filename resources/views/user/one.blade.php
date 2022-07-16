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
            @if ($user->deleted_at !== NULL)
            <tr>
                <td colspan="14" bgcolor="red">Объект удален</td>
            </tr>
            @endif
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
            <tr>
                 <td colspan="14">
                    @foreach ($user->usersImage as $image)
                        <a href="/images/{{ $image->filename }}">
                        <img src="/images/{{ $image->filename }}" 
                        alt="{{ $user->name }}" height=100px></img></a>
                        @if ($image->deleted_at !== NULL)
                        Удален
                        @endif
                    @endforeach
                </td>
            </tr>
            <tr>
                <td colspan="14">
                    <form action="/user/edit" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{ $user->id }}">
                        <input type="submit" value="Изменить">
                    </form>
                    <form action="" method="POST">
                         @csrf
                        <input type="hidden" name="delete" value="true">
                        @if ($user->deleted_at == NULL)
                            <input type="submit" value="Удалить">
                        @else
                            <input type="submit" value="Восстановить">
                        @endif
                    </form>
                </td>
            </tr>
    </x-slot>
</x-layout>