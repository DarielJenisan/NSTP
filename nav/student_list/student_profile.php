<style>
body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
.container {
            width: 700px;
            height: 1400px;
            margin: 20px auto;
            padding: 20px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

.header {
    display: flex; /* Use flexbox to align items horizontally */
    align-items: center; /* Center items vertically */
    justify-content: center; /* Center items horizontally */
    margin-bottom: 20px; /* Space below the header */
}


.logo-left {
    width: 70px; /* Set logo width */
    height: auto; /* Maintain aspect ratio */
    margin-left: 50px; /* Space between images and text */
}
.logo-right {
    width: 100px; /* Set logo width */
    height: auto; /* Maintain aspect ratio */
    margin-right: 50px; /* Space between images and text */
}

.header-text {
    text-align: center; /* Center align text */
    flex-grow: 1; /* Allow text to grow and occupy space between logos */
}

.header-text h5,
.header-text h6 {
    margin: 0; /* Remove default margins */
    line-height: 1; /* Line height for better readability */
    font-size: 16px; /* Adjusted font size */
    font-family: 'Arial', sans-serif; /* Adjusted font family */
}

.header-text p {
    margin: 5px 0; /* Adjusted margin for spacing */
    line-height: 1; /* Adjusted line height for better readability */
    font-size: 14px; /* Adjusted font size */
    font-family: 'Arial', sans-serif; /* Adjusted font family */
}

.form-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
}
.form-group {
            width: 45%;
}

.form-group label {
            display: block;
            margin-bottom: 5px;
}

.form-group input, .form-group select {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 5px;
}

.center-text-input {
    font-size: 25px;
    text-align: center;
    width: 100%; 
    padding: 5px; 
    box-sizing: border-box; 
}


.photo-box {
            border: 1px solid #ccc;
            width: 150px;
            height: 150px;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0 auto;
}

.photo-box img {
            max-width: 100%;
            max-height: 100%;
}

.table-container {
    width: 100%; /* Adjust the width as needed */
    display: flex; /* Use flexbox to align the content */
    justify-content: center; /* Center the table horizontally */
    margin-top: 20px; /* Add some space above the table */
}

table {
    border-collapse: collapse; /* Collapses borders into a single border */
    width: 80%; /* Adjust the width to make it fit well within the container */
    margin: 0 auto; /* Ensure the table itself is centered */
    text-align: center; /* Center align the table text */
}

th, td {
    padding: 10px; /* Adds padding for a better look */
    border: 1px solid #ccc; /* Adds borders to the cells */
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
    </style>
            
<div class="container">
<div class="header">
    <img src="../assets/img/nbsclogo.png" alt="NSTP Logo" class="logo-left">
    <div class="header-text">
        <p>Republic of the Philippines</p>
        <h5>NORTHERN BUKIDNON STATE COLLEGE</h5>
        <p>(Formerly Northern Bukidnon State College) R.A. 11284</p>
        <p>Manolo Fortich Bukidnon • (088)5373185+</p>
        <h5>NATIONAL SERVICE TRAINING PROGRAM</h5>
        <h6>ROTC • CWTS</h6>
    </div>
    <img src="../assets/img/nstplogo.png" alt="NBSC Logo" class="logo-right">
</div>
    <div class="text-center">
    <h2>NSTP Student Profile</h2>
</div>
    <div class="form-row">
        <div class="form-group">
            <label for="schoolId">School ID:</label>
            <input type="text" id="schoolId" name="schoolId"  class="center-text-input">
        </div>
        <div class="photo-box">
            <span>Photo</span>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name"  class="center-text-input">
        </div>
        <div class="form-group">
            <label for="serialNo">Serial No:</label>
            <input type="text" id="serialNo" name="serialNo"  class="center-text-input">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group">
            <label for="birthday">Birthday:</label>
            <input type="text" id="birthday" name="birthday"  class="center-text-input">
        </div>
        <div class="form-group">
            <label for="gender">Gender:</label>
            <input type="text" id="gender" name="address"  class="center-text-input">
        </div>
    </div>
    <div class="form-group">
        <label for="address">Address:</label>
        <input type="text" id="address" name="address"  class="center-text-input">
    </div>
    <div class="form-group">
        <label for="course">Course:</label>
        <input type="text" id="course" name="course"  class="center-text-input">
    </div>
    <div class="form-group">
        <label for="contactNo">Contact No:</label>
        <input type="text" id="contactNo" name="contactNo"  class="center-text-input">
    </div>
    <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" class="center-text-input">
    </div>

    <div class="text-center">
        <h5>NSTP Completed Component</h5>
    </div>

    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>NSTP</th>
                    <th>Academic Year</th>
                    <th>Grade</th>
                    <th>Remarks</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>    </td>
                    <td>    </td>
                    <td>    </td>
                    <td>    </td>
                </tr>
                <tr>
                    <td>    </td>
                    <td>    </td>
                    <td>    </td>
                    <td>    </td>
                </tr>
                <!-- Additional rows as needed -->
            </tbody>
        </table>
    </div>

    <div class="footer">
        <p>JOHN MARK L. BOYONAS, MAEng.</p>
        <p class="signature-line">Coordinator, National Service Training Program</p>
        <p>Signature over Printed Name</p>
    </div>

    <div class="d-flex flex-column align-items-center">
                        <button class="btn btn-outline-primary w-100 btn-block mt-2"><i class="fa fa-arrow-up"></i> Update</button>
                        <button class="btn btn-outline-secondary w-100 btn-block mt-2"><i class="fa fa-print"></i> Print</button>
                        <button class="btn btn-success btn-block w-100 mt-2"><i class="fa fa-qrcode"></i> Generate Certificate with QR Code</button>
                        </div>
</div>

           
<script>
    
</script>
