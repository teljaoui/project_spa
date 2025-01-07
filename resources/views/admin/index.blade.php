<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <title>Admin</title>
</head>

<body>
    @include('admin.header')

    <section class="admin my-5 py-5">
        <div class="container my-5">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @elseif(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
            <div class="d-flex justify-content-between mx-5">
                <div class="searchdate">
                    <form action="searchdate" method="post">
                        @csrf
                        <div class="form-group">
                            <input type="date" name="date_reserv" class="form-control" id="" required>
                            <input type="submit" class="btn btn-success border-0" value="Recherche">
                        </div>
                    </form>
                </div>
                <div class="searchcode">
                    <form action="searchphone" method="post">
                        @csrf
                        <div class="form-group">
                            <input type="number" name="phone_number" class="form-control" id=""
                                placeholder="Téléphone" required>
                            <input type="submit" class="btn btn-success border-0" value="Recherche">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="today">
                <h6 class="title">Rendez-vous du jour</h6>
                <div class="table-responsive dataview">
                    <table class="table datatable ">
                        <thead>
                            <tr>
                                <th class="phonetable">Date</th>
                                <th>Heure</th>
                                <th>Prénom</th>
                                <th class="phonetable">Nom</th>
                                <th>Téléphone</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (isset($reservations) && $reservations->isNotEmpty())
                                @foreach ($reservations as $item)
                                    <tr>
                                        <td class="phonetable">{{ $item->reservation }}</td>
                                        <td>{{ \Carbon\Carbon::parse($item->horaire->time)->format('h:i a') }}</td>
                                        <td>{{ $item->client->first_name }}</td>
                                        <td class="phonetable">{{ $item->client->last_name }}</td>
                                        <td>{{ $item->client->phone_number }}</td>
                                        <td>
                                            <a href="/admin/reservation/{{ $item->id }}"
                                                class="btn btn-info border-0 fw-bold text-white">Détails</a>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="6" class="text-center">Aucun rendez-vous trouvé</td>
                                </tr>
                            @endif
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </section>


    <script src="/main.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

</body>

</html>
