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
        background-color: white; /* Background image */
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
        bottom: 50px; /* Position the QR code */
        right: 55px; 
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

    .coordinator-section {
        position: absolute;
        bottom: 65px;
        left: 40px;
        width: 60%;
        display: flex;
        justify-content: space-around; /* Spread the coordinator and commandant evenly */
        text-align: center;
    }

    .coordinator, .commandant1, .commandant2 {
        font-family: "Times New Roman", Times, serif;
        font-size: 12px;
        color: #002F6C;
    }

    .commandant2-container {
        position: absolute;
        bottom: 10px; /* Adjust the position slightly lower than Coordinator and Commandant 1 */
        left: 35%;
        transform: translateX(-50%); /* Center between Coordinator and Commandant 1 */
        text-align: center;
        width: 50%;
    }

    .coordinator-name, .commandant1-name, .commandant2-name {
        text-decoration: underline;
        font-size: 14px;
        font-weight: bold;
    }
</style>

    <!-- CWTS Certificate Modal -->
<div class="modal fade" id="cwtscertificateModal" tabindex="-1" aria-labelledby="certificateModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sl" style="max-width: 930px;">
    <div class="modal-content" style="background-color: transparent; border: none; box-shadow: none;">
      <div class="modal-header" style="background-color: transparent; border: none; box-shadow: none;">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="background-color: transparent; border: none; box-shadow: none; filter: invert(1);"></button>
      </div>
      <div class="modal-body centered-content" style="background-color: transparent; border: none; box-shadow: none; padding: 0;">

        <div class="certificate-container" id="modalCWTSCertificate" style="background-image: url('../assets/img/cwtscert.png');">

        <div class="qr-code" id="certificate-qrcode-cwts">
        <img src="../assets/img/nstplogo.png" alt="Logo" id="qr-logo" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); width: 30px; height: 30px; z-index: 10;">
        </div>

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

          <div class="text-container recipient-name" id="cwts_studentname">
              <!-- Recipient's Name will be injected here by JavaScript -->
          </div>

          <div class="text-container serial-number">
              NSTP-CWTS SERIAL NUMBER:  
              <strong style="color: black;" id="cwts_serialnumber"><!-- Serial number here --></strong>
          </div>

          <div class="text-container details">
              for successfully completing the course required for<br>
              <strong style="color: #cc0000; font-size: 20px font-weight: bold;">NATIONAL SERVICE TRAINING PROGRAM</strong><br>
              <i style="color: #cc0000; font-size: 17px font-weight: bold;">Civic Welfare Training Service</i><br>
              for the academic year <i style="font-weight: bold;" id="cwts_academicyear">2023-2024</i>.
              <br> <br>
              <p>Given this <i style="font-weight: bold;" id="cwts_daterelease">29th day of May, 2024</i>  at Northern Bukidnon State College,<br>
              Kihare, Manolo Fortich, Bukidnon.<br><br>
              </p>
          </div>

          <div class="coordinator-section">
    <div class="coordinator">
        <strong class="coordinator-name" id="cwts_coordinator" placeholder="adsdsfsfdsfsd">JOHN MARK L. BOYONAS, MAEng</strong><br>
        <p  id="cwts_coor_position">Coordinator, National Service Training Program</p>
    </div>
    <div class="commandant1">
        <strong class="commandant1-name" id="cwts_commandant1">JANE DOE, PhD</strong><br>
        <p  id="cwts_command_position1">Commandant 1 </p>
    </div>
</div>
<div class="commandant2-container">
    <div class="commandant2">
        <strong class="commandant2-name" id="cwts_commandant2">MICHAEL SMITH, MA</strong><br>
        <p  id="cwts_command_position2">Commandant 2 </p>
    </div>
</div>

        </div>
      </div>
      <div class="modal-footer" style="background-color: transparent; border: none; box-shadow: none;">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa fa-close"></i> Close</button>
        <button type="button" class="btn btn-light"><i class="fa fa-edit"></i> Edit</button>
        <div class="dropup profile-button-container">
    <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
       <i class="fa fa-download"></i> Download
    </button>
    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        <li><a class="dropdown-item" href="#" id="png"><i class="fa fa-image"></i> as PNG</a></li>
        <li><a class="dropdown-item" href="#" id="pdf"><i class="fa fa-file-pdf"></i> as PDF</a></li>
    </ul>
</div>
        <button type="button" class="btn btn-primary print-certificate-btn" data-certificate="cwts"><i class="fa fa-print"></i> Print Certificate</button>
      </div>
    </div>
  </div>
</div>

 <!-- ROTC Certificate Modal -->
 <div class="modal fade" id="rotccertificateModal" tabindex="-1" aria-labelledby="certificateModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sl" style="max-width: 930px;">
    <div class="modal-content" style="background-color: transparent; border: none; box-shadow: none;">
      <div class="modal-header" style="background-color: transparent; border: none; box-shadow: none;">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="background-color: transparent; border: none; box-shadow: none; filter: invert(1);"></button>
      </div>
      <div class="modal-body centered-content" style="background-color: transparent; border: none; box-shadow: none; padding: 0;">

        <div class="certificate-container" style="background-image: url('../assets/img/rotccert.png');" id="modalROTCCertificate">

          <div class="qr-code" id="certificate-qrcode-rotc">
          <img src="../assets/img/nstplogo.png" alt="Logo" id="qr-logo" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); width: 30px; height: 30px; z-index: 10;">
          </div>

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

          <div class="text-container recipient-name" id="rotc_studentname">
              <!-- Recipient's Name will be injected here by JavaScript -->
          </div>

          <div class="text-container serial-number">
              NSTP-ROTC SERIAL NUMBER:  
              <strong style="color: black;" id="rotc_serialnumber"><!-- Serial number here --></strong>
          </div>

          <div class="text-container details">
              for successfully completing the course required for<br>
              <strong style="color: #cc0000; font-size: 20px font-weight: bold;">NATIONAL SERVICE TRAINING PROGRAM</strong><br>
              <i style="color: #cc0000; font-size: 17px font-weight: bold;">Reserve Officers Training Corps</i><br>
              for the academic year <i style="font-weight: bold;" id="rotc_academicyear">2023-2024</i>.
              <br> <br>
              <p>Given this <i style="font-weight: bold;" id="rotc_daterelease">29th day of May, 2024</i>  at Northern Bukidnon State College,<br>
              Kihare, Manolo Fortich, Bukidnon.<br><br>
              </p>
          </div>

          <div class="coordinator-section">
    <div class="coordinator">
        <strong class="coordinator-name" id="rotc_coordinator">JOHN MARK L. BOYONAS, MAEng</strong><br>
        <p id="rotc_coor_position">Coordinator, National Service Training Program </p>
    </div>
    <div class="commandant1">
        <strong class="commandant1-name" id="rotc_commandant1">JANE DOE, PhD</strong><br>
        <p id="rotc_command_position1"> Commandant 1 </p>
    </div>
</div>
<div class="commandant2-container">
    <div class="commandant2">
        <strong class="commandant2-name" id="rotc_commandant2">MICHAEL SMITH, MA</strong><br>
        <p id="rotc_command_position2">Commandant 2 </p>
    </div>
</div>

        </div>
      </div>
      <div class="modal-footer" style="background-color: transparent; border: none; box-shadow: none;">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa fa-close"></i> Close</button>
        <button type="button" class="btn btn-light"><i class="fa fa-edit"></i> Edit</button>
        <div class="dropup profile-button-container">
    <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
      <i class="fa fa-download"></i>  Download
    </button>
    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        <li><a class="dropdown-item" href="#" id="png"><i class="fa fa-image"></i> as PNG</a></li>
        <li><a class="dropdown-item" href="#" id="pdf"><i class="fa fa-file-pdf"></i> as PDF</a></li>
    </ul>
  </div>
        <button type="button" class="btn btn-primary print-certificate-btn" data-certificate="rotc"><i class="fa fa-print"></i> Print Certificate</button>
      </div>
    </div>
  </div>
</div>

<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editModalLabel">Edit Certificate Information</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="editForm">
          <div class="mb-3">
            <label for="edit_daterelease" class="form-label">Date of Release</label>
            <input type="date" class="form-control" id="edit_daterelease" name="daterelease" required>
          </div>
          <div class="mb-3">
            <label for="edit_coordinator" class="form-label">Coordinator</label>
            <input type="text" class="form-control" id="edit_coordinator" name="coordinator" required>
          </div>
          <div class="mb-3">
            <label for="edit_coor_position" class="form-label">Coordinator Position</label>
            <input type="text" class="form-control" id="edit_coor_position" name="coordinator" required>
          </div>
          <div class="mb-3">
            <label for="edit_commandant1" class="form-label">Commandant 1</label>
            <input type="text" class="form-control" id="edit_commandant1" name="coordinator" required>
          </div>
          <div class="mb-3">
            <label for="edit_command_position1" class="form-label">Commandant 1 Position</label>
            <input type="text" class="form-control" id="edit_command_position1" name="coordinator" required>
          </div>
          <div class="mb-3">
            <label for="edit_commandant2" class="form-label">Commandant 2</label>
            <input type="text" class="form-control" id="edit_commandant2" name="coordinator" required>
          </div>
          <div class="mb-3">
            <label for="edit_command_position2" class="form-label">Commandant 2 Position</label>
            <input type="text" class="form-control" id="edit_command_position2" name="coordinator" required>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-primary" id="saveChangesBtn">Save Changes</button>
      </div>
    </div>
  </div>
</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>

<script>
  function generateQRCode(containerId, url) {
    // Ensure the QR code container is empty before generating a new one
    var qrCodeContainer = document.getElementById(containerId);
    qrCodeContainer.innerHTML = ""; // Clear any existing QR code

    // Generate a new QR code with the provided URL
    new QRCode(qrCodeContainer, {
      text: url, // URL to encode in the QR code
      width: 100,  // Adjust size as needed
      height: 100,
      colorDark: "#000000",  // Dark color of the QR code
      colorLight: "#ffffff",  // Light background color
    });

    // Optionally, add the logo back after generating the QR code
    $('#'+containerId).append('<img src="../assets/img/nstplogo.png" alt="Logo" id="qr-logo" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); width: 30px; height: 30px; z-index: 10;">');
  }

  // Call this function when the CWTS modal is opened
  document.getElementById("cwtscertificateModal").addEventListener("show.bs.modal", function() {
    // Replace with the actual link you want to encode for CWTS
    var cwtsCertificateUrl = "https://nbsc.edu.ph/sis"; 
    generateQRCode("certificate-qrcode-cwts", cwtsCertificateUrl); // Call with the CWTS QR code container ID
  });

  // Call this function when the ROTC modal is opened
  document.getElementById("rotccertificateModal").addEventListener("show.bs.modal", function() {
    // Replace with the actual link you want to encode for ROTC
    var rotcCertificateUrl = "https://nbsc.edu.ph/sis"; 
    generateQRCode("certificate-qrcode-rotc", rotcCertificateUrl); // Call with the ROTC QR code container ID
  });
</script>


<script>

  // Function to set default names and positions for the certificate modals
function setDefaultNames() {
    // Default names and positions
    const defaultNames = {
        coordinator: { name: "JOHN MARK L. BOYONAS, MAEng", position: "Coordinator, National Service Training Program" },
        commandant1: { name: "Dariel S. Jenisan", position: "Commandant 1" },
    };

    // Set the default values for CWTS certificate
    document.getElementById("cwts_coordinator").textContent = defaultNames.coordinator.name;
    document.getElementById("cwts_coor_position").textContent = defaultNames.coordinator.position;
    document.getElementById("cwts_commandant1").textContent = defaultNames.commandant1.name;
    document.getElementById("cwts_command_position1").textContent = defaultNames.commandant1.position;

    // Set the default values for ROTC certificate
    document.getElementById("rotc_coordinator").textContent = defaultNames.coordinator.name;
    document.getElementById("rotc_coor_position").textContent = defaultNames.coordinator.position;
    document.getElementById("rotc_commandant1").textContent = defaultNames.commandant1.name;
    document.getElementById("rotc_command_position1").textContent = defaultNames.commandant1.position;
}

// Call the function when the modals are opened
document.getElementById("cwtscertificateModal").addEventListener('show.bs.modal', setDefaultNames);
document.getElementById("rotccertificateModal").addEventListener('show.bs.modal', setDefaultNames);

    // Function to format date into "29th day of May, 2024"
    function formatDate(dateString) {
        const date = new Date(dateString);
        const day = date.getDate();
        const year = date.getFullYear();
        const months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
        const month = months[date.getMonth()];

        // Function to get the ordinal suffix
        function getOrdinalSuffix(day) {
            if (day > 3 && day < 21) return 'th'; // for 11th to 20th
            switch (day % 10) {
                case 1: return 'st';
                case 2: return 'nd';
                case 3: return 'rd';
                default: return 'th';
            }
        }

        const dayWithSuffix = day + getOrdinalSuffix(day);
        return `${dayWithSuffix} day of ${month}, ${year}`;
    }

    function loadCertificate(lastname, firstname, middlename, suffixname, serialnumber, academicyear2, semester1, semester2,
     daterelease, coordinator, coor_position, command1, command_position1, command2, command_position2) {
        const studentName = firstname + ' ' + (middlename ? middlename + ' ' : '') + lastname + ' ' + (suffixname ? suffixname : '');

        // Format the dateRelease using the formatDate function
        const formattedDateRelease = formatDate(daterelease);

        if (semester1 === 'CWTS1' && semester2 === 'CWTS2') {
            $('#cwts_studentname').text(studentName);
            $('#cwts_serialnumber').text(serialnumber);
            $('#cwts_academicyear').text(academicyear2);
            $('#cwts_daterelease').text(formattedDateRelease);
            $('#cwts_coordinator').text(coordinator);
            $('#cwts_coor_position').text(coor_position);
            $('#cwts_commandant1').text(command1);
            $('#cwts_command_position1').text(command_position1);
            $('#cwts_commandant2').text(command2);
            $('#cwts_command_position2').text(command_position2);
            $('#cwtscertificateModal').modal('show');

            $('#cwtscertificateModal .btn-light').off('click').on('click', function () {
                openEditModal();
            });
        } else if (semester1 === 'ROTC1' && semester2 === 'ROTC2') {
            $('#rotc_studentname').text(studentName);
            $('#rotc_serialnumber').text(serialnumber);
            $('#rotc_academicyear').text(academicyear2);
            $('#rotc_daterelease').text(formattedDateRelease);
            $('#rotc_coordinator').text(coordinator);
            $('#rotc_coor_position').text(coor_position);
            $('#rotc_commandant1').text(command1);
            $('#rotc_command_position1').text(command_position1);
            $('#rotc_commandant2').text(command2);
            $('#rotc_command_position2').text(command_position2);
            $('#rotccertificateModal').modal('show');

            $('#rotccertificateModal .btn-light').off('click').on('click', function () {
                openEditModal();
            });
        } else if (semester1 === 'CWTS1' && semester2 !== 'CWTS2') {
            $('#cwts_studentname').text(studentName);
            $('#cwts_serialnumber').text(serialnumber);
            $('#cwts_academicyear').text(academicyear2);
            $('#cwts_daterelease').text(formattedDateRelease);
            $('#cwts_coordinator').text(coordinator);
            $('#cwts_coor_position').text(coor_position);
            $('#cwts_commandant1').text(command1);
            $('#cwts_command_position1').text(command_position1);
            $('#cwts_commandant2').text(command2);
            $('#cwts_command_position2').text(command_position2);
            $('#cwtscertificateModal').modal('show');

            $('#cwtscertificateModal .btn-light').off('click').on('click', function () {
                openEditModal();
            });
        } else if (semester1 === 'ROTC1' && semester2 !== 'ROTC2') {
            $('#rotc_studentname').text(studentName);
            $('#rotc_serialnumber').text(serialnumber);
            $('#rotc_academicyear').text(academicyear2);
            $('#rotc_daterelease').text(formattedDateRelease);
            $('#rotc_coordinator').text(coordinator);
            $('#rotc_coor_position').text(coor_position);
            $('#rotc_commandant1').text(command1);
            $('#rotc_command_position1').text(command_position1);
            $('#rotc_commandant2').text(command2);
            $('#rotc_command_position2').text(command_position2);
            $('#rotccertificateModal').modal('show');

            $('#rotccertificateModal .btn-light').off('click').on('click', function () {
                openEditModal();
            });
        }
    }

    // Function to open the edit modal and populate it with the existing data
    function openEditModal() {
        const currentDateReleaseCWTS        = $('#cwts_daterelease').text();
        const currentCoordinatorCWTS        = $('#cwts_coordinator').text();
        const currentCoorPositionCWTS       = $('#cwts_coor_position').text();
        const currentCommandant1CWTS        = $('#cwts_commandant1').text();
        const currentCommandPosition1CWTS   = $('#cwts_command_position1').text();
        const currentCommandant2CWTS        = $('#cwts_commandant2').text();
        const currentCommandPosition2CWTS   = $('#cwts_command_position2').text();
        
        const currentDateReleaseROTC       = $('#rotc_daterelease').text();
        const currentCoordinatorROTC       = $('#rotc_coordinator').text();
        const currentCoorPositionROTC      = $('#rotc_coor_position').text();
        const currentCommandant1ROTC       = $('#rotc_commandant1').text();
        const currentCommandPosition1ROTC  = $('#rotc_command_position1').text();
        const currentCommandant2ROTC       = $('#rotc_commandant2').text();
        const currentCommandPosition2ROTC  = $('#rotc_command_position2').text();

        if ($('#cwtscertificateModal').hasClass('show')) {
            $('#edit_daterelease').val(currentDateReleaseCWTS);
            $('#edit_coordinator').val(currentCoordinatorCWTS);
            $('#edit_coor_position').val(currentCoorPositionCWTS);
            $('#edit_commandant1').val(currentCommandant1CWTS);
            $('#edit_command_position1').val(currentCommandPosition1CWTS);
            $('#edit_commandant2').val(currentCommandant2CWTS);
            $('#edit_command_position2').val(currentCommandPosition2CWTS);
        } else if ($('#rotccertificateModal').hasClass('show')) {
            $('#edit_daterelease').val(currentDateReleaseROTC);
            $('#edit_coordinator').val(currentCoordinatorROTC);
            $('#edit_coor_position').val(currentCoorPositionROTC);
            $('#edit_commandant1').val(currentCommandant1ROTC);
            $('#edit_command_position1').val(currentCommandPosition1ROTC);
            $('#edit_commandant2').val(currentCommandant2ROTC);
            $('#edit_command_position2').val(currentCommandPosition2ROTC);
        }
        
        $('#editModal').modal('show');
    }

    // Function to handle the update process
    function updateCertificate(serialnumber, newDateRelease, newCoordinator, newCoorPosition, newCommand1, newCommandPosition1,
                                newCommnad2, newCommandPosition2)
       {
        $.ajax({
            url: '../nav/student_list/actions/update_certificate.php',  // Replace with your server-side update URL
            type: 'POST',
            data: {
                student_id: serialnumber, // Ensure this matches your database's structure
                daterelease: newDateRelease,
                coordinator: newCoordinator,
                coor_position: newCoorPosition,
                command1: newCommand1,
                command_position1: newCommandPosition1,
                command2: newCommnad2,
                command_position2: newCommandPosition2
            },
            success: function(response) {
                alert('Certificate updated successfully.');
                $('#editModal').modal('hide');

                // Format the new date release before updating the modal display
                const formattedNewDateRelease = formatDate(newDateRelease);

                if ($('#cwtscertificateModal').hasClass('show')) {
                    $('#cwts_daterelease').text(formattedNewDateRelease);
                    $('#cwts_coordinator').text(newCoordinator);
                    $('#cwts_coor_position').text(newCoorPosition);
                    $('#cwts_commandant1').text(newCommand1);
                    $('#cwts_command_position1').text(newCommandPosition1);
                    $('#cwts_commandant2').text(newCommnad2);
                    $('#cwts_command_position2').text(newCommandPosition2);
                } else if ($('#rotccertificateModal').hasClass('show')) {
                    $('#rotc_daterelease').text(formattedNewDateRelease);
                    $('#rotc_coordinator').text(newCoordinator);
                    $('#rotc_coor_position').text(newCoorPosition);
                    $('#rotc_commandant1').text(newCommand1);
                    $('#rotc_command_position1').text(newCommandPosition1);
                    $('#rotc_commandant2').text(newCommnad2);
                    $('#rotc_command_position2').text(newCommandPosition2);
                }
            },
            error: function(xhr, status, error) {
                alert('Failed to update certificate: ' + error);
            }
        });
    }

    // Trigger the update when the "Save Changes" button is clicked
    $('#saveChangesBtn').on('click', function() {
        var newDateRelease = $('#edit_daterelease').val();
        var newCoordinator = $('#edit_coordinator').val();
        var newCoorPosition = $('#edit_coor_position').val();
        var newCommand1 = $('#edit_commandant1').val();
        var newCommandPosition1 = $('#edit_command_position1').val();
        var newCommnad2 = $('#edit_commandant2').val();
        var newCommandPosition2 = $('#edit_command_position2').val();
        var serialnumber = $('#cwts_serialnumber').text() || $('#rotc_serialnumber').text();

        if (newDateRelease && newCoordinator) {
            updateCertificate(serialnumber, newDateRelease, newCoordinator, newCoorPosition, newCommand1, newCommandPosition1, 
            newCommnad2, newCommandPosition2);
        } else {
            alert('Please fill in all required fields.');
        }
    });


    // Function to download the Certificate as a PNG
document.querySelectorAll('#png').forEach(button => {
    button.addEventListener('click', function () {
        const modal = this.closest('.modal');
        let certificateContainer;

        // Check which modal the button belongs to and set the correct Certificate container
        if (modal.querySelector('#modalCWTSCertificate')) {
            certificateContainer = modal.querySelector('#modalCWTSCertificate'); // CWTS Certificate
        } else if (modal.querySelector('#modalROTCCertificate')) {
            certificateContainer = modal.querySelector('#modalROTCCertificate'); // ROTC Certificate
        }

        // Use html2canvas to capture the correct Certificate container
        if (certificateContainer) {
            html2canvas(certificateContainer, { scale: 2 }).then(function (canvas) {
                const imageData = canvas.toDataURL("image/png");

                // Create a temporary link element for download
                const link = document.createElement('a');
                link.href = imageData;

                // Check if it's CWTS or ROTC and set the appropriate filename
                if (certificateContainer.id === 'modalCWTSCertificate') {
                    link.download = 'CWTS_Certificate.png'; // File name for CWTS Certificate
                } else if (certificateContainer.id === 'modalROTCCertificate') {
                    link.download = 'ROTC_Certificate.png'; // File name for ROTC Certificate
                }

                // Trigger the download by simulating a click
                link.click();
            });
        }
    });
});
</script>

<!-- Include the html2pdf.js library -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.3/html2pdf.bundle.min.js"></script>

<script>
 // Function to download the CWTS certificate as a PDF
function downloadCertificateAsPDF(certificateId) {
    var certificate = document.getElementById(certificateId); // Select the certificate container
    var opt = {
        margin:       0.5,
        filename:     'NSTP-Certificate.pdf', // Filename for the downloaded PDF
        image:        { type: 'jpeg', quality: 0.98 },
        html2canvas:  { scale: 2 },
        jsPDF:        { unit: 'in', format: 'A4', orientation: 'landscape' }
    };
    html2pdf().from(certificate).set(opt).save();
}

// Event listeners for downloading the certificates as PDF
document.getElementById('pdf').addEventListener('click', function() {
    var activeModal = document.querySelector('.modal.show'); // Get the currently active modal
    if (activeModal.id === 'cwtscertificateModal') {
        downloadCertificateAsPDF('modalCWTSCertificate'); // Download CWTS certificate
    } else if (activeModal.id === 'rotccertificateModal') {
        downloadCertificateAsPDF('modalROTCCertificate'); // Download ROTC certificate
    }
});
</script>


<script>
  // Function to print the certificate with a preview and a Print button
  function printCertificate(certificateType) {
    // Determine which certificate to print
    let certificateElement;
    if (certificateType === 'cwts') {
      certificateElement = document.getElementById('modalCWTSCertificate');
    } else if (certificateType === 'rotc') {
      certificateElement = document.getElementById('modalROTCCertificate');
    } else {
      alert('Invalid certificate type.');
      return;
    }

    // Clone the certificate element to avoid modifying the original
    const certificateClone = certificateElement.cloneNode(true);

    // Create a new window for preview
    const previewWindow = window.open('', '', 'width=1000,height=800');

    // Get all the <style> elements from the current document
    const styles = Array.from(document.querySelectorAll('style')).map(style => style.outerHTML).join('\n');

    // Get all the <link rel="stylesheet"> elements from the current document
    const links = Array.from(document.querySelectorAll('link[rel="stylesheet"]')).map(link => link.outerHTML).join('\n');

    // Prepare the HTML content for the preview window
    previewWindow.document.write(`
      <html>
        <head>
          <title>Certificate Preview</title>
          ${links}
          ${styles}
          <style>
            /* Additional styles for the preview window */
            body {
              margin: 20px;
              display: flex;
              flex-direction: column;
              align-items: center;
              background-color: #f5f5f5;
              font-family: Arial, sans-serif;
            }
            .certificate-preview {
              margin-bottom: 20px;
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
                display: none;
              }
            }
          </style>
        </head>
        <body>
          <div class="certificate-preview">
            ${certificateClone.outerHTML}
          </div>
           <button onclick="window.print()" class="print-button">🖨️ Print Report</button>
        </body>
      </html>
    `);

    // Close the document to ensure all resources are loaded
    previewWindow.document.close();
  }

  // Attach event listeners to all print buttons
  document.querySelectorAll('.print-certificate-btn').forEach(function(button) {
    button.addEventListener('click', function() {
      const certificateType = this.getAttribute('data-certificate');
      printCertificate(certificateType);
    });
  });
</script>