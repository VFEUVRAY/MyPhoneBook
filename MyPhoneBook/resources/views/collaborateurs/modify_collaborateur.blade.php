<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Modifier informations Collaborateur') }}
        </h2>
    </x-slot>
        <div style="display: flex; justify-content: space-around;margin:20px 0 0 0">
            <form action="/collaborateur/modify/{{$collab->id}}/success" method="POST" style="width: 500px;background-color: white;">
                {{ csrf_field() }}
                <fieldset style="border:solid;padding:20px;border-radius:20px">
                    <div style="display: flex; justify-content: space-between;">
                        <label for="civilite">Civilité</label>
                        <div>
                            <label for="Femme">Femme </label><input type="radio" name="civilite" id="Femme" value="Femme">
                        </div>
                        <div>
                            <label for="Homme">Homme </label><input type="radio" name="civilite" id="Homme" value="Homme">
                        </div>
                        <div>
                            <label for="Non-binaire">Non-binaire </label><input type="radio" name="civilite" id="Non-binaire" value="Non-binaire">
                        </div>
                    </div>
                    <label for="nom">Nom</label><br>
                    <input type="text" name="nom" id="nom" value="{{$collab->nom}}"><br>
                    <label for="prenom">Prénom</label><br>
                    <input type="text" name="prenom" id="prenom" value="{{$collab->prenom}}"><br>
                    <label for="code_postal">Code Postal</label><br>
                    <input type="text" name="code_postal" id="code_postal" oninput="cp_check(this)" value="{{$collab->code_postal}}"><br>
                    <label for="ville">Ville</label><br>
                    <input type="text" name="ville" id="ville" value="{{$collab->ville}}"><br>
                    <label for="telephone">Téléphone</label><br>
                    <input type="tel" name="telephone" id="telephone" oninput="numcheck(this)" value="{{$collab->telephone}}"><br>
                    <label for="email">Email</label><br>
                    <input type="email" name="email" id="email" value="{{$collab->email}}"><br>
                    <label for="entreprise">Entreprise</label><br>
                    <input type="text" name="entreprise" id="entreprise" value="{{$collab->entreprise}}"><br>
                    <input type="submit" id="submitButton" value="Ajouter Collaborateur"  style="background-color:black;color:white;margin-top:20px;padding:5px">
                </fieldset>
            </form>
        </div>
        <div style="display:flex;justify-content:space-around;">
            @if ($errors->any())
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
        </div>
</x-app-layout>

<script>
function cp_check(num)
{
    var regex = /^\d*$/;

    if (!regex.test(num.value) || num.value.length > 5) {
        if (num.hasOwnProperty("oldValue")) {
            num.value = num.oldValue;
            num.oldValue = num.value;
            return (0)
        }
        else {
            num.value = "";
            return (0);
        }
    }
    num.oldValue = num.value;
    return (1);
}

function numcheck(num)
{
    var regex = /^\d*$/;
    var plusmod = 0;
    var submod = 0;

    if (num.value.substring(0, 1) == "+") {
        plusmod = 2;
        submod = 1;
    }
    if (!regex.test(num.value.substring(submod)) || num.value.length > (10 + plusmod)) {
        if (num.hasOwnProperty("oldValue")) {
            num.value = num.oldValue;
            num.oldValue = num.value;
        }
        else
            num.value = "";
    }
    num.oldValue = num.value;
    return (1);
}
</script>