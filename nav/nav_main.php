<ul class="navbar-nav ms-auto mb-2 mb-lg-0 flex-nowrap">
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" active="false" aria-selected="false">
            Category 1
            <i class="bi bi-chevron-down">
            </i>
        </a>
        <div class="dropdown-menu dropdown-menu-end shadow-sm">
            <div class="d-md-flex align-items-start justify-content-start">
                <div>
                    <div class="dropdown-header py-0">Portal 1</div>
                    <a class="dropdown-item py-0" onclick="clickSubModule('panel/todolist/todolist_main.php')">Todo List</a>
                    <a class="dropdown-item py-0" onclick="clickSubModule('panel/sample/sample_design.php')">Sample Design</a>
                </div>
                <div>
                    <div class="dropdown-header py-0">Portal 2</div>
                    <a class="dropdown-item py-0">Module 1</a>
                    <a class="dropdown-item py-0">Module 2</a>
                </div>
                <div>
                    <div class="dropdown-header py-0">Misc</div>
                    <a class="dropdown-item py-0">Module 3</a>
                    <a class="dropdown-item py-0">Module 4</a>
                    <a class="dropdown-item py-0">Module 5</a>
                    <a class="dropdown-item py-0">Module 6</a>
                </div>
            </div>
        </div>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" active="false" aria-selected="false">
            Category 2
            <i class="bi bi-chevron-down">
            </i>
        </a>
        <div class="dropdown-menu dropdown-menu-end shadow-sm">
            <div class="d-md-flex align-items-start justify-content-start">
                <div>
                    <div class="dropdown-header py-0">Portal 3</div>
                    <a class="dropdown-item py-0">Module 7</a>
                </div>
            </div>
        </div>
    </li>

    <li class="nav-item dropdown" style="padding-top: 0px;">
        <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
            <li>
                <div class="dropdown-account">SAMPLE NAME</div>
            </li>
            <li>
                <div class="dropdown-account">USER ID: SAMPLE</div>
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

        console.log(filepath)
        $.post(filepath, {
            name: 'PAUL',
            lastname: 'labastida',
            firstName: 'sample',

            
        }, function(data) {
            console.log(0)
            $('#maincontent').html(data)
        });
        console.log(1)
    }
</script>