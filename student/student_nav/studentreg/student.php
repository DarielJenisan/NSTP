<div class="row">
<div class="col-md-2">
                <!-- Sidebar Filter -->
                <div class="card shadow">
                    <div class="card-body">
                        <h5 class="card-title">NSTP Master List</h5>
                        <div class="form-group">
                            <label for="selectAY">Select AY</label>
                            <select class="form-control" id="selectAY" onchange="filterData()">
                                <!-- Add more options here -->
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="selectSemester">Select Component</label>
                            <select class="form-control" id="selectComponent" onchange="filterData()">
                                <option class="text-center">--All Component--</option>
                                <option>ROTC</option>
                                <option>CWTS</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="selectProgram">Select Program</label>
                            <select class="form-control" id="selectProgram" onchange="filterData()">
                                <option class="text-center">--All Program--</option>
                                <option>Bachelor of Science in Information Technology</option>
                                <option>Bachelor of Science in Business Administration</option>
                                <option>Bachelor of Secondary Education</option>
                            </select>
                        </div>
                     <div class="d-flex flex-column align-items-center">
                     <button class="btn btn-primary w-100 btn-block mt-2"><i class="fa fa-clipboard-list"></i> Create List</button>
                        <button class="btn btn-outline-primary w-100 btn-block mt-2"><i class="fa fa-print"></i> Print Master List</button>
                        <button class="btn btn-outline-success w-100 btn-block mt-2"><i class="fa fa-download"></i> Download</button>
                        </div>
                    </div>
                </div>
            </div>