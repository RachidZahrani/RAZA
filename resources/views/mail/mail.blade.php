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
        <div class="card text-dark bg-light mb-3" style="max-width: 18rem;">
            <div class="card-header">{{$tache->titre}}</div>
            <div class="card-body">
                <h5 class="card-title">la date d'échéance de cette tâche est atteinte.</h5>
                <p>statut : {{$tache->statut}}</p>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <p>Merci de contact ...</p>
            </div>
        </div>
    </div>
</body>
</html>