<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Liste des entreprises') }}
        </h2>
    </x-slot>

    @foreach ($list as $entreprise)
        <div style="margin:20px 35% 0 25%">
            <fieldset style="border:solid;">
                <b>NOM</b>: {{ $entreprise->nom }}<br>
                <b>N°TEL</b>: {{ $entreprise->telephone }}<br>
                <b>EMAIL</b>: {{ $entreprise->email }}<br>
                <b>C_P</b>: {{ $entreprise->code_postal}}<br>
            </fieldset>
        </div>
    @endforeach
</x-app-layout>