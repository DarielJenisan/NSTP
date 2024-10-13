<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Sample Template</title>
    <link href="../css/styles.css" rel="stylesheet" />
    <link href="../css/jquery.dataTables.min.css" rel="stylesheet" />
    <script src="../js/all.js" crossorigin="anonymous"></script>
    <link href="../assets/img/nbsclogo.png" rel="icon">
    <script src="../js/jquery-3.6.0.js"></script>
    <style>
        /* Ensure the content grows to fit the page */
        body, html {
            height: 100%;
            overflow-y: auto;
        }

        main {
            min-height: 100vh; /* Forces main content to take at least full viewport height */
        }
    </style>
</head>

<body class="sb-nav-fixed">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary px-2">
        <a class="navbar-brand ps-2" href="#">
            <img src="../assets/img/nbsclogo.png" style="height: 0.3in;">
            NBSC SIS
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main_nav" aria-expanded="true">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-collapse collapse hide" id="main_nav">
            <div class="navbar-collapse flex-grow-1 text-right" id="sampleid" style="padding-left: 20px">
                <?php include '../nav_student/nav_main.php' ?>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div>
        <div>
            <main>
                <div id="maincontent" class="container-fluid px-2">
                    <!-- LOAD MAIN DATA HERE -->
                    <div class="row">
                        <div class="col-12" style="text-align: -webkit-center;">
                            <img src="../assets/img/nstplogo.png" style="height: 1.5in; margin-top:100px; font-family: fantasy;color: #002d54 !important;">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 text-center">
                            <h3 class="mb-0" style="font-size: 50px;font-family: fantasy;color: #002d54 !important;">National Service Training Program</h3>
                            <h5 class="mb-0" style="color: #d18b00;">Northern Bukidnon State College</h5>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <!-- Scripts -->
    <script src="../js/jquery.dataTables.min.js"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="../js/global_script.js"></script>
    <script>
        function clickSubModule(filepath) {
            $.post(filepath, {}, function (data) {
                $('#maincontent').html(data);
            });
        }

        function logout() {
            if (confirm('Are you sure you want to logout?')) {
                window.location.href = '../assets/components/logout.php'; // Adjust the path to your actual logout.php location
            }
        }

        function enroll(program) {
            alert('You have selected to enroll in ' + program + '.');
        }
    </script>
</body>

</html>
