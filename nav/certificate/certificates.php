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
                <label for="department">Program</label>
                <select class="form-control" id="department" onchange="filterData()">
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
                <button class="btn btn-primary w-100 btn-block mt-2"><i class="fa fa-print"></i> Print</button>
            </div>
        </div>
    </div>
</div>

            <div class="certificates" style="margin-left: 150px;">
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
    const selectedDepartment = document.getElementById("department").value; // Get selected department
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
            (selectedDepartment === "All" || student.department === selectedDepartment)) {

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


// Event listener for both components, Academic Year, and department dropdown
document.getElementById("components").addEventListener("change", generateCertificates);
document.getElementById("selectAY").addEventListener("change", generateCertificates);
document.getElementById("department").addEventListener("change", generateCertificates);


// Initial call to generate certificates on page load
generateCertificates();
</script>

<script>
    $(document).ready(function() {
    // Trigger the print function on button click
    $('.btn-primary').click(function() {
        openPrintWindow(); // Call the function to open the print window
    });

    function openPrintWindow() {
        var certificatesContainer = document.getElementById("certificates-container");
        var certificateHTML = certificatesContainer.innerHTML;

        // Prepare the content to be printed in a new window
        var printContents = `
            <head>
                <title>Print Certificates</title>
                <style>
                    @page { 
                        size: portrait; 
                        margin: 10mm; /* Adjust page margins */
                    }
                    body {
                        -webkit-print-color-adjust: exact; /* Ensure that background colors/images are printed */
                        print-color-adjust: exact;
                    }
                    .certificate-wrapper {
                        width: 100%;
                        page-break-inside: avoid; /* Prevents splitting certificates across pages */
                        margin-bottom: 0;
                        padding: 0;
                        box-sizing: border-box;
                    }

                    .certificate-container {
                        width: 900px; /* Adjust the width */
                        height: 600px; /* Adjust the height */
                        background-color: white;
                        background-image: url('../assets/img/cwtscert.png');
                        background-size: 900px 600px;
                        background-position: center;
                        position: relative;
                        padding: 20px;
                        border: 1px solid #ddd;
                        margin: 0 auto; /* Center horizontally */
                        box-sizing: border-box;
                    }

                    /* ROTC specific background */
                    .rotc-bg {
                        background-image: url('../assets/img/rotccert.png');
                    }

                    .qr-code {
                        position: absolute;
                        bottom: 40px;
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
                        color: black;
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
                        color: #002F6C; /* Blue color for 'Completion' */
                        font-family: "Times New Roman", Times, serif;
                        text-align: left;
                        margin-left: 20%;
                        line-height: 0.25;
                    }

                    .recipient-name {
                        top: 260px;
                        font-size: 24px;
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

                    /* Ensure two certificates fit on one page */
                    .certificate-wrapper:nth-child(odd) {
                        margin-bottom: 20px; /* Add space between certificates */
                    }

                    /* Hide the print button during printing */
                    @media print {
                        .print-button {
                            display: none;
                        }

                        .certificate-wrapper {
                            margin-bottom: 5px; /* Ensure no margin when printing */
                        }
                    }
                </style>
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
            </head>

            <body>
                <button onclick="window.print()" class="print-button">🖨️ Print Certificates</button>
                ${certificateHTML}
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