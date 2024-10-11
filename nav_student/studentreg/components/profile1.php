<?php 
// Database connection
$servername = "localhost";  // Assuming you're using XAMPP
$username = "root";         // Default username for XAMPP
$password = "";             // Default password for XAMPP (empty)
$dbname = "nstp_profiling_system";  // Your database name

// Create a connection to the database
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check if the connection is successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Fetch the student data
$student_id = 1; // Assuming you're fetching the profile for student ID 1
$result = mysqli_query($conn, "SELECT * FROM tblstudent WHERE student_id = $student_id");

// Check if the query was successful and returned any rows
if ($result && mysqli_num_rows($result) > 0) {
    $student = mysqli_fetch_assoc($result); // Fetch the student's details as an associative array
} else {
    $student = null; // Set $student to null if no data is found
}

// Check if $student is not null before accessing its values
if ($student) {
    // Name and email display removed
    // You can add other fields here if necessary
} else {
    // Handle case where student data is not found
    echo "No student data found for the specified student ID.";
}

// Close the database connection
mysqli_close($conn);
?>

<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f4f4f4;
    }
    .container {
        width: 700px;
        margin: 20px auto;
        padding: 20px;
        background-color: white;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        box-sizing: border-box;
    }
    .header {
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 20px;
    }
    .logo-left, .logo-right {
        width: 70px;
        height: auto;
        margin: 0 50px;
    }
    .header-text {
        text-align: center;
        flex-grow: 1;
    }
    .header-text h5, .header-text h6, .header-text p {
        margin: 0;
        line-height: 1;
        font-size: 16px;
    }
    .form-row {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 15px;
        flex-wrap: wrap;
    }
    .form-group {
        width: 48%;
        margin-bottom: 15px;
    }
    .full-width {
        width: 100%;
    }
    .form-group label {
        display: block;
        margin-bottom: 5px;
    }
    .form-group input {
        width: 100%;
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-sizing: border-box;
    }
    .center-text-input {
        text-align: center;
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
    .footer {
        text-align: center;
        margin-top: 100px;
    }
    .signature-line {
        margin-top: 0;
        border-top: 1px solid #000;
        width: 200px;
        margin-left: auto;
        margin-right: auto;
        padding-top: 0;
    }
</style>

<div class="container">
    
    <div class="text-center">
        <h2>NSTP Student Profile</h2>
    </div>
    
    <div class="form-row">
        <div class="form-group">
            <label for="schoolId">School ID:</label>
            <input type="text" id="schoolId" name="schoolId" value="<?php echo $student['school_id']; ?>" class="center-text-input" readonly>
        </div>
        <div class="photo-box">
            <span>Photo</span>
        </div>
    </div>

    <div class="form-row">
        <div class="form-group full-width">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="<?php echo $student['firstname'] . ' ' . $student['middlename'] . ' ' . $student['lastname']; ?>" class="center-text-input" readonly>
        </div>
    </div>
    
    <div class="form-row">
        <div class="form-group">
            <label for="serialNo">Serial No:</label>
            <input type="text" id="serialNo" name="serialNo" value="<?php echo $student['serialnumber']; ?>" class="center-text-input" readonly>
        </div>
        <div class="form-group">
            <label for="birthday">Birthday:</label>
            <input type="text" id="birthday" name="birthday" value="<?php echo $student['birthday']; ?>" class="center-text-input" readonly>
        </div>
    </div>
    
    <div class="form-row">
        <div class="form-group">
            <label for="gender">Gender:</label>
            <input type="text" id="gender" name="gender" value="<?php echo $student['gender']; ?>" class="center-text-input" readonly>
        </div>
        <div class="form-group">
            <label for="contactNo">Contact No:</label>
            <input type="text" id="contactNo" name="contactNo" value="<?php echo $student['contactnumber']; ?>" class="center-text-input" readonly>
        </div>
    </div>

    <div class="form-row">
        <div class="form-group full-width">
            <label for="address">Address:</label>
            <input type="text" id="address" name="address" value="<?php echo $student['barangay'] . ', ' . $student['municipality'] . ', ' . $student['province']; ?>" class="center-text-input" readonly>
        </div>
    </div>
    
    <div class="form-row">
        <div class="form-group full-width">
            <label for="course">Course:</label>
            <input type="text" id="course" name="course" value="<?php echo $student['department']; ?>" class="center-text-input" readonly>
        </div>
    </div>

    <div class="form-row">
        <div class="form-group full-width">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo $student['email']; ?>" class="center-text-input" readonly>
        </div>
    </div>
</div>
