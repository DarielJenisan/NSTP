<div class="row justify-content-center my-4">
    <div class="col-6-2">
        <h1 class="d-inline mb-0">Activity Logs</h1>
        <div class="card shadow" style="max-height: 100vh; overflow: hidden;">
            <div class="card-body table-responsive px-2 pt-1" style="overflow-y: auto; max-height: 75vh;">
                <div class="school-year" style="margin-top: 20px; margin-left: 10px;">
                    <label for="searchInput" style="margin: 5px;">
                        <input type="text" id="searchInput" class="school-year" placeholder="🔍 Search..." aria-label="Search">
                    </label>
                </div>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Action Type</th>
                            <th>Action Time</th>
                            <th>Admin ID</th>
                            <th>View</th>
                        </tr>
                    </thead>
                    <tbody id="logsTableBody"></tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal for viewing full action details -->
<div class="modal fade" id="viewDetailsModal" tabindex="-1" aria-labelledby="viewDetailsModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="viewDetailsModalLabel">Action Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="modalActionDetails"></div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
 function fetchActivityLogs() {
    fetch('../nav/activity/components/fetch_activity.php')
        .then(response => response.json())
        .then(data => {
            console.log("Fetched Data:", data); // Log the data

            const tableBody = document.getElementById('logsTableBody');
            tableBody.innerHTML = ''; // Clear existing logs

            if (data.success && Array.isArray(data.data)) {
                data.data.forEach(log => {
                    const row = document.createElement('tr');

                    const actionType = document.createElement('td');
                    actionType.textContent = log.action_type;
                    row.appendChild(actionType);

                    const actionTime = document.createElement('td');
                    actionTime.textContent = log.action_time;
                    row.appendChild(actionTime);

                    const adminId = document.createElement('td');
                    adminId.textContent = log.admin_id;
                    row.appendChild(adminId);

                    const viewButtonCell = document.createElement('td');
                    const viewButton = document.createElement('button');
                    viewButton.textContent = 'View';
                    viewButton.className = 'btn btn-primary btn-sm';
                    viewButton.onclick = () => viewActionDetails(log.log_id);
                    viewButtonCell.appendChild(viewButton);
                    row.appendChild(viewButtonCell);

                    tableBody.appendChild(row);
                });
            } else {
                console.error('No logs available or data format issue:', data.error);
            }
        })
        .catch(error => console.error('Error fetching activity logs:', error));
}

</script>
