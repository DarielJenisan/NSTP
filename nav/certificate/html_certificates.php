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
        font-size: 32px;
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
        left: 150px;
        font-family: "Times New Roman", Times, serif;
        font-size: 16px;
        color: #002F6C;
        text-align: center;
    }
    

    /*Slip slip*/

        .card {
            display: flex;
            flex-direction: column; /* Arrange items in a column */
            align-items: center; /* Center items horizontally */
            background-color: #fff;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            padding: 20px;
            max-width: 950px;
            margin: 20px;
        }

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
           width: 100px; /* Set logo width */
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


<div class="row">
<div class="col-md-2" style="flex: 0 0 auto; width: 270px; height: 100hv;">
                <!-- Sidebar Filter -->
                <div class="card shadow">
                    <div class="card-body">
                        <h5 class="card-title text-center">NSTP <br>Certificates <br> & <br> Slip</h5>
                        <div class="form-group">
                            <label for="selectAY">Select AY</label>
                            <select class="form-control" id="selectAY" onchange="filterData()">
                                <option value="cwtscert">CWTS Certificate</option>
                                <option value="cwtsslip">CWTC Slip</option>
                                <option value="rotccert">ROTC Certificate</option>
                                <option value="rotcslip">ROTC Slip</option>
                                <!-- Add more options here -->
                            </select>
                        </div>
                       
                     <div class="d-flex flex-column align-items-center">
                     <button class="btn btn-primary w-100 btn-block mt-2"><i class="fa fa-play"></i> Run</button>
                        <button class="btn btn-outline-primary w-100 btn-block mt-2"><i class="fa fa-print"></i> Print</button>
                        <button class="btn btn-outline-success w-100 btn-block mt-2"><i class="fa fa-download"></i> Download</button>
                        </div>
                    </div>
                </div>
            </div>


<div class="col-md-9">
            <!--CWTS Certificate-->
  <div class="certificate-wrapper">
        <div class="certificate-container">
        <!-- QR Code -->
        <img src="qr_code.png" alt="QR Code" class="qr-code">

        <!-- Text elements -->
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
            JOCIEL DOMO ALBIA
        </div>

        <div class="text-container serial-number">
            NSTP-CWTS SERIAL NUMBER:  
                <strong style="color: black;">9771085562</strong></i>
        </div>

        <div class="text-container details">
            for successfully completing the course required for<br>
            <strong style="color: #cc0000; font-size: 20px font-weight: bold;">NATIONAL SERVICE TRAINING PROGRAM</strong><br>
            <i style="color: #cc0000; font-size: 17px font-weight: bold;">Civic Welfare Training Service</i><br>
            for the academic year 2023-2024.
        </div>

        <div class="coordinator">
            Given this 29th day of May, 2024 at Northern Bukidnon State College,<br>
            Kihare, Manolo Fortich, Bukidnon.<br><br>
            <strong style="text-decoration: underline;">JOHN MARK L. BOYONAS, MAEng</strong><br>
            Coordinator, National Service Training Program
        </div>
    </div>
   </div> 


<!--ROTC Certificate-->
    <div class="certificate-wrapper">
    <div class="certificate-container" style="background-image: url('../assets/img/rotccert.png');">
        <!-- QR Code -->
        <img src="qr_code.png" alt="QR Code" class="qr-code">

        <!-- Text elements -->
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
            JOCIEL DOMO ALBIA
        </div>

        <div class="text-container serial-number">
            NSTP-ROTC SERIAL NUMBER:  
                <strong style="color: black;">9771085562</strong></i>
        </div>

        <div class="text-container details">
            for successfully completing the course required for<br>
            <strong style="color: #cc0000; font-size: 20px font-weight: bold;">NATIONAL SERVICE TRAINING PROGRAM</strong><br>
            <i style="color: #cc0000; font-size: 17px font-weight: bold;">Reserve Officers Training Corps</i><br>
            for the academic year 2023-2024.
        </div>

        <div class="coordinator">
            Given this 29th day of May, 2024 at Northern Bukidnon State College,<br>
            Kihare, Manolo Fortich, Bukidnon.<br><br>
            <strong style="text-decoration: underline;">JOHN MARK L. BOYONAS, MAEng</strong><br>
            Coordinator, National Service Training Program
        </div>
    </div>
    </div>

    <!--CWTS Slip-->
    <div class="certificate-wrapper">
        <div class="slip-container">
            <!-- Header Section -->
            <div class="header">
                <!-- Left Logo -->
                <img src="../assets/img/nbsclogo.png" alt="Left Logo" class="left-logo">

                <!-- Text Section -->
                <div class="text">
                    <h2 style="font-family: Times New Roman, Times, serif; font-size: 32px; color: #002F6C; font-weight: bold;">Northern Bukidnon State College</h2>
                    <h3 style="font-family: Times New Roman, Times, serif; font-size: 22px; color: #002F6C;">National Service Training Program</h3>
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
                <p>Academic Year 2024-2025</p>
                <p>1st Semester</p>
            </div>

            <!-- Fields Section -->
            <div class="fields">
                <p>  Student ID No.: _____________________________________________</p>
                <p> Name of Student:_____________________________________________</p>
                <p>Year and Program: _____________________________________________</p>
            </div>

            <!-- Footer Section -->
            <div class="footer">
                <p>NSTP Office Staff: _____________________________________________</p>
            </div>
        </div>
    </div>

       <!--ROTC Slip-->

       <div class="certificate-wrapper">
        <div class="slip-container" style="background-color: #A8D08D;">
            <!-- Header Section -->
            <div class="header">
                <!-- Left Logo -->
                <img src="../assets/img/nbsclogo.png" alt="Left Logo" class="left-logo">

                <!-- Text Section -->
                <div class="text">
                    <h2 style="font-family: Times New Roman, Times, serif; font-size: 32px; color: #002F6C; font-weight: bold;">Northern Bukidnon State College</h2>
                    <h3 style="font-family: Times New Roman, Times, serif; font-size: 22px; color: #002F6C;">National Service Training Program</h3>
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
                <p>Academic Year 2024-2025</p>
                <p>1st Semester</p>
            </div>

            <!-- Fields Section -->
            <div class="fields">
                <p>  Student ID No.: _____________________________________________</p>
                <p> Name of Student:_____________________________________________</p>
                <p>Year and Program: _____________________________________________</p>
            </div>

            <!-- Footer Section -->
            <div class="footer">
                <p>NSTP Office Staff: _____________________________________________</p>
            </div>
        </div>
    </div>

    </div>
    </div>