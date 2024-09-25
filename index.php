<?php
session_start();
$_SESSION['userid'] = 1;
$_SESSION['deptid'] = 2;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>NBSC Integrated System</title>
    <link href="css/styles.css" rel="stylesheet" />
    <link href="assets/img/nbsclogo.png" rel="icon">
</head>

<body>
    <main class="d-flex w-100">
        <div class="container d-flex flex-column">
            <div class="row vh-100">
                <div class="col-sm-5 col-md-5 col-lg-4 mx-auto d-table h-100">
                    <div class="d-table-cell align-middle">
                        <div class="text-center my-4">
                            <h5 class="mb-0">Northern Bukidnon State College</h5>
                            <h6 class="text-muted">Integrated System</h6>
                        </div>
                        <div class="card shadow">
                            <div class="card-body py-4">
                                <div class="py-4 pt-2">
                                    <div class="text-center">
                                        <img src="assets/img/nbsclogo.png" alt="NBSC Logo" class="img-fluid " width="100" height="132" />
                                    </div>
                                    <form id="frmnbsclogin">
                                        <div class="mb-2">
                                            <label>Username</label>
                                            <input id="inloginemail" class="form-control form-control-sm" type="text" placeholder="Username your email" required />
                                        </div>
                                        <div class="mb-4">
                                            <label>Password</label>
                                            <input id="inloginpass" class="form-control form-control-sm" type="password" placeholder="Enter your password" required />
                                        </div>

                                        <div class="text-center mt-3">
                                            <button id="btnsubmitlogin" type="submit" class="btn btn-sm btn-primary rounded w-100">Login</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script src="js/jquery-3.6.0.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#frmnbsclogin').submit(function(e) {
                e.preventDefault();
                btnDisable('#btnsubmitlogin', true);
                loginAction();
            });
        });

        function loginAction() {
            $.post("assets/components/login_action.php", {
                username: $('#inloginemail').val(),
                pass: $('#inloginpass').val(),
            }, function(data) {
                // Assume the server returns a response with user type (admin or student)
                // Example response: { status: "success", role: "admin" } or { status: "success", role: "student" }
                const response = JSON.parse(data);
                
                if (response.status === 'success') {
                    if (response.role === 'admin') {
                        alert('Admin Login Successfully');
                        window.location.href = "admin/index.php";
                    } else if (response.role === 'student') {
                        alert('Login Successfully');
                        window.location.href = "student/index.php"; // Redirect to student page
                    }
                } else {
                    alert(response.message || 'Login failed');
                    btnDisable('#btnsubmitlogin', false);
                }
            });
        }

        function btnDisable(element, type) {
            $(element).prop('disabled', type);
        }
    </script>
</body>

</html>