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
    <title>Rendez-vous passé</title>
</head>

<body>
    @include('admin.header')

    <section class="admin my-5 py-5">
        <div class="container my-5">
            <div class="today">
                <h6 class="title">Rendez-vous passé</h6>
                <div class="table-responsive dataview">
                    <table class="table datatable">
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
                        @if (isset($reservations) && $reservations->count() > 0)
                            <tbody>
                                @foreach ($reservations as $item)
                                    <tr>
                                        <td class="phonetable">{{ $item->reservation }}</td>
                                        <td>{{ $item->horaire ? \Carbon\Carbon::parse($item->horaire->time)->format('h:i a') : 'Non défini' }}</td>
                                        <td>{{ $item->client->first_name }}</td>
                                        <td class="phonetable">{{ $item->client->last_name }}</td>
                                        <td>{{ $item->client->phone_number }}</td>
                                        <td>
                                            <a href="/admin/reservation/{{ $item->id }}" class="btn btn-info border-0 fw-bold text-white">Détails</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        @else
                            <tbody>
                                <tr>
                                    <td colspan="6" class="text-center">Aucun rendez-vous trouvé</td>
                                </tr>
                            </tbody>
                        @endif
                    </table>

                    @if (isset($reservations) && $reservations->count() > 0)
                        <div class="text-center">
                            <a href="/admin/delete" class="btn btn-danger border-0 fw-bold text-white w-50 confirmedelete"
                               onclick="return confirm('Êtes-vous sûr de vouloir supprimer tous les rendez-vous ?')">Supprimer tout</a>
                        </div>
                    @endif
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
