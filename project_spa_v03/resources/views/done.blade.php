<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <title>Réservation de Rendez-vous</title>
</head>

<body>
    @include('layout/header')

    <section class="appointment">
        <div class="title">
            <h5>Réservation de Rendez-vous</h5>
            <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="m19 9-7 7-7-7" />
            </svg>
        </div>
        <div class="container py-5 mb-5">
            <div class="header-appointment">
                <div class="row">
                    <div class="col-3">
                        <span class="active">1. <strong>Temps</strong></span>
                        <hr class="active">
                    </div>
                    <div class="col-3">
                        <span class="active">2. <strong>Horaires disponibles</strong></span>
                        <hr class="active">
                    </div>
                    <div class="col-3">
                        <span class="active">3. <strong>Confirmation</strong></span>
                        <hr class="active">
                    </div>
                    <div class="col-3">
                        <span class="active">4. <strong>Terminé</strong></span>
                        <hr class="active">
                    </div>
                </div>
            </div>
            <div class="available my-2">
                <div class="confirmed text-center">
                    <p>Vérifiez les informations saisies.</p>
                    <div class="donne">
                        <div class="mb-4">
                            <a href="backdone" class="back"><i class="fa-solid fa-arrow-left"></i>  Retour</a>
                        </div>
                        <ul>
                            <li>
                                <span>Date de la visite:</span>
                                <p>{{session('date_front')}}</p>
                            </li>
                            <li>
                                <span>Heure de la visite :</span>
                                <p>{{session('time_front')}}</p>
                            </li>
                            <li>
                                <span>Prénom:</span>
                                <p>{{session('firstname_front')}}</p>
                            </li>
                            <li>
                                <span>Nom:</span>
                                <p>{{session('lastname_front')}}</p>
                            </li>
                            <li>
                                <span>Numéro de Téléphone:</span>
                                <p>{{session('phone_front')}}</p>
                            </li>
                        </ul>
                        <form action="donepost" class="text-center pb-4" method="POST">
                            @csrf
                            <span>Si les informations sont correctes, cliquez sur le bouton ci-dessous.</span><br><br>
                            <button type="submit" class="next">Confirmé</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('layout/footer')


    <script src="main.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>
