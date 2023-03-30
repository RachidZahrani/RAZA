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
<center>
<div class="container">
        <h1>Confirm delete Tache</h1>
        <p>Are you sure you want to delete this tache?</p>
        <form action="{{ route('tache.destroy',$id)}}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete</button>
            <a href="{{ route('tache.index') }}" class="btn btn-primary">Cancel</a>
        </form>
</div>
</center>
</body>
</html>