<!DOCTYPE html>
<html>
    <head>
        <title>Ajouter une entreprise</title>
    </head>
    <body style="background-color: gray;">
        <h2 style="text-align: center;">Ajout d'Entreprise</h2>
        <div style="display: flex; justify-content: space-around;">
            <form action="/entreprise/create/success" method="POST" style="width: 500px;background-color: white;">
                {{ csrf_field() }}
                <fieldset>
                    <legend>Information sur l'entreprise</legend>
                    <label for="nom">Nom</label><br>
                    <input type="text" name="nom" id="nom" required value="{{ old('nom') }}"><br>
                    <label for="rue">Rue et numéro</label><br>
                    <input type="text" name="rue" id="rue" required value="{{ old('rue') }}"><br>
                    <label for="ville">Ville</label><br>
                    <input type="text" name="ville" id="ville" required value="{{ old('ville') }}"><br>
                    <label for="code_postal">Code Postal</label><br>
                    <input type="text" name="code_postal" id="code_postal" oninput="cp_check(this)" required value="{{ old('code_postal') }}"><br>
                    <label for="telephone">Numéro de Téléphone</label><br>
                    <input type="tel" name="telephone" id="telephone" oninput="numcheck(this)" value="{{ old('telephone') }}"><br>
                    <label for="email">Email</label><br>
                    <input type="email" name="email" id="email" required value="{{ old('email') }}"><br>
                    <input type="submit" id="submitButton" value="Ajouter Entreprise">
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
    </body>
</html>

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