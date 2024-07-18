<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>L1SPORT : PAGE D'ACCUEIL</title>
</head>

<body>
    <header>
        <!DOCTYPE html>
        <html>

        <head>
            <title>Menu Navbar</title>
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
            <style>
                /* Styles personnalisés (optionnels) */
                .navbar {
                    background-color: #007bff;
                    /* Couleur de fond de la navbar (bleu Bootstrap) */
                }

                .navbar-brand,
                .nav-link {
                    color: white;
                    /* Couleur du texte (blanc) */
                }
            </style>
        </head>

        <body>

            <nav class="navbar navbar-expand-lg">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#">Votre Logo</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="#">LIGUE 1</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">NOTRE OFFRE</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">FAQ</a>
                            </li>
                        </ul>
                        <div class="navbar-nav ms-auto"> <a class="nav-link btn btn-outline-light" href="{{ route('ProfilUser') }}">CONNEXION</a>
                            <a class="nav-link btn btn-warning" href="{{ route('Sub') }}">S'ABONNER</a>
                        </div>
                    </div>
                </div>
            </nav>

            <div>
                @if ($article)
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 offset-md-2">
                            <div class="card mb-4">
                                @if ($article['photoArticle'])
                                <img src="{{ asset('storage/' . $article['photoArticle']) }}" class="card-img-top" alt="Image de l'article">
                                @endif
                                <div class="card-body">
                                    <h2 class="card-title">{{ $article['titreArticle'] }}</h2>
                                    <p class="card-text">{{ $article['contenuArticle'] }}</p>

                                    @if ($article['videoArticle'])
                                    <video controls class="w-100">
                                        <source src="{{ asset('storage/' . $article['videoArticle']) }}" type="video/mp4">
                                        Votre navigateur ne prend pas en charge la balise vidéo.
                                    </video>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @else
                <p>Article non trouvé.</p>
                @endif


            </div>
        </body>

        </html>

    </header>


</body>

</html>