<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link href="assets/img/nbsclogo.png" rel="icon">
    <link href="css/styles.css" rel="stylesheet" />
    <style>
        .txt-black{
            color: black !important;
        }

        .hiddentag{
            display: none;
        }
        body{
            font-family: "Helvetica" !important;
            font-size: 8px !important;
            -webkit-print-color-adjust: exact;

        }
        #rpt-head{
            background-color:blue;
        }
    </style>
</head>
<body class="sb-nav-fixed">

    <div id="">
        <div id="">
            <main>
                <div id="maincontent" class="container-fluid px-2">
                    <?php echo $_POST['divdata'];?>
                </div>
            </main>
        </div>
    </div>
    <script src="js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>

</html>