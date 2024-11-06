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
           width: 140px; /* Set logo width */
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

        .footer-1 {
            text-align: center;
            margin-top: 30px;
            font-size: 16px;
            font-weight: bold;
        }

</style>

<div class="row justify-content-center my-4" style="button: 20px;">
    <div class="col-6-2">
       
    <div class="slip-container" id="1stCWTSSlip">
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
                <p>  Student ID No.:______________________________________________________   <small id="cwts_slipstudentID" style="text-decoration: underline; font-size: 22px;"></small></p>
                <p> Name of Student:___________________________________________________    <small id="cwts_slipstudentname" style="text-decoration: underline; font-size: 22px;"></small></p>
                <p>Year and Department:_______________________________________________________    <small id="cwts_slipyearDepartment" style="text-decoration: underline; font-size: 22px;"></small></p>
            </div>

            <!-- Footer Section -->
            <div class="footer-1">
                <p>NSTP Office Staff:____________________________________________________   <small id="cwts_slipstaff" style="text-decoration: underline; font-size: 22px;"></small></p>
            </div>
        </div>
        </div>
        <div class="d-flex justify-content-center my-3">
        <button type="button" class="btn btn-success" onclick="downloadSlipAsPNG('1stCWTSSlip')"><i class="fa fa-image"></i> Download as PNG</button>
</div>

   <div class="slip-container" id="2ndCWTSSlip">
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
                <p><i id="cwts_slipsemester">2nd Semester</i></p>
            </div>

               <!-- Fields Section -->
               <div class="fields">
                <p>  Student ID No.:______________________________________________________   <small id="cwts_slipstudentID" style="text-decoration: underline; font-size: 22px;"></small></p>
                <p> Name of Student:___________________________________________________    <small id="cwts_slipstudentname" style="text-decoration: underline; font-size: 22px;"></small></p>
                <p>Year and Department:_______________________________________________________    <small id="cwts_slipyearDepartment" style="text-decoration: underline; font-size: 22px;"></small></p>
            </div>

            <!-- Footer Section -->
            <div class="footer-1">
                <p>NSTP Office Staff:____________________________________________________   <small id="cwts_slipstaff" style="text-decoration: underline; font-size: 22px;"></small></p>
            </div>
        </div>
        </div>
        <div class="d-flex justify-content-center my-3">
            <button type="button" class="btn btn-success" onclick="downloadSlipAsPNG('2ndCWTSSlip')"><i class="fa fa-image"></i> Download as PNG</button>
</div>

   <div class="slip-container" id="1stROTCSlip" style="background-color: #A8D08D;">
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
                        <p>  Student ID No.:______________________________________________________ <small id="rotc_slipstudentID" style="text-decoration: underline; font-size: 22px;"></small></p>
                        <p> Name of Student:___________________________________________________  <small id="rotc_slipstudentname" style="text-decoration: underline; font-size: 22px;"></small></p>
                        <p>Year and Department:_______________________________________________________ <small id="rotc_slipyearDepartment" style="text-decoration: underline; font-size: 22px;"></small></p>
                    </div>
                    <!-- Footer Section -->
                    <div class="footer-1">
                        <p>NSTP Office Staff:____________________________________________________ <small id="rotc_slipstaff" style="text-decoration: underline; font-size: 22px;"></small></p>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-center my-3">
            <button type="button" class="btn btn-success" onclick="downloadSlipAsPNG('1stROTCSlip')"><i class="fa fa-image"></i> Download as PNG</button>
</div>

   <div class="slip-container" id="2ndROTCSlip" style="background-color: #A8D08D;">
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
                        <p><i id="rotc_slipsemester">2nd Semester</i></p>
                    </div>
                    <!-- Fields Section -->
                    <div class="fields">
                        <p>  Student ID No.:______________________________________________________ <small id="rotc_slipstudentID" style="text-decoration: underline; font-size: 22px;"></small></p>
                        <p> Name of Student:___________________________________________________  <small id="rotc_slipstudentname" style="text-decoration: underline; font-size: 22px;"></small></p>
                        <p>Year and Department:_______________________________________________________ <small id="rotc_slipyearDepartment" style="text-decoration: underline; font-size: 22px;"></small></p>
                    </div>
                    <!-- Footer Section -->
                    <div class="footer-1">
                        <p>NSTP Office Staff:____________________________________________________ <small id="rotc_slipstaff" style="text-decoration: underline; font-size: 22px;"></small></p>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-center my-3">
            <button type="button" class="btn btn-success" onclick="downloadSlipAsPNG('2ndROTCSlip')"><i class="fa fa-image"></i> Download as PNG</button>
</div>
   
</div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>

<script>
function downloadSlipAsPNG(slipId) {
    const slipContainer = document.getElementById(slipId);

    if (slipContainer) {
        html2canvas(slipContainer).then((canvas) => {
            const link = document.createElement('a');
            link.download = `${slipId}.png`;
            link.href = canvas.toDataURL();
            link.click();
        });
    } else {
        alert("Slip not found.");
    }
}

</script>
