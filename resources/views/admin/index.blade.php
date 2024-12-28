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
            <div class="d-flex justify-content-between mx-5">
                <div class="searchdate">
                    <form action="" method="post">
                        <div class="form-group">
                            <input type="date" name="" class="form-control" id="" required>
                            <input type="submit" class="btn btn-success border-0" value="Search">
                        </div>
                    </form>
                </div>
                <div class="searchcode">
                    <form action="" method="post">
                        <div class="form-group">
                            <input type="number" name="" class="form-control" id=""
                                placeholder="code client" required>
                            <input type="submit" class="btn btn-success border-0" value="Search">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="today">
                <h6 class="title">Appointment Today</h6>
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
                            <tr>
                                <td>18</td>
                                <td class="phonetable">18-12-2024</td>
                                <td>18:00 am</td>
                                <td>Karima</td>
                                <td class="phonetable">Salihi</td>
                                <td>+212 652583234</td>
                                <td>
                                    <form action="" method="post">
                                        <input type="hidden" name="">
                                        <input type="submit" value="Details"
                                            class="btn btn-info border-0 fw-bold text-white">
                                    </form>
                                </td>
                            </tr>
                            <tr>
                                <td>18</td>
                                <td class="phonetable">18-12-2024</td>
                                <td>18:00 am</td>
                                <td>Karima</td>
                                <td class="phonetable">Salihi</td>
                                <td>+212 652583234</td>
                                <td>
                                    <form action="" method="post">
                                        <input type="hidden" name="">
                                        <input type="submit" value="Details"
                                            class="btn btn-info border-0 fw-bold text-white">
                                    </form>
                                </td>
                            </tr>
                            <tr>
                                <td>18</td>
                                <td class="phonetable">18-12-2024</td>
                                <td>18:00 am</td>
                                <td>Karima</td>
                                <td class="phonetable">Salihi</td>
                                <td>+212 652583234</td>
                                <td>
                                    <form action="" method="post">
                                        <input type="hidden" name="">
                                        <input type="submit" value="Details"
                                            class="btn btn-info border-0 fw-bold text-white">
                                    </form>
                                </td>
                            </tr>
                        </tbody>
                    </table>
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
