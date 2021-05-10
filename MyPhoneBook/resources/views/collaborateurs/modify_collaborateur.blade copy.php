<!DOCTYPE html>
<html>
    <head>
        <title>Ajouter Collaboteur</title>
    </head>
    <body>
        <h1 style="text-align: center;">Ajouter un Collaborateur</h1>
        <div style="display: flex; justify-content: space-around;">
            <form action="/collaborateur/modify/{{$collab->id}}/success" method="POST" style="width:400px">
                {{ csrf_field() }}
                <fieldset>
                    <legend>Information sur le Collaborateur</legend>
                    <div style="display: flex; justify-content: space-between;">
                        <label for="civilite">Civilité</label>
                        <div>
                            <label for="Femme">Femme</label><input type="radio" name="civilite" id="Femme" value="Femme">
                        </div>
                        <div>
                            <label for="Homme">Homme</label><input type="radio" name="civilite" id="Homme" value="Homme">
                        </div>
                        <div>
                            <label for="Non-binaire">Non-binaire</label><input type="radio" name="civilite" id="Non-binaire" value="Non-binaire">
                        </div>
                    </div>
                    <label for="nom">Nom</label><br>
                    <input type="text" name="nom" id="nom" value="{{$collab->nom}}"><br>
                    <label for="prenom">Prénom</label><br>
                    <input type="text" name="prenom" id="prenom" value="{{$collab->prenom}}"><br>
                    <label for="code_postal">Code Postal</label><br>
                    <input type="number" name="code_postal" id="code_postal" value="{{$collab->code_postal}}"><br>
                    <label for="ville">Ville</label><br>
                    <input type="text" name="ville" id="ville" value="{{$collab->ville}}"><br>
                    <label for="telephone">Téléphone</label><br>
                    <input type="tel" name="telephone" id="telephone" value="{{$collab->telephone}}"><br>
                    <label for="email">Email</label><br>
                    <input type="email" name="email" id="email" value="{{$collab->email}}"><br>
                    <label for="entreprise">Entreprise</label><br>
                    <input type="text" name="entreprise" id="entreprise" value="{{$collab->entreprise}}"><br>
                    <input type="submit" id="submitButton" value="Ajouter Collaborateur">
                </fieldset>
            </form>
        </div>
    </body>
</html>