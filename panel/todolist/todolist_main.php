<div class="row g-0 h-100">
    <div class="col-md-2 col-sm-12 ps-0 pt-3 border-end ">
        <div class="pe-2">
            <h5>Notepad</h5>
            <button type="button" class="btn btn-primary" onclick="loadmodal_input('','add')">
                cREATE
            </button>

        </div>
        <div class="row g-0 mt-2">
            <nav>
                <div class="nav nav-tabs n" role="tablist">
                    <button id="btnprfilter_new" title="New" class="ms-2 px-2 nav-link active" data-bs-toggle="tab" data-bs-target="#nav-prnew" type="button" role="tab" aria-controls="nav-prnew" aria-selected="true"><svg class="svg-inline--fa fa-file" aria-hidden="true" focusable="false" data-prefix="far" data-icon="file" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" data-fa-i2svg="">
                            <path fill="currentColor" d="M0 64C0 28.65 28.65 0 64 0H229.5C246.5 0 262.7 6.743 274.7 18.75L365.3 109.3C377.3 121.3 384 137.5 384 154.5V448C384 483.3 355.3 512 320 512H64C28.65 512 0 483.3 0 448V64zM336 448V160H256C238.3 160 224 145.7 224 128V48H64C55.16 48 48 55.16 48 64V448C48 456.8 55.16 464 64 464H320C328.8 464 336 456.8 336 448z"></path>
                        </svg><!-- <i class="fa-regular fa-file"></i> Font Awesome fontawesome.com --></button>
                </div>
            </nav>
            <div class="col-12 pe-2 py-1">
                <input id="inprsearchfilter" class="form-control form-control-sm me-1" placeholder="Search...">
            </div>
            <div class="tab-content">
                <div class="tab-pane fade show active" id="nav-prnew" role="tabpanel" aria-labelledby="nav-prnew-tab">
                    <div class="table-responsive auto-scroll" style="height: 400px">
                        <table id="tblprnewsumm" class="tblprfilter table table-sm table-hover">
                            <!-- LOAD DATA HERE -->
                        </table>
                        <div style="height: 150px;"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-10 col-sm-12  bg-lgrey">
        <div class="row g-0 h-100">
            <div id="divpr_requesdetails" class="table-responsive px-0 auto-scroll">
                <!-- LOAD DATA HERE -->
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- LOAD DATA HERE -->
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        loadtodolist_notes()
    });


    function loadtodolist_notes() {
        $.post('panel/todolist/components/todolist_notes.php', {}, function(data) {
            $('#tblprnewsumm').html(data)
            $('#divpr_requesdetails').html('')
        });
    }

    function loadtodolist_list(notesId, dis) {
        $('.alltrnotes').removeClass('highlight')
        $(dis).addClass('highlight')


        $.post('panel/todolist/components/todolist_list.php', {
            notesId: notesId
        }, function(data) {
            $('#divpr_requesdetails').html(data)
        });
    }

    function loadmodal_input(id, inputtype) {
        $.post('panel/todolist/components/todolist_modal_input.php', {
            id: id, 
            inputtype: inputtype
        }, function(data) {
            $('#exampleModal .modal-content').html(data)
            $('#exampleModal').modal('show');
        });
    }


    // ACTIONS
    function insertOrUpdateNotes() {
        var inputype = $('#frminertnotes').attr('inputtype');
        var filepath = '';

        if(inputype == 'add'){
            filepath = 'insert_notes.php'; 
        }else{
            filepath = 'update_notes.php'; 
        }

        $.post('panel/todolist/actions/'+filepath, {
            title: $('#wewinputtext_title').val(),
            noteid: $('#frminertnotes').attr('noteid')
        }, function(data) {
            if (data == 'success') {
                loadtodolist_notes()
                $('#exampleModal').modal('hide')
            } else {
                alert(data)
            }
        });
    }

    function deleteNotes(noteid) {
        $.post('panel/todolist/actions/delete_notes.php', {
            noteid: noteid
        }, function(data) {
            if (data == 'success') {
                loadtodolist_notes()
            } else {
                alert(data)
            }
        });
    }
</script>