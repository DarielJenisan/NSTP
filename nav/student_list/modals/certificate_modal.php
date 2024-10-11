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

    <!-- CWTS Certificate Modal -->
<div class="modal fade" id="cwtscertificateModal" tabindex="-1" aria-labelledby="certificateModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sl" style="max-width: 930px;">
    <div class="modal-content" style="background-color: transparent; border: none; box-shadow: none;">
      <div class="modal-header" style="background-color: transparent; border: none; box-shadow: none;">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="background-color: transparent; border: none; box-shadow: none; filter: invert(1);"></button>
      </div>
      <div class="modal-body centered-content" style="background-color: transparent; border: none; box-shadow: none; padding: 0;">
        <div class="certificate-container" id="modalCWTSCertificate" style="background-image: url('../assets/img/cwtscert.png');">
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
          </div>

          <div class="coordinator">
              Given this <i style="font-weight: bold;" id="cwts_daterelease">29th day of May, 2024</i>  at Northern Bukidnon State College,<br>
              Kihare, Manolo Fortich, Bukidnon.<br><br>
              <strong style="text-decoration: underline; font-size: 22px;" id="cwts_coordinator">JOHN MARK L. BOYONAS, MAEng</strong><br>
              Coordinator, National Service Training Program
          </div>
        </div>
      </div>
      <div class="modal-footer" style="background-color: transparent; border: none; box-shadow: none;">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-success">Edit</button>
        <button type="button" class="btn btn-primary print-certificate-btn" data-certificate="cwts">Print Certificate</button>
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
          </div>

          <div class="coordinator">
              Given this <i style="font-weight: bold;" id="rotc_daterelease">29th day of May, 2024</i> at Northern Bukidnon State College,<br>
              Kihare, Manolo Fortich, Bukidnon.<br><br>
              <strong style="text-decoration: underline; font-size: 22px;" id="rotc_coordinator">JOHN MARK L. BOYONAS, MAEng</strong><br>
              Coordinator, National Service Training Program
          </div>
        </div>
      </div>
      <div class="modal-footer" style="background-color: transparent; border: none; box-shadow: none;">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-success">Edit</button>
        <button type="button" class="btn btn-primary print-certificate-btn" data-certificate="rotc">Print Certificate</button>
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
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-primary" id="saveChangesBtn">Save Changes</button>
      </div>
    </div>
  </div>
</div>

<script>
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

    function loadCertificate(lastname, firstname, middlename, suffixname, serialnumber, academicyear2, semester1, semester2, daterelease, coordinator) {
        const studentName = firstname + ' ' + (middlename ? middlename + ' ' : '') + lastname + ' ' + (suffixname ? suffixname : '');

        // Format the dateRelease using the formatDate function
        const formattedDateRelease = formatDate(daterelease);

        if (semester1 === 'CWTS1' && semester2 === 'CWTS2') {
            $('#cwts_studentname').text(studentName);
            $('#cwts_serialnumber').text(serialnumber);
            $('#cwts_academicyear').text(academicyear2);
            $('#cwts_daterelease').text(formattedDateRelease);
            $('#cwts_coordinator').text(coordinator);
            $('#cwtscertificateModal').modal('show');

            $('#cwtscertificateModal .btn-success').off('click').on('click', function () {
                openEditModal();
            });
        } else if (semester1 === 'ROTC1' && semester2 === 'ROTC2') {
            $('#rotc_studentname').text(studentName);
            $('#rotc_serialnumber').text(serialnumber);
            $('#rotc_academicyear').text(academicyear2);
            $('#rotc_daterelease').text(formattedDateRelease);
            $('#rotc_coordinator').text(coordinator);
            $('#rotccertificateModal').modal('show');

            $('#rotccertificateModal .btn-success').off('click').on('click', function () {
                openEditModal();
            });
        } else if (semester1 === 'CWTS1' && semester2 !== 'CWTS2') {
            $('#cwts_studentname').text(studentName);
            $('#cwts_serialnumber').text(serialnumber);
            $('#cwts_academicyear').text(academicyear2);
            $('#cwts_daterelease').text(formattedDateRelease);
            $('#cwts_coordinator').text(coordinator);
            $('#cwtscertificateModal').modal('show');

            $('#cwtscertificateModal .btn-success').off('click').on('click', function () {
                openEditModal();
            });
        } else if (semester1 === 'ROTC1' && semester2 !== 'ROTC2') {
            $('#rotc_studentname').text(studentName);
            $('#rotc_serialnumber').text(serialnumber);
            $('#rotc_academicyear').text(academicyear2);
            $('#rotc_daterelease').text(formattedDateRelease);
            $('#rotc_coordinator').text(coordinator);
            $('#rotccertificateModal').modal('show');

            $('#rotccertificateModal .btn-success').off('click').on('click', function () {
                openEditModal();
            });
        }
    }

    // Function to open the edit modal and populate it with the existing data
    function openEditModal() {
        const currentDateReleaseCWTS = $('#cwts_daterelease').text();
        const currentCoordinatorCWTS = $('#cwts_coordinator').text();
        const currentDateReleaseROTC = $('#rotc_daterelease').text();
        const currentCoordinatorROTC = $('#rotc_coordinator').text();

        if ($('#cwtscertificateModal').hasClass('show')) {
            $('#edit_daterelease').val(currentDateReleaseCWTS);
            $('#edit_coordinator').val(currentCoordinatorCWTS);
        } else if ($('#rotccertificateModal').hasClass('show')) {
            $('#edit_daterelease').val(currentDateReleaseROTC);
            $('#edit_coordinator').val(currentCoordinatorROTC);
        }
        
        $('#editModal').modal('show');
    }

    // Function to handle the update process
    function updateCertificate(serialnumber, newDateRelease, newCoordinator) {
        $.ajax({
            url: '../nav/student_list/actions/update_certificate.php',  // Replace with your server-side update URL
            type: 'POST',
            data: {
                student_id: serialnumber, // Ensure this matches your database's structure
                daterelease: newDateRelease,
                coordinator: newCoordinator
            },
            success: function(response) {
                alert('Certificate updated successfully.');
                $('#editModal').modal('hide');

                // Format the new date release before updating the modal display
                const formattedNewDateRelease = formatDate(newDateRelease);

                if ($('#cwtscertificateModal').hasClass('show')) {
                    $('#cwts_daterelease').text(formattedNewDateRelease);
                    $('#cwts_coordinator').text(newCoordinator);
                } else if ($('#rotccertificateModal').hasClass('show')) {
                    $('#rotc_daterelease').text(formattedNewDateRelease);
                    $('#rotc_coordinator').text(newCoordinator);
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
        var serialnumber = $('#cwts_serialnumber').text() || $('#rotc_serialnumber').text();

        if (newDateRelease && newCoordinator) {
            updateCertificate(serialnumber, newDateRelease, newCoordinator);
        } else {
            alert('Please fill in all required fields.');
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