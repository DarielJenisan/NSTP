<style>
.container {
    width: 794px; /* A4 paper width in pixels at 96 DPI */
    height: 1000px; /* A4 paper height in pixels at 96 DPI */
    margin: 20px auto;
    padding: 20px;
    background-color: white;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    position: relative;
}

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
}

    </style>
<!-- Modal structure -->
<div class="modal fade" id="studentProfileModal" tabindex="-1" aria-labelledby="studentProfileModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" style="max-width: 820px;">
    <div class="modal-content" style="background-color: transparent; border: none; box-shadow: none;">
      <div class="modal-header" style="background-color: transparent; border: none; box-shadow: none;">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="background-color: transparent; border: none; box-shadow: none; filter: invert(1);"></button>
      </div>
      <div class="modal-body" id="studentProfile" style="background-color: transparent; border: none; box-shadow: none; padding: 0;">
        <div class="container">
          <div class="header d-flex justify-content-between align-items-center">
            <img src="../assets/img/nbsclogo.png" alt="NSTP Logo" class="logo-left">
            <div class="header-text text-center">
              <p>Republic of the Philippines</p>
              <h5>NORTHERN BUKIDNON STATE COLLEGE</h5>
              <p>(Formerly Northern Bukidnon State College) R.A. 11284</p>
              <p>Manolo Fortich Bukidnon • (088)5373185+</p>
              <h5>NATIONAL SERVICE TRAINING PROGRAM</h5>
              <h6>ROTC • CWTS</h6>
            </div>
            <img src="../assets/img/nstplogo.png" alt="NBSC Logo" class="logo-right">
          </div>

          <div class="text-center my-3">
            <h2>NSTP Student Profile</h2>
          </div>

          <!-- School ID and Photo -->
          <div class="form-row">
            <div class="form-group-2">
              <label for="StudentID">School ID:</label>
              <div id="StudentID" class="static-text">123456</div>
            </div>
            <div class="photo-box border p-3 text-center">
              <img id="studentPhoto" src="../assets/img/nstplogo.png" alt="Student Photo">
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
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td id="nstpsemester1">ROTC</td>
                  <td id="schoolyear1">2022-2023</td>
                  <td id="schoolname1">Northern Bukidnon State College</td>
                </tr>
                <tr>
                  <td id="nstpsemester2">CWTS</td>
                  <td id="schoolyear2">2023-2024</td>
                  <td id="schoolname2">Northern Bukidnon State College</td>
                </tr>
              </tbody>
            </table>
          </div>


        </div>
      </div>

      <!-- Modal Footer -->
      <div class="modal-footer" style="background-color: transparent; border: none; box-shadow: none;">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
</div>

    </div>
  </div>
</div>


<script>
   function loadStudentProfile() {
    $.ajax({
        url: '../nav_student/studentreg/components/fetch_student_profile.php',  // Update with the actual path to the PHP file
        type: 'GET',
        dataType: 'json',
        success: function(response) {
            if (response.status === 'success') {
                const student = response.data;
                
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
                $('#nstpsemester1').text(student.semester1 || 'N/A');
                $('#schoolyear1').text(student.academicyear1 || 'N/A');
                $('#schoolname1').text(student.school1 || 'N/A');
                $('#nstpsemester2').text(student.semester2 || 'N/A');
                $('#schoolyear2').text(student.academicyear2 || 'N/A');
                $('#schoolname2').text(student.school2 || 'N/A');

                // Show the modal
                $('#studentProfileModal').modal('show');
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

</script>