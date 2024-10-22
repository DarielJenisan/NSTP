<?php
require_once '../../../connection.php';

// Retrieve filter values from POST request
$academicYear = isset($_POST['academicYear']) ? $_POST['academicYear'] : 'All';
$component = isset($_POST['component']) ? $_POST['component'] : 'All';
$department = isset($_POST['department']) ? $_POST['department'] : 'All';

// Build the query with filters
$query = "SELECT student_id, awardyear, component, region, serialnumber, lastname, firstname, suffixname, middlename, birthday, 
          gender, barangay, municipality, province, school2, institutioncode, agencytype, program, department, major, email, 
          contactnumber FROM studentInformation_view WHERE 1=1";

// Filter by academic year
if ($academicYear !== 'All') {
    $query .= " AND (academicyear2 = :academicYear)";
}

// Filter by NSTP component (ROTC or CWTS)
if ($component !== 'All') {
    if ($component === 'ROTC') {
        $query .= " AND (semester1 = 'ROTC1' OR semester2 = 'ROTC2')";
    } elseif ($component === 'CWTS') {
        $query .= " AND (semester1 = 'CWTS1' OR semester2 = 'CWTS2')";
    }
}

// Filter by department/program
if ($department !== 'All') {
    $query .= " AND (department = :departmentFull OR department = :departmentShort)";
}

// Filter to include only students with a serial number
$query .= " AND (serialnumber IS NOT NULL AND serialnumber != '')";

// Order the results by award year and last name
$query .= " ORDER BY awardyear DESC, lastname ASC, firstname ASC";

// Prepare the statement
$stmt = $conn->prepare($query);

// Bind parameters if needed
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

// Fetch the results and display in table rows
foreach ($stmt->fetchAll() as $row): ?>
    <tr>
        <td style="border: 0.5px solid black; padding: 4px;" class="text-center"><?php echo $counter++; ?></td>
        <td style="border: 0.5px solid black; padding: 4px; background-color: #D3D3D3;"><?php echo $row['student_id']; ?></td>
        <td style="border: 0.5px solid black; padding: 4px;"><?php echo $row['awardyear']; ?></td>
        <td style="border: 0.5px solid black; padding: 4px; background-color: #D3D3D3;"><?php echo $row['component']; ?></td>
        <td style="border: 0.5px solid black; padding: 4px;"><?php echo $row['region']; ?></td>
        <td style="border: 0.5px solid black; padding: 4px; background-color: #D3D3D3;"><?php echo $row['serialnumber']; ?></td>
        <td style="border: 0.5px solid black; padding: 4px;"><?php echo $row['lastname']; ?></td>
        <td style="border: 0.5px solid black; padding: 4px; background-color: #D3D3D3;"><?php echo $row['firstname']; ?></td>
        <td style="border: 0.5px solid black; padding: 4px;"><?php echo $row['suffixname']; ?></td>
        <td style="border: 0.5px solid black; padding: 4px; background-color: #D3D3D3;"><?php echo $row['middlename']; ?></td>
        <td style="border: 0.5px solid black; padding: 4px;"><?php echo $row['birthday']; ?></td>
        <td style="border: 0.5px solid black; padding: 4px; background-color: #D3D3D3;"><?php echo $row['gender']; ?></td>
        <td style="border: 0.5px solid black; padding: 4px;"><?php echo $row['barangay']  . ', ' . $row['municipality'] . ', ' . $row['province']; ?></td>
        <td style="border: 0.5px solid black; padding: 4px; background-color: #D3D3D3;"><?php echo $row['school2']; ?></td>
        <td style="border: 0.5px solid black; padding: 4px;"><?php echo $row['institutioncode']; ?></td>
        <td style="border: 0.5px solid black; padding: 4px; background-color: #D3D3D3;"><?php echo $row['agencytype']; ?></td>
        <td style="border: 0.5px solid black; padding: 4px;"><?php echo $row['program']; ?></td>
        <td style="border: 0.5px solid black; padding: 4px; background-color: #D3D3D3;"><?php echo $row['department'] . ' ' . $row['major']; ?></td>
        <td style="border: 0.5px solid black; padding: 4px;"><?php echo $row['email']; ?></td>
        <td style="border: 0.5px solid black; padding: 4px; background-color: #D3D3D3;"><?php echo $row['contactnumber']; ?></td>
    </tr>
<?php endforeach; ?>
