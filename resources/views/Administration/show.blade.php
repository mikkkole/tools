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
            <tr>
                <td>{{ rand(1, 1) }}</td>
            </tr>
    </x-slot>    
</x-layout>