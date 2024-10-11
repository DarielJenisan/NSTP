<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NSTP Orientation</title>
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

        .nstp-section {
            margin-bottom: 20px;
            padding: 15px;
            border: 1px solid #ddd;
            border-radius: 8px;
            background-color: #fff;
        }

        .nstp-section1 {
            margin-bottom: 20px;
            padding: 15px;
            border: 1px solid #ddd;
            border-radius: 8px;
            background-color: #fff;
            align-items: center;
        }

        .nstp-section h2 {
            margin-bottom: 10px;
        }

        /* Button styling */
        .nstp-button {
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 10px;
            margin-left: 50px;
            transition: background-color 0.3s ease;
            border: none;
            cursor: pointer;
        } 
        
        .dropbtn {
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 10px;
            margin-left: 11px;
            transition: background-color 0.3s ease;
            border: none;
            cursor: pointer;
        }

        .nstp-button:hover, .dropbtn:hover {
            background-color: #0056b3;
        }

        /* Dropdown content */
        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f1f1f1;
            min-width: 160px;
            box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            z-index: 1;
        }

        .dropdown-content a {
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            font-size: 14px;
            color: #333;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .dropdown-content a:hover {
            background-color: #007bff;
            color: white;
        }

        /* Modal Styles */
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.7);
        }

        .modal-content {
            background-color: #fff;
            margin: 5% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 90%;
            max-width: 800px;
            border-radius: 10px;
            box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.2);
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

        iframe {
            width: 100%;
            height: 600px;
            border: none;
        }
    </style>
</head>
<body>

<!-- Profile Drop-down Menu -->
<div class="dropdown" style="float:left; margin: 10px;">
    <button class="dropbtn" id="profileBtn">Profile</button>
    <div class="dropdown-content" id="profileDropdown">
        <a href="#" id="viewProfileBtn">View Profile</a>
        <a href="#" id="viewComponentSlipBtn">Component Slip</a>
    </div>
</div>

<!-- Modal for profile -->
<div id="profileModal" class="modal">
    <div class="modal-content">
        <span class="close" id="closeModal">&times;</span>
        <iframe id="profileIframe" src=""></iframe>
    </div>
</div>

<!-- Modal for component slip -->
<div id="componentSlipModal" class="modal">
    <div class="modal-content">
        <span class="close" id="closeComponentSlipModal">&times;</span>
        <iframe id="componentSlipIframe" src="component_slip.php"></iframe>
    </div>
</div>

<div class="nstp-container">
    <h1>Welcome to the National Service Training Program (NSTP)</h1>
    <p>
        The National Service Training Program (NSTP) is a program aimed at enhancing civic consciousness and defense preparedness 
        in the youth by developing the ethics of service and patriotism. As a student, you are required to choose between two components:
    </p>

    <div class="nstp-section">
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
    </div>

    <div class="nstp-section">
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
    </div>
    <div class="nstp-section1">
        <h3>
            Choose your component
        </h3>
        <button class="nstp-button" onclick="confirmChoice('ROTC')">ROTC</button>
        <button class="nstp-button" onclick="confirmChoice('CWTS')">CWTS</button>
    </div>
</div>

<script>
    // Show/hide dropdown on button click
    document.getElementById("profileBtn").addEventListener("click", function() {
        var dropdown = document.getElementById("profileDropdown");
        dropdown.style.display = (dropdown.style.display === "block") ? "none" : "block";
    });

    // Load profile in the modal on 'View Profile' click
    document.getElementById("viewProfileBtn").addEventListener("click", function(event) {
        event.preventDefault();

        var iframe = document.getElementById("profileIframe");
        iframe.src = '../nav_student/studentreg/components/profile1.php'; // Set iframe source
        
        // Show the modal
        document.getElementById("profileModal").style.display = "block";

        // Close the modal when the close button is clicked
        document.getElementById("closeModal").onclick = function() {
            document.getElementById("profileModal").style.display = "none";
        };
    });

    // Load component slip in the modal on 'Component Slip' click
    document.getElementById("viewComponentSlipBtn").addEventListener("click", function(event) {
        event.preventDefault();

        // Show the component slip modal
        document.getElementById("componentSlipModal").style.display = "block";

        // Close the component slip modal when the close button is clicked
        document.getElementById("closeComponentSlipModal").onclick = function() {
            document.getElementById("componentSlipModal").style.display = "none";
        };
    });

    // Hide the modal when clicked outside of it
    window.onclick = function(event) {
        var profileModal = document.getElementById("profileModal");
        var componentSlipModal = document.getElementById("componentSlipModal");
        if (event.target === profileModal) {
            profileModal.style.display = "none";
        }
        if (event.target === componentSlipModal) {
            componentSlipModal.style.display = "none";
        }
    };

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

</body>
</html>
