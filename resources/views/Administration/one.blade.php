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
                <td>{{ $categoryItem->name }}</td>
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