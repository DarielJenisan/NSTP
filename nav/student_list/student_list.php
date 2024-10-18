<div class="row justify-content-center my-4">
<div class="col-7-2 d-flex justify-content-between align-items-center">
        <h1 class="d-inline mb-0">NSTP Master List</h1>
        <div class="ml-auto">
        <button type="button" class="btn btn-secondary">Sheet 1</button>
        <button type="button" class="btn btn-secondary">Sheet 2</button>
        </div>
        </div>
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

            <label for="selectDepartment" style="margin: 5px;">
                <h6>Department: </h6>
            </label>
            <select class="select-year-center" id="selectDepartment" style="width: 150px; height: 30px;">
                <option class="text-center">--All Program--</option>
                <option>Bachelor of Science in Information Technology</option>
                <option>Bachelor of Science in Business Administration</option>
                <option>Teacher Education Program</option>
            </select>
            
     
            <div class="text-end" style="margin-top: -40px; margin-right: 10px;">
            <button type="button" class="btn btn-import" style="margin-left: 20px; background: transparent; border: none; color: green;" data-bs-toggle="modal" data-bs-target="#ImportModal">
        <i class="fas fa-file-import" style="font-size: 1.5em;"></i> Import
    </button>
< downloadslip
            <button type="button" class="btn btn-import" style="margin-left: 20px; background: transparent; border: none; color: green;" data-bs-toggle="modal" data-bs-target="#ImportModal">
        <i class="fas fa-file-import" style="font-size: 1.5em;"></i> Import
    </button>
<!-- Export Button -->
<button type="button" class="btn btn-export" style="margin-left: 20px; background: transparent; border: none; color: yellowgreen;" 
    onclick="exportVisibleTableToExcel()">
    <i class="fas fa-file-export" style="font-size: 1.5em;"></i> Export
</button>
    <!-- Print Button -->
    <button id="printButton" class="btn btn-print" style="margin-left: 20px; background: transparent; border: none; color: blue;" onclick="printTable()">
        <i class="fas fa-print" style="font-size: 1.5em;"></i> Print
    <!-- Print Button -->
    <button id="printButton" class="btn btn-outline-primary" style="margin-left: 20px;" onclick="printTable()">
        <i class="fas fa-print"></i> Print
    </button>
</div>

        </div>


        <div class="card-body table-responsive px-2 pt-1" style="overflow-x: auto; overflow-y: auto; max-height: 75vh; margin-top: 10px;">
            <form id="frminput_position">
                <button type="submit" id="save_positionButton" class="btn btn-primary" hidden=""></button>
                <table id="tblmasterlist" class="table table-sm" style="font-size: 10px; table-layout: fixed;">
                    <thead>
                        <tr>

                            <th style="border: 0.5px solid black; padding: 4px; color: white; background-color: #002d54;" class="text-center">No.</th>
                            <th style="border: 0.5px solid black; padding: 4px; color: white; background-color: #002d54;" class="text-center">ID</th>
                            <th style="border: 0.5px solid black; padding: 4px; color: white; background-color: #002d54;" class="text-center">Last Name</th>
                            <th style="border: 0.5px solid black; padding: 4px; color: white; background-color: #002d54;" class="text-center">First Name</th>
                            <th style="border: 0.5px solid black; padding: 4px; color: white; background-color: #002d54;" class="text-center">Middle Name</th>
                            <th style="border: 0.5px solid black; padding: 4px; color: white; background-color: #002d54;" class="text-center">Suffix Name</th>
                            <th style="border: 0.5px solid black; padding: 4px; color: white; background-color: #002d54;" class="text-center">Gender</th>
                            <th style="border: 0.5px solid black; padding: 4px; color: white; background-color: #002d54;" class="text-center">NSTP1</th>
                            <th style="border: 0.5px solid black; padding: 4px; color: white; background-color: #002d54;" class="text-center">School</th>
                            <th style="border: 0.5px solid black; padding: 4px; color: white; background-color: #002d54;" class="text-center">School Year Taken</th>
                            <th style="border: 0.5px solid black; padding: 4px; color: white; background-color: #002d54;" class="text-center">Section Code</th>
                            <th style="border: 0.5px solid black; padding: 4px; color: white; background-color: #002d54;" class="text-center">NSTP2</th>
                            <th style="border: 0.5px solid black; padding: 4px; color: white; background-color: #002d54;" class="text-center">School</th>
                            <th style="border: 0.5px solid black; padding: 4px; color: white; background-color: #002d54;" class="text-center">School Year Taken</th>
                            <th style="border: 0.5px solid black; padding: 4px; color: white; background-color: #002d54;" class="text-center">Section Code</th>
                            <th style="border: 0.5px solid black; padding: 4px; color: white; background-color: #002d54;" class="text-center">Serial Number</th>
                            <th style="border: 0.5px solid black; padding: 4px; color: white; background-color: #002d54;" class="text-center">Remarks</th>
                            <th style="border: 0.5px solid black; padding: 4px; color: white; background-color: #002d54;" class="text-center">Edit</th>

                            <th style="border: 0.5px solid black; padding: 4px; background-color: #83f28f;" class="text-center">No.</th>
                            <th style="border: 0.5px solid black; padding: 4px; background-color: #83f28f;" class="text-center">ID</th>
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
                            <th style="border: 0.5px solid black; padding: 4px; background-color: #83f28f;" class="text-center">Import</th>

                            <th style="border: 0.5px solid black; padding: 4px; background-color: #83f28f;" class="text-center">Import</th>

                            
                        </tr>
                    </thead>
                    <tbody>
                        <!-- LOAD COMPONENTS -->
                    </tbody>
                </table>
            </form>
        </div>
        <div class="card-body table-responsive px-2 pt-1" style="overflow-x: auto; overflow-y: auto; max-height: 75vh; margin-top: 10px;">
            <button type="submit" id="save_positionButton" class="btn btn-primary" hidden=""></button>
                <table id="tblstudentlist" class="table table-sm" style="font-size: 10px; table-layout: fixed;">
                  <form id="frminput_position">
                  <thead>
                        <tr>
                            <th style="border: 0.5px solid black; padding: 4px; color: white; background-color: #002d54;" class="text-center">No.</th>
                            <th style="border: 0.5px solid black; padding: 4px; color: white; background-color: #002d54;" class="text-center">ID</th>
                            <th style="border: 0.5px solid black; padding: 4px; color: white; background-color: #002d54;" class="text-center">Award Year</th>
                            <th style="border: 0.5px solid black; padding: 4px; color: white; background-color: #002d54;" class="text-center">Component</th>
                            <th style="border: 0.5px solid black; padding: 4px; color: white; background-color: #002d54;" class="text-center">Region</th>
                            <th style="border: 0.5px solid black; padding: 4px; color: white; background-color: #002d54;" class="text-center">Serial Number</th>
                            <th style="border: 0.5px solid black; padding: 4px; color: white; background-color: #002d54;" class="text-center">Last Name</th>
                            <th style="border: 0.5px solid black; padding: 4px; color: white; background-color: #002d54;" class="text-center">First Name</th>
                            <th style="border: 0.5px solid black; padding: 4px; color: white; background-color: #002d54;" class="text-center">Suffix Name</th>
                            <th style="border: 0.5px solid black; padding: 4px; color: white; background-color: #002d54;" class="text-center">Middle Name</th>
                            <th style="border: 0.5px solid black; padding: 4px; color: white; background-color: #002d54;" class="text-center">Date of Birth</th>
                            <th style="border: 0.5px solid black; padding: 4px; color: white; background-color: #002d54;" class="text-center">Gender</th>
                            <th style="border: 0.5px solid black; padding: 4px; color: white; background-color: #002d54;" class="text-center">Brg./ Municipality / Province</th>
                            <th style="border: 0.5px solid black; padding: 4px; color: white; background-color: #002d54;" class="text-center">School</th>
                            <th style="border: 0.5px solid black; padding: 4px; color: white; background-color: #002d54;" class="text-center">Institution Code</th>
                            <th style="border: 0.5px solid black; padding: 4px; color: white; background-color: #002d54;" class="text-center">Type of Agency</th>
                            <th style="border: 0.5px solid black; padding: 4px; color: white; background-color: #002d54;" class="text-center">Program</th>
                            <th style="border: 0.5px solid black; padding: 4px; color: white; background-color: #002d54;" class="text-center">Main Program</th>
                            <th style="border: 0.5px solid black; padding: 4px; color: white; background-color: #002d54;" class="text-center">Email</th>
                            <th style="border: 0.5px solid black; padding: 4px; color: white; background-color: #002d54;" class="text-center">Contact Number</th>
                            
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
<?php include '../../nav/student_list/modals/slip_modal.php' ?>


<script>
$(document).ready(function() {
    // Load the initial student list when the document is ready
    loadMasterList();  // Load tblmasterlist by default

    // Set default view to "Sheet 1" (tblmasterlist)
    $('#tblmasterlist').show();  // Ensure tblmasterlist is shown by default
    $('#tblstudentlist').hide();  // Hide tblstudentlist by default

    // Toggle between "Sheet 1" and "Sheet 2"
    $('.btn-secondary').on('click', function() {
        // Check which button was clicked based on its text
        if ($(this).text() === 'Sheet 1') {
            $('#tblmasterlist').show();  // Show tblmasterlist
            $('#tblstudentlist').hide();  // Hide tblstudentlist
        } else if ($(this).text() === 'Sheet 2') {
            $('#tblmasterlist').hide();  // Hide tblmasterlist
            $('#tblstudentlist').show();  // Show tblstudentlist
            loadStudentList();  // Load tblstudentlist data when shown
        }
    });

    // Fetch academic years and populate the dropdown
    $.ajax({
        url: "../nav/student_list/components/fetch_academic_years.php", // Fetch academic years
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

    // Search functionality for tblmasterlist
    $("#searchInput").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        
        // Search within tblmasterlist rows
        $("#tblmasterlist tbody tr").filter(function() {
            var student_id = $(this).find("td:eq(1)").text().toLowerCase();
            var firstname = $(this).find("td:eq(3)").text().toLowerCase();
            var middlename = $(this).find("td:eq(4)").text().toLowerCase();
            var lastname = $(this).find("td:eq(2)").text().toLowerCase();
            var suffixname = $(this).find("td:eq(5)").text().toLowerCase();

            var fullName = firstname + ' ' + middlename + ' ' + lastname + ' ' + suffixname; 
            var fullNameAlt1 = firstname + ' ' + lastname + ' ' + middlename + ' ' + suffixname; 
            var fullNameAlt2 = lastname + ' ' + firstname + ' ' + middlename + ' ' + suffixname; 
            var fullNameAlt3 = lastname + ' ' + firstname + ' ' + suffixname + ' ' + middlename; 
            var fullNameAlt4 = firstname + ' ' + lastname + ' ' + suffixname + ' ' + middlename; 

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

    // Search functionality for tblstudentlist
    $("#searchInput").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        
        // Search within tblstudentlist rows
        $("#tblstudentlist tbody tr").filter(function() {
            var student_id = $(this).find("td:eq(1)").text().toLowerCase();
            var firstname = $(this).find("td:eq(8)").text().toLowerCase();
            var middlename = $(this).find("td:eq(10)").text().toLowerCase();
            var lastname = $(this).find("td:eq(7)").text().toLowerCase();
            var suffixname = $(this).find("td:eq(9)").text().toLowerCase();
            var barangay = $(this).find("td:eq(12)").text().toLowerCase();  
            var municipality = $(this).find("td:eq(12)").text().toLowerCase(); 
            var province = $(this).find("td:eq(12)").text().toLowerCase(); 

            var fullName = firstname + ' ' + middlename + ' ' + lastname + ' ' + suffixname; 
            var fullNameAlt1 = firstname + ' ' + lastname + ' ' + middlename + ' ' + suffixname; 
            var fullNameAlt2 = lastname + ' ' + firstname + ' ' + middlename + ' ' + suffixname; 
            var fullNameAlt3 = lastname + ' ' + firstname + ' ' + suffixname + ' ' + middlename; 
            var fullNameAlt4 = firstname + ' ' + lastname + ' ' + suffixname + ' ' + middlename; 

            $(this).toggle(
                student_id.includes(value) || 
                fullName.includes(value) || 
                fullNameAlt1.includes(value) || 
                fullNameAlt2.includes(value) || 
                fullNameAlt3.includes(value) || 
                fullNameAlt4.includes(value) || 
                barangay.includes(value) || 
                municipality.includes(value) || 
                province.includes(value)
            );
        });
    });

    // Function to load the master list (tblmasterlist) from the server based on selected filters
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

    // Function to load the student list (tblstudentlist) from the server based on selected filters
    function loadStudentList(filters = {}) {
        $.ajax({
            url: "../nav/student_list/components/studentlist.php",
            method: "POST",
            data: filters,
            success: function(data) {
                $('#tblstudentlist tbody').html(data);
            },
            error: function() {
                alert('Failed to load student data. Please try again.');
            }
        });
    }

    // Function to apply filters and reload the master list and student list
    function applyFilters() {
        var academicYear = $('#selectAY').val();
        var component = $('#selectComponent').val();
        var department = $('#selectDepartment').val();

        var filters = {
            academicYear: academicYear === '-All Academic Year-' ? 'All' : academicYear,
            component: component === '--All Component--' ? 'All' : component,
            department: department === '--All Program--' ? 'All' : department
        };

        loadMasterList(filters); // Reload the master list
        loadStudentList(filters); // Reload the student list
    }

    // Trigger filter application on dropdown change
    $('#selectAY, #selectComponent, #selectDepartment').change(function() {
        applyFilters();
    });
});
    </script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.0/xlsx.full.min.js"></script>
<script>
 function exportVisibleTableToExcel() {
    // Check which table is currently visible
    let table, filename;
    if ($('#tblmasterlist').is(':visible')) {
        table = document.getElementById('tblmasterlist');
        filename = 'MasterList';

        // Clone the table and remove the 'Edit' column (last column)
        let clonedTable = table.cloneNode(true);
        removeColumn(clonedTable, clonedTable.rows[0].cells.length - 1); // Remove the last column (Edit column)
        table = clonedTable; // Use cloned table without the Edit column

    } else if ($('#tblstudentlist').is(':visible')) {
        table = document.getElementById('tblstudentlist');
        filename = 'StudentList';
    }

    // Initialize the workbook and worksheet
    let wb = XLSX.utils.book_new();
    let ws = XLSX.utils.table_to_sheet(table);

    // Adjust the column widths to fit the content
    let wscols = [];
    let colCount = table.rows[0].cells.length;
    for (let i = 0; i < colCount; i++) {
        wscols.push({ wpx: 150 }); // Set each column to 150 pixels wide (adjust as needed)
    }
    ws['!cols'] = wscols; // Apply the column widths to the worksheet

    // Append the worksheet to the workbook
    XLSX.utils.book_append_sheet(wb, ws, 'Sheet1');

    // Write the workbook to a file
    XLSX.writeFile(wb, `${filename}.xlsx`);
}

// Function to remove a specific column from a table
function removeColumn(table, columnIndex) {
    for (let row of table.rows) {
        row.deleteCell(columnIndex); // Delete the cell at the given column index
    }
}
</script>

<script>
//print function

$(document).ready(function() {
    // Trigger the print function on button click
    $('.btn-print').click(function() {
        openPrintWindow(); // Call the function to open the print window
        if ($('#tblmasterlist').is(':visible')) {
            printMasterList(); // Call the function to print the master list
        } else {
            printStudentList(); // Call the function to print the student list
        }
    });

    function printMasterList() {
        var tableHeaders = document.querySelector('#tblmasterlist thead').innerHTML; 
        var rows = document.querySelectorAll('#tblmasterlist tbody tr');
        var newTableBody = '';
        var headerHtml = '';

        // Create updated headers excluding "No." and "Edit" columns
        var headerCells = document.querySelectorAll('#tblmasterlist thead th');
        headerCells.forEach((cell, index) => {
            if (index > 1 && index < headerCells.length - 1) { // Skip the "No.", "Edit" columns
                headerHtml += cell.outerHTML;
            }
        });

        // Create updated body with row numbers excluding "Edit" column
        rows.forEach((row, rowIndex) => {
            var cells = row.children;
            newTableBody += `<tr style="page-break-inside: avoid;">`; // Prevent breaking inside rows
            newTableBody += `<td style="border: 0.5px solid black; padding: 4px; text-align: center;">${rowIndex + 1}</td>`; // Add row number
            for (var i = 2; i < cells.length; i++) { // Iterate through all cells
                if (i !== cells.length - 1) { // Skip only the "Edit" column
                    newTableBody += `<td style="border: 0.5px solid black; padding: 4px;">${cells[i].innerHTML}</td>`;
                }
            }
            newTableBody += `</tr>`;
        });

        // Prepare the content to be printed
        var printContents = `
           <head>
                <title>Print NSTP Master List</title>
                <style>
                    @page { 
                        size: A4; 
                        margin: 10mm; 
                    }
                    body {
                        font-family: Arial, sans-serif; /* Set a readable font */
                        font-size: 10px; /* Base font size for compactness */
                    }
                    table { 
                        width: 100%; 
                        border-collapse: collapse; 
                    }
                    th, td { 
                        border: 0.5px solid black; 
                        padding: 4px; /* Reduced padding */
                        text-align: left; 
                    }
                    th { 
                        text-align: center; 
                        background-color: #83f28f;
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
                    @media print {
                        .print-button {
                            display: none; /* Hide print button when printing */
                        }
                    }
                </style>
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
            </head>

            <body>
                <div style="text-align: center;">
                    <h2>NSTP Master List</h2>
                </div>
                <button onclick="window.print()" class="print-button">🖨️ Print Report</button>
                <table>
                    <thead>
                        <tr>
                            <th style="border: 0.5px solid black; padding: 4px; background-color: #f2f2f2; text-align: center;">No.</th>
                            ${headerHtml} <!-- Updated headers without "No." and "Edit" columns -->
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

   function printStudentList() {
    var tableHeaders = document.querySelector('#tblstudentlist thead').innerHTML; 
    var rows = document.querySelectorAll('#tblstudentlist tbody tr');
    var newTableBody = '';
    var headerHtml = '';

    // Create updated headers excluding "No." and "Edit" columns
    var headerCells = document.querySelectorAll('#tblstudentlist thead th');
    headerCells.forEach((cell, index) => {
        if (index > 1 && index < headerCells.length - 1) { // Skip the "No.", "Edit" columns
            headerHtml += cell.outerHTML;
        }
    });

    /// Create updated body with row numbers excluding "Edit" column
rows.forEach((row, rowIndex) => {
    var cells = row.children;
    newTableBody += `<tr>`;
    newTableBody += `<td style="border: 1px solid black; padding: 8px; text-align: center;">${rowIndex + 1}</td>`; // Add row number
    for (var i = 2; i < cells.length; i++) { // Iterate through all cells
        if (i !== cells.length - 1) { // Skip only the "Edit" column
            newTableBody += `<td style="border: 1px solid black; padding: 8px;">${cells[i].innerHTML}</td>`;
        }
    }
    newTableBody += `</tr>`;
});
    // Create updated body with row numbers excluding "Edit" column
    rows.forEach((row, rowIndex) => {
        var cells = row.children;
        newTableBody += `<tr style="page-break-inside: avoid; border: 0.5px solid black;">`; // Prevent breaking inside rows
        newTableBody += `<td style="border: 0.5px solid black; padding: 4px; text-align: center;">${rowIndex + 1}</td>`; // Add row number
        for (var i = 2; i < cells.length; i++) { // Iterate through all cells
            if (i !== cells.length - 1) { // Skip only the "Edit" column
                newTableBody += `<td style="border: 0.5px solid black; padding: 4px;">${cells[i].innerHTML}</td>`;
            }
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
            <title>Print NSTP Student List</title>
            <style>
                @page { 
                    size: A4 landscape; /* Set to landscape orientation */
                }
                body {
                    font-family: Arial, sans-serif; /* Set a readable font */
                    font-size: 10px; /* Base font size for compactness */
                }
                table { 
                    width: 100%; 
                    border-collapse: collapse; 
                }
                th, td { 
                    border: 1px solid black; 
                    padding: 8px; 
                    border: 0.5px solid black; /* Ensure all borders are visible */
                    padding: 4px; /* Reduced padding for compactness */
                    text-align: left; 
                }
                th { 
                    text-align: center; 
                    background-color: #83f28f;
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
                @media print {
                    .print-button {
                        display: none; /* Hide print button when printing */
                    }
                }
            </style>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
        </head>

        <body>
            <div style="text-align: center;">
                <h2>NSTP Master List</h2>
                <h2>NSTP Student List</h2>
            </div>
            <button onclick="window.print()" class="print-button">🖨️ Print Report</button>
            <table>
                <thead>
                    <tr>
                        <th style="border: 1px solid black; padding: 8px; background-color: #f2f2f2; text-align: center;">No.</th>
                        ${headerHtml} <!-- Updated headers without "No.", "Edit", and "Import" columns -->
                        <th style="border: 0.5px solid black; padding: 4px; background-color: #f2f2f2; text-align: center;">No.</th>
                        ${headerHtml} <!-- Updated headers without "No." and "Edit" columns -->
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

});
        if (index > 1 && index < headerCells.length - 2) { // Skip the "No.", "Edit", and "Import" columns
            headerHtml += cell.outerHTML;
        }
    });

    // Create updated body with row numbers and excluding "No.", "Edit", and "Import" columns
    rows.forEach((row, rowIndex) => {
        var cells = row.children;
        newTableBody += `<tr>`;
        newTableBody += `<td style="border: 1px solid black; padding: 8px; text-align: center;">${rowIndex + 1}</td>`; // Add row number
        for (var i = 2; i < cells.length - 2; i++) { // Skip "No.", "Edit", and "Import" columns
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
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
        </head>

        <body>
            <div style="text-align: center;">
                <h2>NSTP Master List</h2>
            </div>
            <button onclick="window.print()" class="print-button">🖨️ Print Report</button>
            <table>
                <thead>
                    <tr>
                        <th style="border: 1px solid black; padding: 8px; background-color: #f2f2f2; text-align: center;">No.</th>
                        ${headerHtml} <!-- Updated headers without "No.", "Edit", and "Import" columns -->
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

});
</script>
