<?php 
require_once '../../../connection.php';

// Function to determine enrollment status
function getEnrollmentStatus($grade, $sectionCode) {
    if (($grade === null || $grade === '') && !empty($sectionCode)) {
        return 'ENROLLED'; 
    }
    if ($grade == 0.00 && !empty($sectionCode)) {
        return 'DROP';
    } elseif ($grade > 3.00) {
        return 'FAILED'; 
    } elseif ($grade >= 1.00 && $grade <= 3.00) {
        return 'COMPLETE';
    }
    return ''; // Return empty if conditions aren't met
}

// Function to check alignment of semester components
function checkAlignment($semester1, $semester2) {
    if (($semester1 === 'CWTS1' && $semester2 === 'ROTC2') || ($semester1 === 'ROTC1' && $semester2 === 'CWTS2')) {
        return 'MISALIGNED';
    }
    return ''; // Return empty for other cases
}

// Retrieve filter values from POST request
$academicYear = isset($_POST['academicYear']) ? $_POST['academicYear'] : 'All';
$component = isset($_POST['component']) ? $_POST['component'] : 'All';
$department = isset($_POST['department']) ? $_POST['department'] : 'All';
$status = isset($_POST['status']) ? $_POST['status'] : 'All'; // New status filter

// Build the query with filters
$query = "SELECT * FROM studentInformation_view WHERE 1=1";

if ($academicYear !== 'All') {
    $query .= " AND (academicyear2 = :academicYear)";
}

// Adjust component filter to match NSTP component types (ROTC or CWTS)
if ($component !== 'All') {
    if ($component === 'ROTC') {
        $query .= " AND (semester1 = 'ROTC1' OR semester2 = 'ROTC2')";
    } elseif ($component === 'CWTS') {
        $query .= " AND (semester1 = 'CWTS1' OR semester2 = 'CWTS2')";
    }
}

// Adjust department filter to handle multiple possible values
if ($department !== 'All') {
    $query .= " AND (department = :departmentFull OR department = :departmentShort)";
}

// Adjust status filter based on selected status 
if ($status !== 'All') {
    if ($status === 'MISALIGNED') {
        $query .= " AND ((semester1 = 'CWTS1' AND semester2 = 'ROTC2') OR (semester1 = 'ROTC1' AND semester2 = 'CWTS2'))";
    } elseif ($status === 'COMPLETE') {
        $query .= " AND ((grade1 >= 1.00 AND grade1 <= 3.00) OR (grade2 >= 1.00 AND grade2 <= 3.00))";
    } elseif ($status === 'FAILED') {
        $query .= " AND ((grade1 > 3.00) OR (grade2 > 3.00))";
    } elseif ($status === 'DROP') {
        // Match records where either grade is 0.00 and sectionCode exists
        $query .= " AND ((grade1 = 0.00 AND sectionCode1 IS NOT NULL) OR (grade2 = 0.00 AND sectionCode2 IS NOT NULL))";
    } elseif ($status === 'ENROLLED') {
        // Match records where grade is NULL/empty but sectionCode exists
        $query .= " AND ((grade1 IS NULL OR grade1 = '') AND sectionCode1 IS NOT NULL) OR ((grade2 IS NULL OR grade2 = '') AND sectionCode2 IS NOT NULL)";
    }
}

// Add the ORDER BY clause for sorting by academic year, last name, and first name
$query .= " ORDER BY academicyear1 DESC, academicyear2 DESC, lastname ASC, firstname ASC";

// Prepare the statement
$stmt = $conn->prepare($query);

if ($academicYear !== 'All') {
    $stmt->bindParam(':academicYear', $academicYear);
}

if ($department !== 'All') {
    // Define department mappings
    $departmentMap = [
        'BSIT' => 'Bachelor of Science in Information Technology',
        'BSBA' => 'Bachelor of Science in Business Administration',
        'TEP' => 'Teacher Education Program'
    ];

    $departmentFull = isset($departmentMap[$department]) ? $departmentMap[$department] : $department;
    $departmentShort = array_search($departmentFull, $departmentMap) ?: $department;

    $stmt->bindParam(':departmentFull', $departmentFull);
    $stmt->bindParam(':departmentShort', $departmentShort);
}

$stmt->execute();

// Initialize counter for sequential numbering
$counter = 1;

foreach ($stmt->fetchAll() as $row):
    // Check if the current row is misaligned
    $misalignment = checkAlignment($row['semester1'], $row['semester2']);
    // Set the background color of the row based on the misalignment
    $rowStyle = $misalignment === 'MISALIGNED' ? 'background-color: red;' : ''; 
?>
<tr style="<?php echo $rowStyle; ?>">
    <td style="border: 0.5px solid black; padding: 4px;" class="text-center"><?php echo $counter++; ?></td>
    <td style="border: 0.5px solid black; padding: 4px;"><?php echo $row['student_id']?></td>
    <td style="border: 0.5px solid black; padding: 4px;"><?php echo $row['lastname']?></td>
    <td style="border: 0.5px solid black; padding: 4px;"><?php echo $row['firstname']?></td>
    <td style="border: 0.5px solid black; padding: 4px;"><?php echo $row['middlename']?></td>
    <td style="border: 0.5px solid black; padding: 4px;"><?php echo $row['suffixname']?></td>
    <td style="border: 0.5px solid black; padding: 4px;"><?php echo $row['gender']?></td>
    <td style="border: 0.5px solid black; padding: 4px;"><?php echo $row['semester1']?></td>
    <td style="border: 0.5px solid black; padding: 4px;"><?php echo $row['school1']?></td>
    <td style="border: 0.5px solid black; padding: 4px;"><?php echo $row['academicyear1']?></td>
    <td style="border: 0.5px solid black; padding: 4px;"><?php echo $row['sectioncode1']?></td>
    <td style="border: 0.5px solid black; padding: 4px;">
        <strong>
            <?php 
            echo getEnrollmentStatus($row['grade1'], $row['sectioncode1']); // New function to check enrollment status
            ?>
        </strong>
    </td>
    <td style="border: 0.5px solid black; padding: 4px;"><?php echo $row['semester2']?></td>
    <td style="border: 0.5px solid black; padding: 4px;"><?php echo $row['school2']?></td>
    <td style="border: 0.5px solid black; padding: 4px;"><?php echo $row['academicyear2']?></td>
    <td style="border: 0.5px solid black; padding: 4px;"><?php echo $row['sectioncode2']?></td>
    <td style="border: 0.5px solid black; padding: 4px;">
        <strong>
            <?php 
            echo getEnrollmentStatus($row['grade2'], $row['sectioncode2']); // Check for enrollment status
            ?>
        </strong>
    </td>
    <td style="border: 0.5px solid black; padding: 4px;"><strong style="font-size: 9px;"><?php echo checkAlignment($row['semester1'], $row['semester2']);?></strong></td>
    <td style="border: 0.5px solid black; padding: 4px; background-color: white;" class="btn-group dropstart">
            <button type="button" class="btn btn-success dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fas fa-user-edit"></i>
            </button>
            <ul class="dropdown-menu">

            <li>
                <a class="dropdown-item" onclick="loadUpdateStudent(
            '<?php echo $row['student_id'] ?>',
            '<?php echo $row['lastname'] ?>',
            '<?php echo $row['firstname'] ?>',
            '<?php echo $row['middlename'] ?>',
            '<?php echo $row['suffixname'] ?>',
            '<?php echo $row['gender'] ?>',
            '<?php echo $row['semester1'] ?>',
            '<?php echo $row['school1'] ?>',
            '<?php echo $row['academicyear1'] ?>',
            '<?php echo $row['sectioncode1'] ?>',
            '<?php echo $row['grade1'] ?>',
            '<?php echo $row['semester2'] ?>',
            '<?php echo $row['school2'] ?>',
            '<?php echo $row['academicyear2'] ?>',
            '<?php echo $row['sectioncode2'] ?>',
            '<?php echo $row['grade2'] ?>',
            '<?php echo $row['serialnumber'] ?>',
            '<?php echo $row['remarks'] ?>',
            '<?php echo $row['awardyear'] ?>',
            '<?php echo $row['component'] ?>',
            '<?php echo $row['birthday'] ?>',
            '<?php echo $row['barangay'] ?>',
            '<?php echo $row['municipality'] ?>',
            '<?php echo $row['province'] ?>',
            '<?php echo $row['region'] ?>',
            '<?php echo $row['institutioncode'] ?>',
            '<?php echo $row['agencytype'] ?>',
            '<?php echo $row['department'] ?>',
            '<?php echo $row['yearlevel'] ?>',
            '<?php echo $row['major'] ?>',
            '<?php echo $row['program'] ?>',
            '<?php echo $row['email'] ?>',
            '<?php echo $row['contactnumber'] ?>'
        )">
        <i class="fa fa-edit"></i> Edit</a></li>

        <li>
            <a class="dropdown-item" onclick="loadSlip(
            '<?php echo $row['semester1']; ?>',
            '<?php echo $row['semester2']; ?>',
            '<?php echo $row['student_id']; ?>',
            '<?php echo $row['firstname']; ?>',
            '<?php echo $row['middlename']; ?>',
            '<?php echo $row['lastname']; ?>',
            '<?php echo $row['suffixname']; ?>',
            '<?php echo $row['yearlevel']; ?>',
            '<?php echo $row['department']; ?>',
            '<?php echo $row['academicyear1']; ?>',
            '<?php echo $row['academicyear2']; ?>'
        )">
        <i class="fas fa-file-alt"></i> Slip</a></li>

           <li>
            <a class="dropdown-item" onclick="loadCertificate(
            '<?php echo $row['lastname']; ?>',
            '<?php echo $row['firstname']; ?>',
            '<?php echo $row['middlename']; ?>',
            '<?php echo $row['suffixname']; ?>',
            '<?php echo $row['serialnumber']; ?>',
            '<?php echo $row['academicyear2']; ?>',
            '<?php echo $row['semester1']; ?>',
            '<?php echo $row['semester2']; ?>',
            '<?php echo $row['daterelease']; ?>',
            '<?php echo $row['coordinator']; ?>',
            '<?php echo $row['coor_position']; ?>',
            '<?php echo $row['command1']; ?>',
            '<?php echo $row['command_position1']; ?>',
            '<?php echo $row['command2']; ?>',
            '<?php echo $row['command_position2']; ?>'
        )">
        <i class="fa fa-qrcode"></i> Certificate</a></li>
            <li><hr class="dropdown-divider"></li>

            <li>
                <a class="dropdown-item" onclick="loadStudentProfile(
            '<?php echo $row['student_id']; ?>',
            '<?php echo $row['firstname']; ?>',
            '<?php echo $row['middlename']; ?>',
            '<?php echo $row['lastname']; ?>',
            '<?php echo $row['suffixname']; ?>',
            '<?php echo $row['serialnumber']; ?>',
            '<?php echo $row['birthday']; ?>',
            '<?php echo $row['gender']; ?>',
            '<?php echo $row['barangay']; ?>',
            '<?php echo $row['municipality']; ?>',
            '<?php echo $row['province']; ?>',
            '<?php echo $row['department']; ?>',
            '<?php echo $row['major']; ?>',
            '<?php echo $row['contactnumber']; ?>',
            '<?php echo $row['email']; ?>',
            '<?php echo $row['semester1']; ?>',
            '<?php echo $row['academicyear1']; ?>',
            '<?php echo $row['school1']; ?>',
            ' <?php 
                echo getEnrollmentStatus($row['grade1'], $row['sectioncode1']); // Check for enrollment status
                ?>',
            '<?php echo $row['semester2']; ?>',
            '<?php echo $row['academicyear2']; ?>',
            '<?php echo $row['school2']; ?>',
            ' <?php 
                echo getEnrollmentStatus($row['grade2'], $row['sectioncode2']); // Check for enrollment status
                ?>'
        )">
        <i class="fa fa-user"></i> View Profile</a></li>
         </ul>
         </td>
    </tr>
<?php endforeach; ?>