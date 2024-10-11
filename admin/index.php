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
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
    <script src="../js/all.js" crossorigin="anonymous"></script>
    <link href="../assets/img/nbsclogo.png" rel="icon">
    <script src="../js/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
   
</head>

<body class="sb-nav-fixed">
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary px-2">
        <a class="navbar-brand ps-2" href="#">
            <img src="../assets/img/nstplogo.png" style="height: 0.4in;">
            NSTP Profiling System</a>
        </button>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main_nav" aria-expanded="true">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-collapse collapse hide" id="main_nav">
            <div class="navbar-collapse flex-grow-1 text-right" id="sampleid" style="padding-left: 20px">
                <?php include '../nav/nav_main.php' ?>
            </div>
        </div>
    </nav>

    <div>
        <div>
            <main id="main" class="main"  style="overflow-y: auto; height: 100vh;">
                <div id="maincontent" class="container-fluid px-2">

         <section class="section dashboard">    
         <div class="row">

         <div class="school-year-semester" style="margin-top: 20px;">
    <label for="selectAY" style="margin: 5px;">
        <h6>School Year: </h6>
    </label>
    <select class="select-year-center" id="selectAY" style="width: 150px; height: 30px;" onchange="fetchData()">
        <!-- Options will be populated dynamically via AJAX -->
    </select>

    <label for="selectSemester" style="margin: 5px;">
        <h6>Semester: </h6>
    </label>
    <select class="select-year-center" id="selectSemester" style="width: 150px; height: 30px;" onchange="fetchData()">
        <option value="First">First</option>
        <option value="Second">Second</option>
    </select>
</div>


         <div class="col-sm-3">
    <div class="card shadow" style="margin-top: 20px; box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15) !important;">
        <div class="card-body">
            <h3 class="card-title" id="total-enrolled">2023-2024 - First Semester Enrolled</h3>
            <p class="card-text" id="academic-year">300</p>
            <a href="#" class="card-text" onclick="clickSubModule('../nav/userreg/student_list.php')">Total Students</a>
        </div>
    </div>
</div>
<div class="col-sm-3">
    <div class="card shadow" style="margin-top: 20px; box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15) !important;">
        <div class="card-body">
            <h3 class="card-title" id="bsit-enrolled"></h3>
            <p class="card-text">BSIT Enrolled</p>
            <a href="#" class="card-text">Total Students</a>
        </div>
    </div>
</div>

<div class="col-sm-3">
    <div class="card shadow" style="margin-top: 20px; box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15) !important;">
        <div class="card-body">
            <h3 class="card-title" id="bsba-enrolled"></h3>
            <p class="card-text">BSBA Enrolled</p>
            <a href="#" class="card-text">Total Students</a>
        </div>
    </div>
</div>
<div class="col-sm-3">
    <div class="card shadow" style="margin-top: 20px; box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15) !important;">
        <div class="card-body">
            <h3 class="card-title" id="tep-enrolled"></h3>
            <p class="card-text">TEP Enrolled</p>
            <a href="#" class="card-text">Total Students</a>
        </div>
    </div>
</div>
 
<div style="display: flex; flex-direction: row; gap: 10px; padding: 20px;">
        <!-- Left Section with two stacked cards -->
        <div style="display: flex; flex-direction: column; gap: 10px; width: 50%;">
            <div class="card shadow" style="background-color: white; padding: 20px; box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15); height: 460px;">
                <div class="card-body text-center">
                    <div id="barchart" style="width: 550px; height: 350px;"></div>
                </div>
            </div>
            <div class="card shadow" style="background-color: white; padding: 20px; box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15); height: 400px;">
                <div class="card-body text-center">
                    <div id="piechart" style="width: 600px; height: 400px;"></div>
                </div>
            </div>
        </div>

        <!-- Right Section with two stacked cards -->
        <div style="display: flex; flex-direction: column; gap: 10px; width: 50%;">
            <div class="card shadow" style="background-color: white; padding: 20px; box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15); height: 390px;">
                <div class="card-body text-center">
                    <div id="piechart_3d" style="width: 600px; height: 350px;"></div>
                </div>
            </div>
            <div class="card shadow" style="background-color: white; padding: 20px; box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15); height: 390px;">
                <div class="card-body text-center">
                    <div id="donutchart" style="width: 600px; height: 350px;"></div>
                </div>
            </div>
        </div>
    </div>


</div>
        </section>



                </div>
            </main>
        </div>
    </div>
    <?php include '../assets/components/modals.php' ?>
    <script src="../js/jquery.dataTables.min.js"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="../js/global_script.js"></script>
    <script>
        // clickSubModule('nav/userreg/userreg_main.php')
        // clickSubModule('nav/purchaserequest/pr_main.php');
        // clickSubModule('nav/purchaserequest/pr_main.php')
    </script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
     <script>
    function clickSubModule(filepath) {
        $.post(filepath, {}, function(data) {
            $('#maincontent').html(data);
        });
    }

    function logout() {
        if (confirm('Are you sure you want to logout?')) {
            window.location.href = '../assets/components/logout.php'; // Adjust the path to your actual logout.php location
        }
    }
</script>

<!--Fetches all the Enrolled student in the nstp according to the Program and Semester year-->
<script>
    // Function to update displayed data based on selected academic year and semester
    function fetchData() {
        const selectedYear = document.getElementById("selectAY").value;
        const selectedSemester = document.getElementById("selectSemester").value;

        // Fetch academic year and total enrolled data based on selections
        fetch(`../nav/dashboard/components/fetch_academic_data.php?year=${selectedYear}&semester=${selectedSemester}`)
            .then(response => response.json())
            .then(data => {
                updateAcademicYear(data, selectedYear, selectedSemester);
            })
            .catch(error => {
                console.error('Error fetching academic year data:', error);
            });

        // Fetch enrollment data for each program
        fetch(`../nav/dashboard/components/fetch_program_enrollment.php?year=${selectedYear}&semester=${selectedSemester}`)
            .then(response => response.json())
            .then(data => {
                updateProgramEnrollment(data);
            })
            .catch(error => {
                console.error('Error fetching enrollment data:', error);
            });
    }

    // Function to update the academic year display
    function updateAcademicYear(data, selectedYear, selectedSemester) {
        const academicYearElement = document.getElementById("academic-year");
        const totalEnrolledElement = document.getElementById("total-enrolled");

        // Set the display values based on the selected year and semester
        academicYearElement.textContent = `${selectedYear} - ${selectedSemester} Semester`;
        totalEnrolledElement.textContent = data.total_enrolled || 0; // Ensure this key exists in your response
    }

    // Function to update the enrollment counts for each program
    function updateProgramEnrollment(data) {
        document.getElementById("bsit-enrolled").textContent = data.bsit_enrolled || 0;
        document.getElementById("bsba-enrolled").textContent = data.bsba_enrolled || 0;
        document.getElementById("tep-enrolled").textContent = data.tep_enrolled || 0;
    }

    // Fetch the academic years for the dropdown on page load and select the latest year and semester
    function populateAcademicYears() {
        fetch('../nav/dashboard/components/fetch_academic_years.php')
            .then(response => response.json())
            .then(data => {
                const selectAY = document.getElementById("selectAY");
                selectAY.innerHTML = ''; // Clear existing options

                // Populate the academic years dropdown
                data.academic_years.forEach(year => {
                    const option = document.createElement("option");
                    option.value = year;
                    option.textContent = year;
                    selectAY.appendChild(option);
                });

                // Automatically select the latest academic year
                const latestYear = data.academic_years[0]; // Assuming the first year is the latest
                selectAY.value = latestYear;

                // Automatically select the latest semester (based on server response)
                const selectSemester = document.getElementById("selectSemester");
                const latestSemester = data.latest_semester || 'First'; // Default to 'First' if not provided
                selectSemester.value = latestSemester;

                // Trigger data fetch with the latest values
                fetchData();
            })
            .catch(error => {
                console.error('Error fetching academic years:', error);
            });
    }

    // Fetch data when the page loads
    window.onload = () => {
        populateAcademicYears(); // Populate the dropdown and automatically fetch the latest year and semester
    };
</script>


<!--Bar Chart-->
<script>
     google.charts.load('current', {'packages':['bar']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        // Use fetch to call your PHP file that returns the gender data as JSON
        fetch('../nav/dashboard/components/fetch_gender_data.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({
                academicYear: '2023-2024' // Example: You can change this dynamically
            })
        })
        .then(response => response.json())
        .then(data => {
            // Dynamically construct the chart data from the server response
            const chartData = google.visualization.arrayToDataTable([
                ['Department', 'Male', 'Female'],
                ['All', data.all.male, data.all.female],
                ['BSIT', data.bsit.male, data.bsit.female],
                ['BSBA', data.bsba.male, data.bsba.female],
                ['TEP', data.tep.male, data.tep.female]
            ]);

            var options = {
                chart: {
                    title: 'Total Male and Female Enrolled',
                    subtitle: 'All, BSIT, BSBA, TEP',
                },
                bars: 'vertical', // Required for Material Bar Charts.
                height: 400,
                colors: ['#1b9e77', '#d95f02']
            };

            var chart = new google.charts.Bar(document.getElementById('barchart'));
            chart.draw(chartData, google.charts.Bar.convertOptions(options));
        })
        .catch(error => {
            console.error('Error fetching gender data:', error);
        });
    }
</script>

<!--3D Pie Chart-->
<script>
    // Load Google Charts
    google.charts.load("current", { packages: ["corechart"] });
    
    // Set a callback function to fetch data and draw the chart when the chart library is loaded
    google.charts.setOnLoadCallback(fetchEnrollmentData);

    // Function to fetch enrollment data from the server
    function fetchEnrollmentData() {
        fetch('../nav/dashboard/components/fetch_program_enrollment.php')
            .then(response => response.json())
            .then(data => {
                drawChart(data); // Pass the fetched data to the drawChart function
            })
            .catch(error => {
                console.error('Error fetching enrollment data:', error);
            });
    }

    // Function to draw the Google pie chart
    function drawChart(enrollmentData) {
        // Create a data table using the fetched enrollment data
        var data = google.visualization.arrayToDataTable([
            ['Department', 'Total Students'],
            ['BSIT', enrollmentData.bsit_enrolled || 0], // Use fetched BSIT total
            ['BSBA', enrollmentData.bsba_enrolled || 0], // Use fetched BSBA total
            ['TEP', enrollmentData.tep_enrolled || 0]   // Use fetched TEP total
        ]);

        // Pie chart options
        var options = {
            title: 'NSTP Enrollment by Department',
            is3D: true,
            colors: ['#1E5128', '#DE970B', '#03346E'],
        };

        // Create and draw the chart inside the div with id "piechart_3d"
        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
    }
</script>

<!--Pie Chart-->
<script>
    // Load Google Charts
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(pieChart);

    function pieChart() {
      // Fetch data using AJAX from the PHP page
      fetch('../nav/dashboard/components/fetch_component_data.php')
        .then(response => response.json())  // Parse the JSON response
        .then(data => {
          // Prepare data for the pie chart
          var chartData = google.visualization.arrayToDataTable([
            ['Components', 'Total Students'],
            ['ROTC', data.total_rotc],
            ['CWTS', data.total_cwts]
          ]);

          // Define chart options
          var options = {
            title: 'ROTC vs CWTS' // Optional: For a donut chart style
          };

          // Draw the pie chart
          var chart = new google.visualization.PieChart(document.getElementById('piechart'));
          chart.draw(chartData, options);
        })
        .catch(error => {
          console.error('Error fetching data:', error);
        });
    }
  </script>

    <!--Domut Chart-->
    <script>
        google.charts.load("current", {packages:["corechart"]});
    google.charts.setOnLoadCallback(donutChart);

    function donutChart() {
        // Use AJAX to fetch data from the PHP file
        fetch('../nav/dashboard/components/fetch_department_component_data.php')
        .then(response => response.json())
        .then(data => {
            // Insert the fetched data into the chart
            var chartData = new google.visualization.DataTable();
            chartData.addColumn('string', 'Department');
            chartData.addColumn('number', 'Total Students');
            chartData.addRows(data);

            var options = {
                title: 'Department ROTC v.s CWTS',
                pieHole: 0.4,
            };

            var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
            chart.draw(chartData, options);
        })
        .catch(error => console.error('Error fetching data:', error));
    }
    </script>

</body>

</html>