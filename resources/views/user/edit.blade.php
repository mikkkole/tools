<x-layout>
    <x-slot name='title'>
        {{ $title }}
    </x-slot>
    {{ $slot }}
    <x-slot name='table'>
        <form action="/user/{{ $user->id ?? 0 }} " method="POST" enctype="multipart/form-data">
            @csrf
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
                <td><input name="newName" value="{{ $user->name }}"></td>
                <td><input name="newPatronymic" value="{{ $user->patronymic }}"></td>
                <td><input name="newSurname" value="{{ $user->surname }}"></td>
                <td><input name="newEmail" value="{{ $user->email }}"></td>
                <td><input name="newEmail_verified_at" value="{{ $user->email_verified_at }}"></td>
                <td><input name="newLogin" value="{{ $user->login }}"></td>
                <td><input name="newPosition" value="{{ $user->position }}"></td>

                <td>
                    <select name="newUserRoleId">
                        <option value="{{ $user->userRole->id ?? NULL }}">
                            {{ $user->userRole->name ?? 'УДАЛЕН' }}
                        </option>
                        @foreach ($userRoles as $userRole)
                             @continue($userRole->id == ($user->userRole->id ?? ''))
                            <option value="{{$userRole->id }}">
                                 {{ $userRole->name }}
                             </option>
                        @endforeach
                    </select>
                </td>

                <td>
                    <select name="newUserTypeId">
                        <option value="{{ $user->userType->id ?? NULL }}">
                            {{ $user->userType->name ?? 'УДАЛЕН' }}
                        </option>
                        @foreach ($userTypes as $userType)
                             @continue($userType->id == ($user->userType->id ?? ''))
                            <option value="{{$userType->id }}">
                                 {{ $userType->name }}
                             </option>
                        @endforeach
                    </select>
                </td>

                <td>
                    <select name="newUserResponsibilityId">
                        <option value="{{ $user->userResponsibility->id ?? NULL }}">
                            {{ $user->userResponsibility->name ?? 'УДАЛЕН' }}
                        </option>
                        @foreach ($userResponsibilities as $userResponsibility)
                             @continue($userResponsibility->id == ($user->userResponsibility->id ?? ''))
                            <option value="{{$userResponsibility->id }}">
                                 {{ $userResponsibility->name }}
                             </option>
                        @endforeach
                    </select>
                </td>

                <td>
                    <select name="newUserLanguageId">
                        <option value="{{ $user->userLanguage->id ?? NULL }}">
                            {{ $user->userLanguage->name ?? 'УДАЛЕН' }}
                        </option>
                        @foreach ($userLanguages as $userLanguage)
                             @continue($userLanguage->id == ($user->userLanguage->id ?? ''))
                            <option value="{{$userLanguage->id }}">
                                 {{ $userLanguage->name }}
                             </option>
                        @endforeach
                    </select>
                </td>

                <td>
                    <select name="newCompanyId">
                        <option value="{{ $user->company->id ?? NULL }}">
                            {{ $user->company->name ?? 'УДАЛЕН' }}
                        </option>
                        @foreach ($companies as $company)
                            @continue($company->id == ($user->company->id ?? ''))
                            <option value="{{ $company->id }}">
                                {{ $company->name }}
                            </option>
                        @endforeach
                    </select>
                </td>

                <td>{{ $user->created_at }}</td>
                <td>{{ $user->updated_at }}</td>
            </tr>
            <tr>
                <td colspan="14">
                    @foreach ($user->usersImage as $image)
                        <a href="/images/{{ $image->filename }}">
                        <img src="/images/{{ $image->filename }}" 
                        alt="{{ $user->name }}" height=100px></img></a>
                        <input type="checkbox" name="imgDelete[]" value="{{ $image->id }}">
                        @if ($image->deleted_at == NULL)
                        Удалить
                        @else
                        Восстановить
                        @endif
                    @endforeach
                    <input type="file" name="imgAdd">Добавить
                </td>
            </tr>
            <tr>
                <td colspan="14">
                    <input type="hidden" name="edit" value="true">
                    <input type="submit" value="Сохранить">
                </td>
            </tr>
        </form>
    </x-slot>
</x-layout>