<x-layout>
    <x-slot name='title'>
        {{ $title }}
    </x-slot>
    {{ $slot }}
    <x-slot name='table'>
            <tr>
                <td>Изображение</td>
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
                @if ($user->deleted_at !== NULL)
                <tr bgcolor="red">
                @else
                <tr>
                @endif
                    <td>
                    @if ($user->usersImageFirst($user->id))
                    <a href="/images/{{ $user->usersImageFirst($user->id)->filename }}">
                    <img src="/images/{{ $user->usersImageFirst($user->id)->filename }}"
                    alt="{{ $user->name }}" max-height=100px width=100px></img></a>
                    @endif
                    </td>
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
            <td  colspan="15">
                <form action="/user/addNew" method="POST">
                    @csrf
                    Выбрать шаблон: 
                    <select name="newUsersTemplate">
                    <option>Нет</option>
                    <option>Шаблон 1</option>
                    <option>Шаблон 2</option>
                    </select>
                    <input type="submit" value="Добавить нового работника">
                </form>
            </td>
    </x-slot>
</x-layout>