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
    <div class="card shadow" style="margin-top: 20px; box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15) !important; position: relative; overflow: hidden;">
        <div class="card-body" style="position: relative; z-index: 2; display: flex; justify-content: space-between; align-items: center;">
            <div>
                <h3 class="card-title" id="total-enrolled"></h3>
                <p class="card-text" id="academic-year">BSIT Enrolled</p>
            </div>
            <!-- Icon on the right side -->
            <i class="fas fa-user-friends" style="font-size: 2.5rem; color: rgba(0, 0, 0, 0.5);"></i>
        </div>
        <!-- Faded background image -->
        <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background-image: linear-gradient(to bottom, rgba(255, 255, 255, 0.8), rgba(255, 255, 255, 0.95)), url('../assets/img/nstp.png'); background-size: cover; background-position: center; z-index: 1; opacity: 0.9;">
        </div>
    </div>
</div>

<div class="col-sm-3">
    <div class="card shadow" style="margin-top: 20px; box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15) !important; position: relative; overflow: hidden;">
        <div class="card-body" style="position: relative; z-index: 2;">
            <h3 class="card-title" id="bsit-enrolled"></h3>
            <p class="card-text">BSIT Enrolled</p>
        </div>
        <!-- Faded background image -->
        <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background-image: linear-gradient(to bottom, rgba(255, 255, 255, 0.8), rgba(255, 255, 255, 0.95)), url('../assets/img/bsit.jpg'); background-size: cover; background-position: center; z-index: 1; opacity: 0.9;">
        </div>
    </div>
</div>

<div class="col-sm-3">
    <div class="card shadow" style="margin-top: 20px; box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15) !important; position: relative; overflow: hidden;">
        <div class="card-body" style="position: relative; z-index: 2;">
            <h3 class="card-title" id="bsba-enrolled"></h3>
            <p class="card-text">BSBA Enrolled</p>
        </div>
        <!-- Faded background image -->
        <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background-image: linear-gradient(to bottom, rgba(255, 255, 255, 0.8), rgba(255, 255, 255, 0.95)), url('../assets/img/bsba.jpg'); background-size: cover; background-position: center; z-index: 1; opacity: 0.9;">
        </div>
    </div>
</div>

<div class="col-sm-3">
    <div class="card shadow" style="margin-top: 20px; box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15) !important; position: relative; overflow: hidden;">
        <div class="card-body" style="position: relative; z-index: 2;">
            <h3 class="card-title" id="tep-enrolled"></h3>
            <p class="card-text">TEP Enrolled</p>
        </div>
        <!-- Faded background image -->
        <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background-image: linear-gradient(to bottom, rgba(255, 255, 255, 0.8), rgba(255, 255, 255, 0.95)), url('../assets/img/tep.jpg'); background-size: cover; background-position: center; z-index: 1; opacity: 0.9;">
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
                    <div id="cakechart" style="width: 600px; height: 350px;"></div>
                </div>
            </div>
            <div class="card shadow" style="background-color: white; padding: 20px; box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15); height: 400px;">
                <div class="card-body text-center">
                    <div id="BSIT" style="width: 600px; height: 350px;"></div>
                </div>
            </div>
            <div class="card shadow" style="background-color: white; padding: 20px; box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15); height: 300px;">
                <div class="card-body text-center">
                    <div id="Enroll_Grad" style="width: 600px; height: 230px;"></div>
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
            <div class="card shadow" style="background-color: white; padding: 20px; box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15); height: 390px;">
                <div class="card-body text-center">
                    <div id="BSBA" style="width: 600px; height: 350px;"></div>
                </div>
            </div>
            <div class="card shadow" style="background-color: white; padding: 20px; box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15); height: 390px;">
                <div class="card-body text-center">
                    <div id="TEP" style="width: 600px; height: 350px;"></div>
                </div>
            </div>
        </div>
    </div>

<div class="row justify-content-center my-4">
    <div class="card shadow" style="background-color: white; padding: 20px; box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15); height: 420px; width: 1300px;">
                <div class="card-body text-center">
                    <div id="AllYear" style="width: 1200px; height: 350px;"></div>
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

<!-- Fetches all the Enrolled students in the NSTP according to the Program and Semester year -->
<script>
    // Load Google Charts for Bar, Pie, and Donut charts
    google.charts.load('current', { packages: ['bar', 'corechart'] });
    google.charts.setOnLoadCallback(init);

    // Initialize the dashboard by populating academic years and fetching initial data
    function init() {
        populateAcademicYears(); // Populate academic years on load
    }

    // Function to populate academic years and automatically select the latest academic year and semester
    function populateAcademicYears() {
        fetch('../nav/dashboard/components/fetch_academic_years.php')
            .then(response => response.json())
            .then(data => {
                const selectAY = document.getElementById('selectAY');
                const selectSemester = document.getElementById('selectSemester');

                selectAY.innerHTML = ''; // Clear existing options

                // Populate the academic years dropdown
                data.academic_years.forEach(year => {
                    const option = document.createElement('option');
                    option.value = year;
                    option.textContent = year;
                    selectAY.appendChild(option);
                });

                // Automatically select the latest academic year and semester
                const latestYear = data.academic_years[0]; // Assuming the first year is the latest
                const latestSemester = data.latest_semester || 'First'; // Default to 'First' if not provided
                selectAY.value = latestYear;
                selectSemester.value = latestSemester;

                // Trigger data fetch with the latest values
                fetchData();
            })
            .catch(error => {
                console.error('Error fetching academic years:', error);
            });
    }

    // Function to fetch and update displayed data based on selected academic year and semester
    function fetchData() {
        const selectedYear = document.getElementById("selectAY").value;
        const selectedSemester = document.getElementById("selectSemester").value;

        // Fetch academic year and total enrolled data
        fetch(`../nav/dashboard/components/fetch_academic_data.php?year=${selectedYear}&semester=${selectedSemester}`)
            .then(response => response.json())
            .then(data => {
                updateAcademicYear(data, selectedYear, selectedSemester);
            })
            .catch(error => {
                console.error('Error fetching academic year data:', error);
            });

        // Fetch enrollment data for each program and update the pie chart
        fetch(`../nav/dashboard/components/fetch_program_enrollment.php?year=${selectedYear}&semester=${selectedSemester}`)
            .then(response => response.json())
            .then(data => {
                updateProgramEnrollment(data);
                drawEnrollmentPieChart(data, selectedYear, selectedSemester);  // Update pie chart
            })
            .catch(error => {
                console.error('Error fetching enrollment data:', error);
            });

        // Fetch and update the bar chart based on gender data
        fetchGenderData(selectedYear, selectedSemester);

        // Fetch ROTC vs CWTS component data for another pie chart
        fetch(`../nav/dashboard/components/fetch_component_data.php?year=${selectedYear}&semester=${selectedSemester}`)
            .then(response => response.json())
            .then(data => {
                drawComponentPieChart(data, selectedYear, selectedSemester); // Pass selectedYear and selectedSemester
            })
            .catch(error => {
                console.error('Error fetching component data:', error);
            });

        // Fetch and update the donut chart with department component data (ROTC vs CWTS)
        fetch(`../nav/dashboard/components/fetch_department_component_data.php?year=${selectedYear}&semester=${selectedSemester}`)
            .then(response => response.json())
            .then(data => {
                drawDonutChart(data, selectedYear, selectedSemester); // Pass selectedYear and selectedSemester
            })
            .catch(error => {
                console.error('Error fetching department component data:', error);
            });

        // Fetch and update the donut chart with BSIT component data (ROTC vs CWTS)
        fetch(`../nav/dashboard/components/fetch_BSIT_component.php?year=${selectedYear}&semester=${selectedSemester}`)
            .then(response => response.json())
            .then(data => {
                BSITChart(data, selectedYear, selectedSemester); // Pass selectedYear and selectedSemester
            })
            .catch(error => {
                console.error('Error fetching BSIT component data:', error);
            });

        // Fetch and update the donut chart with BSBA component data (ROTC vs CWTS)
        fetch(`../nav/dashboard/components/fetch_BSBA_component.php?year=${selectedYear}&semester=${selectedSemester}`)
            .then(response => response.json())
            .then(data => {
                BSBAChart(data, selectedYear, selectedSemester); // Pass selectedYear and selectedSemester
            })
            .catch(error => {
                console.error('Error fetching BSBA component data:', error);
            });

        // Fetch and update the donut chart with TEP component data (ROTC vs CWTS)
        fetch(`../nav/dashboard/components/fetch_TEP_component.php?year=${selectedYear}&semester=${selectedSemester}`)
            .then(response => response.json())
            .then(data => {
                TEPChart(data, selectedYear, selectedSemester); // Pass selectedYear and selectedSemester
            })
            .catch(error => {
                console.error('Error fetching TEP component data:', error);
            });

        // Fetch and update the Enrollment and Graduation chart
        EnrollGradChart(selectedYear, selectedSemester); // Call the function to fetch data and draw the chart
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

    // Function to fetch and update the bar chart based on gender data
    function fetchGenderData(academicYear, semester) {
        fetch('../nav/dashboard/components/fetch_gender_data.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({
                academicYear: academicYear,
                semester: semester
            })
        })
        .then(response => response.json())
        .then(data => {
            // Construct chart data
            const chartData = google.visualization.arrayToDataTable([
                ['Department', 'Male', 'Female'],
                ['All', data.all.male || 0, data.all.female || 0],
                ['BSIT', data.bsit.male || 0, data.bsit.female || 0],
                ['BSBA', data.bsba.male || 0, data.bsba.female || 0],
                ['TEP', data.tep.male || 0, data.tep.female || 0]
            ]);

            const options = {
                chart: {
                    title: 'Total Male and Female Enrolled',
                    subtitle: `${academicYear} - ${semester} Semester`,
                },
                bars: 'vertical',
                height: 400,
                colors: ['#1b9e77', '#d95f02']
            };

            const chart = new google.charts.Bar(document.getElementById('barchart'));
            chart.draw(chartData, google.charts.Bar.convertOptions(options));
        })
        .catch(error => {
            console.error('Error fetching gender data:', error);
        });
    }

    // Function to draw the enrollment pie chart (for BSIT, BSBA, TEP)
    function drawEnrollmentPieChart(enrollmentData, academicYear, semester) {
        var data = google.visualization.arrayToDataTable([
            ['Department', 'Total Students'],
            ['BSIT', enrollmentData.bsit_enrolled || 0],
            ['BSBA', enrollmentData.bsba_enrolled || 0],
            ['TEP', enrollmentData.tep_enrolled || 0]
        ]);

        var options = {
            title: `NSTP Enrollment by Department - ${academicYear} - ${semester} Semester`,
            is3D: true,
            colors: ['#1E5128', '#DE970B', '#03346E'],
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
    }

    // Function to draw the ROTC vs CWTS component pie chart
    function drawComponentPieChart(data, academicYear, semester) {
        var chartData = google.visualization.arrayToDataTable([
            ['Components', 'Total Students'],
            ['ROTC', data[0] ? data[0][1] : 0],
            ['CWTS', data[1] ? data[1][1] : 0]
        ]);

        var options = {
            title: `ROTC vs CWTS Enrollment - ${academicYear} - ${semester} Semester`,
            is3D: true,
            colors: ['#1E5128', '#DE970B'],
        };

        var chart = new google.visualization.PieChart(document.getElementById('cakechart'));
        chart.draw(chartData, options);
    }

    // Function to draw the Department ROTC vs CWTS donut chart
    function drawDonutChart(data, academicYear, semester) {
        const chartData = new google.visualization.DataTable();
        chartData.addColumn('string', 'Department');
        chartData.addColumn('number', 'Total Students');
        chartData.addRows(data);

        const options = {
            title: `Department ROTC vs CWTS - ${academicYear} - ${semester} Semester`,
            pieHole: 0.2,
        };

        const chart = new google.visualization.PieChart(document.getElementById('donutchart'));
        chart.draw(chartData, options);
    }

    // Function to draw the BSIT ROTC vs CWTS donut chart
    function BSITChart(data, academicYear, semester) {
        const chartData = google.visualization.arrayToDataTable([
            ['Component', 'Total Students'],
            ['ROTC', data[0][1] || 0],
            ['CWTS', data[1][1] || 0]
        ]);

        const options = {
            title: `BSIT ROTC vs CWTS - ${academicYear} - ${semester} Semester`,
            pieHole: 0.2,
            colors: ['#FF7A00', 'green'],
        };
        const chart = new google.visualization.PieChart(document.getElementById('BSIT'));
        chart.draw(chartData, options);
    }

    // Function to draw the BSBA ROTC vs CWTS donut chart
    function BSBAChart(data, academicYear, semester) {
        const chartData = google.visualization.arrayToDataTable([
            ['Component', 'Total Students'],
            ['ROTC', data[0][1] || 0],
            ['CWTS', data[1][1] || 0]
        ]);

        const options = {
            title: `BSBA ROTC vs CWTS - ${academicYear} - ${semester} Semester`,
            pieHole: 0.2,
            colors: ['blue', 'red'],
        };
        const chart = new google.visualization.PieChart(document.getElementById('BSBA'));
        chart.draw(chartData, options);
    }

    // Function to draw the TEP ROTC vs CWTS donut chart
    function TEPChart(data, academicYear, semester) {
        const chartData = google.visualization.arrayToDataTable([
            ['Component', 'Total Students'],
            ['ROTC', data[0][1] || 0],
            ['CWTS', data[1][1] || 0]
        ]);

        const options = {
            title: `TEP ROTC vs CWTS - ${academicYear} - ${semester} Semester`,
            pieHole: 0.2,
            colors: ['#7600BC', '#2699E6'],
        };
        const chart = new google.visualization.PieChart(document.getElementById('TEP'));
        chart.draw(chartData, options);
    }

// Function to fetch data and draw the Enrollment and Completion chart based on the selected year and semester
function EnrollGradChart(selectedYear, selectedSemester) {
    // Fetch data from enroll_grad_component.php with selected parameters
    fetch(`../nav/dashboard/components/enroll_grad_component.php?year=${selectedYear}&semester=${selectedSemester}`)
        .then(response => response.json())
        .then(data => {
            // Check if the response contains an error
            if (data.error) {
                console.error('Error fetching data:', data.error);
                alert(`Error: ${data.error}`);
                return;
            }

            // Prepare data for the chart
            const chartData = google.visualization.arrayToDataTable([
                ['Status', 'ROTC', 'CWTS'], // Column headings
                ['Enrolled', data.rotc_total_enrolled || 0, data.cwts_total_enrolled || 0], // Enrollment numbers
                ['Completers', data.rotc_completers || 0, data.cwts_completers || 0], // Completion numbers
                ['Failed', data.rotc_failed || 0, data.cwts_failed || 0], // Failed numbers
                ['Dropped', data.rotc_drop || 0, data.cwts_drop || 0] // Drop numbers
            ]);

            // Chart options
            const options = {
                chart: {
                    title: 'Enrollment, Completion, and Status Breakdown',
                    subtitle: `${selectedYear} - ${selectedSemester} Semester`,
                },
                bars: 'horizontal', // Required for Material Bar Charts
                colors: ['#1b9e77', '#d95f02', '#7570b3', '#e7298a'], // Custom colors for ROTC and CWTS
                legend: { position: 'top', maxLines: 3 }, // Position of the legend
                hAxis: {
                    minValue: 0, // Minimum value for horizontal axis
                }
            };

            // Create and draw the chart
            const chart = new google.charts.Bar(document.getElementById('Enroll_Grad'));
            chart.draw(chartData, google.charts.Bar.convertOptions(options));
        })
        .catch(error => {
            console.error('Fetch error:', error);
            alert('There was an issue fetching the enrollment and completion data.');
        });
}


    // On page load, initialize the dashboard
    window.onload = init;
</script>


<script>
    google.charts.load('current', {'packages': ['bar']});
    google.charts.setOnLoadCallback(AllYearChart);

    function AllYearChart() {
        // Fetch the data from the PHP function via AJAX
        fetch('../nav/dashboard/components/compare_academicyear.php') // Replace with actual PHP file path
            .then(response => response.json())
            .then(data => {
                // Prepare the data for Google Charts
                var chartData = [
                    ['Year', 'ROTC Graduates', 'CWTS Graduates']
                ];

                // Loop through the fetched data and populate the chartData array
                data.forEach(item => {
                    chartData.push([item.academic_year, parseInt(item.ROTC_graduates), parseInt(item.CWTS_graduates)]);
                });

                // Convert the data into Google Charts format
                var googleData = google.visualization.arrayToDataTable(chartData);

                // Chart options
                var options = {
                    chart: {
                        title: 'ROTC vs CWTS Graduates by Year',
                        subtitle: 'Comparison of ROTC and CWTS Graduates by Academic Year',
                    },
                    bars: 'vertical' // Required for Material Bar Charts
                };

                // Draw the chart
                var chart = new google.charts.Bar(document.getElementById('AllYear'));
                chart.draw(googleData, google.charts.Bar.convertOptions(options));
            })
            .catch(error => console.error('Error fetching data:', error));
    }
</script>


</body>

</html>