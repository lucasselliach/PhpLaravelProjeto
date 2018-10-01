<!-- index.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Projeto LUCAS SELLIACH</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>
<div class="container">
    <br />
    @if (\Session::has('success'))
        <div class="alert alert-success">
            <p>{{ \Session::get('success') }}</p>
        </div><br />
    @endif
    <table class="table table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Cpf</th>
            <th colspan="2">Action</th>
        </tr>
        </thead>
        <tbody>

        @foreach($pessoas as $pessoa)
            <tr>
                <td>{{$pessoa['id']}}</td>
                <td>{{$pessoa['nome']}}</td>
                <td>{{$pessoa['email']}}</td>
                <td>{{$pessoa['cpf']}}</td>

                <td><a href="{{action('PessoaController@edit', $pessoa['id'])}}" class="btn btn-warning">Edit</a></td>
                <td>
                    <form action="{{action('PessoaController@destroy', $pessoa['id'])}}" method="post">
                        {!! csrf_field() !!}
                        <input name="_method" type="hidden" value="DELETE">
                        <button class="btn btn-danger" type="submit">Delete</button>
                    </form>
                </td>

            </tr>
        @endforeach

        </tbody>
    </table>

    <div class="row">
        <div class="col-md-4"></div>
        <div class="form-group col-md-4" style="margin-top:60px">
            <button type="button" onclick="window.location='{{ url("/pessoas/create") }}'">Criar Pessoa</button>
        </div>
    </div>
</div>
</body>
</html>