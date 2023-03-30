<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>



<div class="container ">
    <center>
        <div class="col-18">
        <table class="table ">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">
                                <a href="{{ route('tache.index', ['trier' => 'alpha'])}}" class="btn btn-outline-dark mt-5" ><b>Titre</b></a>
                            </th>
                            
                            <th scope="col">description</th>
                            <th scope="col">
                                <a href="{{ route('tache.index', ['trier' => 'date'])}}" class="btn btn-outline-dark mt-5" ><b>Date</b></a>
                            </th>
                            <th scope="col">statut</th>
                            <th scope="col">Action</th>
                            <th scope="col">
                                <a href="{{route('tache.create')}}" class="btn btn-success">Add</a>
                            </th>
                            <th scope="col">
                                <form action="{{ route('tache.search') }}" method="GET" class="d-flex">
                                @csrf

                                    <div class="form-group row">
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" name="value">
                                            @error('value')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <button type="submit" class="btn btn-primary">Search</button>
                                        </div>
                                    </div>
                                </form>
                            </th>
                            <th scope="col">
                                <form method="GET" action="{{ route('tache.index') }}">
                                        <label for="status">Filter by status:</label>
                                        <select name="status"  class="form-select" id="status">
                                            <option value="">All</option>
                                            <option value="encours">En cours</option>
                                            <option value="terminee">Terminée</option>
                                        </select>
                                        <button type="submit" class="btn btn-outline-primary mt-2 ">Filter</button>
                                    </form>
                            </th>
                           
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($taches as $t)
                        <tr>
                            <th scope="row">{{$t->id}}</th>
                            <td>{{$t->titre}}</td>
                            <td>{{$t->description}}</td>
                            <td>{{$t->date}}</td>
                            <td>{{$t->statut}}</td>
                            <td scope="col"><a  href="{{route('tache.edit',$t->id)}}" class="btn btn-info">Edite</a></td>
                            <td scope="col"><a href="{{route('delete',$t->id)}}"  class="btn btn-danger">Delete</a></td>
                            <td>
                                @if ($t->statut == 'terminee')
                                <div class="form-check">
                                        <input class="form-check-input" type="checkbox" checked disabled>
                                        <label class="form-check-label" for="m">Terminée</label>
                                    </div>
                                @else
                                <form action="{{ route('tache.update', $t->id) }}" method="post" id="rzfrom">
                                    @csrf
                                    <!-- @method('PUT') -->
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="m" onclick=" document.getElementById('rzfrom').submit();" name="zahrani">
                                        <label class="form-check-label" for="m">Marquer comme terminée</label>
                                    </div>
                                </form>
                                @endif

                            
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
            </table>
            <div>{{$taches->links()}}</div>

        </div>
    </center>
</div>
</body>
</html>