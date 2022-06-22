<x-layout>
    <x-slot name='title'>
        {{ $title }}
    </x-slot>
    {{ $slot }}
    <br>
    <x-slot name='table'>
            <tr>
                <td>Название</td>
            </tr>
            @foreach ($strings as $string)
            <tr>
                <td>{{ $string->name }}</td>
            </tr>
            @endforeach
    </x-slot>    
</x-layout>