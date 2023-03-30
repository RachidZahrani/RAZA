<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">

    <title>Document</title>
</head>
<body>
    <div class="container">
      <div class="row">
        <div class="col col-3 mb-5"></div>
        <div class="col col-6 mt-5">
        @foreach ($tache as $t)

            <form action="{{route('tache.update',$t->id)}}" method="post">
                        @csrf
                        <label for="titre" class="form-label">titre</label>
                        <input type="text" class="form-control" id="titre" name="titre" value="{{$t->titre}}">

                        <label for="description" class="form-label">description</label>
                        <input type="text" class="form-control" id="description" name="description" value="{{$t->description}}">

                        <label for="date" class="form-label">date</label>
                        <input type="date" class="form-control" id="date" name="date" value="{{$t->date}}">

                    <label for="statut" class="form-label">statut</label>
                        <select  class="form-select" name="statut" id="statut">
                            <option value="encours">en cours</option>
                            <option value="terminee">terminée</option>
                        </select>
                

                    <button  type="submit" class="btn btn-success mt-2">Validate</button>
                         
            </form>
            @endforeach

        </div>
      </div>
    </div>
</body>
</html>