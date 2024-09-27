<style>
.centered-content {
        display: flex;
        flex-direction: column; /* Arrange items in a column */
        align-items: center; /* Center items horizontally */
        justify-content: flex-start; /* Start from the top */
        min-height: 100vh; /* Full viewport height */
        padding-top: 100px; /* Adjust as needed to space below the header */
        background-color: #f5f5f5; /* Optional background color for the whole page */
    }

.certificate-container {
        width: 900px; /* Adjust the width */
        height: 600px; /* Adjust the height */
        background-color: white;
        background-image: url('../assets/img/cwtscert.png'); /* Background image */
        background-size: 900px 600px;
        background-position: center;
        position: relative;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        padding: 20px;
        border: 1px solid #ddd;
        margin-top: 5px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
        margin: 0 auto; /* Center horizontally if needed */
        margin-top: 15px;
        
    }

   
    .qr-code {
        position: absolute;
        bottom: 40px; /* Position the QR code */
        right: 60px; 
        width: 100px;
        height: 100px;
    }

    .text-container {
        position: absolute;
        text-align: center;
        width: 100%;
        left: -100px;
    }

    .title {
        top: 6px;
        font-family: "Times New Roman", Times, serif;
        font-size: 14px;
        font-weight: normal;
        color:   black;
        text-align: center;
        line-height: 1.25;
    }

    .subtitle {
        top: 100px;
        font-size: 26px;
        font-family: "Times New Roman", Times, serif;
        font-weight: bold;
        color: #1a1a1a;
        text-align: center;
        line-height: 1;
    }

    .completion-text {
        top: 200px;
        font-size: 20px;
        font-weight: normal;
        color:  #002F6C; /* Red color for 'Completion' */
        font-family: "Times New Roman", Times, serif;
        text-align: left;
        margin-left: 20%;
        line-height: 0.25;
    }

    .recipient-name {
        top: 260px;
        font-size: 28px;
        font-weight: bold;
        color: #002F6C;
        text-align: center;
        text-decoration: underline;
    }

    .serial-number {
        top: 305px;
        font-family: "Times New Roman", Times, serif;
        font-size: 16px;
        font-weight: bold;
        color: #002F6C;
        text-align: center;
    }

    .details {
        top: 340px;
        font-family: "Times New Roman", Times, serif;
        font-size: 16px;
        color: #002F6C;
        text-align: center;
        line-height: 1; /* Adjust line height for spacing */
    }

    .coordinator {
        position: absolute;
        bottom: 60px;
        left: 95px;
        font-family: "Times New Roman", Times, serif;
        font-size: 16px;
        color: #002F6C;
        text-align: center;
    }
</style>


<div class="row">
<div class="col-md-2" style="flex: 0 0 auto; width: 350px; height: 100hv; position: fixed; top: 100px;">
    <!-- Sidebar Filter -->
    <div class="card shadow">
        <div class="card-body">
            <h5 class="card-title text-center">NSTP <br>Certificates</h5>
            <div class="form-group">
                <label for="selectAY">Select AY</label>
                <select class="form-control" id="selectAY" onchange="filterData()">
                    <!--Academic year-->
                </select>
            </div>
            <div class="form-group">
                <label for="components">Components</label>
                <select class="form-control" id="components" onchange="filterData()">
                    <option value="All">--All Components--</option>
                    <option value="ROTC">ROTC</option>
                    <option value="CWTS">CWTS</option>
                </select>
            </div>
            <div class="form-group">
                <label for="program">Program</label>
                <select class="form-control" id="program" onchange="filterData()">
                    <option value="All">--All Program--</option>
                    <option value="Bachelor of Science in Information Technology">Bachelor of Science in Information Technology</option>
                    <option value="Bachelor of Science in Business Administration">Bachelor of Science in Business Administration</option>
                    <option value="Teacher Education Program">Teacher Education Program</option>
                </select>
            </div>
            <div class="form-group">
                <label for="daterelease" class="form-label">Date of Release</label>
                <input type="date" class="form-control" id="daterelease" name="daterelease" required 
                    value="2024-05-29" 
                    onchange="generateCertificates()" 
                    onfocus="clearDefaultDate()" 
                    onblur="resetDefaultDate()">
            </div>
            <div class="form-group">
                <label for="coordinator" class="form-label">Coordinator</label>
                <input type="text" class="form-control" id="coordinator" name="coordinator" required 
                    value="JOHN MARK L. BOYONAS, MAEng" 
                    oninput="generateCertificates()" 
                    onfocus="clearDefaultCoordinator()" 
                    onblur="resetDefaultCoordinator()">
            </div>
            <div class="d-flex flex-column align-items-center">
            <button id="printButton" class="btn btn-outline-primary w-100 btn-block mt-2" onclick="printTable()">
        <i class="fas fa-print"></i> Print
    </button>
</div>
                <button class="btn btn-outline-success w-100 btn-block mt-2"><i class="fa fa-download"></i> Download</button>
            </div>
        </div>
    </div>
</div>

            <div class="certificates" style="margin-left: 250px;">
    <div id="certificates-container"></div> <!-- Container for multiple certificates -->
</div>



<script>
   $.ajax({
        url: "../nav/certificate/components/fetch_academic_years.php", // Fetch academic years
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

    async function fetchStudents() {
        try {
            const response = await fetch('../nav/certificate/components/fetch_students.php');
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            const students = await response.json();
            return students;
        } catch (error) {
            console.error('Error fetching student data:', error);
            return []; // Return an empty array in case of error
        }
    }

    function formatDate(dateString) {
        const months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
        const date = new Date(dateString);
        const day = date.getDate();
        const month = months[date.getMonth()];
        const year = date.getFullYear();

        function getOrdinal(day) {
            if (day > 3 && day < 21) return 'th'; // Applies to 4-20
            switch (day % 10) {
                case 1: return 'st';
                case 2: return 'nd';
                case 3: return 'rd';
                default: return 'th';
            }
        }

        return `${day}${getOrdinal(day)} day of ${month}, ${year}`;
    }

    function clearDefaultDate() {
    const dateInput = document.getElementById("daterelease");
    if (dateInput.value === "2024-05-29") {
        dateInput.value = ""; // Clear the default date
    }
}

function resetDefaultDate() {
    const dateInput = document.getElementById("daterelease");
    if (dateInput.value === "") {
        dateInput.value = "2024-05-29"; // Reset to default if empty
    }
}

function clearDefaultCoordinator() {
    const coordinatorInput = document.getElementById("coordinator");
    if (coordinatorInput.value === "JOHN MARK L. BOYONAS, MAEng") {
        coordinatorInput.value = ""; // Clear the default coordinator
    }
}

function resetDefaultCoordinator() {
    const coordinatorInput = document.getElementById("coordinator");
    if (coordinatorInput.value === "") {
        coordinatorInput.value = "JOHN MARK L. BOYONAS, MAEng"; // Reset to default if empty
    }
}

// generateCertificates function here
async function generateCertificates() {
    const container = document.getElementById("certificates-container");
    container.innerHTML = ""; // Clear existing certificates

    const selectedComponent = document.getElementById("components").value; // Get selected component
    const selectedAY = document.getElementById("selectAY").value; // Get selected Academic Year
    const selectedProgram = document.getElementById("program").value; // Get selected program
    const students = await fetchStudents(); // Fetch student data

    // Get the date of release and coordinator from the inputs
    const dateOfReleaseInput = document.getElementById("daterelease").value;
    const coordinatorInput = document.getElementById("coordinator").value;

    // Format the date of release for display
    const formattedDate = dateOfReleaseInput ? formatDate(dateOfReleaseInput) : '';

    students.forEach(student => {
        let certificateHTML = '';

        // Check if the selected academic year matches or if 'All' is selected
        if ((selectedAY === "-All Academic Year-" || student.academicyear2 === selectedAY) &&
            (selectedProgram === "All" || student.program === selectedProgram)) {

            // CWTS Certificate Condition
            if (student.semester1 === "CWTS1" && student.semester2 === "CWTS2") {
                if (selectedComponent === "CWTS" || selectedComponent === "All") {
                    certificateHTML = `
                    <div class="certificate-wrapper">
                        <div class="certificate-container">
                            <img src="../assets/img/nstplogo.png" alt="QR Code" class="qr-code">
                            <div class="text-container title">
                                Republic of the Philippines<br>
                                <strong style="font-family: Times New Roman, Times, serif; color:  #002F6C; font-size: 20px;">NORTHERN BUKIDNON STATE COLLEGE</strong><br>
                                Manolo Fortich, 8703, Bukidnon <br>
                                <small style="font-family: Brush Script MT, cursive; color: gold; font-size: 18px; word-spacing: 1.5;">Creando Futura, Transformationis Vitae, Ductae a Deo</small>
                            </div>
                            <div class="text-container subtitle">
                                NATIONAL SERVICE TRAINING PROGRAM<br>
                                <i style="font-family: Brush Script MT, cursive; color: #cc0000; font-size: 26px; word-spacing: 1.5; font-weight: normal;">Civic Welfare Training Service</i>
                            </div>
                            <div class="text-container completion-text">
                                CERTIFICATE OF <br>
                                <span style="font-family: Brush Script MT, cursive; color: #cc0000; font-size: 60px; margin-left: 18%;">Completion</span><br>
                                <i style="margin-left: 42%;">is presented to</i>
                            </div>
                            <div class="text-container recipient-name">
                                ${student.firstname} ${student.middlename} ${student.lastname} ${student.suffixname}
                            </div>
                            <div class="text-container serial-number">
                                NSTP-CWTS SERIAL NUMBER:  
                                <strong style="color: black;">${student.serialnumber}</strong>
                            </div>
                            <div class="text-container details">
                                for successfully completing the course required for<br>
                                <strong style="color: #cc0000; font-size: 20px font-weight: bold;">NATIONAL SERVICE TRAINING PROGRAM</strong><br>
                                <i style="color: #cc0000; font-size: 17px font-weight: bold;">Civic Welfare Training Service</i><br>
                                for the academic year <i style="font-weight: bold;">${student.academicyear2}</i>.
                            </div>
                            <div class="coordinator">
                                Given this <i style="font-weight: bold;">${formattedDate}</i> at Northern Bukidnon State College,<br>
                                Kihare, Manolo Fortich, Bukidnon.<br><br>
                                <strong style="text-decoration: underline; font-size: 22px;">${coordinatorInput}</strong><br>
                                Coordinator, National Service Training Program
                            </div>
                        </div>
                    </div>`;
                }
            }

            // ROTC Certificate Condition
            else if (student.semester1 === "ROTC1" && student.semester2 === "ROTC2") {
                if (selectedComponent === "ROTC" || selectedComponent === "All") {
                    certificateHTML = `
                    <div class="certificate-wrapper">
                        <div class="certificate-container" style="background-image: url('../assets/img/rotccert.png');">
                            <img src="../assets/img/nstplogo.png" alt="QR Code" class="qr-code">
                            <div class="text-container title">
                                Republic of the Philippines<br>
                                <strong style="font-family: Times New Roman, Times, serif; color:  #002F6C; font-size: 20px;">NORTHERN BUKIDNON STATE COLLEGE</strong><br>
                                Manolo Fortich, 8703, Bukidnon <br>
                                <small style="font-family: Brush Script MT, cursive; color: gold; font-size: 18px; word-spacing: 1.5;">Creando Futura, Transformationis Vitae, Ductae a Deo</small>
                            </div>
                            <div class="text-container subtitle">
                                NATIONAL SERVICE TRAINING PROGRAM<br>
                                <i style="font-family: Brush Script MT, cursive; color: #cc0000; font-size: 26px; word-spacing: 1.5; font-weight: normal;">Reserve Officers Training Corps</i>
                            </div>
                            <div class="text-container completion-text">
                                CERTIFICATE OF <br>
                                <span style="font-family: Brush Script MT, cursive; color: #cc0000; font-size: 60px; margin-left: 18%;">Completion</span><br>
                                <i style="margin-left: 42%;">is presented to</i>
                            </div>
                            <div class="text-container recipient-name">
                                ${student.firstname} ${student.middlename} ${student.lastname} ${student.suffixname}
                            </div>
                            <div class="text-container serial-number">
                                NSTP-ROTC SERIAL NUMBER:  
                                <strong style="color: black;">${student.serialnumber}</strong>
                            </div>
                            <div class="text-container details">
                                for successfully completing the course required for<br>
                                <strong style="color: #cc0000; font-size: 20px font-weight: bold;">NATIONAL SERVICE TRAINING PROGRAM</strong><br>
                                <i style="color: #cc0000; font-size: 17px font-weight: bold;">Reserve Officers Training Corps</i><br>
                                for the academic year <i style="font-weight: bold;">${student.academicyear2}</i>.
                            </div>
                            <div class="coordinator">
                                Given this <i style="font-weight: bold;">${formattedDate}</i> at Northern Bukidnon State College,<br>
                                Kihare, Manolo Fortich, Bukidnon.<br><br>
                                <strong style="text-decoration: underline; font-size: 22px;">${coordinatorInput}</strong><br>
                                Coordinator, National Service Training Program
                            </div>
                        </div>
                    </div>`;
                }
            }

            // Return the generated certificate HTML
            container.innerHTML += certificateHTML; // Append the generated certificate to the container
        }
    });
}


// Event listener for both components, Academic Year, and program dropdown
document.getElementById("components").addEventListener("change", generateCertificates);
document.getElementById("selectAY").addEventListener("change", generateCertificates);
document.getElementById("program").addEventListener("change", generateCertificates);


// Initial call to generate certificates on page load
generateCertificates();
</script>

<script>
$(document).ready(function() {
    // Trigger the print function on button click
    $('.btn-outline-primary').click(function() {
        openPrintWindow(); // Call the function to open the print window
    });
    function openPrintWindow() {
    var tableHeaders = document.querySelector('#tblmasterlist thead').innerHTML; 
    var rows = document.querySelectorAll('#tblmasterlist tbody tr');
    var newTableBody = '';
    var headerHtml = '';

    // Create updated headers excluding "No.", "Edit", and "Import" columns
    var headerCells = document.querySelectorAll('#tblmasterlist thead th');
    headerCells.forEach((cell, index) => {
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