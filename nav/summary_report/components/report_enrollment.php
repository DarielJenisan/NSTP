<?php 
require_once '../../../connection.php';

// Fetch the latest academic year with data for either 1st or 2nd semester
$queryLatestYear = $conn->query("SELECT MAX(GREATEST(academicyear1, academicyear2)) AS latest_year 
                                 FROM studentInformation_view");
$latestYearRow = $queryLatestYear->fetch(PDO::FETCH_ASSOC);
$latestAcademicYear = $latestYearRow['latest_year'];

// Use the academic year provided by the user or the latest year if no input
$academicYear = $_POST['academicYear'] ?? $latestAcademicYear;

// Mapping department names to abbreviations
$departmentMap = [
    'Bachelor of Science in Information Technology' => 'BSIT',
    'Bachelor of Science in Business Administration' => 'BSBA',
    'Teacher Education Program' => 'TEP'
];

// Array to store total counts
$totals = [
    'BSBA' => ['rotc1' => ['MALE' => 0, 'FEMALE' => 0], 'cwts1' => ['MALE' => 0, 'FEMALE' => 0], 'rotc2' => ['MALE' => 0, 'FEMALE' => 0], 'cwts2' => ['MALE' => 0, 'FEMALE' => 0]],
    'BSIT' => ['rotc1' => ['MALE' => 0, 'FEMALE' => 0], 'cwts1' => ['MALE' => 0, 'FEMALE' => 0], 'rotc2' => ['MALE' => 0, 'FEMALE' => 0], 'cwts2' => ['MALE' => 0, 'FEMALE' => 0]],
    'TEP' => ['rotc1' => ['MALE' => 0, 'FEMALE' => 0], 'cwts1' => ['MALE' => 0, 'FEMALE' => 0], 'rotc2' => ['MALE' => 0, 'FEMALE' => 0], 'cwts2' => ['MALE' => 0, 'FEMALE' => 0]],
];

// Query to fetch student data for the selected academic year
$query = $conn->prepare("SELECT department, gender, semester1, academicyear1, semester2, academicyear2 
                         FROM studentInformation_view
                         WHERE (academicyear1 = :academicYear OR academicyear2 = :academicYear)");
$query->bindParam(':academicYear', $academicYear);
$query->execute();

// Process the results and update counts
while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
    $department = $row['department'];
    $gender = strtoupper($row['gender']); // Normalize gender to uppercase

    // Check if the department is in the map, then get the abbreviation
    if (isset($departmentMap[$department])) {
        $departmentAbbr = $departmentMap[$department];
    } else {
        continue; // Skip if the department is not in the mapping
    }

    // Update counts for 1st Semester (semester1 values: ROTC1, CWTS1 based on academicyear1)
    if ($row['semester1'] == 'ROTC1' && $row['academicyear1'] == $academicYear) {
        $totals[$departmentAbbr]['rotc1'][$gender]++;
    } elseif ($row['semester1'] == 'CWTS1' && $row['academicyear1'] == $academicYear) {
        $totals[$departmentAbbr]['cwts1'][$gender]++;
    }

    // Update counts for 2nd Semester (semester2 values: ROTC2, CWTS2 based on academicyear2)
    if ($row['semester2'] == 'ROTC2' && $row['academicyear2'] == $academicYear) {
        $totals[$departmentAbbr]['rotc2'][$gender]++;
    } elseif ($row['semester2'] == 'CWTS2' && $row['academicyear2'] == $academicYear) {
        $totals[$departmentAbbr]['cwts2'][$gender]++;
    }
}

// Function to display the counts
function displayCounts($departmentAbbr, $component, $totals) {
    $male = $totals[$departmentAbbr][$component]['MALE'];
    $female = $totals[$departmentAbbr][$component]['FEMALE'];
    $total = $male + $female;
    return "<td>$male</td><td>$female</td><td>$total</td>";
}

// Start of the table structure
?>
<tr>
    <td>BSBA</td>
    <?= displayCounts('BSBA', 'rotc1', $totals); ?>
    <?= displayCounts('BSBA', 'cwts1', $totals); ?>
    <?= displayCounts('BSBA', 'rotc2', $totals); ?>
    <?= displayCounts('BSBA', 'cwts2', $totals); ?>
</tr>
<tr>
    <td>BSIT</td>
    <?= displayCounts('BSIT', 'rotc1', $totals); ?>
    <?= displayCounts('BSIT', 'cwts1', $totals); ?>
    <?= displayCounts('BSIT', 'rotc2', $totals); ?>
    <?= displayCounts('BSIT', 'cwts2', $totals); ?>
</tr>
<tr>
    <td>TEP</td>
    <?= displayCounts('TEP', 'rotc1', $totals); ?>
    <?= displayCounts('TEP', 'cwts1', $totals); ?>
    <?= displayCounts('TEP', 'rotc2', $totals); ?>
    <?= displayCounts('TEP', 'cwts2', $totals); ?>
</tr>
<tr class="grand-total-enroll">
    <td>Grand Total</td>
    <?php 
    // Calculate and display grand totals for each component
    $grandTotals = [
        'rotc1' => ['MALE' => 0, 'FEMALE' => 0], 
        'cwts1' => ['MALE' => 0, 'FEMALE' => 0], 
        'rotc2' => ['MALE' => 0, 'FEMALE' => 0], 
        'cwts2' => ['MALE' => 0, 'FEMALE' => 0]
    ];
    
    foreach ($totals as $departmentAbbr => $components) {
        foreach ($components as $component => $genders) {
            $grandTotals[$component]['MALE'] += $genders['MALE'];
            $grandTotals[$component]['FEMALE'] += $genders['FEMALE'];
        }
    }

    foreach ($grandTotals as $component => $genders) {
        $male = $genders['MALE'];
        $female = $genders['FEMALE'];
        $total = $male + $female;
        echo "<td>$male</td><td>$female</td><td>$total</td>";
    }
    ?>
</tr>

<?php
// End of table
?>
