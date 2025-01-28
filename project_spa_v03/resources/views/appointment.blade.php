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
            <div class="available my-2">
                <div class="confirmed">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @elseif(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                    <form action="add_appointment" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6 col-md-12 col-sm-12 my-2">
                                <label for="" class="form-label">Date de visite</label>
                                <input type="date" class="form-control" name="date_visite" required>
                            </div>
                            <div class="col-lg-6 col-md-12 col-sm-12 my-2">
                                <label for="" class="form-label">Service</label>
                                <select name="service_id" id="" class="form-control" required>
                                    <option value="" disabled selected>--selectionné un service</option>
                                    @foreach ($services as $service)
                                    <option value="{{$service->id}}">{{ strtr($service->designation, ['_' => ' ']) }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-6 col-md-12 col-sm-12 my-2">
                                <label for="" class="form-label">Prénom</label>
                                <input type="text" class="form-control" name="first_name" required>
                            </div>
                            <div class="col-lg-6 col-md-12 col-sm-12 my-2">
                                <label for="" class="form-label">Nom</label>
                                <input type="text" class="form-control" name="last_name" required>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 my-2">
                                <label for="" class="form-label">Numéro de Téléphone</label>
                                <input type="text" class="form-control" name="phone_number" required>
                            </div>
                            <div class="col-12 my-2 text-center">
                                <button type="submit" class="next">Confirmé</button>
                            </div>
                        </div>
                    </form>
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
