<?php
header('Content-Type: application/json'); // Set content type to JSON

include '../../../connection.php'; // Include your database connection

try {
    // Retrieve the selected department from the query parameters (if provided)
    $selectedDeparment = isset($_GET['department']) ? $_GET['department'] : 'All';

    // Prepare the base SQL query
    $sql = "SELECT firstname, middlename, lastname, suffixname, serialnumber, academicyear2, daterelease, 
            coordinator, coor_position, command1, command_position1, command2, command_position2, semester1, semester2, department 
            FROM studentinformation_view";

    // Modify SQL query if a specific department is selected
    if ($selectedDeparment !== 'All') {
        $sql .= " WHERE department = :department"; // Add WHERE clause to filter by department
    }

    $stmt = $conn->prepare($sql);

    // Bind the department parameter if filtering by department
    if ($selectedDeparment !== 'All') {
        $stmt->bindParam(':department', $selectedDeparment, PDO::PARAM_STR);
    }

    $stmt->execute();

    $students = $stmt->fetchAll(PDO::FETCH_ASSOC); // Fetch data as an associative array

    // Process the data to replace null values with empty strings
    $processedStudents = array_map(function($student) {
        return [
            'firstname'    => $student['firstname'] ?? '',
            'middlename'   => $student['middlename'] ?? '',
            'lastname'     => $student['lastname'] ?? '',
            'suffixname'   => $student['suffixname'] ?? '',
            'serialnumber' => $student['serialnumber'] ?? '',
            'academicyear2'=> $student['academicyear2'] ?? '',
            'daterelease'  => $student['daterelease'] ?? '',
            'coordinator'  => $student['coordinator'] ?? '',
            'coor_position'  => $student['coor_position'] ?? '',
            'command1'=> $student['command1'] ?? '',
            'command_position1'  => $student['command_position1'] ?? '',
            'command2'  => $student['command2'] ?? '',
            'command_position2'  => $student['command_position2'] ?? '',
            'semester1'    => $student['semester1'] ?? '',
            'semester2'    => $student['semester2'] ?? '',
            'department'      => $student['department'] ?? '',
        ];
    }, $students);

    echo json_encode($processedStudents); // Return JSON encoded data

} catch (PDOException $e) {
    echo json_encode(['error' => $e->getMessage()]); // Return error message in JSON format
}
?>
