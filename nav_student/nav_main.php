<ul class="navbar-nav ms-auto mb-2 mb-lg-0 flex-nowrap">
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" active="false" aria-selected="false">
            Panel
            <i class="bi bi-chevron-down">
            </i>
        </a>
        <div class="dropdown-menu dropdown-menu-end shadow-sm">
            <div class="d-md-flex align-items-start justify-content-start">
                <div>
                    <a class="dropdown-item py-0" href="index.php">Dashboard</a>
                    <a class="dropdown-item py-0" onclick="clickSubModule('../student/student_nav/studentreg/components/profile.php')">Profile</a>
                    <a class="dropdown-item py-0" onclick="clickSubModule('../student/student_nav/studentreg/components/profile.php')">Certificate of Registration</a>
                    <a class="dropdown-item py-0" onclick="clickSubModule('../student/student_nav/studentreg/components/profile.php')">Grade Slip</a>
                    <a class="dropdown-item py-0" onclick="clickSubModule('../student/student_nav/studentreg/components/profile.php')">Permanent Records</a>
                    <a class="dropdown-item py-0" onclick="clickSubModule('../student/student_nav/studentreg/components/profile.php')">Assessment</a>
                    <a class="dropdown-item py-0" onclick="clickSubModule('../student/student_nav/studentreg/components/profile.php')">Course Evaluation</a>
                    <a class="dropdown-item py-0" onclick="clickSubModule('../student/student_nav/studentreg/components/profile.php')">Admission</a>
                    <a class="dropdown-item py-0" onclick="clickSubModule('../student/student_nav/studentreg/components/profile.php')">Library Resource</a>
                    <a class="dropdown-item py-0" onclick="clickSubModule('../student/student_nav/studentreg/components/profile.php')">Election Voting</a>
                    <a class="dropdown-item py-0" onclick="clickSubModule('../nav_student/studentreg/student.php')">NSTP Pre-enrollment</a>

                </div>
                <!--<div>
                    <div class="dropdown-header py-0">Activity Design</div>
                    <a class="dropdown-item py-0">Administrator</a>
                    <a class="dropdown-item py-0" onclick="clickSubModule('nav/ad_portal/ad_portal_main.php')">Activity Design Portal</a>
                </div>
                 <div>
                    <div class="dropdown-header py-0">Misc</div>
                    <a class="dropdown-item py-0">Module 3</a>
                    <a class="dropdown-item py-0">Module 4</a>
                    <a class="dropdown-item py-0">Module 5</a>
                    <a class="dropdown-item py-0">Module 6</a>
                </div> -->
            </div>
        </div>
    </li>

    <li class="nav-item dropdown" style="padding-top: 0px;">
        <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
            <li>
                <div class="dropdown-account" id="userName">SAMPLE NAME</div>
            </li>
            <li>
                <div class="dropdown-account" id="userSchoolId">USER ID: SAMPLE</div>
            </li>
            <li>
                <hr class="dropdown-divider" />
            </li>
            <li><a class="dropdown-item" onclick="logout()">Logout</a></li>
        </ul>
    </li>
</ul>

<script>
    function clickSubModule(filepath) {
        // console.log(filepath)
        $.post(filepath, {
            // name: 'PAUL',
            // lastname: 'labastida',
            // firstName: 'sample',


        }, function(data) {
            // console.log(0)
            $('#maincontent').html(data)
        });
        // console.log(1)
    }

 // Fetch logged-in user details from the backend
function fetchUserDetails() {
    fetch('../assets/components/get_user_details.php') // Make sure the path is correct
        .then((response) => response.json())
        .then((data) => {
            if (data.status === 'error') {
                console.error(data.message);
                // Optionally handle UI for logged-out state or show error message
                return;
            }

            // Update the dropdown with the fetched user details
            document.getElementById('userName').textContent = data.name;
            document.getElementById('userSchoolId').textContent = `ID: ${data.schoolId}`;
        })
        .catch((error) => console.error('Error fetching user details:', error));
}

// Call the function when the page loads
document.addEventListener('DOMContentLoaded', fetchUserDetails);


</script>