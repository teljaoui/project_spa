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
    <title>Réservation de Rendez-vous</title>
</head>

<body>
    @include('admin.header')
    <section class="admin my-5 py-5">
        <div class="container my-5">
            @if (!session('date'))
                <div class="today">
                    <h6 class="title">Réservation de Rendez-vous</h6>
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @elseif(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                    <div>
                        <form action="addPost" method="POST">
                            @csrf
                            <div class="">
                                <div class="form-group">
                                    <label for="">Veuillez sélectionner la date de votre visite.</label>
                                    <input type="date" name="date_reserve" class="form-control" id=""
                                        required>
                                </div>
                            </div>
                            <div class="d-flex justify-content-center my-3">
                                <input type="submit" value="Suivant" class="w-50 submit">
                            </div>
                        </form>
                    </div>
                </div>
            @endif
            @if (session('date') && !session('time'))
                <div class="today admin-time my-1">
                    <h6 class="title">Réservation de Rendez-vous</h6>
                    <div>
                        <div class="form-group">
                            <label for="">Voici les créneaux horaires disponibles le {{ session('date') }}.
                                Cliquez sur un créneau pour procéder à la réservation.</label>
                            <div class="time my-4 text-center">
                                @foreach ($times as $time)
                                    <form action="/admin/addtime" method="post">
                                        @csrf
                                        <input type="hidden" name="time" value="{{ $time->id }}">
                                        <button><i
                                                class="fa-regular fa-circle"></i><span>{{ \Carbon\Carbon::parse($time->time)->format('h:i a') }}</span></button>
                                    </form>
                                @endforeach
                            </div>
                            <div>
                                <a href="backtime" class="back"><i class="fa-solid fa-arrow-left"></i> Retour</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            @if (session('time') && !session('user'))
                <div class="today">
                    <h6 class="title">Réservation de Rendez-vous</h6>
                    <div>
                        <a href="backuser" class="back"><i class="fa-solid fa-arrow-left"></i> Retour</a>
                    </div>
                    <div>
                        <form action="adduser" method="POST">
                            @csrf
                            <div class="">
                                <div class="form-group">
                                    <label for="">Réservation confirmée pour le {{ session('date') }},
                                        {{ \Carbon\Carbon::parse(session('time'))->format('h:i a') }}. Veuillez remplir
                                        vos coordonnées ci-dessous pour continuer.</label>
                                    <div class="row my-3">
                                        <div class="col-lg-6 col-md-12 col-sm-12 my-2">
                                            <label for="" class="form-label">Prénom: </label>
                                            <input type="text" class="form-control" name="firstname" required>
                                        </div>
                                        <div class="col-lg-6 col-md-12 col-sm-12 my-2">
                                            <label for="" class="form-label">Nom: </label>
                                            <input type="text" class="form-control" name="lastname" required>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 my-2">
                                            <label for="" class="form-label">Téléphone: </label>
                                            <input type="text" class="form-control" name="phone_number" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-center my-3">
                                <input type="submit" value="Suivant" class="w-50 submit">
                            </div>
                        </form>
                    </div>
                </div>
            @endif
            @if (session('user'))
                <div class="today my-1">
                    <h6 class="title">Réservation de Rendez-vous</h6>
                    <div>
                        <form action="confirmed_admin" method="POST">
                            @csrf
                            <p>Vérifiez les informations saisies.</p>
                            <div class="mb-4">
                                <a href="backfinal" class="back"><i class="fa-solid fa-arrow-left"></i> Retour</a>
                            </div>
                            <ul>
                                <li>
                                    <span>Date de la visite:</span>
                                    <p>{{ session('date') }}</p>
                                </li>
                                <li>
                                    <span>Heure de la visite :</span>
                                    <p>{{ \Carbon\Carbon::parse(session('time'))->format('h:i a') }}</p>
                                </li>
                                <li>
                                    <span>Prénom:</span>
                                    <p>{{ session('firstname') }}</p>
                                </li>
                                <li>
                                    <span>Nom:</span>
                                    <p>{{ session('lastname') }}</p>
                                </li>
                                <li>
                                    <span>Numéro de Téléphone:</span>
                                    <p>{{ session('phone_number') }}</p>
                                </li>
                            </ul>
                            <span class="admin-span">Si les informations sont correctes, cliquez sur le bouton ci-dessous</span><br><br>
                            <button type="submit" class="next">Confirmé</button>
                        </form>
                    </div>
                </div>
            @endif
        </div>
    </section>



    <script src="/main.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

</body>

</html>
