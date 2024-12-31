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
                <h6 class="title">Appointment Booking</h6>
                <div>
                    <form action="addPost" method="POST">
                        @csrf
                        <div class="">
                            <div class="form-group">
                                <label for="">Please select the date of your visit.</label>
                                <input type="date" name="reservation" class="form-control" id="" required>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center my-3">
                            <input type="submit" value="Next" class="w-50 submit">
                        </div>
                    </form>
                </div>
            </div>
            <div class="today admin-time my-1">
                <h6 class="title">Appointment Booking</h6>
                <div>
                    <div class="form-group">
                        <label for="">Here are the available time slots. Click on a slot to proceed with
                            booking.</label>
                        <div class="time my-4 text-center">
                            <form action="" method="post">
                                <button><i class="fa-regular fa-circle"></i><span>10:00 am</span></button>
                            </form>
                            <form action="" method="post">
                                <button><i class="fa-regular fa-circle"></i><span>10:00 am</span></button>
                            </form>
                            <form action="" method="post">
                                <button><i class="fa-regular fa-circle"></i><span>10:00 am</span></button>
                            </form>
                            <form action="" method="post">
                                <button><i class="fa-regular fa-circle"></i><span>10:00 am</span></button>
                            </form>
                            <form action="" method="post">
                                <button><i class="fa-regular fa-circle"></i><span>10:00 am</span></button>
                            </form>
                            <form action="" method="post">
                                <button><i class="fa-regular fa-circle"></i><span>10:00 am</span></button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
            <div class="today">
                <h6 class="title">Appointment Booking</h6>
                <div>
                    <form action="">
                        <div class="">
                            <div class="form-group">
                                <label for="">Booking confirmed for 4:00 PM, Dec 27, 2024.
                                    Kindly fill in your details below to proceed.</label>
                                <div class="row my-3">
                                    <div class="col-lg-6 col-md-12 col-sm-12 my-2">
                                        <label for="" class="form-label">First Name</label>
                                        <input type="text" class="form-control" name="firstname" required>
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-sm-12 my-2">
                                        <label for="" class="form-label">Last Name</label>
                                        <input type="text" class="form-control" name="lastname" required>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 my-2">
                                        <label for="" class="form-label">Phone Number</label>
                                        <input type="text" class="form-control" name="number" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center my-3">
                            <input type="submit" value="Next" class="w-50 submit">
                        </div>
                    </form>
                </div>
            </div>
            <div class="today my-1">
                <h6 class="title">Appointment Booking</h6>
                <div>
                    <form action="">
                        <p>Check the information entered.</p>
                        <div class="mb-4">
                            <a href="" class="back"><i class="fa-solid fa-arrow-left"></i> Back</a>
                        </div>
                        <ul>
                            <li>
                                <span>Date Of Visit:</span>
                                <p>12/12/2025</p>
                            </li>
                            <li>
                                <span>Visiting Time:</span>
                                <p>12:00 am</p>
                            </li>
                            <li>
                                <span>First Name:</span>
                                <p>Mohamed</p>
                            </li>
                            <li>
                                <span>Last Name:</span>
                                <p>Teljaoui</p>
                            </li>
                            <li>
                                <span>Phone Number:</span>
                                <p>0652583234</p>
                            </li>
                        </ul>
                        <span class="admin-span">If the information is correct click on the button below</span><br><br>
                        <button type="submit" class="next">Confirmed</button>
                    </form>
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
