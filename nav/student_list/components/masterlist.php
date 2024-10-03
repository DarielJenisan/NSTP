<?php 
require_once '../../../connection.php';

// Retrieve filter values from POST request
$academicYear = isset($_POST['academicYear']) ? $_POST['academicYear'] : 'All';
$component = isset($_POST['component']) ? $_POST['component'] : 'All';
$program = isset($_POST['program']) ? $_POST['program'] : 'All';

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

// Adjust program filter to handle multiple possible values
if ($program !== 'All') {
    $query .= " AND (program = :programFull OR program = :programShort)";
}

// Add the ORDER BY clause for sorting by academic year, last name, and first name
$query .= " ORDER BY academicyear2 DESC, lastname ASC, firstname ASC";

// Prepare the statement
$stmt = $conn->prepare($query);

if ($academicYear !== 'All') {
    $stmt->bindParam(':academicYear', $academicYear);
}

if ($program !== 'All') {
    // Define program mappings
    $programMap = [
        'BSIT' => 'Bachelor of Science in Information Technology',
        'BSBA' => 'Bachelor of Science in Business Administration',
        'TEP' => 'Teacher Education Program'
    ];

    $programFull = isset($programMap[$program]) ? $programMap[$program] : $program;
    $programShort = array_search($programFull, $programMap) ?: $program;

    $stmt->bindParam(':programFull', $programFull);
    $stmt->bindParam(':programShort', $programShort);
}

$stmt->execute();

// Initialize counter for sequential numbering
$counter = 1;

foreach ($stmt->fetchAll() as $row): ?>
    <tr>
        <td style="border: 0.5px solid black; padding: 4px; background-color: ;" class="text-center"><?php echo $counter++; ?></td>
        <td style="border: 0.5px solid black; padding: 4px; background-color: #D3D3D3;"><?php echo $row['student_id']?></td>
        <td style="border: 0.5px solid black; padding: 4px; background-color: ;"><?php echo $row['lastname']?></td>
        <td style="border: 0.5px solid black; padding: 4px; background-color: #D3D3D3;"><?php echo $row['firstname']?></td>
        <td style="border: 0.5px solid black; padding: 4px; background-color: ;"><?php echo $row['middlename']?></td>
        <td style="border: 0.5px solid black; padding: 4px; background-color: #D3D3D3;"><?php echo $row['suffixname']?></td>
        <td style="border: 0.5px solid black; padding: 4px; background-color: ;"><?php echo $row['gender']?></td>
        <td style="border: 0.5px solid black; padding: 4px; background-color: #D3D3D3;"><?php echo $row['semester1']?></td>
        <td style="border: 0.5px solid black; padding: 4px; background-color: ;"><?php echo $row['school1']?></td>
        <td style="border: 0.5px solid black; padding: 4px; background-color: #D3D3D3;"><?php echo $row['academicyear1']?></td>
        <td style="border: 0.5px solid black; padding: 4px; background-color: ;"><?php echo $row['sectioncode1']?></td>
        <td style="border: 0.5px solid black; padding: 4px; background-color: #D3D3D3;"><?php echo $row['semester2']?></td>
        <td style="border: 0.5px solid black; padding: 4px; background-color: ;"><?php echo $row['school2']?></td>
        <td style="border: 0.5px solid black; padding: 4px; background-color: #D3D3D3;"><?php echo $row['academicyear2']?></td>
        <td style="border: 0.5px solid black; padding: 4px; background-color: ;"><?php echo $row['sectioncode2']?></td>
        <td style="border: 0.5px solid black; padding: 4px; background-color: #D3D3D3;"><?php echo $row['serialnumber']?></td>
        <td style="border: 0.5px solid black; padding: 4px; background-color: ;"><?php echo $row['remarks']?></td>
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
            '<?php echo $row['program'] ?>',
            '<?php echo $row['major'] ?>',
            '<?php echo $row['email'] ?>',
            '<?php echo $row['contactnumber'] ?>'
        )">
        <i class="fa fa-edit"></i> Edit</a></li>

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
            '<?php echo $row['program']; ?>',
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
