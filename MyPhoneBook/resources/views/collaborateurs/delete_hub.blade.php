<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Sélectionnez un collaborateur à supprimmer') }}
        </h2>
    </x-slot>

    @foreach ($list as $collaborateur)
        <div style="margin:20px 35% 0 25%">
            <fieldset style="border:solid; padding:5px">
                <b>ID</b>: {{ $collaborateur->id }}<br>
                <b>NOM</b>: {{ $collaborateur->nom }}<br>
                <b>PRENOM</b>: {{ $collaborateur->prenom }}<br>
                <b>N°TEL</b>: {{ $collaborateur->telephone }}<br>
                <b>EMAIL</b>: {{ $collaborateur->email }}<br>
                <b>C_P</b>: {{ $collaborateur->code_postal }}<br>
                <b>ENTREPRISE</b>: {{ $collaborateur->entreprise }}<br>
                <b>N°ENTREPRISE</b>: {{ $collaborateur->company->telephone}}<br>
                <form action='{{"/collaborateur/delete/".$collaborateur->id}}' method="POST">
                    @method('DELETE')
                    {{ csrf_field() }}
                    <input type="submit" id="submitButton" value="SUPPRIMMER" style="background-color:black;color:white;margin-top:5px;padding:5px">
                </form>
            </fieldset>
        </div>
    @endforeach
</x-app-layout>