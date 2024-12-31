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
                <h6 class="title">Past Appointment</h6>
                <div class="table-responsive dataview">
                    <table class="table datatable ">
                        <thead>
                            <tr>
                                <th>code</th>
                                <th class="phonetable">Date</th>
                                <th>Time</th>
                                <th>First Name</th>
                                <th class="phonetable">Last Name</th>
                                <th>Phone Number</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($reservations as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td class="phonetable">{{ $item->reservation }}</td>
                                    <td>{{ \Carbon\Carbon::parse($item->horaire->time)->format('h:i a') }}</td>
                                    <td>{{ $item->client->first_name }}</td>
                                    <td class="phonetable">{{ $item->client->last_name }}</td>
                                    <td>{{ $item->client->phone_number }}</td>
                                    <td>
                                        <a href="/admin/reservation/{{ $item->id }}"
                                            class="btn btn-info border-0 fw-bold text-white">Dtails</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="text-center">
                    <a href="/admin/delete" class="btn btn-danger border-0 fw-bold text-white w-50 confirmedelete">Delete All</a>
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
