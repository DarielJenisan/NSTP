<style>
       .slip-container {
        width: 900px; /* Adjust the width */
        height: 615px; /* Adjust the height */
        background-color: #FBE9B5;
        border: 10px solid #1d1d8f;
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

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            text-align: center;
        }

        .left-logo {
           width: 150px; /* Set logo width */
           height: auto; /* Maintain aspect ratio */
           margin-left: 20px; /* Space between images and text */
        }
        
        .right-logo {
          width: 150px; /* Set logo width */
          height: auto; /* Maintain aspect ratio */
          margin-right: 20px; /* Space between images and text */
        }

        .header .text {
            flex: 1;
        }

        .header h2 {
            font-size: 24px;
            margin: 0;
            color: #000;
        }

        .header h3 {
            font-size: 18px;
            margin: 0;
            color: #000;
            font-weight: normal;
        }

        .title-2 {
            text-align: center;
            margin: 15px 0;
        }

        .title-2 h1 {
            font-size: 36px;
            color: #1d1d8f;
            margin: 0;
            font-weight: bold;
        }

        .title-2 h2 {
            font-size: 24px;
            color: #c41e3a;
            margin: 0;
            font-weight: bold;
        }

        .academic-year {
            text-align: center;
            margin: 10px 0;
            font-size: 18px;
            font-weight: normal;
        }

        .fields {
            margin-top: 20px;
            font-size: 18px;
        }

        .fields p {
            margin: 20px 0;
            font-weight: bold;
        }

        .footer {
            text-align: center;
            margin-top: 30px;
            font-size: 16px;
            font-weight: bold;
        }
</style>



<!-- CWTS Slip Modal -->
<div class="modal fade" id="cwtsSlipModal" tabindex="-1" aria-labelledby="cwtsSlipModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" style="max-width: 930px;"> <!-- modal-lg for landscape view -->
        <div class="modal-content" style="background-color: transparent; border: none; box-shadow: none;">
            <div class="modal-header" style="background-color: transparent; border: none; box-shadow: none;">
                <h5 class="modal-title" id="cwtsSlipModalLabel">CWTS Slip</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body centered-content" style="background-color: transparent; border: none; box-shadow: none; padding: 0;">

            <div class="slip-container" id="cwtsSlipContainer">
            <!-- Header Section -->
            <div class="header">
                <!-- Left Logo -->
                <img src="../assets/img/nbsclogo.png" alt="Left Logo" class="left-logo">

                <!-- Text Section -->
                <div class="text">
                    <h2 style="font-family: Times New Roman, Times, serif; font-size: 32px; color: #002F6C; font-weight: bold;">Northern Bukidnon State College</h2>
                    <h3 style="font-family: Times New Roman, Times, serif; font-size: 22px; color: #002F6C;">National Service Training Department</h3>
                </div>

                <!-- Right Logo -->
                <img src="../assets/img/nstplogo.png" alt="Right Logo" class="right-logo">
            </div>

            <!-- Title Section -->
            <div class="title-2">
                <h1>COMPONENT SLIP</h1>
                <h2>Civic Welfare Training Service (CWTS)</h2>
            </div>

            <!-- Academic Year Section -->
            <div class="academic-year">
                <p>Academic Year <i id="cwts_slipAY">2024-2025</i></p>
                <p><i id="cwts_slipsemester">1st Semester</i></p>
            </div>

            <!-- Fields Section -->
            <div class="fields">
                <p>  Student ID No.:    <small id="cwts_slipstudentID" style="text-decoration: underline; font-size: 22px;"></small></p>
                <p> Name of Student:    <small id="cwts_slipstudentname" style="text-decoration: underline; font-size: 22px;"></small></p>
                <p>Year and Department:    <small id="cwts_slipyearDepartment" style="text-decoration: underline; font-size: 22px;"></small></p>
            </div>

            <!-- Footer Section -->
            <div class="footer">
                <p>NSTP Office Staff:   <small id="cwts_slipstaff" style="text-decoration: underline; font-size: 22px;"></small></p>
            </div>
        </div>
           
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-success"><i class="fa fa-download"></i> Download as PNG</button>
                <button type="button" class="btn btn-primary" onclick="sendSlipEmail('cwtsSlipContainer')"><i class="fa fa-paper-plane"></i> Send</button>
            </div>
        </div>
    </div>
</div>


<!-- ROTC Slip Modal -->
<div class="modal fade" id="rotcSlipModal" tabindex="-1" aria-labelledby="rotcSlipModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" style="max-width: 930px;"> <!-- modal-lg for landscape view -->
        <div class="modal-content" style="background-color: transparent; border: none; box-shadow: none;">
            <div class="modal-header" style="background-color: transparent; border: none; box-shadow: none;">
                <h5 class="modal-title" id="rotcSlipModalLabel">ROTC Slip</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body centered-content" style="background-color: transparent; border: none; box-shadow: none; padding: 0;">
                <div class="slip-container" id="rotcSlipContainer" style="background-color: #A8D08D;">
                    <!-- Header Section -->
                    <div class="header">
                        <!-- Left Logo -->
                        <img src="../assets/img/nbsclogo.png" alt="Left Logo" class="left-logo">
                        <!-- Text Section -->
                        <div class="text">
                            <h2 style="font-family: Times New Roman, Times, serif; font-size: 32px; color: #002F6C; font-weight: bold;">Northern Bukidnon State College</h2>
                            <h3 style="font-family: Times New Roman, Times, serif; font-size: 22px; color: #002F6C;">National Service Training Department</h3>
                        </div>
                        <!-- Right Logo -->
                        <img src="../assets/img/rotclogo.png" alt="Right Logo" class="right-logo">
                    </div>
                    <!-- Title Section -->
                    <div class="title-2">
                        <h1>COMPONENT SLIP</h1>
                        <h2>Reserve Officers Training Corps (ROTC)</h2>
                    </div>
                    <!-- Academic Year Section -->
                    <div class="academic-year">
                        <p>Academic Year <i id="rotc_slipAY">2024-2025</i></p>
                        <p><i id="rotc_slipsemester">1st Semester</i></p>
                    </div>
                    <!-- Fields Section -->
                    <div class="fields">
                        <p>  Student ID No.: <small id="rotc_slipstudentID" style="text-decoration: underline; font-size: 22px;"></small></p>
                        <p> Name of Student: <small id="rotc_slipstudentname" style="text-decoration: underline; font-size: 22px;"></small></p>
                        <p>Year and Department: <small id="rotc_slipyearDepartment" style="text-decoration: underline; font-size: 22px;"></small></p>
                    </div>
                    <!-- Footer Section -->
                    <div class="footer">
                        <p>NSTP Office Staff: <small id="rotc_slipstaff" style="text-decoration: underline; font-size: 22px;"></small></p>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-success" id="downloadRotcSlip"><i class="fa fa-download"></i> Download as PNG</button>
                <button type="button" class="btn btn-primary" onclick="sendSlipEmail('rotcSlipContainer')"><i class="fa fa-paper-plane"></i> Send</button>
            </div>
        </div>
    </div>
</div>



<<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>

<script>
 function loadSlip(semester1, semester2, student_id, firstname, middlename, lastname, suffixname, yearlevel, department, academicyear1, academicyear2) {
    const fullName = firstname + ' ' + (middlename ? middlename + ' ' : '') + lastname + ' ' + (suffixname ? suffixname : '');
    const yearDepartment = yearlevel + ' - ' + department;

    // Fetch the logged-in admin's name using AJAX
    fetchAdminDetails();

    // Variables for semester and academic year to be displayed
    let displayedSemester = '';
    let displayedAcademicYear = '';

    // Check for CWTS1 or ROTC1 in the first semester
    if (semester1 === 'CWTS1' || semester1 === 'ROTC1') {
        displayedAcademicYear = academicyear1;
        displayedSemester = '1st Semester';

        // Check if CWTS slip should be shown
        if (semester1 === 'CWTS1') {
            $('#cwts_slipAY').text(displayedAcademicYear);
            $('#cwts_slipsemester').text(displayedSemester);
            $('#cwts_slipstudentID').text(student_id);
            $('#cwts_slipstudentname').text(fullName);
            $('#cwts_slipyearDepartment').text(yearDepartment);
            $('#cwtsSlipModal').modal('show'); // Show CWTS modal
        }

        // Check if ROTC slip should be shown
        if (semester1 === 'ROTC1') {
            $('#rotc_slipAY').text(displayedAcademicYear);
            $('#rotc_slipsemester').text(displayedSemester);
            $('#rotc_slipstudentID').text(student_id);
            $('#rotc_slipstudentname').text(fullName);
            $('#rotc_slipyearDepartment').text(yearDepartment);
            $('#rotcSlipModal').modal('show'); // Show ROTC modal
        }
    }

    // Check for CWTS2 or ROTC2 in the second semester
    if (semester2 === 'CWTS2' || semester2 === 'ROTC2') {
        // Update to 2nd semester and the academic year
        displayedAcademicYear = academicyear2;
        displayedSemester = '2nd Semester';

        // Update CWTS slip if CWTS2 is found
        if (semester2 === 'CWTS2') {
            $('#cwts_slipAY').text(displayedAcademicYear);
            $('#cwts_slipsemester').text(displayedSemester);
            $('#cwts_slipstudentID').text(student_id);
            $('#cwts_slipstudentname').text(fullName);
            $('#cwts_slipyearDepartment').text(yearDepartment);
            $('#cwtsSlipModal').modal('show'); // Show CWTS modal
        }

        // Update ROTC slip if ROTC2 is found
        if (semester2 === 'ROTC2') {
            $('#rotc_slipAY').text(displayedAcademicYear);
            $('#rotc_slipsemester').text(displayedSemester);
            $('#rotc_slipstudentID').text(student_id);
            $('#rotc_slipstudentname').text(fullName);
            $('#rotc_slipyearDepartment').text(yearDepartment);
            $('#rotcSlipModal').modal('show'); // Show ROTC modal
        }
    }
}

// Function to fetch the logged-in admin details
function fetchAdminDetails() {
    $.ajax({
        url: '../assets/components/get_user_details.php',
        type: 'GET',
        dataType: 'json',
        success: function(response) {
            if (response.role === 'admin') {
                $('#cwts_slipstaff').text(response.name); // For CWTS slip
                $('#rotc_slipstaff').text(response.name); // For ROTC slip
            } else {
                $('#cwts_slipstaff').text('NSTP Office Staff'); // Default if no admin
                $('#rotc_slipstaff').text('NSTP Office Staff'); // Default if no admin
            }
        },
        error: function() {
            $('#cwts_slipstaff').text('NSTP Office Staff');
            $('#rotc_slipstaff').text('NSTP Office Staff');
        }
    });
}


// Function to download the slip as a PNG
document.querySelectorAll('.btn-success').forEach(button => {
    button.addEventListener('click', function () {
        const modal = this.closest('.modal');
        let slipContainer;

        // Check which modal the button belongs to and set the correct slip container
        if (modal.querySelector('#cwtsSlipContainer')) {
            slipContainer = modal.querySelector('#cwtsSlipContainer'); // CWTS Slip
        } else if (modal.querySelector('#rotcSlipContainer')) {
            slipContainer = modal.querySelector('#rotcSlipContainer'); // ROTC Slip
        }

        // Use html2canvas to capture the correct slip container
        if (slipContainer) {
            html2canvas(slipContainer, { scale: 2 }).then(function (canvas) {
                const imageData = canvas.toDataURL("image/png");

                // Create a temporary link element for download
                const link = document.createElement('a');
                link.href = imageData;

                // Check if it's CWTS or ROTC and set the appropriate filename
                if (slipContainer.id === 'cwtsSlipContainer') {
                    link.download = 'CWTS_Slip.png'; // File name for CWTS slip
                } else if (slipContainer.id === 'rotcSlipContainer') {
                    link.download = 'ROTC_Slip.png'; // File name for ROTC slip
                }

                // Trigger the download by simulating a click
                link.click();
            });
        }
    });
});

// Function to send the slip as an email with PNG attachment
// function sendSlipEmail(containerId) {
   //  const slipContainer = document.getElementById(containerId);

    // Convert the slip to a PNG image using html2canvas
  //   html2canvas(slipContainer, { scale: 2 }).then(function (canvas) {
   //      const imageData = canvas.toDataURL("image/png");

        // Extract the student_id from the slip
    //     const student_id = slipContainer.querySelector('#cwts_slipstudentID, #rotc_slipstudentID').textContent;

        // Check if student_id is valid
    //     if (!student_id) {
    //         alert("Student ID not found.");
    //         return;
    //     }

     // Send the image and student_id via AJAX
      //   $.ajax({
    //         url: '../nav/student_list/components/send_slip_email.php', // Backend PHP script to send the email
        //     type: 'POST',
       //      data: {
       //          student_id: student_id,  // Sending the student ID
       //          imageData: imageData,
       //          slipType: containerId.includes('cwts') ? 'CWTS' : 'ROTC'
       //      },
       //      success: function(response) {
      //           alert(response); // Handle the success response from the PHP file
     //        },
     //        error: function() {
   //   //            alert('Failed to send email.'); // Handle AJAX request error
   // //          }
    //     });
  //   }).catch(function(error) {
   //      alert('An error occurred while converting the slip to an image.');
  //       console.error('html2canvas error:', error);
  //   });
// }
</script>