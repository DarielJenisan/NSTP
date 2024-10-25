<style>

.header {
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 20px;
}

.logo-left {
    width: 70px;
    height: auto;
    margin-left: 50px;
}

.logo-right {
    width: 100px;
    height: auto;
    margin-right: 50px;
}

.header-text {
    text-align: center;
    flex-grow: 1;
}

.header-text h5,
.header-text h6 {
    margin: 0;
    line-height: 1;
    font-size: 16px;
    font-family: 'Arial', sans-serif;
}

.header-text p {
    margin: 5px 0;
    line-height: 1;
    font-size: 14px;
    font-family: 'Arial', sans-serif;
}

.form-row {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 15px;
}

.form-group-2 {
    width: 45%;
}

.form-group-2 label {
    display: block;
    margin-bottom: 5px;
}

.static-text {
    font-size: 12px;
    font-weight: bold;
    text-align: justify;
    width: 100%;
    padding: 5px;
    box-sizing: border-box;
    appearance: none;
}

.photo-box {
    border: 1px solid #ccc;
    width: 144px;
    height: 144px;
    display: flex;
    justify-content: center;
    align-items: center;
    margin: 0 auto;
}

.photo-box img {
    max-width: 100%;
    max-height: 100%;
    border-radius: 50%;
}

.table-container {
    width: 100%;
    display: flex;
    justify-content: center;
    margin-top: 20px;
}

table {
    border-collapse: collapse;
    width: 80%;
    margin: 0 auto;
    text-align: center;
}

th, td {
    padding: 10px;
    border: 1px solid #ccc;
}

.qr-code-box {
    margin-top: 10px;
}

.qr-box {
    display: inline-block;
    border: 1px solid #ccc;
    width: 140px;
    height: 140px;
    padding: 10px;
}

.qr-box img {
    max-width: 100%;
    max-height: 100%;
    display: block;
    margin: 0 auto;
}

.footer {
    text-align: center;
    margin-top: 100px;
}

.signature-line {
    margin-top: 0;
    text-align: center;
    border-top: 1px solid #000;
    width: 200px;
    margin-left: auto;
    margin-right: auto;
    padding-top: 0;
}

@media print {
    .container {
        width: auto;
        height: auto;
        box-shadow: none;
        margin: 0;
        padding: 0;
        border-radius: 0;
        page-break-after: always;
    }

    .footer {
        margin-top: 50px;
    }

    @media screen and (max-width: 768px) {
    .header {
        flex-direction: column; /* Stack elements vertically */
        align-items: center;    /* Center align elements */
    }

    .logo-left, .logo-right {
        width: 60px; /* Adjust image size for smaller screens */
    }

    .header-text h5, .header-text h6 {
        font-size: 16px; /* Reduce font size for smaller screens */
    }

    .header-text p {
        font-size: 12px; /* Reduce paragraph font size */
    }
}

/* For even smaller screens (like phones with <576px width) */
@media screen and (max-width: 576px) {
    .logo-left, .logo-right {
        width: 50px; /* Further reduce logo size for very small screens */
    }

    .header-text h5, .header-text h6 {
        font-size: 14px; /* Further reduce text size */
    }

    .header-text p {
        font-size: 10px; /* Adjust paragraph font size */
    }
}
}
</style>

<!-- Student Profile Content -->
<div class="container">
    <div class="text-center my-3">
        <h2>NSTP Student Profile</h2> 
        <div id="qrcode" style="position: relative; display: inline-block;">
        <img id="qr-logo" src="../assets/img/nstplogo.png" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); width: 30px; height: 30px;">
    </div>
</div>


    <!-- School ID and Photo -->
    <div class="form-row">
        <div class="form-group-2">
            <label for="StudentID">School ID:</label>
            <div id="StudentID" class="static-text">123456</div>
        </div>
    </div>

    <!-- Name and Serial No -->
    <div class="form-row mt-3">
        <div class="form-group-2">
            <label for="fullname">Name:</label>
            <div id="fullname" class="static-text">John A. Doe</div>
        </div>
        <div class="form-group-2">
            <label for="serialNo">Serial No:</label>
            <div id="serialNo" class="static-text">78910</div>
        </div>
    </div>

    <!-- Birthday and Gender -->
    <div class="form-row mt-3">
        <div class="form-group-2">
            <label for="dateofbirth">Birthday:</label>
            <div id="dateofbirth" class="static-text">January 1, 2000</div>
        </div>
        <div class="form-group-2">
            <label for="sex">Gender:</label>
            <div id="sex" class="static-text">Male</div>
        </div>
    </div>

    <!-- Course and Major -->
    <div class="form-row mt-3">
        <div class="form-group-2">
            <label for="course">Course:</label>
            <div id="course" class="static-text">Bachelor of Science</div>
        </div>
        <div class="form-group-2">
            <label for="coursemajor">Major:</label>
            <div id="coursemajor" class="static-text">Computer Science</div>
        </div>
    </div>

    <!-- Address and Contact No -->
    <div class="form-row mt-3">
        <div class="form-group-2">
            <label for="address">Address:</label>
            <div id="address" class="static-text">Barangay 123, Municipality XYZ, Province ABC</div>
        </div>
        <div class="form-group-2">
            <label for="contactNo">Contact No:</label>
            <div id="contactNo" class="static-text">09171234567</div>
        </div>
    </div>

    <!-- Email Address -->
    <div class="form-row mt-3">
        <div class="form-group-2">
            <label for="emailAddress">Email:</label>
            <div id="emailAddress" class="static-text">john.doe@example.com</div>
        </div>
    </div>

    <!-- NSTP Completed Component -->
    <div class="text-center mt-5">
        <h5>NSTP Completed Component</h5>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered mt-3">
            <thead>
                <tr>
                    <th>NSTP</th>
                    <th>Academic Year</th>
                    <th>School</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td id="nstpsemester1">ROTC</td>
                    <td id="schoolyear1">2022-2023</td>
                    <td id="schoolname1">Northern Bukidnon State College</td>
                    <td id="status1">Complete</td>
                </tr>
                <tr>
                    <td id="nstpsemester2">CWTS</td>
                    <td id="schoolyear2">2023-2024</td>
                    <td id="schoolname2">Northern Bukidnon State College</td>
                    <td id="status2">Complete</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>




<script>
    function loadStudentProfile() {
        $.ajax({
            url: '../nav_student/studentreg/components/fetch_student_profile.php',
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                if (response.status === 'success') {
                    const student = response.data;

                    // Display student basic information
                    $('#StudentID').text(student.student_id);
                    $('#fullname').text(
                        student.firstname + ' ' + 
                        (student.middlename ? student.middlename.charAt(0) + '. ' : '') + 
                        student.lastname + ' ' + 
                        student.suffixname
                    );
                    $('#dateofbirth').text(student.birthday);
                    $('#serialNo').text(student.serialnumber);
                    $('#sex').text(student.gender);
                    $('#address').text(student.barangay + ', ' + student.municipality + ', ' + student.province);
                    $('#course').text(student.department);
                    $('#coursemajor').text(student.major);
                    $('#contactNo').text(student.contactnumber);
                    $('#emailAddress').text(student.email);

                    // Display NSTP details for semester 1
                    $('#nstpsemester1').text(student.semester1 || 'N/A');
                    $('#schoolyear1').text(student.academicyear1 || 'N/A');
                    $('#schoolname1').text(student.school1 || 'N/A');
                    $('#status1').text(student.status_semester1 || 'N/A');

                    // Display NSTP details for semester 2
                    $('#nstpsemester2').text(student.semester2 || 'N/A');
                    $('#schoolyear2').text(student.academicyear2 || 'N/A');
                    $('#schoolname2').text(student.school2 || 'N/A');
                    $('#status2').text(student.status_semester2 || 'N/A');

                    // Generate the QR code with student data
                    generateQRCode(student);
                } else {
                    alert(response.message);
                }
            },
            error: function(error) {
                console.log(error);
                alert('Error fetching student profile.');
            }
        });
    }

    // Call the function to load the student profile when the page loads
    $(document).ready(loadStudentProfile);
</script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>
<script>
  function generateQRCode(student) {
    const studentId = student.student_id; // Assuming student ID is available
    const url = "https://nbsc.edu.ph/sis/index.php"; // Link to the profile page

    const qrCode = new QRCode(document.getElementById("qrcode"), {
        text: url,
        width: 140,
        height: 140,
    });

    // Optionally, add the logo back after generating the QR code
    $('#qrcode').append('<img id="qr-logo" src="../assets/img/nstplogo.png" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); width: 30px; height: 30px;">');
}

</script>
