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
            @foreach ([
                'AssetsCategory',
                'AssetsCostCode',
                'AssetsGroup',
                'AssetsManufacturer',
                'AssetsOwnershipType',
                'AssetsScancodeType',
                'AssetsStatus',
                'AssetsUseTerms',
                'LocationHierarchy',
                'LocationStatus',
                'LocationType',
                'MovementCostCenter',
                'MovementStatus',
                'MovementTaskCode',
                'Service',
                'ServiceStatus',
                'UserLanguage',
                'UserResponsibility',
                'UserRole',
                'UserType',
                ] as $categoryName)
            <tr>
                <td><a href="administration/{{ $categoryName }}">{{ $categoryName }}</a></td>
            </tr>
            @endforeach
    </x-slot>    
</x-layout>