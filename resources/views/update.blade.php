<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Modifier un Article</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="{{ asset('css/add.css') }}" rel="stylesheet">
</head>
<body>
   <div class="container">
    <h1>MODIFIER UN ARTICLE</h1><hr>

        @if (session('status'))
        <div class="alert alert-success">
          {{ session('status') }}
        </div>
        @endif
    <ul>
        @foreach($errors->all() as $error)
        <li class="alert alert-danger">{{ $error }}</li>
        @endforeach
      </ul>
    <form action="/update/traitement" method="post" class="form-group" enctype="multipart/form-data">
        @csrf
        <input type="text" name="id" style="display: none;"value ="{{$article->id}}">
        <div class="form-group">
          <label for="nom">Titre de l'article</label>
          <input type="text" class="form-control" id="nom" name="nom" value="{{$article->nom}}">
        </div>
        <div class="form-group">
          <label for="description">Description</label>
          <input type="text" class="form-control" id="description" name="description" value="{{$article->description}}">
        </div>
        
        <div class="form-group">
          <label for="image">L'image</label>
          <input type="text" class="form-control" id="image" name="image" value="{{$article->image}}">
        </div>
        <div class="form-group">
          <label for="date_creation">Date de création</label>
          <input type="date" class="form-control" id="date_creation" name="date_creation"value="{{$article->date_creation}}">
        </div>
        <div class="form-group">
          <label>À la Une</label><br>
          <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="la_une" id="la_une_oui" value="1" {{ $article->la_une ? 'checked' : '' }}>
              <label class="form-check-label" for="la_une_oui">Oui</label>
          </div>
          <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="la_une" id="la_une_non" value="0" {{ !$article->la_une ? 'checked' : '' }}>
              <label class="form-check-label" for="la_une_non">Non</label>
          </div>
      </div>
      
        
        <br> 
       <div class="liens">
        <button type="submit" class="btn btn-primary">MODIFIER</button>
        
        <a href="/articles" class="btn btn-danger">Revenir à la liste des articles</a>
       </div>
      </form>
   </div>
</body>
</html>
