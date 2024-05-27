<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Détails de l'item</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="{{ asset('css/show.css') }}" rel="stylesheet">
</head>
<body>
    <div class="retour">
        <a href="/items" class="btn btn-success return-button"><i class="fas fa-arrow-left"></i> Retour aux articles</a>
    </div>
   <div class="container">
    <h1>Détails de l'article</h1>
    
    <div class="card mb-3" style="max-width: 20rem;">
        @if ($item->image)
            <img src="{{ $item->image }}" class="card-img-top" alt="{{ $item->nom}}">
        @endif
        <div class="card-body">
            <h5 class="card-title">{{ $item->nom }}</h5>
            <p class="card-text">{{ $item->description }}</p>
            <p class="card-text">Date de création : {{ $item->date_creation }}</p>
            <p class="card-text">À la Une : {{ $item->la_une ? 'Oui' : 'Non' }}</p>
            <div class="liens">
                <a href="/update/{{ $item->id }}" class="btn btn-info"><i class="fas fa-edit"></i> Modifier</a>
            <a href="/delete{{ $item->id }}" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Supprimer</a>
            </div>
        </div>
    </div>
   </div>
<!-- Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Font Awesome -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>
</body>
</html>
