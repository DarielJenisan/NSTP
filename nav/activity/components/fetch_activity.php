<?php
// Include database connection file
include '../../../connection.php'; // Update this path to your actual DB connection file

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Check if log_id is provided to fetch specific log details
    if (isset($_GET['log_id'])) {
        $logId = intval($_GET['log_id']);
        
        // Prepare the SQL statement to fetch details of a specific log entry
        $stmt = $conn->prepare("SELECT action_type, action_time, admin_id, action_details FROM tblactivity_logs WHERE log_id = ?");
        $stmt->bind_param("i", $logId);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            // Fetch data for the specific log
            $logDetails = $result->fetch_assoc();
            echo json_encode(['success' => true, 'data' => $logDetails]);
        } else {
            echo json_encode(['success' => false, 'error' => 'Log not found']);
        }

        $stmt->close();
    } else {
        // No log_id provided, fetch all logs
        $logs = [];
        $query = "SELECT log_id, action_type, action_time, admin_id FROM tblactivity_logs ORDER BY action_time DESC";
        $result = $conn->query($query);

        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $logs[] = $row;
            }
            echo json_encode(['success' => true, 'data' => $logs]);
        } else {
            echo json_encode(['success' => false, 'error' => 'No logs found']);
        }
    }
} else {
    echo json_encode(['success' => false, 'error' => 'Invalid request method']);
}

// Close the database connection
$conn->close();
?>
