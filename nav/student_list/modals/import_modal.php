<!-- Import Modal -->
<div class="modal fade" id="ImportModal" tabindex="-1" aria-labelledby="ImportModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg"> <!-- modal-lg for landscape view -->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ImportModalLabel">Import Student Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                  <!--Import Button-->
            <form id="importForm" enctype="multipart/form-data">
    <div class="d-flex align-items-end mb-3">
        <div class="me-2 flex-grow-1">
            <label for="fileInput" class="form-label">Select File</label>
            <input type="file" class="form-control" id="fileInput" name="file" accept=".csv, .xlsx" required>
        </div>
        <button type="submit" class="btn btn-primary" id="importButton">Import</button>
    </div>
</form>
                <div class="excel-header-format-guide">
                    <h6><i class="fas fa-file-excel me-2"></i>Excel Header Guidline: <br></h6>
                    <p>Strictly put always the student_id (Student ID) on the excel format for update and inserting data.</p>
                    <div class="row">
                        <div class="col-md-4">
                            <ol start="1">
                                <li><strong>student_id</strong> (Student ID)</li>
                                <li><strong>firstname</strong> (First Name)</li>
                                <li><strong>middlename</strong> (Middle Name)</li>
                                <li><strong>lastname</strong> (Last Name)</li>
                                <li><strong>suffixname</strong> (Suffix/Extension Name)</li>
                                <li><strong>birthday</strong> (Date of Birth (YYYY-MM-DD))</li>
                            </ol>
                        </div>
                        <div class="col-md-4">
                            <ol start="7">
                                <li><strong>gender</strong> (Gender)</li>
                                <li><strong>email</strong> (Email Address)</li>
                                <li><strong>barangay</strong> (Barangay)</li>
                                <li><strong>municipality</strong> (Municipality)</li>
                                <li><strong>province</strong> (Province)</li>
                                <li><strong>region</strong> (Region)</li>
                            </ol>
                        </div>
                        <div class="col-md-4">
                            <ol start="13">
                                <li><strong>contactnumber</strong> (Contact Number)</li>
                                <li><strong>department</strong> (Department)</li>
                                <li><strong>major</strong> (Major)</li>
                                <li><strong>serialnumber</strong> (Serial Number)</li>
                                <li><strong>semester1</strong> (NSTP 1)</li>
                                <li><strong>sectioncode1</strong> (Section Code NSTP 1)</li>
                            </ol>
                        </div>
                        <div class="col-md-4">
                            <ol start="19">
                                <li><strong>school1</strong> (School NSTP 1)</li>
                                <li><strong>academicyear1</strong> (Academic Year NSTP 1)</li>
                                <li><strong>semester2</strong> (NSTP 2)</li>
                                <li><strong>sectioncode2</strong> (Section Code NSTP 2)</li>
                                <li><strong>school2</strong> (School NSTP 2)</li>
                                <li><strong>academicyear2</strong> (Academic Year NSTP 2)</li>
                            </ol>
                        </div>
                        <div class="col-md-4">
                            <ol start="25">
                                <li><strong>awardyear</strong> (Award Year)</li>
                                <li><strong>component</strong> (Component)</li>
                                <li><strong>institutioncode</strong> (Institution Code)</li>
                                <li><strong>agencytype</strong> (Type of Agency)</li>
                                <li><strong>remarks</strong> (Remarks)</li>
                                <li><strong>yearlevel</strong> (Year Level)</li>
                                <li><strong>program</strong> (Program)</li>
                            </ol>
                        </div>
                        <br> <h6>Example: </h6>
                        <div class="d-flex justify-content-center">
                            <h6>Excel Format:<br></h6>
                         <img src="../assets/img/excelsample.png" style="width: 80%; height: 80%; margin-right: 10px;">
                         </div>
                         <div class="d-flex justify-content-center">
                            <h6>Output: <br></h6>
                         <img src="../assets/img/outputsample.png" style="width: 80%; height: 120%; margin-right: 10px;">
                         </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<script>
document.getElementById('importForm').addEventListener('submit', function (e) {
    e.preventDefault();

    // Disable the import button to prevent multiple submissions
    var importButton = document.getElementById('importButton');
    importButton.disabled = true;
    importButton.textContent = 'Importing...';

    // Get the file from the input
    var fileInput = document.getElementById('fileInput');
    var file = fileInput.files[0];

    // Validate if file is selected
    if (!file) {
        alert("Please select a file.");
        importButton.disabled = false;
        importButton.textContent = 'Import';
        return;
    }

    // Validate file type (optional, depending on the format you accept)
    var validFileTypes = ['application/vnd.ms-excel', 'text/csv', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'];
    if (!validFileTypes.includes(file.type)) {
        alert("Invalid file type. Please select a CSV or Excel file.");
        importButton.disabled = false;
        importButton.textContent = 'Import';
        return;
    }

    // Create a FormData object to hold the file data
    var formData = new FormData();
    formData.append('file', file);

    // Send the form data using fetch API
    fetch('../nav/student_list/components/import_student_data.php', {
        method: 'POST',
        body: formData,
    })
    .then(response => {
        // Attempt to parse JSON, but fall back to text if it's not valid JSON
        return response.text().then(text => {
            try {
                return JSON.parse(text);
            } catch (error) {
                throw new Error('Invalid JSON response: ' + text);
            }
        });
    })
    .then(data => {
        if (data.status === 'success') {
            alert('Student data imported successfully.');
            $('#ImportModal').modal('hide'); // Close the modal on success
            // Optionally, you can reload the page or update the UI to reflect the changes
        } else {
            alert('Error: ' + data.message);
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('An error occurred while uploading the file: ' + error.message);
    })
    .finally(() => {
        // Re-enable the import button after the process completes
        importButton.disabled = false;
        importButton.textContent = 'Import';
    });
});
</script>
