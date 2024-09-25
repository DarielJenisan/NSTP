<!-- Import Modal -->
<div class="modal fade" id="ImportModal" tabindex="-1" aria-labelledby="ImportModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ImportModalLabel">Import Excel Data</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

      <form id="frminput_position" enctype="multipart/form-data">
    <input type="file" id="fileInput" accept=".xls,.xlsx" style="display: show;" />
    <button type="button" id="importButton" class="btn btn-outline-success" onclick="importData()">
        <i class="fas fa-file-import"></i> Import
    </button>
</form>

      </div>
      <div class="modal-footer">
       
      </div>
    </div>
  </div>
</div>

<script>
    function importData() {
    const fileInput = document.getElementById('fileInput');
    fileInput.click();

    fileInput.onchange = async function(event) {
        const file = event.target.files[0];
        if (!file) return;

        const formData = new FormData();
        formData.append('file', file);

        try {
            const response = await fetch('../nav/student_list/components/import_data.php', {
                method: 'POST',
                body: formData,
            });

            const result = await response.json();
            if (result.success) {
                alert('Data imported successfully!');
                // Optionally refresh the table or perform other actions
                // loadData(); // Call your function to reload the data table
            } else {
                alert('Error importing data: ' + result.message);
            }
        } catch (error) {
            console.error('Error:', error);
            alert('Error importing data. Please try again.');
        }
    };
}

</script>