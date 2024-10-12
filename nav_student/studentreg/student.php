<style>
    /* Basic container styling */
    .nstp-container {
        font-family: Arial, sans-serif;
        background-color: #f9f9f9;
        padding: 20px;
    }

    /* Adding margin-top to the h1 */
    .nstp-container h1 {
        color: #333;
        margin-top: 60px;
    }

    .nstp-container h2, .nstp-container p {
        color: #333;
    }

    /* Flex container for the two sections */
    .nstp-flex-container {
        display: flex;
        justify-content: space-between;
        gap: 20px; /* Add space between the two sections */
        margin-bottom: 20px;
    }

    /* Styling for each NSTP section with background image */
    .nstp-section {
        flex: 1; /* This makes both sections take up equal space */
        padding: 15px;
        border: 1px solid #ddd;
        border-radius: 8px;
        background-color: rgba(255, 255, 255, 0.9); /* Slight transparency for content */
        background-size: cover; /* Cover the entire section with the background image */
        background-position: center; /* Center the background image */
        display: flex;
        flex-direction: column; /* Flex column to align content and button */
        justify-content: space-between; /* Space between content and button */
        position: relative;
    }

    /* Adding a faded overlay effect */
    .nstp-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(255, 255, 255, 0.8); /* Faded effect */
        z-index: 1; /* Ensure it appears over the background image but under the text */
        border-radius: 8px; /* Match border radius */
    }

    /* Ensure the content is on top of the overlay */
    .nstp-section * {
        position: relative;
        z-index: 2;
    }

    .nstp-section h2 {
        margin-bottom: 10px;
    }

    /* Button styling */
    .nstp-button {
        padding: 10px 20px;
        font-size: 16px;
        background-color: #007bff;
        color: white;
        text-decoration: none;
        border-radius: 5px;
        margin-top: 10px;
        transition: background-color 0.3s ease;
        border: none;
        cursor: pointer;
        align-self: center; /* Center button at the bottom */
    }

    .close:hover,
    .close:focus {
        color: black;
        text-decoration: none;
        cursor: pointer;
    }

    /* Media query to stack the sections on smaller screens */
    @media (max-width: 768px) {
        .nstp-flex-container {
            flex-direction: column;
        }
    }
</style>
<!-- Dropdown container -->
<div class="dropdown profile-button-container" style="float:left; margin: 20px;">
    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
        View
    </button>
    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        <li><a class="dropdown-item" href="#" onclick="loadStudentProfile()">Profile</a></li>
        <li><a class="dropdown-item" href="#" onclick="loadStudentSlip()">Student Slip</a></li>
    </ul>
</div>



<div class="nstp-container">
    <h1>Welcome to the National Service Training Program (NSTP)</h1>
    <p>
        The National Service Training Program (NSTP) is a program aimed at enhancing civic consciousness and defense preparedness 
        in the youth by developing the ethics of service and patriotism. As a student, you are required to choose between two components:
    </p>

    <!-- Flex container to hold both sections side by side -->
    <div class="nstp-flex-container">
        <!-- ROTC Section with background image -->
        <div class="nstp-section" style="background-image: url('../assets/img/rotclogo.png');">
            <h2>Reserve Officers Training Corps (ROTC)</h2>
            <p>
                The Reserve Officers Training Corps (ROTC) is designed to provide military training to tertiary-level students 
                in order to motivate, train, organize, and mobilize them for national defense preparedness.
            </p>
            <p><strong>Key Focus Areas:</strong></p>
            <ul>
                <li>Military training and drills</li>
                <li>National defense preparedness</li>
                <li>Leadership and discipline</li>
            </ul>
            <!-- Button at the bottom of the ROTC box -->
            <button class="nstp-button" onclick="confirmChoice('ROTC')">ROTC</button>
        </div>

        <!-- CWTS Section with background image -->
        <div class="nstp-section" style="background-image: url('../assets/img/nstplogo.png');">
            <h2>Civic Welfare Training Service (CWTS)</h2>
            <p>
                The Civic Welfare Training Service (CWTS) refers to activities contributory to the general welfare and the betterment 
                of life for the members of the community or the enhancement of its facilities, especially those devoted to improving health, 
                education, environment, entrepreneurship, safety, recreation, and the moral of the citizenry and other social welfare services.
            </p>
            <p><strong>Key Focus Areas:</strong></p>
            <ul>
                <li>Community service</li>
                <li>Health and environment improvement</li>
                <li>Education and entrepreneurship development</li>
            </ul>
            <!-- Button at the bottom of the CWTS box -->
            <button class="nstp-button" onclick="confirmChoice('CWTS')">CWTS</button>
        </div>
    </div>
</div>


<?php include '../../nav_student/studentreg/modals/student_profile_modal.php' ?>
<?php include '../../nav_student/studentreg/modals/slip_modal.php' ?>

<script>
    function loadStudentProfile() {
    $.ajax({
        url: '../nav_student/studentreg/modals/student_profile_modal.php', // Path to your modal file
        type: 'GET',
        success: function(response) {
            // Inject the modal content into the body (or any container)
            $('body').append(response);
            
            // Show the modal after loading
            $('#studentProfileModal').modal('show');
        },
        error: function(xhr, status, error) {
            console.log("Error loading modal: " + error);
        }
    });
}

function loadStudentSlip() {
    $.ajax({
        url: '../nav_student/studentreg/modals/slip_modal.php', // Path to your modal file
        type: 'GET',
        success: function(response) {
            // Inject the modal content into the body (or any container)
            $('body').append(response);
            
            // Show the modal after loading
            $('#SlipModal').modal('show');
        },
        error: function(xhr, status, error) {
            console.log("Error loading modal: " + error);
        }
    });
}


    function confirmChoice(component) {
        var confirmation = confirm("Are you sure you want to select this component?");
        if (confirmation) {
            // Proceed with the selection (you can add further logic here)
            alert("You have selected " + component + ".");
            // Redirect or process the selection as needed
        } else {
            // User cancelled the selection
            alert("Selection cancelled.");
        }
    }
</script>