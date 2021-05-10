<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Sélectionnez une entreprise à supprimmer') }}
        </h2>
    </x-slot>

    @foreach ($list as $entreprise)
        <div style="margin:20px 35% 0 25%">
            <fieldset style="border:solid; padding:5px">
                <b>ID</b>: {{ $entreprise->id }}<br>
                <b>NOM</b>: {{ $entreprise->nom }}<br>
                <b>N°TEL</b>: {{ $entreprise->telephone }}<br>
                <b>EMAIL</b>: {{ $entreprise->email }}<br>
                <b>C_P</b>: {{ $entreprise->code_postal}}<br>
                <form action={{"/entreprise/delete/".$entreprise['id']}} method="POST">
                    @method('DELETE')
                    {{ csrf_field() }}
                    <input type="submit" id="submitButton" value="DELETE" style="border:solid">
                </form>
            </fieldset>
        </div>
    @endforeach
</x-app-layout>