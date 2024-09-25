<div class="row justify-content-center my-4">
            <div class="col-7-2">
            <h1 class="d-inline mb-0">NSTP Master List</h1>
    <div class="card shadow" style="max-height: 100vh; overflow: hidden;"> <!-- Set max height for the card -->
    <div colspan="13" class="school-year" style="margin-top: 20px; margin-left: 10px;">
           <label for="selectAY" style="margin: 5px;">
            <input type="text" id="searchInput" class="school-year" placeholder="🔍 Search..." aria-label="Search"></input>
            </label>
            <label for="selectAY" style="margin: 5px;">
                <h6>SY: </h6>
            </label>
            <select class="select-year-center" id="selectAY" style="width: 150px; height: 30px;">
                <!-- Options will be populated dynamically via AJAX -->
            </select>

            <label for="selectComponent" style="margin: 5px;">
                <h6>Component: </h6>
            </label>
            <select class="select-year-center" id="selectComponent" style="width: 150px; height: 30px;">
                <option class="text-center">--All Component--</option>
                <option>ROTC</option>
                <option>CWTS</option>
            </select>

            <label for="selectProgram" style="margin: 5px;">
                <h6>Department: </h6>
            </label>
            <select class="select-year-center" id="selectProgram" style="width: 150px; height: 30px;">
                <option class="text-center">--All Program--</option>
                <option>Bachelor of Science in Information Technology</option>
                <option>Bachelor of Science in Business Administration</option>
                <option>Teacher Education Program</option>
            </select>
            
     
            <div class="text-end" style="margin-top: -40px; margin-right: 10px;">
    <!-- Import Button -->
    <button type="button" id="importButton" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#ImportModal">
    <i class="fas fa-file-import"></i>
</button>

    <!-- Print Button -->
    <button id="printButton" class="btn btn-outline-primary" style="margin-left: 20px;" onclick="printTable()">
        <i class="fas fa-print"></i>
    </button>
</div>

        </div>


        <div class="card-body table-responsive px-2 pt-1" style="overflow-x: auto; overflow-y: auto; max-height: 75vh; margin-top: 10px;">
            <form id="frminput_position">
                <button type="submit" id="save_positionButton" class="btn btn-primary" hidden=""></button>
                <table id="tblmasterlist" class="table table-sm" style="font-size: 10px; table-layout: fixed;">
                    <thead>
                        <tr>
                            <th style="border: 0.5px solid black; padding: 4px; background-color: #83f28f;" class="text-center">No.</th>
                            <th style="border: 0.5px solid black; padding: 4px; background-color: #83f28f;" class="text-center">Student ID</th>
                            <th style="border: 0.5px solid black; padding: 4px; background-color: #83f28f;" class="text-center">Last Name</th>
                            <th style="border: 0.5px solid black; padding: 4px; background-color: #83f28f;" class="text-center">First Name</th>
                            <th style="border: 0.5px solid black; padding: 4px; background-color: #83f28f;" class="text-center">Middle Name</th>
                            <th style="border: 0.5px solid black; padding: 4px; background-color: #83f28f;" class="text-center">Suffix Name</th>
                            <th style="border: 0.5px solid black; padding: 4px; background-color: #83f28f;" class="text-center">Gender</th>
                            <th style="border: 0.5px solid black; padding: 4px; background-color: #83f28f;" class="text-center">NSTP1</th>
                            <th style="border: 0.5px solid black; padding: 4px; background-color: #83f28f;" class="text-center">School</th>
                            <th style="border: 0.5px solid black; padding: 4px; background-color: #83f28f;" class="text-center">School Year Taken</th>
                            <th style="border: 0.5px solid black; padding: 4px; background-color: #83f28f;" class="text-center">Section Code</th>
                            <th style="border: 0.5px solid black; padding: 4px; background-color: #83f28f;" class="text-center">NSTP2</th>
                            <th style="border: 0.5px solid black; padding: 4px; background-color: #83f28f;" class="text-center">School</th>
                            <th style="border: 0.5px solid black; padding: 4px; background-color: #83f28f;" class="text-center">School Year Taken</th>
                            <th style="border: 0.5px solid black; padding: 4px; background-color: #83f28f;" class="text-center">Section Code</th>
                            <th style="border: 0.5px solid black; padding: 4px; background-color: #83f28f;" class="text-center">Serial Number</th>
                            <th style="border: 0.5px solid black; padding: 4px; background-color: #83f28f;" class="text-center">Remarks</th>
                            <th style="border: 0.5px solid black; padding: 4px; background-color: #83f28f;" class="text-center">Edit</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- LOAD COMPONENTS -->
                    </tbody>
                </table>
            </form>
        </div>
    </div>
</div>

 <!--Student Info Update-->
<?php include '../../nav/student_list/modals/student_update_modal.php' ?>
<?php include '../../nav/student_list/modals/certificate_modal.php' ?>
<?php include '../../nav/student_list/modals/student_profile_modal.php' ?>
<?php include '../../nav/student_list/modals/import_modal.php' ?>

<script>
$(document).ready(function() {
    // Load the initial student list when the document is ready
    loadMasterList();

    // Fetch academic years and populate the dropdown
    $.ajax({
        url: "../nav/student_list/components/fetch_academic_years.php", // Create this PHP file to fetch academic years
        method: "GET",
        success: function(data) {
            var years = JSON.parse(data);
            var $selectAY = $('#selectAY');
            $selectAY.append('<option>-All Academic Year-</option>');
            $.each(years, function(index, year) {
                $selectAY.append('<option>' + year + '</option>');
            });
        },
        error: function() {
            alert('Failed to load academic years. Please try again.');
        }
    });

    // Search functionality
    $("#searchInput").on("keyup", function() {
        var value = $(this).val().toLowerCase();

        $("#tblmasterlist tbody tr").filter(function() {
            var student_id = $(this).find("td:eq(2)").text().toLowerCase(); // Column index for 'Student ID'
            var firstname = $(this).find("td:eq(4)").text().toLowerCase(); // Column index for 'First Name'
            var middlename = $(this).find("td:eq(5)").text().toLowerCase(); // Column index for 'Middle Name'
            var lastname = $(this).find("td:eq(3)").text().toLowerCase(); // Column index for 'Last Name'
            var suffixname = $(this).find("td:eq(6)").text().toLowerCase(); // Column index for 'Suffix Name'

            // Concatenate full name including suffix
            var fullName = firstname + ' ' + middlename + ' ' + lastname + ' ' + suffixname; 
            var fullNameAlt1 = firstname + ' ' + lastname + ' ' + middlename + ' ' + suffixname; 
            var fullNameAlt2 = lastname + ' ' + firstname + ' ' + middlename + ' ' + suffixname; 
            var fullNameAlt3 = lastname + ' ' + firstname + ' ' + suffixname + ' ' + middlename; 
            var fullNameAlt4 = firstname + ' ' + lastname + ' ' + suffixname + ' ' + middlename; 

            // Check all possible combinations against the search input
            $(this).toggle(
                student_id.includes(value) || 
                fullName.includes(value) || 
                fullNameAlt1.includes(value) || 
                fullNameAlt2.includes(value) || 
                fullNameAlt3.includes(value) || 
                fullNameAlt4.includes(value)
            );
        });
    });

    // Function to load the student list from the server based on selected filters
    function loadMasterList(filters = {}) {
        $.ajax({
            url: "../nav/student_list/components/masterlist.php",
            method: "POST",
            data: filters,
            success: function(data) {
                $('#tblmasterlist tbody').html(data);
            },
            error: function() {
                alert('Failed to load data. Please try again.');
            }
        });
    }

    // Function to apply filters and reload the master list
    function applyFilters() {
        var academicYear = $('#selectAY').val();
        var component = $('#selectComponent').val();
        var program = $('#selectProgram').val();

        // Adjusting filter values based on user selection
        var filters = {
            academicYear: academicYear === '-All Academic Year-' ? 'All' : academicYear,
            component: component === '--All Component--' ? 'All' : component,
            program: program === '--All Program--' ? 'All' : program
        };

        // Reload the master list based on applied filters
        loadMasterList(filters);
    }

    // Trigger filter application on dropdown change
    $('#selectAY, #selectComponent, #selectProgram').change(function() {
        applyFilters();
    });

});
</script>

<script>
    function importData() {
    const fileInput = document.getElementById('fileInput');
    fileInput.click();

    fileInput.onchange = async function(event) {
        const file = event.target.files[0];
        if (!file) return;

        const formData = new FormData();
        formData.append('file', file);

        try {
            const response = await fetch('../nav/student_list/components/import_data.php', {
                method: 'POST',
                body: formData,
            });

            const result = await response.json();
            if (result.success) {
                alert('Data imported successfully!');
                // Optionally refresh the table or perform other actions
                // loadData(); // Call your function to reload the data table
            } else {
                alert('Error importing data: ' + result.message);
            }
        } catch (error) {
            console.error('Error:', error);
            alert('Error importing data. Please try again.');
        }
    };
}

</script>


<script>
$(document).ready(function() {
    // Trigger the print function on button click
    $('.btn-outline-primary').click(function() {
        openPrintWindow(); // Call the function to open the print window
    });

    // Function to open the print window with formatted content
    function openPrintWindow() {
        var tableHeaders = document.querySelector('#tblmasterlist thead').innerHTML; 
        var rows = document.querySelectorAll('#tblmasterlist tbody tr');
        var newTableBody = '';
        var headerHtml = '';

        // Create updated headers excluding "View Profile", "No.", and "Edit" columns
        var headerCells = document.querySelectorAll('#tblmasterlist thead th');
        headerCells.forEach((cell, index) => {
            if (index > 1 && index !== headerCells.length - 1) { // Skip the "View Profile", "No.", and "Edit" columns
                headerHtml += cell.outerHTML;
            }
        });

        // Create updated body with row numbers and excluding "View Profile", "No.", and "Edit" columns
        rows.forEach((row, rowIndex) => {
            var cells = row.children;
            newTableBody += `<tr>`;
            newTableBody += `<td style="border: 1px solid black; padding: 8px; text-align: center;">${rowIndex + 1}</td>`; // Add row number
            for (var i = 2; i < cells.length - 1; i++) { // Skip "View Profile", "No.", and "Edit" columns
                newTableBody += `<td style="border: 1px solid black; padding: 8px;">${cells[i].innerHTML}</td>`;
            }
            newTableBody += `</tr>`;
        });

        // Prepare the content to be printed
        var printContents = `
           <head>
    <title>Print NSTP Master List</title>
    <style>
        @page { 
            size: portrait; 
            margin: 10mm; 
        }
        table { 
            width: 100%; 
            border-collapse: collapse; 
        }
        th, td { 
            border: 1px solid black; 
            padding: 8px; 
            text-align: left; 
        }
        th { 
            text-align: center; 
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
    <!-- Include Font Awesome for the print icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<!-- Updated button with print icon -->
<body>
    <div style="text-align: center;">
        <h2>NSTP Master List</h2>
        <!-- Add your logo or any additional content here -->
    </div>
   <button onclick="window.print()" class="print-button">🖨️ Print Report</button>
    <table>
        <thead>
            <tr>
                <th style="border: 1px solid black; padding: 8px; background-color: #f2f2f2; text-align: center;">No.</th> <!-- Add "No." column header -->
                ${headerHtml} <!-- Updated headers without "View Profile", "No.", and "Edit" columns -->
            </tr>
        </thead>
        <tbody>
            ${newTableBody}
        </tbody>
    </table>
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