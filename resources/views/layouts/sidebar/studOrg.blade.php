

<!--
    ********************************************
     Perspective of Student Organization Sidebar
     *******************************************
-->

<!-- Dashboard -->
<li class="nav-item">
    <a href="/home" class="nav-link">
        <i class="nav-icon fas fa-th"></i>
        <p>DASHBOARD</p>
    </a>
</li>

<!-- Submitted Forms -->
@if(Auth::user()->userType === "Professor")
<li class="nav-item">
    <a href="/submittedForms" class="nav-link">
        <i class="nav-icon fas fa-file-download"></i>
        <p>SUBMITTED FORMS<span class="right badge badge-danger">New</span></p>
    </a>
</li>
@endif

<!-- Records -->
<li class="nav-item">
    <a href="/records" class="nav-link">
        <i class="nav-icon fas fa-folder"></i>
        <p>RECORDS</p>
    </a>
</li>

@if(Auth::user()->userType === "Student")
    @include('layouts.sidebar.forms')
@endif

<!-- Roles -->
<li class="nav-item">
    <a href="/roles" class="nav-link">
    <i class="nav-icon fas fa-user-clock"></i>
        <p>ROLES<span class="right badge badge-danger">New</span></p>
    </a>
</li>