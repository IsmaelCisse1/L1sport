<!DOCTYPE html>
<html>

<head>
    <title>Connexion</title>
    <style>
    </style>
</head>

<body>
    <h2>Connexion</h2>

    <form method="POST">
        @csrf <div>
            <label for="email">Adresse e-mail:</label>
            <input type="email" id="email" name="email">
        </div>

        <div>
            <label for="mdp">Mot de passe:</label>
            <input type="password" id="mdp" name="mdp">
        </div>

        <button type="submit">Se connecter</button>

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
    </form>
</body>

</html>