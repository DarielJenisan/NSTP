<style>
    .sheet1 {
        display: none;
    }
</style>
<div class="row justify-content-center my-4">
<div class="col-7-2 d-flex justify-content-between align-items-center">
        <h1 class="d-inline mb-0">NSTP Create Master List</h1>
        <div class="ml-auto">
        <button type="button" class="sheet1">Sheet 1</button>
        <button type="button" class="sheet1">Sheet 2</button>
        <button type="button" class="sheet1" style="margin-left: 20px; background: transparent; border: none; color: green;" data-bs-toggle="modal" data-bs-target="#ImportModal">
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
    </button>
        </div>
        </div>

        <div class="card shadow" style="max-height: 100vh; overflow: hidden;">
            
        <div colspan="13" class="school-year" style="margin-top: 20px; margin-right: 20px;">
            <!-- Select Column Button -->
            <button id="selectColumn" class="btn" style="margin-left: 20px; background: transparent; border: none; color: green;" >
                <i class="fas fa-table" style="font-size: 1.5em;"></i> Columns
            </button>
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
            <select class="select-year-center" id="selectProgram" style="width: 150px; height: 30px;">
                <option class="text-center">--All Program--</option>
            <select class="select-year-center" id="selectDepartment" style="width: 150px; height: 30px;">
                <option class="text-center">--All Department--</option>
                <option>Bachelor of Science in Information Technology</option>
                <option>Bachelor of Science in Business Administration</option>
                <option>Teacher Education Program</option>
            </select>
        </div>

            <div class="card-body table-responsive px-2 pt-1" style="overflow-x: auto; overflow-y: auto; max-height: 75vh; margin-top: 10px;">
                <form id="frminput_position">
                    <button type="submit" id="save_positionButton" class="btn btn-primary" hidden=""></button>
                    <table id="tblmasterlist" class="table table-sm">
                        <!--<colgroup>
                            <col width="5%">
                            <col width="15%">
                            <col width="25%">
                            <col width="25%">
                            <col width="15%">
                            <col width="15%">
                            <col width="15%">
                            <col width="15%">
                        </colgroup>-->

                    <button type="submit" id="save_positionButton" class="btn btn-primary" hidden=""></button>
                    <table id="tblmasterlist" class="table table-sm" style="font-size: 10px; table-layout: fixed;">
                        <thead>
                            <tr>
                                <th style="border: 0.5px solid black; padding: 4px; background-color: #83f28f;" class="text-center">No.</th>
                                <th style="border: 0.5px solid black; padding: 4px; background-color: #83f28f;" class="text-center">Student ID</th>
                                <th style="border: 0.5px solid black; padding: 4px; background-color: #83f28f;" class="text-center">Last Name</th>
                                <th style="border: 0.5px solid black; padding: 4px; background-color: #83f28f;" class="text-center">First Name</th>
                                <th style="border: 0.5px solid black; padding: 4px; background-color: #83f28f;" class="text-center">Middle Name</th>
                                <th style="border: 0.5px solid black; padding: 4px; background-color: #83f28f;" class="text-center">Name Extension</th>
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
                                <th style="border: 0.5px solid black; padding: 4px; background-color: #83f28f;" class="text-center">Award Year</th>
                                <th style="border: 0.5px solid black; padding: 4px; background-color: #83f28f;" class="text-center">Component</th>
                                <th style="border: 0.5px solid black; padding: 4px; background-color: #83f28f;" class="text-center">Date of Birth</th>
                                <th style="border: 0.5px solid black; padding: 4px; background-color: #83f28f;" class="text-center">Barangay </th>
                                <th style="border: 0.5px solid black; padding: 4px; background-color: #83f28f;" class="text-center">Municipality</th>
                                <th style="border: 0.5px solid black; padding: 4px; background-color: #83f28f;" class="text-center">Provice</th>
                                <th style="border: 0.5px solid black; padding: 4px; background-color: #83f28f;" class="text-center">HEI Name</th>
                                <th style="border: 0.5px solid black; padding: 4px; background-color: #83f28f;" class="text-center">Institution Code</th>
                                <th style="border: 0.5px solid black; padding: 4px; background-color: #83f28f;" class="text-center">Type of Agency</th>
                                <th style="border: 0.5px solid black; padding: 4px; background-color: #83f28f;" class="text-center">Program</th>
                                <th style="border: 0.5px solid black; padding: 4px; background-color: #83f28f;" class="text-center">Major</th>
                                <th style="border: 0.5px solid black; padding: 4px; background-color: #83f28f;" class="text-center">Main Program</th>
                                <th style="border: 0.5px solid black; padding: 4px; background-color: #83f28f;" class="text-center">Email</th>
                                <th style="border: 0.5px solid black; padding: 4px; background-color: #83f28f;" class="text-center">Contact Number</th>
                                <th style="border: 0.5px solid black; padding: 4px; color: white; background-color: #002d54;" class="text-center">No.</th>
                                <th style="border: 0.5px solid black; padding: 4px; color: white; background-color: #002d54;" class="text-center">Student ID</th>
                                <th style="border: 0.5px solid black; padding: 4px; color: white; background-color: #002d54;" class="text-center">Last Name</th>
                                <th style="border: 0.5px solid black; padding: 4px; color: white; background-color: #002d54;" class="text-center">First Name</th>
                                <th style="border: 0.5px solid black; padding: 4px; color: white; background-color: #002d54;" class="text-center">Middle Name</th>
                                <th style="border: 0.5px solid black; padding: 4px; color: white; background-color: #002d54;" class="text-center">Name Extension</th>
                                <th style="border: 0.5px solid black; padding: 4px; color: white; background-color: #002d54;" class="text-center">Gender</th>
                                <th style="border: 0.5px solid black; padding: 4px; color: white; background-color: #002d54;" class="text-center">NSTP1</th>
                                <th style="border: 0.5px solid black; padding: 4px; color: white; background-color: #002d54;" class="text-center">School</th>
                                <th style="border: 0.5px solid black; padding: 4px; color: white; background-color: #002d54;" class="text-center">School Year Taken</th>
                                <th style="border: 0.5px solid black; padding: 4px; color: white; background-color: #002d54;" class="text-center">Section Code</th>
                                <th style="border: 0.5px solid black; padding: 4px; color: white; background-color: #002d54;" class="text-center">Grades</th>
                                <th style="border: 0.5px solid black; padding: 4px; color: white; background-color: #002d54;" class="text-center">Status</th>
                                <th style="border: 0.5px solid black; padding: 4px; color: white; background-color: #002d54;" class="text-center">NSTP2</th>
                                <th style="border: 0.5px solid black; padding: 4px; color: white; background-color: #002d54;" class="text-center">School</th>
                                <th style="border: 0.5px solid black; padding: 4px; color: white; background-color: #002d54;" class="text-center">School Year Taken</th>
                                <th style="border: 0.5px solid black; padding: 4px; color: white; background-color: #002d54;" class="text-center">Section Code</th>
                                <th style="border: 0.5px solid black; padding: 4px; color: white; background-color: #002d54;" class="text-center">Grades</th>
                                <th style="border: 0.5px solid black; padding: 4px; color: white; background-color: #002d54;" class="text-center">Status</th>
                                <th style="border: 0.5px solid black; padding: 4px; color: white; background-color: #002d54;" class="text-center">Serial Number</th>
                                <th style="border: 0.5px solid black; padding: 4px; color: white; background-color: #002d54;" class="text-center">Remarks</th>
                                <th style="border: 0.5px solid black; padding: 4px; color: white; background-color: #002d54;" class="text-center">Award Year</th>
                                <th style="border: 0.5px solid black; padding: 4px; color: white; background-color: #002d54;" class="text-center">Component</th>
                                <th style="border: 0.5px solid black; padding: 4px; color: white; background-color: #002d54;" class="text-center">Date of Birth</th>
                                <th style="border: 0.5px solid black; padding: 4px; color: white; background-color: #002d54;" class="text-center">Barangay </th>
                                <th style="border: 0.5px solid black; padding: 4px; color: white; background-color: #002d54;" class="text-center">Municipality</th>
                                <th style="border: 0.5px solid black; padding: 4px; color: white; background-color: #002d54;" class="text-center">Provice</th>
                                <th style="border: 0.5px solid black; padding: 4px; color: white; background-color: #002d54;" class="text-center">Region</th>
                                <th style="border: 0.5px solid black; padding: 4px; color: white; background-color: #002d54;" class="text-center">HEI Name</th>
                                <th style="border: 0.5px solid black; padding: 4px; color: white; background-color: #002d54;" class="text-center">Institution Code</th>
                                <th style="border: 0.5px solid black; padding: 4px; color: white; background-color: #002d54;" class="text-center">Type of Agency</th>
                                <th style="border: 0.5px solid black; padding: 4px; color: white; background-color: #002d54;" class="text-center">Year Level</th>
                                <th style="border: 0.5px solid black; padding: 4px; color: white; background-color: #002d54;" class="text-center">Department</th>
                                <th style="border: 0.5px solid black; padding: 4px; color: white; background-color: #002d54;" class="text-center">Major</th>
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
</div>

<!-- Modal for column selection -->
<div class="modal fade" id="columnSelectModal" tabindex="-1" role="dialog" aria-labelledby="columnSelectModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="columnSelectModalLabel">Select Columns</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="columnSelectForm">
                    <div class="form-group">
                        <label>Select Columns to Display:</label><br>
                        <input type="checkbox" id="checkAllColumns"> Check All<br>
                        
                        <!-- Grid for checkboxes -->
                        <div class="checkbox-grid">
                            <label><input type="checkbox" class="column-checkbox" value="0"> No.</label>
                            <label><input type="checkbox" class="column-checkbox" value="1"> Student ID</label>
                            <label><input type="checkbox" class="column-checkbox" value="2"> Last Name</label>
                            <label><input type="checkbox" class="column-checkbox" value="3"> First Name</label>
                            <label><input type="checkbox" class="column-checkbox" value="4"> Middle Name</label>

                            <label><input type="checkbox" class="column-checkbox" value="5"> Name Extension</label>
                            <label><input type="checkbox" class="column-checkbox" value="6"> Gender</label>
                            <label><input type="checkbox" class="column-checkbox" value="7"> NSTP1</label>
                            <label><input type="checkbox" class="column-checkbox" value="8"> School (NSTP1)</label>
                            <label><input type="checkbox" class="column-checkbox" value="9"> School Year Taken (NSTP1)</label>

                            <label><input type="checkbox" class="column-checkbox" value="10"> Section Code (NSTP1)</label>
                            <label><input type="checkbox" class="column-checkbox" value="11"> Grades (NSTP1)</label>
                            <label><input type="checkbox" class="column-checkbox" value="12"> Status (NSTP1)</label>
                            <label><input type="checkbox" class="column-checkbox" value="13"> NSTP2</label>
                            <label><input type="checkbox" class="column-checkbox" value="14"> School (NSTP2)</label>
                            <label><input type="checkbox" class="column-checkbox" value="15"> School Year Taken (NSTP2)</label>
                            <label><input type="checkbox" class="column-checkbox" value="16"> Section Code (NSTP2)</label>
                            <label><input type="checkbox" class="column-checkbox" value="17"> Grades (NSTP2)</label>
                            <label><input type="checkbox" class="column-checkbox" value="18"> Status (NSTP2)</label>

                            <label><input type="checkbox" class="column-checkbox" value="19"> Serial Number</label>
                            <label><input type="checkbox" class="column-checkbox" value="20"> Remarks</label>
                            <label><input type="checkbox" class="column-checkbox" value="21"> Award Year</label>
                            <label><input type="checkbox" class="column-checkbox" value="22"> Component</label>
                            <label><input type="checkbox" class="column-checkbox" value="23"> Date of Birth</label>

                            <label><input type="checkbox" class="column-checkbox" value="24"> Barangay</label>
                            <label><input type="checkbox" class="column-checkbox" value="25"> Municipality</label>
                            <label><input type="checkbox" class="column-checkbox" value="26"> Province</label>
                            <label><input type="checkbox" class="column-checkbox" value="27"> Region</label>
                            <label><input type="checkbox" class="column-checkbox" value="28"> HEI Name</label>
                            <label><input type="checkbox" class="column-checkbox" value="29"> Institution Code</label>
                            <label><input type="checkbox" class="column-checkbox" value="30"> Type of Agency</label>
                            <label><input type="checkbox" class="column-checkbox" value="31"> Year Level</label>
                            <label><input type="checkbox" class="column-checkbox" value="32"> Department</label>
                            <label><input type="checkbox" class="column-checkbox" value="33"> Major</label>
                            <label><input type="checkbox" class="column-checkbox" value="34"> Program</label>
                            
                            <label><input type="checkbox" class="column-checkbox" value="35"> Main Program</label>
                            <label><input type="checkbox" class="column-checkbox" value="36"> Email</label>
                            <label><input type="checkbox" class="column-checkbox" value="37"> Contact Number</label>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" id="applyColumnSelection">Apply</button>
            </div>
        </div>
    </div>
</div>

<!-- CSS -->
<style>
    /* Make the modal wider */
    .modal-dialog.modal-lg {
        max-width: 80%; /* Adjust the percentage as needed */
    }

    .checkbox-grid {
        display: grid;
        grid-template-columns: repeat(5, 1fr);
        gap: 10px;
        margin-top: 10px;
    }

    .checkbox-grid label {
        display: flex;
        align-items: center;
    }
</style>




<script>
$(document).ready(function() {
    // Load the initial student list when the document is ready
    loadMasterList();

    // Fetch academic years and populate the dropdown
    $.ajax({
        url: "../nav/create_masterlist/components/fetch_academic_years.php", // Create this PHP file to fetch academic years
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
            var student_id = $(this).find("td:eq(1)").text().toLowerCase(); // Updated index for 'First Name'
            var firstname = $(this).find("td:eq(3)").text().toLowerCase(); // Updated index for 'First Name'
            var middlename = $(this).find("td:eq(4)").text().toLowerCase(); // Updated index for 'Middle Name'
            var lastname = $(this).find("td:eq(2)").text().toLowerCase(); // Updated index for 'Last Name'
            var suffixname = $(this).find("td:eq(5)").text().toLowerCase(); // Updated index for 'Name Extension'

            // Concatenate full name including suffix
            var fullName = firstname + ' ' + middlename + ' ' + lastname + ' ' + suffixname; 
            var fullNameAlt1 = firstname + ' ' + lastname + ' ' + middlename + ' ' + suffixname; 
            var fullNameAlt2 = lastname + ' ' + firstname + ' ' + middlename + ' ' + suffixname; 
            var fullNameAlt3 = lastname + ' ' + firstname + ' ' + suffixname + ' ' + middlename; 
            var fullNameAlt4 = firstname + ' ' + lastname + ' ' + suffixname + ' ' + middlename; 

            // Check all possible combinations against the search input
            $(this).toggle(
                student_id.includes(value) || fullName.includes(value) || fullNameAlt1.includes(value) || fullNameAlt2.includes(value) || fullNameAlt3.includes(value) || fullNameAlt4.includes(value)
            );
        });
    });

    // Function to load the student list from the server based on selected filters
    function loadMasterList(filters = {}) {
        $.ajax({
            url: "../nav/create_masterlist/components/fetch_studentdata.php",
            method: "POST",
            data: filters,
            success: function(data) {
                $('#tblmasterlist tbody').html(data);
                // After loading data, reapply the column visibility settings
                reapplyColumnVisibility();
            },
            error: function() {
                alert('Failed to load data. Please try again.');
            }
        });
    }

    // Function to reapply column visibility after data load
    function reapplyColumnVisibility() {
        var selectedColumns = $('.column-checkbox:checked').map(function() {
            return $(this).val();
        }).get();

        // Update the table header visibility based on selected columns
        $('#tblmasterlist thead tr th').each(function(index) {
            $(this).toggle(selectedColumns.includes(index.toString()));
        });

        // Update the table body visibility based on selected columns
        $('#tblmasterlist tbody tr').each(function() {
            $(this).find('td').each(function(index) {
                $(this).toggle(selectedColumns.includes(index.toString()));
            });
        });
    }

    // Function to apply filters and reload the master list
    function applyFilters() {
        var academicYear = $('#selectAY').val();
        var component = $('#selectComponent').val();
        var department = $('#selectDepartment').val();

        // Adjusting filter values based on user selection
        var filters = {
            academicYear: academicYear === '-All Academic Year-' ? 'All' : academicYear,
            component: component === '--All Component--' ? 'All' : component,
            department: department === '--All Department--' ? 'All' : department
        };

        // Reload the master list based on applied filters
        loadMasterList(filters);
    }

    // Select Column Button click event
    $('#selectColumn').click(function() {
        // Show the modal
        $('#columnSelectModal').modal('show');
    });

    // Check all columns checkbox functionality
    $('#checkAllColumns').change(function() {
        $('.column-checkbox').prop('checked', this.checked);
    });

    // Apply button click event for column selection
    $('#applyColumnSelection').click(function() {
        // Get selected columns
        var selectedColumns = $('.column-checkbox:checked').map(function() {
            return $(this).val();
        }).get();

        // Update the table header visibility based on selected columns
        $('#tblmasterlist thead tr th').each(function(index) {
            $(this).toggle(selectedColumns.includes(index.toString()));
        });

        // Update the table body visibility based on selected columns
        $('#tblmasterlist tbody tr').each(function() {
            $(this).find('td').each(function(index) {
                $(this).toggle(selectedColumns.includes(index.toString()));
            });
        });

        // Close the modal
        $('#columnSelectModal').modal('hide');

        // Reload the data to apply any previous filters
        applyFilters();
    });

    // Trigger filter application on dropdown change
    $('#selectAY, #selectComponent, #selectDepartment').change(function() {
        applyFilters();
    });
});
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.16.9/xlsx.full.min.js"></script>
<script>
function exportVisibleTableToExcel() {
    const wb = XLSX.utils.book_new();
    const wsData = [];
    const colWidths = []; // Array to store the maximum width of each column
    
    // Get the header row
    const headers = [];
    const headerCells = document.querySelectorAll('#tblmasterlist th');
    headerCells.forEach((th, index) => {
        if (th.querySelector('input:checked') || !th.querySelector('input')) {
            headers.push(th.innerText);
            colWidths[index] = th.innerText.length; // Initialize width with header length
        }
    });
    wsData.push(headers);
    
    // Get each row of the table
    const rows = document.querySelectorAll('#tblmasterlist tbody tr');
    rows.forEach(row => {
        const rowData = [];
        const cells = row.querySelectorAll('td');
        cells.forEach((td, index) => {
            const th = headerCells[index];
            if (th.querySelector('input:checked') || !th.querySelector('input')) {
                rowData.push(td.innerText);
                // Update the column width if the current cell's length is greater
                if (td.innerText.length > (colWidths[index] || 0)) {
                    colWidths[index] = td.innerText.length;
                }
            }
        });
        wsData.push(rowData);
    });
    
    const ws = XLSX.utils.aoa_to_sheet(wsData);
    
    // Set column widths
    const wscols = colWidths.map(width => ({ wch: width + 2 })); // Add some padding
    ws['!cols'] = wscols; // Assign column widths to the worksheet

    XLSX.utils.book_append_sheet(wb, ws, 'Master List');
    XLSX.writeFile(wb, 'MasterList.xlsx');
}

</script>


<!-- Script Function for Printing-->
<script>
$(document).ready(function() {
    // Trigger the print function on button click
    $('.btn-print').click(function() {
        openPrintWindow(); // Call the function to open the print window
    });

    // Function to open the print window with formatted content
    function openPrintWindow() {
        var rows = document.querySelectorAll('#tblmasterlist tbody tr');
        var newTableBody = '';
        var headerHtml = '';

        // Create updated headers based on visibility
        var headerCells = document.querySelectorAll('#tblmasterlist thead th');
        headerCells.forEach((cell, index) => {
            if ($(cell).is(':visible')) { // Check if the column is visible
                headerHtml += cell.outerHTML;
            }
        });

        // Create updated body excluding the additional row number
        rows.forEach((row) => {
            var cells = row.children;
            newTableBody += `<tr>`;
            for (var i = 0; i < cells.length; i++) { // Loop through all cells
                if ($(cells[i]).is(':visible')) { // Check if the cell is visible
                    newTableBody += `<td style="border: 1px solid black; padding: 8px;">${cells[i].innerHTML}</td>`;
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
                            ${headerHtml} <!-- Updated headers based on visibility -->
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
