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
    <title>Gestion des rendez-vous</title>
</head>

<body>
    @include('admin.header')
    <section class="admin my-5 py-5">
        <div class="container my-5">
            <div class="today">
                <h6 class="title">Gestion des rendez-vous</h6>
                <form action="/admin/timePost" method="POST">
                    @csrf
                    <div class="">
                        <div class="form-group">
                            <label for="">Ajouter un rendez-vous.</label>
                            @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @elseif(session('error'))
                                <div class="alert alert-danger">
                                    {{ session('error') }}
                                </div>
                            @endif
                            <div class="row my-3">
                                <div class="col-lg-6 col-md-12 col-sm-12 my-2">
                                    <label for="" class="form-label">Heure</label>
                                    <input type="time" class="form-control" name="time" required>
                                </div>
                                <div>
                                    <input type="submit" value="Ajouter" class="btn btn-success border-0">
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <form>
                    <div class="">
                        <div class="form-group">
                            <label for="">Lister les rendez-vous</label>
                        </div>
                    </div>
                </form>
                <div class="d-flex justify-content-between list-time">
                    <div>
                        @foreach ($times as $time)
                            <div class="admin-time">{{ \Carbon\Carbon::parse($time->time)->format('h:i a') }}</span>
                                <form action="/admin/timdelete" method="POST">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $time->id }}">
                                    <button type="submit" class="confirmedelete"><i class="fa-solid fa-trash-can"></i></button>
                                </form>
                            </div>
                        @endforeach
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
