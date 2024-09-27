<?php
header('Content-Type: application/json'); // Set content type to JSON

include '../../../connection.php'; // Include your database connection

try {
    // Retrieve the selected program from the query parameters (if provided)
    $selectedProgram = isset($_GET['program']) ? $_GET['program'] : 'All';

    // Prepare the base SQL query
    $sql = "SELECT firstname, middlename, lastname, suffixname, serialnumber, academicyear2, daterelease, 
            coordinator, semester1, semester2, program 
            FROM studentinformation_view";

    // Modify SQL query if a specific program is selected
    if ($selectedProgram !== 'All') {
        $sql .= " WHERE program = :program"; // Add WHERE clause to filter by program
    }

    $stmt = $conn->prepare($sql);

    // Bind the program parameter if filtering by program
    if ($selectedProgram !== 'All') {
        $stmt->bindParam(':program', $selectedProgram, PDO::PARAM_STR);
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
            'semester1'    => $student['semester1'] ?? '',
            'semester2'    => $student['semester2'] ?? '',
            'program'      => $student['program'] ?? '',
        ];
    }, $students);

    echo json_encode($processedStudents); // Return JSON encoded data

} catch (PDOException $e) {
    echo json_encode(['error' => $e->getMessage()]); // Return error message in JSON format
}
?>
