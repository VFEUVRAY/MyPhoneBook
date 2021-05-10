<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Liste des collaborateurs') }}
        </h2>
    </x-slot>

    <div style="margin:20px 35% 0 25%">
        <fieldset style="border:solid;">
            <b>NOM</b>: {{ $collaborateur->nom }}<br>
            <b>PRENOM</b>: {{ $collaborateur->prenom }}<br>
            <b>N°TEL</b>: {{ $collaborateur->telephone }}<br>
            <b>EMAIL</b>: {{ $collaborateur->email }}<br>
            <b>ENTREPRISE</b>: {{ $collaborateur->entreprise }}<br>
            <b>N°ENTREPRISE</b>: {{ $collaborateur->company->telephone}}<br>
        </fieldset>
    </div>
</x-app-layout>