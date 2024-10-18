<div class="row justify-content-center my-4">
    <div class="col-6">
        <div class="card shadow">
            <div class="p-3 pb-0">
                <h5 class="d-inline mb-0">User Registry</h5>
                <button class="btn btn-sm btn-primary float-end px-4 rounded" data-bs-toggle="modal" data-bs-target="#mdladduser"><i class="fa fa-plus"></i> Add User</button>
            </div>
            <div class="card-body table-responsive px-2 pt-1">
                <form id="frminput_position">
                    <button type="submit" id="save_positionButton" class="btn btn-primary" hidden=""></button>
                    <table id="tbluserreg_userlist" class="table table-sm">
                        <colgroup>
                            <col width="5%">
                            <col width="15%">
                            <col width="25%">
                            <col width="25%">
                            <col width="15%">
                            <col width="15%">
                            <col width="15%">
                            <col width="15%">
                        </colgroup>
                        <thead>
                            <tr>
                                <th class="text-start">ID</th>
                                <th class="text-start">School ID</th>
                                <th>Last Name</th>
                                <th>First Name</th>
                                <th>Middle Name</th>
                                <th>Email</th>
                                <th>Username</th>
                                <th>Password</th>
                                <th>Role</th>
                                <th>Created At</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody id="adminTableBody">
        <?php 
        // Your existing code for fetching and displaying rows goes here
        ?>
    </tbody>
                    </table>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- ADD USER MODAL -->
<div class="modal fade" id="mdladduser" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="mb-0">Add User</h6>
            </div>
            <div class="modal-body">
                <form id="frmmdl_adduser">
                    <div class="row">
                        <div class="col-12">
                            <label>School ID</label>
                            <input id="inuserreg_school_id" class="form-control form-control-sm" type="text" required>
                        </div>
                        <div class="col-12">
                            <label>First Name</label>
                            <input id="inuserreg_firstname" class="form-control form-control-sm" type="text" required>
                        </div>
                        <div class="col-12">
                            <label>Middle Name</label>
                            <input id="inuserreg_middlename" class="form-control form-control-sm" type="text" required>
                        </div><div class="col-12">
                            <label>Last Name</label>
                            <input id="inuserreg_lastname" class="form-control form-control-sm" type="text" required>
                        </div>
                        <div class="col-12">
                            <label>Email</label>
                            <input id="inuserreg_email" class="form-control form-control-sm" type="text" required>
                        </div>
                        <div class="col-12">
                            <label>Role</label>
                            <input id="inuserreg_role" class="form-control form-control-sm" type="text" required>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-12">
                            <label>Username</label>
                            <input id="inuserreg_username" class="form-control form-control-sm" type="text" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <label>Password</label>
                            <input id="inuserreg_password" class="form-control form-control-sm" type="password" required>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer py-0">
                <button type="button" class="btn btn-sm btn-default" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" form="frmmdl_adduser" class="btn btn-sm btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>

<!-- UPDATE USER MODAL -->
<div class="modal fade" id="mdlupdateuser" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="mb-0">Update User</h6>
            </div>
            <div class="modal-body">
                <form id="frmmdl_updateuser">
                    <input type="hidden" id="update_userid">
                    <div class="row">
                        <div class="col-12">
                            <label>School ID</label>
                            <input id="upduserreg_school_id" class="form-control form-control-sm" type="text" required>
                        </div>
                        <div class="col-12">
                            <label>First Name</label>
                            <input id="upduserreg_firstname" class="form-control form-control-sm" type="text" required>
                        </div>
                        <div class="col-12">
                            <label>Middle Name</label>
                            <input id="upduserreg_middlename" class="form-control form-control-sm" type="text" required>
                        </div>
                        <div class="col-12">
                            <label>Last Name</label>
                            <input id="upduserreg_lastname" class="form-control form-control-sm" type="text" required>
                        </div>
                        <div class="col-12">
                            <label>Email</label>
                            <input id="upduserreg_email" class="form-control form-control-sm" type="email" required>
                        </div>
                        <div class="col-12">
                            <label>Role</label>
                            <input id="upduserreg_role" class="form-control form-control-sm" type="text" required>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-12">
                            <label>Username</label>
                            <input id="upduserreg_username" class="form-control form-control-sm" type="text" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <label>Password</label>
                            <input id="upduserreg_password" class="form-control form-control-sm" type="password">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer py-0">
                <button type="button" class="btn btn-sm btn-default" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" form="frmmdl_updateuser" class="btn btn-sm btn-primary">Update</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() { 
        loaduserreg_userlist(); // Load user list on page ready

        $('#frmmdl_adduser').submit(function (e) {  
            e.preventDefault(); // Prevent page refresh
            adduser(); // Call add user function
        });

        $('#frmmdl_updateuser').submit(function (e) {
            e.preventDefault(); // Prevent page refresh
            updateUser(); // Call update user function
        });
    });

    // Toggle user active/inactive status
    function toggleActive(button, adminId) {
        let currentStatus = button.getAttribute('data-status');

        if (currentStatus === 'active') {
            button.style.backgroundColor = 'red';
            button.textContent = 'Inactive';
            button.setAttribute('data-status', 'inactive');
            updateAdminStatus(adminId, 0); // Set admin as inactive
        } else {
            button.style.backgroundColor = 'green';
            button.textContent = 'Active';
            button.setAttribute('data-status', 'active');
            updateAdminStatus(adminId, 1); // Set admin as active
        }

        console.log("Button toggled to", button.getAttribute('data-status'));
    }

    // Update admin status in the database
    function updateAdminStatus(adminId, status) {
        const xhr = new XMLHttpRequest();
        xhr.open("POST", "../nav/userreg/components/update_admin_status.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                console.log(xhr.responseText); // Log response
                loaduserreg_userlist(); // Refresh user list after update
            }
        };
        xhr.send("admin_id=" + adminId + "&is_active=" + status);
    }

    // Load user registration list
    function loaduserreg_userlist() {
        $.post("../nav/userreg/components/userreg_userlist.php", function(data) {
            $('#tbluserreg_userlist tbody').html(data); // Update table body with fetched data
        });
    }

    // Add user function
    function adduser() {
        $.post("../nav/userreg/actions/add_user.php", {
            school_id: $('#inuserreg_school_id').val(),
            firstname: $('#inuserreg_firstname').val(),
            middlename: $('#inuserreg_middlename').val(),
            lastname: $('#inuserreg_lastname').val(),
            email: $('#inuserreg_email').val(),
            role: $('#inuserreg_role').val(),
            username: $('#inuserreg_username').val(),
            password: $('#inuserreg_password').val(),
        }, function(data) {
            if (data == 'success') {
                $('#mdladduser').modal('hide'); // Hide modal
                modal_alert('Added user successfully', "success", 3000); // Show success alert
                loaduserreg_userlist(); // Refresh user list
            } else {
                modal_alert(data, "danger", 3000); // Show error alert
            }
        });
    }

    // Delete user function
    function deleteuser(userid) {
        $.post("../nav/userreg/actions/delete_user.php", {
            xxxx: userid // Send user ID to delete_user.php
        }, function(data) {
            if (data == 'success') {
                modal_alert('Deleted user successfully', "success", 3000); // Show success alert
                loaduserreg_userlist(); // Refresh user list
            } else {
                modal_alert(data, "danger", 3000); // Show error alert
            }
        });
    }

    // Load user data for updating
    function loadUserData(admin_id, school_id, firstname, middlename, lastname, email, role, username) {
        $('#update_userid').val(admin_id);
        $('#upduserreg_school_id').val(school_id);
        $('#upduserreg_firstname').val(firstname);
        $('#upduserreg_middlename').val(middlename);
        $('#upduserreg_lastname').val(lastname);
        $('#upduserreg_email').val(email);
        $('#upduserreg_role').val(role);
        $('#upduserreg_username').val(username);
        $('#mdlupdateuser').modal('show'); // Show update modal
    }

    // Update user function
    function updateUser() {
        $.post("../nav/userreg/actions/update_user.php", {
            admin_id: $('#update_userid').val(),
            school_id: $('#upduserreg_school_id').val(),
            firstname: $('#upduserreg_firstname').val(),
            middlename: $('#upduserreg_middlename').val(),
            lastname: $('#upduserreg_lastname').val(),
            email: $('#upduserreg_email').val(),
            role: $('#upduserreg_role').val(),
            username: $('#upduserreg_username').val(),
            password: $('#upduserreg_password').val(),
        }, function(data) {
            if (data == 'success') {
                $('#mdlupdateuser').modal('hide'); // Hide update modal
                modal_alert('Updated user successfully', "success", 3000); // Show success alert
                loaduserreg_userlist(); // Refresh user list
            } else {
                modal_alert(data, "danger", 3000); // Show error alert
            }
        });
    }
</script>
