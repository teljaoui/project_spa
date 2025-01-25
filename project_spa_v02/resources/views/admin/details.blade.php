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
    <title>Détails de la réservation de Client</title>
</head>

<body>
    @include('admin.header')
    <section class="admin my-5 py-5">
        <div class="container my-5">
            <div class="today">
                <h6 class="title">Détails de la réservation de Client </h6>
                <div>
                    <ul>
                        <li>
                            <span>Date de la visite:</span>
                            <p>{{$reservation->date_visite}}</p>
                        </li>
                        <li>
                            <span>Heure de la visite :</span>
                            <p>{{ \Carbon\Carbon::parse($reservation->heure_de_visite)->format('h:i a') }}</p>
                        </li>
                        <li>
                            <span>Prénom:</span>
                            <p>{{$reservation->first_name}}</p>
                        </li>
                        <li>
                            <span>Nom:</span>
                            <p>{{$reservation->last_name}}</p>
                        </li>
                        <li>
                            <span>Numéro de Téléphone:</span>
                            <p>{{$reservation->phone_number}}</p>
                        </li>
                    </ul>
                </div>
                <div class="d-flex align-items-center">
                    <a href="tel:{{$reservation->phone_number}}" class="call"><i class="bi bi-telephone-forward"></i>Appel</a>
                    <a href="/admin/deletereservation/{{$reservation->id}}" class="btn btn-danger fw-bold confirmedelete">Supprimer</a>
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
