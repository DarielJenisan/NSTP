<!-- Modal for Updating Student Information -->
<div class="modal fade" id="updateStudentModal" tabindex="-1" role="dialog" aria-labelledby="updateStudentModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document"> <!-- Use modal-xl for landscape layout -->
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="updateStudentModalLabel">Update Student Information</h5>
        <button type="button" class="close"  data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="updateStudentForm">
          <div class="row">
            <!-- Student Information Column -->
            <div class="col-md-3">
              <h6 class="mb-3"><strong>Student Information</strong></h6>
              <div class="form-group">
                <label for="studentID">Student ID</label>
                <input type="text" class="form-control" id="studentID" name="studentID" readonly>
              </div>
              <div class="form-group">
                <label for="lastname">Last Name</label>
                <input type="text" class="form-control" id="lastname" name="lastname" required>
              </div>
              <div class="form-group">
                <label for="firstname">First Name</label>
                <input type="text" class="form-control" id="firstname" name="firstname" required>
              </div>
              <div class="form-group">
                <label for="middlename">Middle Name</label>
                <input type="text" class="form-control" id="middlename" name="middlename">
              </div>
              <div class="form-group">
                <label for="nameExtension">Name Extension</label>
                <input type="text" class="form-control" id="nameExtension" name="nameExtension">
              </div>
              <div class="form-group">
                <label for="gender">Gender</label>
                <select class="form-control" id="gender" name="gender">
                  <option value="MALE">MALE</option>
                  <option value="FEMALE">FEMALE</option>
                </select>
              </div>
              <div class="form-group">
                <label for="dateOfBirth">Date of Birth</label>
                <input type="date" class="form-control" id="dateOfBirth" name="dateOfBirth">
              </div>
              <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email">
              </div>
              <div class="form-group">
                <label for="contactNumber">Contact Number</label>
                <input type="text" class="form-control" id="contactNumber" name="contactNumber">
              </div>
              <div class="form-group">
                <label for="barangay">Barangay</label>
                <input type="text" class="form-control" id="barangay" name="barangay">
              </div>
              <div class="form-group">
                <label for="municipality">Municipality</label>
                <input type="text" class="form-control" id="municipality" name="municipality">
              </div>
              <div class="form-group">
                <label for="province">Province</label>
                <input type="text" class="form-control" id="province" name="province">
              </div>
              <div class="form-group">
                <label for="yearlevel">Year Level</label>
                <input type="text" class="form-control" id="yearlevel" name="yearlevel">
              </div>
              <div class="form-group">
                <label for="program">Program</label>
                <input type="text" class="form-control" id="program" name="program">
              </div>
              <div class="form-group">
                <label for="major">Major</label>
                <input type="text" class="form-control" id="major" name="major">
              </div>
              <div class="form-group">
                <label for="serialNumber">Serial Number</label>
                <input type="text" class="form-control" id="serialNumber" name="serialNumber">
              </div>
            </div>
           
            <!-- NSTP 1 Information Column -->
            <div class="col-md-3">
              <h6 class="mb-3"><strong>NSTP 1 Information</strong></h6>
              <div class="form-group">
                <label for="nstp1">NSTP 1 Component</label>
                <select class="form-control" id="nstp1" name="nstp1">
                  <option value="ROTC1">ROTC1</option>
                  <option value="CWTS1">CWTS1</option>
                  <option value="">N/A</option>
                </select>
              </div>
              <div class="form-group">
                <label for="school1">School (NSTP1)</label>
                <input type="text" class="form-control" id="school1" name="school1">
              </div>
              <div class="form-group">
                <label for="academicyear1">Year Taken (NSTP1)</label>
                <input type="text" class="form-control" id="academicyear1" name="academicyear1">
              </div>
              <div class="form-group">
                <label for="sectionCode1">Section Code (NSTP1)</label>
                <input type="text" class="form-control" id="sectionCode1" name="sectionCode1">
              </div>
            </div>

            <!-- NSTP 2 Information Column -->
            <div class="col-md-3">
              <h6 class="mb-3"><strong>NSTP 2 Information</strong></h6>
              <div class="form-group">
                <label for="nstp2">NSTP 2 Component</label>
                <select class="form-control" id="nstp2" name="nstp2">
                  <option value="ROTC2">ROTC2</option>
                  <option value="CWTS2">CWTS2</option>
                  <option value="">N/A</option>
                </select>
              </div>
              <div class="form-group">
                <label for="school2">School (NSTP2)</label>
                <input type="text" class="form-control" id="school2" name="school2">
              </div>
              <div class="form-group">
                <label for="academicyear2">Year Taken (NSTP2)</label>
                <input type="text" class="form-control" id="academicyear2" name="academicyear2">
              </div>
              <div class="form-group">
                <label for="sectionCode2">Section Code (NSTP2)</label>
                <input type="text" class="form-control" id="sectionCode2" name="sectionCode2">
              </div>
            </div>

             <!-- Remarks -->
             <div class="col-md-3">
              <h6 class="mb-3"><strong>Remarks</strong></h6>
              <div class="form-group">
                <label for="remarks">Remarks</label>
                <input type="text" class="form-control" id="remarks" name="remarks">
              </div>
              <h6 class="mb-3"><strong><br><br>Other Information</strong></h6>
              <div class="form-group">
                <label for="component">Component</label>
                <select class="form-control" id="component" name="component">
                  <option value="ROTC">ROTC</option>
                  <option value="CWTS">CWTS</option>
                  <option value="">N/A</option>
                </select>
              </div>
              <div class="form-group">
                <label for="awardyear">Award Year</label>
                <input type="text" class="form-control" id="awardyear" name="awardyear">
              </div>
              <div class="form-group">
                <label for="institutionCode">Institution Code</label>
                <input type="text" class="form-control" id="institutionCode" name="institutionCode">
              </div>
              <div class="form-group">
                <label for="agencyType">Agency Type</label>
                <input type="text" class="form-control" id="agencyType" name="agencyType">
              </div>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary"  data-bs-dismiss="modal">Close</button>
        <button type="submit" form="updateStudentForm" class="btn btn-sm btn-primary">Save Changes</button>
      </div>
    </div>
  </div>
</div>

<script>
     // Function to load student data into the modal
  function loadUpdateStudent(student_id, lastname, firstname, middlename, suffixname, gender, semester1, school1,
      academicyear1, sectioncode1, semester2, school2, academicyear2, sectioncode2, serialnumber, remarks, awardyear,
      component, birthday, barangay, municipality, province, institutioncode, agencytype, yearlevel, program, major, 
      email, contactnumber) {
      
        $('#studentID').val(student_id);
    $('#lastname').val(lastname);
    $('#firstname').val(firstname);
    $('#middlename').val(middlename);
    $('#nameExtension').val(suffixname);
    $('#gender').val(gender);
    $('#nstp1').val(semester1);
    $('#school1').val(school1);
    $('#academicyear1').val(academicyear1);
    $('#sectionCode1').val(sectioncode1);
    $('#nstp2').val(semester2);
    $('#school2').val(school2);
    $('#academicyear2').val(academicyear2);
    $('#sectionCode2').val(sectioncode2);
    $('#serialNumber').val(serialnumber);
    $('#remarks').val(remarks);
    $('#awardyear').val(awardyear);
    $('#component').val(component);
    $('#dateOfBirth').val(birthday);
    $('#barangay').val(barangay);
    $('#municipality').val(municipality);
    $('#province').val(province);
    $('#institutionCode').val(institutioncode);
    $('#agencyType').val(agencytype);
    $('#yearlevel').val(yearlevel);
    $('#program').val(program);
    $('#major').val(major);
    $('#email').val(email);
    $('#contactNumber').val(contactnumber);
      
      $('#updateStudentModal').modal('show');
  }

  // Function to handle form submission
  $('#updateStudentForm').submit(function (e) {
      e.preventDefault(); // Prevent default form submission
      updateStudent(); // Call the function to update the student
  });

  // Function to update student data
  function updateStudent() {
      $.post("../nav/student_list/actions/update_student.php", {
          student_id: $('#studentID').val(),
          lastname: $('#lastname').val(),
          firstname: $('#firstname').val(),
          middlename: $('#middlename').val(),
          suffixname: $('#nameExtension').val(),
          gender: $('#gender').val(),
          semester1: $('#nstp1').val(),
          school1: $('#school1').val(),
          academicyear1: $('#academicyear1').val(),
          sectioncode1: $('#sectionCode1').val(),
          semester2: $('#nstp2').val(),
          school2: $('#school2').val(),
          academicyear2: $('#academicyear2').val(),
          sectioncode2: $('#sectionCode2').val(),
          serialnumber: $('#serialNumber').val(),
          remarks: $('#remarks').val(),
          awardyear: $('#awardyear').val(),
          component: $('#component').val(),
          birthday: $('#dateOfBirth').val(),
          barangay: $('#barangay').val(),
          municipality: $('#municipality').val(),
          province: $('#province').val(),
          institutioncode: $('#institutionCode').val(),
          agencytype: $('#agencyType').val(),
          yearlevel: $('#yearlevel').val(),
          program: $('#program').val(),
          major: $('#major').val(),
          email: $('#email').val(),
          contactnumber: $('#contactNumber').val()
      })
      .done(function(response) {
          alert('Student information updated successfully!');
          $('#updateStudentModal').modal('hide');
          loadStudentTable();  // Ensure this function is defined elsewhere
      })
      .fail(function(xhr, status, error) {
          alert('An error occurred: ' + xhr.responseText);
      });
  }

</script>



