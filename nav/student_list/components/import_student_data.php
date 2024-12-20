<?php
require '../../../connection.php'; // Ensure this file contains the PDO connection
require '../../../vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\IOFactory;

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_FILES['file']['name']) && $_FILES['file']['error'] == 0) {
        $fileName = $_FILES['file']['tmp_name'];

        try {
            // Load the uploaded Excel file using PhpSpreadsheet
            $spreadsheet = IOFactory::load($fileName);
            $sheet = $spreadsheet->getActiveSheet();
            $rows = $sheet->toArray();

            // Get headers from the first row
            $headers = $rows[0];

            // Start from the second row to skip headers
            for ($i = 1; $i < count($rows); $i++) {
                $row = $rows[$i];

                // Use associative array to store the values to be updated
                $updateData = [];
                $student_id = $row[array_search('student_id', $headers)] ?? null;

                if (empty($student_id)) {
                    continue; // Skip rows without a student_id
                }

                // Dynamically add fields to be updated only if the header exists
                if (($firstnameIndex = array_search('firstname', $headers)) !== false) {
                    $updateData['firstname'] = $row[$firstnameIndex];
                }
                if (($middlenameIndex = array_search('middlename', $headers)) !== false) {
                    $updateData['middlename'] = $row[$middlenameIndex];
                }
                if (($lastnameIndex = array_search('lastname', $headers)) !== false) {
                    $updateData['lastname'] = $row[$lastnameIndex];
                }
                if (($suffixnameIndex = array_search('suffixname', $headers)) !== false) {
                    $updateData['suffixname'] = $row[$suffixnameIndex];
                }
                if (($birthdayIndex = array_search('birthday', $headers)) !== false) {
                    $updateData['birthday'] = $row[$birthdayIndex];
                }
                if (($genderIndex = array_search('gender', $headers)) !== false) {
                    $updateData['gender'] = $row[$genderIndex];
                }
                if (($emailIndex = array_search('email', $headers)) !== false) {
                    $updateData['email'] = $row[$emailIndex];
                }
                if (($barangayIndex = array_search('barangay', $headers)) !== false) {
                    $updateData['barangay'] = $row[$barangayIndex];
                }
                if (($municipalityIndex = array_search('municipality', $headers)) !== false) {
                    $updateData['municipality'] = $row[$municipalityIndex];
                }
                if (($provinceIndex = array_search('province', $headers)) !== false) {
                    $updateData['province'] = $row[$provinceIndex];
                }
                if (($regionIndex = array_search('region', $headers)) !== false) {
                    $updateData['region'] = $row[$regionIndex];
                }
                if (($contactnumberIndex = array_search('contactnumber', $headers)) !== false) {
                    $updateData['contactnumber'] = $row[$contactnumberIndex];
                }
                if (($programIndex = array_search('program', $headers)) !== false) {
                    $updateData['program'] = $row[$programIndex];
                if (($yearlevelIndex = array_search('yearlevel', $headers)) !== false) {
                    $updateData['yearlevel'] = $row[$yearlevelIndex];
                }
                if (($majorIndex = array_search('major', $headers)) !== false) {
                    $updateData['major'] = $row[$majorIndex];
                }
                if (($serialnumberIndex = array_search('serialnumber', $headers)) !== false) {
                    $updateData['serialnumber'] = $row[$serialnumberIndex];
                }

                // Dynamically build the query for tblstudent
                if (!empty($updateData)) {
                    $updateFields = [];
                    foreach ($updateData as $key => $value) {
                        $updateFields[] = "$key = :$key";
                    }
                    $updateQuery = "UPDATE tblstudent SET " . implode(', ', $updateFields) . " WHERE student_id = :student_id";
                 if (($departmentIndex = array_search('department', $headers)) !== false) {
                $updateData['department'] = $row[$departmentIndex];
                }
 
                // Check if student already exists in the database
                $checkQuery = "SELECT COUNT(*) FROM tblstudent WHERE student_id = :student_id";
                $checkStmt = $conn->prepare($checkQuery);
                $checkStmt->bindValue(':student_id', $student_id);
                $checkStmt->execute();
                $studentExists = $checkStmt->fetchColumn() > 0;

                if (!empty($updateData)) {
                    if ($studentExists) {
                        // Update the existing record if the student exists
                        $updateFields = [];
                        foreach ($updateData as $key => $value) {
                            $updateFields[] = "$key = :$key";
                        }
                        $updateQuery = "UPDATE tblstudent SET " . implode(', ', $updateFields) . " WHERE student_id = :student_id";
                    } else {
                        // Insert a new record if the student does not exist
                        $fields = implode(', ', array_keys($updateData));
                        $placeholders = implode(', ', array_map(fn($key) => ":$key", array_keys($updateData)));
                        $updateQuery = "INSERT INTO tblstudent (student_id, $fields) VALUES (:student_id, $placeholders)";
                    }

                    $updateStmt = $conn->prepare($updateQuery);

                    // Bind the parameters dynamically
                    foreach ($updateData as $key => $value) {
                        $updateStmt->bindValue(":$key", $value);
                    }
                    $updateStmt->bindValue(':student_id', $student_id);
                    $updateStmt->execute();
                }

                // Now handle tblnstp updates similarly
                // Now handle tblnstp updates similarly (Check for existing record, update or insert)
                $updateNstpData = [];
                if (($semester1Index = array_search('semester1', $headers)) !== false) {
                    $updateNstpData['semester1'] = $row[$semester1Index];
                }
                if (($sectioncode1Index = array_search('sectioncode1', $headers)) !== false) {
                    $updateNstpData['sectioncode1'] = $row[$sectioncode1Index];
                }
                if (($school1Index = array_search('school1', $headers)) !== false) {
                    $updateNstpData['school1'] = $row[$school1Index];
                }
                if (($academicyear1Index = array_search('academicyear1', $headers)) !== false) {
                    $updateNstpData['academicyear1'] = $row[$academicyear1Index];
                }
                if (($semester2Index = array_search('semester2', $headers)) !== false) {
                    $updateNstpData['semester2'] = $row[$semester2Index];
                }
                if (($sectioncode2Index = array_search('sectioncode2', $headers)) !== false) {
                    $updateNstpData['sectioncode2'] = $row[$sectioncode2Index];
                }
                if (($school2Index = array_search('school2', $headers)) !== false) {
                    $updateNstpData['school2'] = $row[$school2Index];
                }
                if (($academicyear2Index = array_search('academicyear2', $headers)) !== false) {
                    $updateNstpData['academicyear2'] = $row[$academicyear2Index];
                }
                if (($awardyearIndex = array_search('awardyear', $headers)) !== false) {
                    $updateNstpData['awardyear'] = $row[$awardyearIndex];
                }
                if (($componentIndex = array_search('component', $headers)) !== false) {
                    $updateNstpData['component'] = $row[$componentIndex];
                }
                if (($institutioncodeIndex = array_search('institutioncode', $headers)) !== false) {
                    $updateNstpData['institutioncode'] = $row[$institutioncodeIndex];
                }
                if (($agencytypeIndex = array_search('agencytype', $headers)) !== false) {
                    $updateNstpData['agencytype'] = $row[$agencytypeIndex];
                }
                if (($remarksIndex = array_search('remarks', $headers)) !== false) {
                    $updateNstpData['remarks'] = $row[$remarksIndex];
                }

                // Dynamically build the query for tblnstp
                if (!empty($updateNstpData)) {
                    $updateFieldsNstp = [];
                    foreach ($updateNstpData as $key => $value) {
                        $updateFieldsNstp[] = "$key = :$key";
                    }
                    $updateQueryNstp = "UPDATE tblnstp SET " . implode(', ', $updateFieldsNstp) . " WHERE student_id = :student_id";
                    $updateStmtNstp = $conn->prepare($updateQueryNstp);

                    // Bind the parameters dynamically
                if (($programIndex = array_search('program', $headers)) !== false) {
                    $updateData['program'] = $row[$programIndex];
                }
                if (($grade1Index = array_search('grade1', $headers)) !== false) {
                    $updateNstpData['grade1'] = $row[$grade1Index];
                }
                if (($grade2Index = array_search('grade2', $headers)) !== false) {
                    $updateNstpData['grade2'] = $row[$grade2Index];
                }

                // Dynamically build the query for tblnstp
                if (!empty($updateNstpData)) {
                    $checkQueryNstp = "SELECT COUNT(*) FROM tblnstp WHERE student_id = :student_id";
                    $checkStmtNstp = $conn->prepare($checkQueryNstp);
                    $checkStmtNstp->bindValue(':student_id', $student_id);
                    $checkStmtNstp->execute();
                    $nstpExists = $checkStmtNstp->fetchColumn() > 0;

                    if ($nstpExists) {
                        $updateFieldsNstp = [];
                        foreach ($updateNstpData as $key => $value) {
                            $updateFieldsNstp[] = "$key = :$key";
                        }
                        $updateQueryNstp = "UPDATE tblnstp SET " . implode(', ', $updateFieldsNstp) . " WHERE student_id = :student_id";
                    } else {
                        $fieldsNstp = implode(', ', array_keys($updateNstpData));
                        $placeholdersNstp = implode(', ', array_map(fn($key) => ":$key", array_keys($updateNstpData)));
                        $updateQueryNstp = "INSERT INTO tblnstp (student_id, $fieldsNstp) VALUES (:student_id, $placeholdersNstp)";
                    }

                    $updateStmtNstp = $conn->prepare($updateQueryNstp);

                    foreach ($updateNstpData as $key => $value) {
                        $updateStmtNstp->bindValue(":$key", $value);
                    }
                    $updateStmtNstp->bindValue(':student_id', $student_id);
                    $updateStmtNstp->execute();
                }

            }

            echo json_encode(['success' => true, 'message' => 'Student data imported successfully.']);

        } catch (Exception $e) {
            echo json_encode(['success' => false, 'message' => 'Error reading the file: ' . $e->getMessage()]);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'File upload error. Please ensure a valid file is selected.']);
    }
            }

            echo json_encode(['status' => 'success', 'message' => 'Data updated/inserted successfully.']);
        } catch (Exception $e) {
            echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'No file uploaded.']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method.']);
}
?>
