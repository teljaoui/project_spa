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
                <h6 class="title">management Appointment's</h6>
                <form action="" method="POST">
                    <div class="">
                        <div class="form-group">
                            <label for="">Add Appointment.</label>
                            <div class="row my-3">
                                <div class="col-lg-6 col-md-12 col-sm-12 my-2">
                                    <label for="" class="form-label">Time</label>
                                    <input type="time" class="form-control" name="tim" required>
                                </div>
                                <div>
                                    <input type="submit" value="Submit" class="btn btn-success border-0">
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <form action="" method="POST">
                    <div class="">
                        <div class="form-group">
                            <label for="">List Appointment.</label>
                        </div>
                    </div>
                </form>
                <div class="d-flex justify-content-between list-time">
                    <div>
                        <div class="admin-time"><span>10:00 am</span>
                            <form action=""><button type="submit"><i class="fa-solid fa-trash-can"></i></button>
                            </form>
                        </div>
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
