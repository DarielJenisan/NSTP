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
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- LOAD COMPONENTS -->
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
    //ADD USER FUNCTION
    $(document).ready(function() { //The ready() method specifies what happens when a ready event occurs. Meaning, the statement under the scope will be only called once the document or file is already loaded in the browser.
        loaduserreg_userlist() // call this functions once ready

        $('#frmmdl_adduser').submit(function (e) {  //The submit() method triggers the submit event, or attaches a function to run when a submit event occurs.
            e.preventDefault(); // The preventDefault() method cancels the event if it is cancelable, meaning that the default action that belongs to the event will not occur. by default in form, it will prevent the page from refreshing
            // the purpose of this submit is to validated the input like required, min, max, step and etc.
            // Once the input is validated under the  #frmmdl_adduser form, it then call the adduser() function/method
            adduser(); 
        });
    });

    // COMPONENTS
    function loaduserreg_userlist() { //load components
        $.post("../nav/userreg/components/userreg_userlist.php", // http request
            function(data) { //data = result after calling the request file
                $('#tbluserreg_userlist tbody').html(data); // data will be then put under the #tbluserreg_userlist tbody
                // the jquery html() method sets or returns the content (innerHTML) of the selected elements.
            }
        );
    }

    // ACTIONS
    function adduser() { // add user function/method
        $.post("../nav/userreg/actions/add_user.php", {
            school_id : $('#inuserreg_school_id').val(), //The val() method returns or sets the value attribute of the selected elements.
            firstname : $('#inuserreg_firstname').val(), //The val() method returns or sets the value attribute of the selected elements.
            middlename : $('#inuserreg_middlename').val(), //The val() method returns or sets the value attribute of the selected elements.
            lastname : $('#inuserreg_lastname').val(), //The val() method returns or sets the value attribute of the selected elements.
            email : $('#inuserreg_email').val(), //The val() method returns or sets the value attribute of the selected elements.
            role : $('#inuserreg_role').val(), //The val() method returns or sets the value attribute of the selected elements.
            username : $('#inuserreg_username').val(), //The val() method returns or sets the value attribute of the selected elements.
            password : $('#inuserreg_password').val(), //The val() method returns or sets the value attribute of the selected elements.
        }, function(data) {
            if (data == 'succces') {
                $('#mdladduser').modal('hide') // hide input modal
                modal_alert('Added user successfully', "success", 3000) // toast success notification
                loaduserreg_userlist() //call the function again to refresh the table tbody
            } else {
                modal_alert(data, "danger", 3000) // toast danger notification
            }
        });
    }

    //DELETE USER FUNCTION
    function deleteuser(userid) { // delete user function/method
        $.post("../nav/userreg/actions/delete_user.php", {
            xxxx: userid // transfer the userid variable to the delete_user.php file as xxxx parameter
        }, function(data) {
            if (data == 'succces') {
                modal_alert('Deleted user successfully', "success", 3000) // toast success notification
                loaduserreg_userlist() //call the function again to refresh the table tbody
            } else {
                modal_alert(data, "danger", 3000) // toast danger notification
            }
        });
    }

    //UPDATE USER FUNCTION
    function loadUserData(admin_id, school_id, firstname, middlename, lastname, email, role, username) {
    $('#update_userid').val(admim_id);
    $('#upduserreg_school_id').val(school_id);
    $('#upduserreg_firstname').val(firstname);
    $('#upduserreg_middlename').val(middlename);
    $('#upduserreg_lastname').val(lastname);
    $('#upduserreg_email').val(email);
    $('#upduserreg_role').val(role);
    $('#upduserreg_username').val(username);
    $('#mdlupdateuser').modal('show');
}

$('#frmmdl_updateuser').submit(function (e) {
    e.preventDefault();
    updateUser();
});

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
        if (data == 'succces') {
            $('#mdlupdateuser').modal('hide');
            modal_alert('Updated user successfully', "success", 3000);
            loaduserreg_userlist();
        } else {
            modal_alert(data, "danger", 3000);
        }
    });
}

function toggleUserStatus(userId, currentStatus) {
    let newStatus = currentStatus === 'active' ? 'inactive' : 'active';
    
    $.post("../nav/userreg/actions/toggle_user_status.php", {
        admin_id: userId,
        status: newStatus
    }, function(data) {
        if (data == 'success') {
            modal_alert('User status updated successfully', "success", 3000);
            loaduserreg_userlist(); // Reload the user list to reflect the updated status
        } else {
            modal_alert(data, "danger", 3000);
        }
    });
}

</script>