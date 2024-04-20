<?php
    if(isset($_GET['errors'])){
        $errors = json_decode($_GET["errors"], true);
    }
    if(isset($_GET['user_data'])){
        $user_data = json_decode($_GET["user_data"], true);
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .card-registration .select-input.form-control[readonly]:not([disabled]) {
            font-size: 1rem;
            line-height: 2.15;
            padding-left: .75em;
            padding-right: .75em;
        }
        .card-registration .select-arrow {
            top: 13px;
        }
    </style>
</head>

<body>
    <section class="h-100 bg-dark">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col">
                    <div class="card card-registration my-4">
                        <div class="row g-0">
                            <div class="col-xl-6 d-none d-xl-block">
                                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-registration/img4.webp"
                                    alt="Sample photo" class="img-fluid"
                                    style="border-top-left-radius: .25rem; border-bottom-left-radius: .25rem;" />
                            </div>
                            <div class="col-xl-6">
                                <div class="card-body p-md-5 text-black">
                                    <h3 class="mb-5 text-uppercase">User registration form</h3>
                                    <form action="./Validation.php" method="post">
                                        <div class="row">
                                            <div class="col-md-6 mb-4">
                                                <div data-mdb-input-init class="form-outline">
                                                    <label class="form-label" for="form3Example1m">First name</label>
                                                    <input type="text" id="form3Example1m"
                                                        class="form-control form-control-lg" name="first_name"
                                                        value="<?php echo $user_data['first_name']?$user_data['first_name'] : '' ?>" />
                                                        <p class="text-danger">
                                                            <?php
                                                            echo $errors['first_name']? $errors['first_name'] : " ";
                                                            ?>
                                                        </p>
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-4">
                                                <div data-mdb-input-init class="form-outline">
                                                    <label class="form-label" for="form3Example1n">Last name</label>
                                                    <input type="text" id="form3Example1n"
                                                        class="form-control form-control-lg" name="last_name"
                                                        value="<?php echo $user_data['last_name']?$user_data['last_name'] : '' ?>" />
                                                            <p class="text-danger">
                                                            <?php
                                                            echo $errors['last_name']? $errors['last_name'] : " ";
                                                            ?>
                                                        </p>
                                                </div>
                                            </div>
                                        </div>

                                        <div data-mdb-input-init class="form-outline mb-4">
                                            <label class="form-label" for="form3Example8">Address</label>
                                            <input type="text" id="form3Example8"
                                                class="form-control form-control-lg"
                                                name="address"
                                                value="<?php echo $user_data['Address']?$user_data['Address'] : '' ?> "/>
                                                    <p class="text-danger">
                                                            <?php
                                                            echo $errors['Address']? $errors['Address'] : " ";
                                                            ?>
                                                        </p>
                                        </div>

                                        <div class="d-md-flex justify-content-start align-items-center mb-4 py-2">

                                            <h6 class="mb-0 me-4">Gender: </h6>
               
                                            <div class="form-check form-check-inline mb-0 me-4">
                                                <input class="form-check-input" type="radio" name="inlineRadioOptions"
                                                    id="femaleGender" value="Female" />
                                                <label class="form-check-label" for="femaleGender">Female</label>
                                            </div>

                                            <div class="form-check form-check-inline mb-0 me-4">
                                                <input class="form-check-input" type="radio" name="inlineRadioOptions"
                                                    id="maleGender" value="Male" />
                                                <label class="form-check-label" for="maleGender">Male</label>
                                            </div>
                                        </div>
                                        <div data-mdb-input-init class="form-outline mb-4">
                                            <label class="form-label" for="form3Example9">Email</label>
                                            <input type="text" id="form3Example9"
                                                class="form-control form-control-lg" 
                                                name="email"
                                                value="<?php echo $user_data['email']?$user_data['email'] : '' ?>"/>
                                        </div>
                                                    <p class="text-danger">
                                                            <?php
                                                            echo $errors['email']? $errors['email'] : " ";
                                                            ?>
                                                        </p>
                                        <div data-mdb-input-init class="form-outline mb-4">
                                            <label class="form-label" for="form3Example90">Password</label>
                                            <input type="password" id="form3Example90"
                                                class="form-control form-control-lg"
                                                name="Password" 
                                                value="<?php echo $user_data['password']?$user_data['password'] : '' ?>"
                                                />
                                                    <p class="text-danger">
                                                            <?php
                                                            echo $errors['password']? $errors['password'] : " ";
                                                            ?>
                                                        </p>
                                        </div>

                                        <div data-mdb-input-init class="form-outline mb-4">
                                            <label class="form-label" for="form3Example99">department</label>
                                            <input type="text" id="form3Example99"
                                                class="form-control form-control-lg"
                                                value="<?php echo $user_data['department']?$user_data['department'] : '' ?>"
                                                name="department"
                                                />
                                                    <p class="text-danger">
                                                            <?php
                                                            echo $errors['department']? $errors['department'] : " ";
                                                            ?>
                                                        </p>
                                        </div>

                                        <div class="d-flex justify-content-end pt-3">
                                            <button type="reset" data-mdb-button-init data-mdb-ripple-init
                                                class="btn btn-light btn-lg">Reset all</button>
                                            <button type="submit" data-mdb-button-init data-mdb-ripple-init
                                                class="btn btn-success btn-lg ms-2">Submit form</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</body>

</html>
