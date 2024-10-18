<?php 
require_once '../../../connection.php';

// Function to determine completion status based on grade
function getGradeStatus($grade) {
    if ($grade == 0.99 || $grade === null || $grade === '') {
        return 'Drop';
    } elseif ($grade > 3.00) {
        return 'Failed';
    } elseif ($grade >= 1.00 && $grade <= 3.00) {
        return 'Complete';
    }
    return 'Unknown'; // In case there's an unexpected value
}

// Retrieve filter values from POST request
$academicYear = isset($_POST['academicYear']) ? $_POST['academicYear'] : 'All';
$component = isset($_POST['component']) ? $_POST['component'] : 'All';
$department = isset($_POST['department']) ? $_POST['department'] : 'All';

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

// Add the ORDER BY clause for sorting by academic year, last name, and first name
$query .= " ORDER BY academicyear2 DESC, lastname ASC, firstname ASC";

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

foreach ($stmt->fetchAll() as $row): ?>
    <tr>
    <td style="border: 0.5px solid black; padding: 4px;" class="text-center"><?php echo $counter++; ?></td>
        <td style="border: 0.5px solid black; padding: 4px; background-color: #D3D3D3;"><?php echo $row['student_id']?></td>
        <td style="border: 0.5px solid black; padding: 4px;"><?php echo $row['lastname']?></td>
        <td style="border: 0.5px solid black; padding: 4px; background-color: #D3D3D3;"><?php echo $row['firstname']?></td>
        <td style="border: 0.5px solid black; padding: 4px;"><?php echo $row['middlename']?></td>
        <td style="border: 0.5px solid black; padding: 4px; background-color: #D3D3D3;"><?php echo $row['suffixname']?></td>
        <td style="border: 0.5px solid black; padding: 4px;"><?php echo $row['gender']?></td>
        <td style="border: 0.5px solid black; padding: 4px; background-color: #D3D3D3;"><?php echo $row['semester1']?></td>
        <td style="border: 0.5px solid black; padding: 4px;"><?php echo $row['school1']?></td>
        <td style="border: 0.5px solid black; padding: 4px; background-color: #D3D3D3;"><?php echo $row['academicyear1']?></td>
        <td style="border: 0.5px solid black; padding: 4px;"><?php echo $row['sectioncode1']?></td>
        <td style="border: 0.5px solid black; padding: 4px;"> <small><?php echo getGradeStatus($row['grade1']); ?></small> </td>
        <td style="border: 0.5px solid black; padding: 4px; background-color: #D3D3D3;"><?php echo $row['semester2']?></td>
        <td style="border: 0.5px solid black; padding: 4px;"><?php echo $row['school2']?></td>
        <td style="border: 0.5px solid black; padding: 4px; background-color: #D3D3D3;"><?php echo $row['academicyear2']?></td>
        <td style="border: 0.5px solid black; padding: 4px;"><?php echo $row['sectioncode2']?></td>
        <td style="border: 0.5px solid black; padding: 4px;">  <small><?php echo getGradeStatus($row['grade2']); ?></small> </td>
        <td style="border: 0.5px solid black; padding: 4px; background-color: ;" class="btn-group dropstart">
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
            '<?php echo $row['semester2'] ?>',
            '<?php echo $row['school2'] ?>',
            '<?php echo $row['academicyear2'] ?>',
            '<?php echo $row['sectioncode2'] ?>',
            '<?php echo $row['serialnumber'] ?>',
            '<?php echo $row['remarks'] ?>',
            '<?php echo $row['awardyear'] ?>',
            '<?php echo $row['component'] ?>',
            '<?php echo $row['birthday'] ?>',
            '<?php echo $row['barangay'] ?>',
            '<?php echo $row['municipality'] ?>',
            '<?php echo $row['province'] ?>',
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
            '<?php echo $row['coordinator']; ?>'
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
            '<?php echo $row['semester2']; ?>',
            '<?php echo $row['academicyear2']; ?>',
            '<?php echo $row['school2']; ?>'
        )">
        <i class="fa fa-user"></i> View Profile</a></li>
         </ul>
         </td>
    </tr>
<?php endforeach; ?>
