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
            <div class="today">
                <h6 class="title">Appointment Details user</h6>
                <div>
                    <ul>
                        <li>
                            <span>code:</span>
                            <p>{{$reservation->id}}</p>
                        </li>
                        <li>
                            <span>Date Of Visit:</span>
                            <p>{{$reservation->reservation}}</p>
                        </li>
                        <li>
                            <span>Visiting Time:</span>
                            <p>{{ \Carbon\Carbon::parse($reservation->horaire->time)->format('h:i a') }}</p>
                        </li>
                        <li>
                            <span>First Name:</span>
                            <p>{{$reservation->client->first_name}}</p>
                        </li>
                        <li>
                            <span>Last Name:</span>
                            <p>{{$reservation->client->last_name}}</p>
                        </li>
                        <li>
                            <span>Phone Number:</span>
                            <p>{{$reservation->client->phone_number}}</p>
                        </li>
                    </ul>
                </div>
                <div class="d-flex align-items-center">
                    <a href="tel:{{$reservation->client->phone_number}}" class="call"><i class="bi bi-telephone-forward"></i>Call</a>
                    <a href="/admin/deletereservation/{{$reservation->id}}" class="btn btn-danger fw-bold confirmedelete">Delete</a>
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
