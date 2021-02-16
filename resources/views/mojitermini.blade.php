<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Moji termini</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('./css/custom.css') }}">

</head>

<body style="background-color:#EFECCA">
    <div class="backgroundImage">
        <div id="nav"></div>

        <div class="container">

            <h3 align="center">Termini za korisnika {{ $korisnik }}</h3>
            <table class="table table-dark">
                <thead>
                    <tr>
                        <th scope="col">Naziv</th>
                        <th scope="col">Pocinje u</th>
                        <th scope="col">Zavrsen u </th>
                        <th scope="col">Akcije </th>
                    </tr>
                </thead>
                <tbody style="background-color:#FF934F">

                    @foreach ($termini as $termin)
                        <tr>
                            <td>{{ $termin->naziv_termin }}</td>
                            <td>{{ $termin->pocinje_at }}</td>
                            <td>{{ $termin->zavrsen_at }}</td>
                            <td>
                                <form method="post"
                                    action={{ 'http://127.0.0.1:8000/termini/update?id_termin=' . $termin->id }}>
                                    @method('PUT')
                                    @csrf
                                    <input value="Zavrsi" class="btn btn-success" type="submit"></input>
                                </form>

                                <a class="btn btn-danger"
                                    href={{ 'http://127.0.0.1:8000/termini/delete?id_termin=' . $termin->id }}>Obrisi</a>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
            <div id="forma" data-id="<?php echo $_GET['id_korisnik']; ?>"></div>

        </div>
    </div>

    <script src="../js/app.js"></script>
</body>

</html>
