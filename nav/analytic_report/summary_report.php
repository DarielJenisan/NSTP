<style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .container {
            width: 90%;
            max-width: 1200px;
            height: 1100px;
            margin: 0 auto;
            background-color: white;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .header {
            background-color: #0066cc;
            color: white;
            padding: 20px;
            text-align: center;
            position: relative;
        }

        .header img {
            position: absolute;
            top: 20px;
            height: 80px;
        }

        .header img.left-logo {
            left: 100px;
            height: auto;
            width: 110px;
            margin-top: 10px;
        }

        .header img.right-logo {
            right: 100px;
            height: auto;
            width: 150px;
        }

        .header h2, .header h3, .header h4, .header h5, .header p {
            margin: 0;
        }

        .main-title {
            margin: 20px 0;
            text-align: center;
            font-weight: bold;
            font-size: 24px;
        }

        .table-container {
            width: 100%;
            margin-top: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid black;
            padding: 10px;
            text-align: center;
        }

        th {
            background-color: #e0e0e0;
            font-weight: bold;
        }

        .semester-header {
            background-color: #dcdcdc;
            font-weight: bold;
        }

        .grand-total-enroll, .grand-total-graduates {
            font-weight: bold;
            background-color: #d9d9d9;
        }

        .college-header {
            font-weight: bold;
            text-align: left;
            padding-left: 10px;
        }

        .enrollment-header {
            font-size: 16px;
            text-align: center;
        }
    </style>

    <!-- Main Container -->
    <div class="container">

        <!-- Header Section -->
        <div class="header">
            <img src="../assets/img/nbsclogo.png" alt="Left Logo" class="left-logo">
            <h2>Republic of the Philippines</h2>
            <h3>NORTHERN BUKIDNON STATE COLLEGE</h3>
            <p>(Formerly Northern Bukidnon State College) R.A. 11284</p>
            <p>Manolo Fortich Bukidnon • (088)3573185</p>
            <h4>NATIONAL SERVICE TRAINING PROGRAM</h4>
            <h5>ROTC • CWTS</h5>
            <img src="../assets/img/nstplogo.png" alt="Right Logo" class="right-logo">
        </div>

        <!-- Main Title -->
        <div class="main-title">
            SUMMARY OF ENROLLMENT AND GRADUATES
        </div>

        <!-- Table Container -->
        <div class="table-container">
            <table  id="tblEnrollment" class="table table-sm">
                <thead>
                    <tr>
                        <th colspan="13" class="enrollment-header" style="padding: 30px;">ENROLLMENT</th>
                    </tr>
                    <tr>
                    <th colspan="13" class="enrollment-header">SY
                    <label for="selectAY"></label>
                    <select class="select-year-center" id="selectAY">
    <?php foreach ($academicYears as $year): ?>
        <option value="<?= $year ?>" <?= $year == $latestAcademicYear ? 'selected' : '' ?>><?= $year ?></option>
    <?php endforeach; ?>
</select>
                        </th>
                    </tr>
                    <tr>
                        <th rowspan="3" class="college-header">COLLEGE</th>
                        <th colspan="6">1st Semester</th>
                        <th colspan="6">2nd Semester</th>
                    </tr>
                    <tr class="semester-header">
                        <th colspan="3">ROTC</th>
                        <th colspan="3">CWTS</th>
                        <th colspan="3">ROTC</th>
                        <th colspan="3">CWTS</th>
                    </tr>
                    <tr class="semester-header">
                        <th>M</th>
                        <th>F</th>
                        <th>Total</th>
                        <th>M</th>
                        <th>F</th>
                        <th>Total</th>
                        <th>M</th>
                        <th>F</th>
                        <th>Total</th>
                        <th>M</th>
                        <th>F</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                   <!-- LOAD ENROLLMENT COMPONENTS -->
                    </tbody>
            </table>

            <table  id="tblGraduates" class="table table-sm">
            <thead>
                    <tr>
                        <th colspan="13" class="graduate-header" style="padding: 30px;">GRADUATES</th>
                    </tr>
                    <tr>
                    <th colspan="13" class="graduate-header">SY
                    <label for="selectAY"></label>
                    <select class="select-year-center" id="selectAY2">
    <?php foreach ($academicYears as $year): ?>
        <option value="<?= $year ?>" <?= $year == $latestAcademicYear ? 'selected' : '' ?>><?= $year ?></option>
    <?php endforeach; ?>
</select>
                        </th>
                    </tr>
                    <tr>
                        <th rowspan="3" class="college-header">COLLEGE</th>
                        <th colspan="6">1st Semester</th>
                        <th colspan="6">2nd Semester</th>
                    </tr>
                    <tr class="semester-header">
                        <th colspan="3">ROTC</th>
                        <th colspan="3">CWTS</th>
                        <th colspan="3">ROTC</th>
                        <th colspan="3">CWTS</th>
                    </tr>
                    <tr class="semester-header">
                        <th>M</th>
                        <th>F</th>
                        <th>Total</th>
                        <th>M</th>
                        <th>F</th>
                        <th>Total</th>
                        <th>M</th>
                        <th>F</th>
                        <th>Total</th>
                        <th>M</th>
                        <th>F</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                 <!-- LOAD GRAUDATES COMPONENTS -->
                </tbody>
            </table>
        </div>
                        <button class="btn btn-outline-success w-100 btn-block mt-2"><i class="fa fa-print"></i> Print</button>
    </div>
  

    <script>
$(document).ready(function() {
    function loadReportData(filters = {}) {
        // Load enrollment data
        $.ajax({
            url: "../nav/analytic_report/components/report_enrollment.php",
            method: "POST",
            data: filters,
            success: function(data) {
                $('#tblEnrollment tbody').html(data);
            },
            error: function() {
                alert('Failed to load enrollment data. Please try again.');
            }
        });

        // Load graduates data
        $.ajax({
            url: "../nav/analytic_report/components/report_graduates.php",
            method: "POST",
            data: filters,
            success: function(data) {
                $('#tblGraduates tbody').html(data);
            },
            error: function() {
                alert('Failed to load graduates data. Please try again.');
            }
        });
    }

    // Load available academic years and set the latest academic year
    $.ajax({
        url: "../nav/analytic_report/components/fetch_academic_years.php",
        method: "GET",
        success: function(data) {
            const years = JSON.parse(data);
            $('#selectAY').html('');
            $('#selectAY2').html(''); // Clear the second dropdown

            years.forEach(year => {
                $('#selectAY').append(`<option value="${year}">${year}</option>`);
                $('#selectAY2').append(`<option value="${year}">${year}</option>`); // Populate second dropdown
            });

            // Get the current year and determine the latest academic year
            const currentYear = new Date().getFullYear();
            let latestYear = '';

            // Assuming academic years are in the format 'YYYY-YYYY'
            years.forEach(year => {
                const [startYear, endYear] = year.split('-').map(Number);
                if (currentYear >= startYear && currentYear <= endYear) {
                    // If current year is within the academic year range
                    latestYear = year;
                } else if (currentYear < startYear) {
                    // If current year is before the academic year, this is the next academic year
                    latestYear = year;
                    return false; // Break the loop
                }
            });

            // Set the latest year as default
            $('#selectAY').val(latestYear); 
            $('#selectAY2').val(latestYear); 
            loadReportData({ academicYear: latestYear }); // Load data for the latest year
        },
        error: function() {
            alert('Failed to load academic years.');
        }
    });

    // Trigger filtering when the first academic year dropdown changes
    $('#selectAY').on('change', function() {
        const selectedAY = $(this).val();
        $('#selectAY2').val(selectedAY); // Update the second dropdown to match the first
        loadReportData({ academicYear: selectedAY }); // Load data for the selected year
    });

    // Trigger filtering when the second academic year dropdown changes
    $('#selectAY2').on('change', function() {
        const selectedAY = $(this).val();
        $('#selectAY').val(selectedAY); // Update the first dropdown to match the second
        loadReportData({ academicYear: selectedAY }); // Load data for the selected year
    });
});
</script>


<script>
$(document).ready(function() {
    // Trigger the print function on button click
    $('.btn-outline-success').click(function() {
        openPrintWindow(); // Call the function to open the print window
    });

    // Function to open the print window with formatted content
    function openPrintWindow() {
        // Gather the content for printing
        var headerHtml = `
            <div class="header" style="background-color: #0066cc; color: white; padding: 20px; text-align: center;">
                <img src="../assets/img/nbsclogo.png" alt="Left Logo" class="left-logo" style="height: auto; width: 110px; margin-top: 10px; position: absolute; left: 100px; top: 20px;">
                <h2>Republic of the Philippines</h2>
                <h3>NORTHERN BUKIDNON STATE COLLEGE</h3>
                <p>(Formerly Northern Bukidnon State College) R.A. 11284</p>
                <p>Manolo Fortich Bukidnon • (088)3573185</p>
                <h4>NATIONAL SERVICE TRAINING PROGRAM</h4>
                <h5>ROTC • CWTS</h5>
                <img src="../assets/img/nstplogo.png" alt="Right Logo" class="right-logo" style="height: auto; width: 150px; position: absolute; right: 100px; top: 20px;">
            </div>
            <div class="main-title" style="margin: 20px 0; text-align: center; font-weight: bold; font-size: 24px;">SUMMARY OF ENROLLMENT AND GRADUATES</div>
        `;

        var enrollmentTableHtml = document.getElementById('tblEnrollment').outerHTML;
        var graduatesTableHtml = document.getElementById('tblGraduates').outerHTML;

        // Prepare the content to be printed
        var printContents = `
            <head>
                <title>Print NSTP Summary Report</title>
                <style>
                    @page { 
                        size: portrait; 
                        margin: 10mm; 
                    }
                    body {
                        font-family: Arial, sans-serif;
                        margin: 0;
                        padding: 0;
                    }
                    .header {
                        background-color: #0066cc;
                        color: white;
                        padding: 20px;
                        text-align: center;
                    }
                    .header img {
                        position: absolute;
                        top: 20px;
                    }
                    .header img.left-logo {
                        left: 100px;
                        height: auto;
                        width: 110px;
                    }
                    .header img.right-logo {
                        right: 100px;
                        height: auto;
                        width: 150px;
                    }
                    .main-title {
                        margin: 20px 0;
                        text-align: center;
                        font-weight: bold;
                        font-size: 24px;
                    }
                    table {
                        width: 100%;
                        border-collapse: collapse;
                        margin-top: 20px;
                    }
                    th, td {
                        border: 1px solid black;
                        padding: 10px;
                        text-align: center;
                    }
                    th {
                        background-color: #e0e0e0;
                        font-weight: bold;
                    }
                    .semester-header {
                        background-color: #dcdcdc;
                        font-weight: bold;
                    }
                    .print-button {
                        position: fixed;
                        bottom: 20px;
                        right: 20px;
                        background-color: #28a745;
                        color: white;
                        border: none;
                        padding: 10px 20px;
                        border-radius: 5px;
                        font-size: 16px;
                        cursor: pointer;
                    }
                </style>
            </head>
            <body>
                ${headerHtml}
                ${enrollmentTableHtml}
                ${graduatesTableHtml}
                <button onclick="window.print()" class="print-button">🖨️ Print Report</button>
            </body>
        `;

        // Open a new window and write the content to it
        var printWindow = window.open('', '_blank');
        printWindow.document.write(printContents);
        printWindow.document.close();
        printWindow.focus();

        // Optional: Close the window after printing
        printWindow.onafterprint = function() {
            printWindow.close();
        };
    }

    // Attach the function to the global window object to be accessible
    window.openPrintWindow = openPrintWindow;
});
</script>
