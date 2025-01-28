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
    <title>Services</title>
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
        </div>
        <div class="container">
            <div class="today">
                <h6 class="title">Services</h6>
                <div class="table-responsive dataview">
                    <table class="table datatable ">
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Designation</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($services as $service)
                                <tr>
                                    <td>
                                        <img src="{{ asset('../img/' . $service->service_image) }}" width="50"
                                            height="50" alt="Service Image">

                                    </td>
                                    <td>{{ $service->designation }}</td>
                                    <td>
                                        <a href="/admin/servicedelete/{{ $service->id }}"
                                            class="btn btn-danger border-0 fw-bold text-white">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>
                <div class="d-flex justify-content-end">
                    <button class="btn btn-success open" onclick="openForm()">Ajouter</button>
                    <button class="btn btn-warning close" onclick="closeForm()">Fermer</button>
                </div>
                <div class="service_add">
                    <h6 class="title">Ajouter un service</h6>
                    <form action="addservicepost" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="">
                            <div class="form-group">
                                <div class="row my-3">
                                    <div class="col-lg-6 col-md-12 col-sm-12 my-2">
                                        <label for="" class="form-label">Nom du Service: </label>
                                        <input type="text" class="form-control" name="designation" required>
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-sm-12 my-2">
                                        <label for="" class="form-label">Image du service: </label>
                                        <input type="file" class="form-control" name="service_image" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center my-3">
                            <input type="submit" value="Ajouter" class="w-50 submit">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>



    <script src="{{ asset('main.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

</body>

</html>