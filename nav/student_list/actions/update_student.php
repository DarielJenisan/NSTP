<?php 
// update_student.php

// Include the database connection
require_once '../../../connection.php';

try {
    // Begin Transaction
    $conn->beginTransaction();

    // Function to sanitize input data
    function sanitize($data) {
        return htmlspecialchars(strip_tags(trim($data)));
    }

    // Retrieve and sanitize POST data
    $student_id      = isset($_POST['student_id']) ? sanitize($_POST['student_id']) : '';
    $lastname        = isset($_POST['lastname']) ? sanitize($_POST['lastname']) : '';
    $firstname       = isset($_POST['firstname']) ? sanitize($_POST['firstname']) : '';
    $middlename      = isset($_POST['middlename']) ? sanitize($_POST['middlename']) : '';
    $suffixname      = isset($_POST['suffixname']) ? sanitize($_POST['suffixname']) : '';
    $gender          = isset($_POST['gender']) ? sanitize($_POST['gender']) : '';
    $semester1       = isset($_POST['semester1']) ? sanitize($_POST['semester1']) : '';
    $school1         = isset($_POST['school1']) ? sanitize($_POST['school1']) : '';
    $academicyear1   = isset($_POST['academicyear1']) ? sanitize($_POST['academicyear1']) : '';
    $sectioncode1    = isset($_POST['sectioncode1']) ? sanitize($_POST['sectioncode1']) : '';
    $grade1          = isset($_POST['grade1']) ? sanitize($_POST['grade1']) : '';
    $semester2       = isset($_POST['semester2']) ? sanitize($_POST['semester2']) : '';
    $school2         = isset($_POST['school2']) ? sanitize($_POST['school2']) : '';
    $academicyear2   = isset($_POST['academicyear2']) ? sanitize($_POST['academicyear2']) : '';
    $sectioncode2    = isset($_POST['sectioncode2']) ? sanitize($_POST['sectioncode2']) : '';
    $grade2          = isset($_POST['grade2']) ? sanitize($_POST['grade2']) : '';
    $serialnumber    = isset($_POST['serialnumber']) ? sanitize($_POST['serialnumber']) : '';
    $remarks         = isset($_POST['remarks']) ? sanitize($_POST['remarks']) : '';
    $awardyear       = isset($_POST['awardyear']) ? sanitize($_POST['awardyear']) : '';
    $component       = isset($_POST['component']) ? sanitize($_POST['component']) : '';
    $birthday        = isset($_POST['birthday']) ? sanitize($_POST['birthday']) : '';
    $barangay        = isset($_POST['barangay']) ? sanitize($_POST['barangay']) : '';
    $municipality    = isset($_POST['municipality']) ? sanitize($_POST['municipality']) : '';
    $province        = isset($_POST['province']) ? sanitize($_POST['province']) : '';
    $region        = isset($_POST['region']) ? sanitize($_POST['region']) : '';
    $institutioncode = isset($_POST['institutioncode']) ? sanitize($_POST['institutioncode']) : '';
    $agencytype      = isset($_POST['agencytype']) ? sanitize($_POST['agencytype']) : '';
    $yearlevel       = isset($_POST['yearlevel']) ? sanitize($_POST['yearlevel']) : '';
    $department      = isset($_POST['department']) ? sanitize($_POST['department']) : '';
    $program         = isset($_POST['program']) ? sanitize($_POST['program']) : '';
    $major           = isset($_POST['major']) ? sanitize($_POST['major']) : '';
    $email           = isset($_POST['email']) ? filter_var($_POST['email'], FILTER_SANITIZE_EMAIL) : '';
    $contactnumber   = isset($_POST['contactnumber']) ? sanitize($_POST['contactnumber']) : '';

    // Basic validation
    if (empty($student_id)) {
        throw new Exception('Student ID is required.');
    }

    // 1. Update tblstudent
    $updateStudentQry = $conn->prepare("
        UPDATE tblstudent SET
            lastname = :lastname,
            firstname = :firstname,
            middlename = :middlename,
            suffixname = :suffixname,
            gender = :gender,
            birthday = :birthday,
            email = :email,
            barangay = :barangay,
            municipality = :municipality,
            province = :province,
            region = :region,
            yearlevel = :yearlevel,
            department = :department,
            major = :major,
            serialnumber = :serialnumber,
            contactnumber = :contactnumber
        WHERE student_id = :student_id
    ");
    $updateStudentQry->execute([
        ':lastname'      => $lastname,
        ':firstname'     => $firstname,
        ':middlename'    => $middlename,
        ':suffixname'    => $suffixname,
        ':gender'        => $gender,
        ':birthday'      => $birthday,
        ':email'         => $email,
        ':barangay'      => $barangay,
        ':municipality'  => $municipality,
        ':province'      => $province,
        ':region'        => $region,
        ':yearlevel'     => $yearlevel,
        ':department'    => $department,
        ':major'         => $major,
        ':serialnumber'  => $serialnumber,
        ':contactnumber' => $contactnumber,
        ':student_id'    => $student_id
    ]);

    // 2. Update tblnstp for Semester 1 and Semester 2 (Update single record for both semesters)
    $updateNstpQry = $conn->prepare("
        UPDATE tblnstp SET
            semester1 = :semester1,
            sectioncode1 = :sectioncode1,
            school1 = :school1,
            academicyear1 = :academicyear1,
            grade1 = :grade1,
            semester2 = :semester2,
            sectioncode2 = :sectioncode2,
            school2 = :school2,
            academicyear2 = :academicyear2,
            grade2 = :grade2,
            awardyear = :awardyear,
            component = :component,
            institutioncode = :institutioncode,
            agencytype = :agencytype,
            remarks = :remarks
        WHERE student_id = :student_id AND nstp_id = (
            SELECT nstp_id FROM tblnstp WHERE student_id = :student_id LIMIT 1
        )
            program = :program,
            remarks = :remarks
        WHERE student_id = :student_id
    ");
    $updateNstpQry->execute([
        ':semester1'     => $semester1,
        ':sectioncode1'  => $sectioncode1,
        ':school1'       => $school1,
        ':academicyear1' => $academicyear1,
        ':grade1'        => $grade1,
        ':semester2'     => $semester2,
        ':sectioncode2'  => $sectioncode2,
        ':school2'       => $school2,
        ':academicyear2' => $academicyear2,

        ':grade2'        => $grade2,

        ':awardyear'       => $awardyear,
        ':component'       => $component,
        ':institutioncode' => $institutioncode,
        ':agencytype'      => $agencytype,
        ':remarks'         => $remarks,
        ':student_id'    => $student_id
    ]);

    


        ':awardyear'     => $awardyear,
        ':component'     => $component,
        ':institutioncode' => $institutioncode,
        ':agencytype'    => $agencytype,
        ':program'       => $program,
        ':remarks'       => $remarks,
        ':student_id'    => $student_id
    ]);

    // Commit Transaction
    $conn->commit();

    echo 'success';
} catch (Exception $e) {
    // Rollback Transaction on error
    $conn->rollBack();
    // For security reasons, avoid exposing detailed error messages in production
    echo 'Error: ' . $e->getMessage();
}
?>
