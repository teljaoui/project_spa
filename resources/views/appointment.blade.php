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
    <title>Spa</title>
</head>

<body>
    @include('layout/header')

    <section class="appointment">
        <div class="title">
            <h5>Appointment Booking</h5>
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
                        <span class="active">1. Time</span>
                        <hr class="active">
                    </div>
                    <div class="col-3">
                        <span>2. Possible time</span>
                        <hr>
                    </div>
                    <div class="col-3">
                        <span>3. confirmed</span>
                        <hr>
                    </div>
                    <div class="col-3">
                        <span>4. Done</span>
                        <hr>
                    </div>
                </div>
            </div>
            <div class="content">
                <form action="" method="post">
                    <div class="form-group">
                        <label for="" class="form-label">Select date</label>
                        <input type="date" name="date_visite" id="" class="form-control" required>
                    </div>

                </form>
            </div>
            <div class="d-flex jusitfy-content-between p-5 m-5">
                <a href="">Back</a>
                <a href="">Next</a>
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