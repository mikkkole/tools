<x-layout>
    <x-slot name='title'>
        {{ $title }}
    </x-slot>
    {{ $slot }}
    <br>
    <x-slot name='table'>
            <tr>
                <td>Название</td>
                <td></td>
            </tr>
            @foreach ($categoryItems as $categoryItem)
            <tr>
                <td>
                    @if ($categoryItem->deleted_at == NULL)
                        {{ $categoryItem->name }}
                    @else
                        <del>{{ $categoryItem->name }}</del>
                    @endif                    
                </td>
                <td>
                <form action="" method="POST">
                    @csrf
                    <input type="hidden" name="id" value="{{ $categoryItem->id }}">
                    @if ($id == $categoryItem->id)
                        <input name="newName" value="{{ $categoryItem->name }}">
                        <input type="submit" value="Сохранить">
                    @else
                        <input type="submit" value="Изменить">
                    @endif
                </form>
                <form action="" method="POST">
                    @csrf
                    <input type="hidden" name="deleteId" value="{{ $categoryItem->id }}">
                    @if ($categoryItem->deleted_at == NULL)
                        <input type="submit" value="Удалить">
                    @else
                        <input type="submit" value="Восстановить">
                    @endif
                </form>                
                </td>
            </tr>
            @endforeach
            <tr>
                <td  colspan="2">
                <form action="" method="POST">
                    @csrf
                    <input type="hidden" name="addNew" value="1">
                    <input name="addNewName">
                    <input type="submit" value="Добавить новый">                    
                </form>                
                </td>
            </tr>
    </x-slot>    
</x-layout>