<?php 
require_once '../../../connection.php';

// Function to determine completion status based on grade
function getGradeStatus($grade) {
    if ($grade == 0.00) {
        return 'Drop';
    } elseif ($grade > 3.00) {
        return 'Failed';
    } elseif ($grade >= 1.00 && $grade <= 3.00) {
        return 'Complete';
    }
}

// Function to determine enrollment status
function getEnrollmentStatus($grade, $sectionCode) {
    if (empty($grade) && !empty($sectionCode)) {
        return 'Enrolled';
    }
    return ''; // Return empty if conditions aren't met
}

// Retrieve filter values from POST request
$academicYear = isset($_POST['academicYear']) ? $_POST['academicYear'] : 'All';
$component = isset($_POST['component']) ? $_POST['component'] : 'All';
$department = isset($_POST['department']) ? $_POST['department'] : 'All';

// Build the query with filters
$query = "SELECT * FROM studentInformation_view WHERE 1=1";

if ($academicYear !== 'All') {
    $query .= " AND (academicyear1 = :academicYear OR academicyear2 = :academicYear)";
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
        'TEP' => 'Teacher Education department'
    ];

    $departmentFull = isset($departmentMap[$department]) ? $departmentMap[$department] : $department;
    $departmentShort = array_search($departmentFull, $departmentMap) ?: $department;

    // SELECT * FROM tblnstp1 a WHERE a.semester1 like 'value'
    $stmt->bindParam(':departmentFull', $departmentFull);
    $stmt->bindParam(':departmentShort', $departmentShort);
}

$stmt->execute();

// Initialize counter for sequential numbering
$counter = 1;

foreach ($stmt->fetchAll() as $row): ?>
    <tr>
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
        <td style="border: 0.5px solid black; padding: 4px;"><?php echo $row['grade1']?></td>
        <td style="border: 0.5px solid black; padding: 4px;">  <small><?php 
                echo getGradeStatus($row['grade1']); // Existing function to get grade status
                echo getEnrollmentStatus($row['grade1'], $row['sectioncode1']); // New function to check enrollment status
                ?></small> </td>
        <td style="border: 0.5px solid black; padding: 4px;"><?php echo $row['semester2']?></td>
        <td style="border: 0.5px solid black; padding: 4px;"><?php echo $row['school2']?></td>
        <td style="border: 0.5px solid black; padding: 4px;"><?php echo $row['academicyear2']?></td>
        <td style="border: 0.5px solid black; padding: 4px;"><?php echo $row['sectioncode2']?></td>
        <td style="border: 0.5px solid black; padding: 4px;"><?php echo $row['grade2']?></td>
        <td style="border: 0.5px solid black; padding: 4px;">  <small><?php 
                echo getGradeStatus($row['grade2']); // Existing function for grade
                echo getEnrollmentStatus($row['grade2'], $row['sectioncode2']); // Check for enrollment status
                ?></small> </td>
        <td style="border: 0.5px solid black; padding: 4px;"><?php echo $row['serialnumber']?></td>
        <td style="border: 0.5px solid black; padding: 4px;"><?php echo $row['remarks']?></td>
        <td style="border: 0.5px solid black; padding: 4px;"><?php echo $row['awardyear']?></td>
        <td style="border: 0.5px solid black; padding: 4px;"><?php echo $row['component']?></td>
        <td style="border: 0.5px solid black; padding: 4px;"><?php echo $row['birthday']?></td>
        <td style="border: 0.5px solid black; padding: 4px;"><?php echo $row['barangay']?></td>
        <td style="border: 0.5px solid black; padding: 4px;"><?php echo $row['municipality']?></td>
        <td style="border: 0.5px solid black; padding: 4px;"><?php echo $row['province']?></td>
        <td style="border: 0.5px solid black; padding: 4px;"><?php echo $row['region']?></td>
        <td style="border: 0.5px solid black; padding: 4px;"><?php echo $row['school2']?></td>
        <td style="border: 0.5px solid black; padding: 4px;"><?php echo $row['institutioncode']?></td>
        <td style="border: 0.5px solid black; padding: 4px;"><?php echo $row['agencytype']?></td>
        <td style="border: 0.5px solid black; padding: 4px;"><?php echo $row['yearlevel']?></td>
        <td style="border: 0.5px solid black; padding: 4px;"><?php echo $row['department']?></td>
        <td style="border: 0.5px solid black; padding: 4px;"><?php echo $row['major']?></td>
        <td style="border: 0.5px solid black; padding: 4px;"><?php echo $row['program']?></td>
        <td style="border: 0.5px solid black; padding: 4px;"><?php echo $row['department'] . ' (' . $row['major'] . ')';?></td>
        <td style="border: 0.5px solid black; padding: 4px;"><?php echo $row['email']?></td>
        <td style="border: 0.5px solid black; padding: 4px;"><?php echo $row['contactnumber']?></td>   
    </tr>
<?php endforeach; ?>