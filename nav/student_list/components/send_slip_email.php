<?php
// Include your connection file
include('../../../connection.php');

// Include PHPMailer library
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../../../path_to_phpmailer/PHPMailer/src/Exception.php';
require '../../../path_to_phpmailer/PHPMailer/src/PHPMailer.php';
require '../../../path_to_phpmailer/PHPMailer/src/SMTP.php';

if (isset($_POST['student_id'], $_POST['imageData'])) {
    // Fetch the email from the database using the student_id
    $student_id = $_POST['student_id'];

    try {
        // Prepare the query to fetch the email
        $query = "SELECT email FROM tblstudent WHERE student_id = :student_id";
        
        // Prepare the statement
        $stmt = $conn->prepare($query);
        // Bind the student_id as a parameter using PDO
        $stmt->bindParam(':student_id', $student_id, PDO::PARAM_INT);
        $stmt->execute();

        // Fetch the email from the result
        $email = $stmt->fetchColumn();

        // Check if email was retrieved
        if (!$email) {
            echo 'Email not found for the student.';
            exit;
        }

        // Email subject and message
        $subject = $_POST['slipType'] . " Slip";
        $message = "Please find your " . $_POST['slipType'] . " slip attached.";

        // Extract base64 data and convert to file
        $imageData = $_POST['imageData'];
        $imageData = str_replace('data:image/png;base64,', '', $imageData);
        $imageData = str_replace(' ', '+', $imageData);
        $data = base64_decode($imageData);
        $file = $_POST['slipType'] . '_Slip.png';
        file_put_contents($file, $data);

        // Instantiate PHPMailer
        $mail = new PHPMailer(true);

        try {
            // Server settings
            $mail->isSMTP();                                // Send using SMTP
            $mail->Host       = 'smtp.your-smtp-server.com'; // Set the SMTP server
            $mail->SMTPAuth   = true;                       // Enable SMTP authentication
            $mail->Username   = 'your-email@example.com';   // SMTP username
            $mail->Password   = 'your-email-password';      // SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Enable TLS encryption
            $mail->Port       = 587;                        // TCP port to connect to

            // Recipients
            $mail->setFrom('nstp-office@example.com', 'NSTP Office');
            $mail->addAddress($email); // Add the student's email

            // Attachments
            $mail->addAttachment($file); // Attach the slip file

            // Content
            $mail->isHTML(true); // Set email format to HTML
            $mail->Subject = $subject;
            $mail->Body    = $message;

            // Send email
            $mail->send();
            echo 'Email sent successfully to ' . $email;
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }

        // Delete the temporary file
        unlink($file);

    } catch (PDOException $e) {
        echo 'Database error: ' . $e->getMessage();
        exit;
    }

} else {
    echo 'Invalid request.';
}
?>
