<!-- Import Modal -->
<div class="modal fade" id="ImportModal" tabindex="-1" aria-labelledby="ImportModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ImportModalLabel">Import Student Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="importForm" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="fileInput" class="form-label">Select File</label>
                        <input type="file" class="form-control" id="fileInput" name="file" accept=".csv, .xlsx" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Import</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.0/xlsx.full.min.js"></script>

<script>
document.getElementById('importForm').addEventListener('submit', function(event) {
    event.preventDefault(); // Prevent the default form submission

    const fileInput = document.getElementById('fileInput');
    const file = fileInput.files[0];

    if (!file) {
        alert("Please select a file to upload.");
        return;
    }

    const reader = new FileReader();

    reader.onload = function(event) {
        const data = new Uint8Array(event.target.result);
        const workbook = XLSX.read(data, { type: 'array' });

        // Assuming you want to read the first sheet
        const firstSheetName = workbook.SheetNames[0];
        const worksheet = workbook.Sheets[firstSheetName];
        const jsonData = XLSX.utils.sheet_to_json(worksheet, { header: 1 });

        // Prepare the data for sending to the server
        const studentsData = jsonData.map(row => {
            return {
                firstname: row[0], // Adjust indices based on your Excel structure
                middlename: row[1],
                lastname: row[2],
                suffixname: row[3],
                gender: row[4],
                email: row[5],
                // Add other fields based on your Excel structure
            };
        });

        // Send the data to your PHP script
        fetch('../nav/student_list/components/upload_excel.php', {
    method: 'POST',
    headers: {
        'Content-Type': 'application/json',
    },
    body: JSON.stringify(studentsData),
})
.then(response => response.json())
.then(data => {
    if (data.success > 0) {
        alert(`${data.success} records successfully imported.`);
    }
    if (data.errors > 0) {
        alert(`${data.errors} records failed to import.`);
    }
})
.catch((error) => {
    console.error('Error:', error);
    alert('An error occurred during the import process.');
});

    reader.readAsArrayBuffer(file); // Read the file as an array buffer
});
</script>
