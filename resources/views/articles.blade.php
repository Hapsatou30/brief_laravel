<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Les articles</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body>
    <div class="ajouter mb-3">
        <a href="/Add" class="btn btn-success"><i class="fas fa-plus-circle"></i> Ajouter un article</a>
    </div>
   <div class="container">
       <h1>La liste des articles</h1>
       <div class="row">
           @foreach ($articles as $article)
               <div class="col-md-4 mb-4">
                   <div class="card h-100">
                       @if ($article->image)
                           <img src="{{ $article->image }}" class="card-img-top " alt="{{ $article->nom}}">
                       @endif
                       <div class="card-body">
                           <h5 class="card-title">{{ $article->nom }}</h5>
                           <div class="d-flex justify-content-between align-items-center ">
                                <a href="/show/{{ $article->id }}" class="btn btn-primary"><i class="fas fa-info-circle"></i> </a>
                                <a href="/update/{{ $article->id }}" class="btn btn-info"><i class="fas fa-edit"></i></a>
                                <a href="/delete{{ $article->id }}" class="btn btn-danger"><i class="fas fa-trash-alt"></i> </a>
                            </div>
                         </div>
                   </div>
               </div>
           @endforeach
       </div>
   </div>
<!-- Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Font Awesome -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>
</body>
</html>
