<x-layout>
    <x-slot name='title'>
        {{ $title }}
    </x-slot>
    {{ $slot }}
    <x-slot name='table'>
        <form action="/movement/{{ $movement->id ?? 0 }} " method="POST" enctype="multipart/form-data">
            @csrf
            <tr>
                <td>Номер перемещения</td>
                <td>Комментарии</td>
                <td>Приложение</td>
                <td>Активы______________________</td>
                <td>Откуда</td>
                <td>Куда</td>
                <td>Статус</td>
                <td>Подтверждено</td>
                <td>Кто подтвердил</td>
                <td>Отправитель</td>
                <td>Получатель</td>
                <td>Кто внес</td>
                <td>Дата возврата</td>
                <td>Центр затрат</td>
                <td>Задача</td>
                <td>Компания</td>
                <td>Создан</td>
                <td>Изменен</td>
            </tr>
            <tr>
                <td>{{ $movement->id ?? 'НОВЫЙ' }}</td>
                <td><textarea name="newComments">{{ $movement->comments }}</textarea></td>
                <td><input name="newAppUsed" value="{{ $movement->app_used }}"></td>
                <td>
                    @foreach ($movement->assetsList as $list)
                    <a href="/asset/{{ $list->asset->id ?? 'УДАЛЕН' }}">{{ $list->asset->name ?? 'УДАЛЕН' }}</a>
                    <input type="checkbox" name="listDelete[]" value="{{ $list->id ?? 'УДАЛЕН' }}">Удалить</br>
                    @endforeach

                    @foreach ($assets as $asset)
                        <!-- continue($asset->id == ($movement->id ?? '')) сравнить с уже добавленным -->
                        {{ $asset->name }}
                        <input type="checkbox" name="listAdd[]" value="{{ $asset->id }}">Добавить</br>
                    @endforeach
                </td>
                <td>
                    <select name="newLocationFromId">
                        <option value="{{ $movement->locationFrom->id ?? NULL }}">
                            {{ $movement->locationFrom->name ?? 'УДАЛЕН' }}
                        </option>
                        @foreach ($locations as $location)
                             @continue($location->id == ($movement->locationFrom->id ?? ''))
                            <option value="{{ $location->id }}">
                                 {{ $location->name }}
                            </option>
                        @endforeach
                    </select>
                </td>
                <td>
                    <select name="newLocationToId">
                        <option value="{{ $movement->locationTo->id ?? NULL }}">
                            {{ $movement->locationTo->name ?? 'УДАЛЕН' }}
                        </option>
                        @foreach ($locations as $location)
                             @continue($location->id == ($movement->locationTo->id ?? ''))
                            <option value="{{ $location->id }}">
                                 {{ $location->name }}
                            </option>
                        @endforeach
                    </select>
                </td>
                <td>
                    <select name="newMovementStatus">
                        <option value="{{ $movement->movementStatus->id ?? NULL }}">
                            {{ $movement->movementStatus->name ?? 'УДАЛЕН' }}
                        </option>
                        @foreach ($movementStatuses as $movementStatus)
                             @continue($movementStatus->id == ($movement->movementStatus->id ?? ''))
                            <option value="{{ $movementStatus->id }}">
                                 {{ $movementStatus->name }}
                            </option>
                        @endforeach
                    </select>
                </td>
                <td>
                    <input type="datetime-local" name="newConfirmedAt" value="{{ $movement->confirmed_at ?? 'УДАЛЕН' }}" step=1>
                </td>
                <td>
                    <select name="newUserComfirmedId">
                        <option value="{{ $movement->userComfirmed->id ?? NULL }}">
                            {{ $movement->userComfirmed !== NULL ?$movement->userComfirmed->fullName() : 'УДАЛЕН' }}
                        </option>
                        @foreach ($users as $user)
                            @continue($user->id == ($movement->userComfirmed->id ?? ''))
                            <option value="{{ $user->id }}">
                                {{ $user->fullName() }}
                            </option>
                        @endforeach
                    </select>
                </td>
                <td>
                    <select name="newUserSendId">
                        <option value="{{ $movement->userSend->id ?? NULL }}">
                            {{ $movement->userSend !== NULL ?$movement->userSend->fullName() : 'УДАЛЕН' }}
                        </option>
                        @foreach ($users as $user)
                            @continue($user->id == ($movement->userSend->id ?? ''))
                            <option value="{{ $user->id }}">
                                {{ $user->fullName() }}
                            </option>
                        @endforeach
                    </select>
                </td>
                <td>
                    <select name="newUserRecievedId">
                        <option value="{{ $movement->userRecieved->id ?? NULL }}">
                            {{ $movement->userRecieved !== NULL ?$movement->userRecieved->fullName() : 'УДАЛЕН' }}
                        </option>
                        @foreach ($users as $user)
                            @continue($user->id == ($movement->userRecieved->id ?? ''))
                            <option value="{{ $user->id }}">
                                {{ $user->fullName() }}
                            </option>
                        @endforeach
                    </select>
                </td>
                <td>
                    <select name="newUserWritedId">
                        <option value="{{ $movement->userWrited->id ?? NULL }}">
                            {{ $movement->userWrited !== NULL ?$movement->userWrited->fullName() : 'УДАЛЕН' }}
                        </option>
                        @foreach ($users as $user)
                            @continue($user->id == ($movement->userWrited->id ?? ''))
                            <option value="{{ $user->id }}">
                                {{ $user->fullName() }}
                            </option>
                        @endforeach
                    </select>
                </td>
                <td><input type="datetime-local" name="newReturnedAt" value="{{ $movement->returned_at }}" step=1></td>
                <td>
                    <select name="newMovementCostCenterId">
                        <option value="{{ $movement->movementCostCenter->id ?? NULL }}">
                            {{ $movement->movementCostCenter->name ?? 'УДАЛЕН' }}
                        </option>
                        @foreach ($movementCostCenters as $movementCostCenter)
                            @continue($movementCostCenter->id == ($movement->movementCostCenter->id ?? ''))
                            <option value="{{ $movementCostCenter->id }}">
                                {{ $movementCostCenter->name }}
                            </option>
                        @endforeach
                    </select>
                </td>
                <td>
                    <select name="newMovementTaskCodeId">
                        <option value="{{ $movement->movementTaskCode->id ?? NULL }}">
                            {{ $movement->movementTaskCode->name ?? 'УДАЛЕН' }}
                        </option>
                        @foreach ($movementTaskCodes as $movementTaskCode)
                            @continue($movementTaskCode->id == ($movement->movementTaskCode->id ?? ''))
                            <option value="{{ $movementTaskCode->id }}">
                                {{ $movementTaskCode->name }}
                            </option>
                        @endforeach
                    </select>
                </td>
                <td>
                    <select name="newCompanyId">
                        <option value="{{ $movement->company->id ?? NULL }}">
                            {{ $movement->company->name ?? 'УДАЛЕН' }}
                        </option>
                        @foreach ($companies as $company)
                            @continue($company->id == ($movement->company->id ?? ''))
                            <option value="{{ $company->id }}">
                                {{ $company->name }}
                            </option>
                        @endforeach
                    </select>
                </td>
                <td>{{ $movement->created_at }}</td>
                <td>{{ $movement->updated_at }}</td>
            </tr>
            <tr>
                <td colspan="19">
                    <input type="hidden" name="edit" value="true">
                    <input type="submit" value="Сохранить">
                </td>
            </tr>
        </form>
    </x-slot>
</x-layout>