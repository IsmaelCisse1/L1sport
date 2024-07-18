<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>L1sport : Mon profil</title>
</head>

<body>
    @if(session('user_name') && session('user_prenom'))
    <p>Bienvenue, {{ session('user_name') }} {{ session('user_prenom') }} !</p>
    @endif
    <div>
        <h5>MES INFOS</h5>
        <form method="POST">
            @csrf
            <label for="prenom">Nouveau prénom:</label>
            <input type="text" id="prenom" name="prenom" value="{{ old('prenom') }}">
            <button type="submit">Mettre à jour</button>
        </form>

        <div>
            <h4>SUPPRIMEZ MON COMPTE :</h4>
            <form method="POST">
                @csrf
                @method('DELETE')
                <button type="submit">Supprimer mon compte</button>
            </form>
        </div>

        <div>
            <h4>Deconnexion</h4>
            <form method="POST">
                @csrf
                <button type="submit">Déconnexion</button>
            </form>

        </div>

    </div>
</body>

</html>