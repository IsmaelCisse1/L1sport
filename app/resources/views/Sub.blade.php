<form method="post">
    @csrf <div>
        <label for="nom">Nom:</label>
        <input type="text" name="nom" id="nom" value="{{ old('nom') }}">
        @error('nom')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div>
        <label for="prenom">Prénom:</label>
        <input type="text" name="prenom" id="prenom" value="{{ old('prenom') }}">
        @error('prenom')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div>
        <label for="email">E-mail:</label>
        <input type="email" name="email" id="email" value="{{ old('email') }}">
        @error('email')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div>
        <label for="adresse">Adresse:</label>
        <input type="text" name="adresse" id="adresse" value="{{ old('adresse') }}">
        @error('adresse')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div>
        <label for="mdp">Mot de passe:</label>
        <input type="password" name="mdp" id="mdp">
        @error('mdp')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div>
        <label for="payclick_user">Utilisateur PayClick:</label>
        <input type="text" name="payclick_user" id="payclick_user" value="{{ old('payclick_user') }}">
        @error('payclick_user')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <button type="submit">Soumettre</button>
</form>