

<!--
    ********************************
     Perspective of STAFF
     *******************************
-->

<!-- Dashboard -->
<li class="nav-item">
    <a href="/home" class="nav-link">
        <i class="nav-icon fas fa-th"></i>
        <p>DASHBOARD</p>
    </a>
</li>

<!-- Submitted Forms -->
<li class="nav-item">
    <a href="/submittedForms" class="nav-link">
        <i class="nav-icon fas fa-file-download"></i>
        <p>SUBMITTED FORMS<span class="right badge badge-danger">New</span></p>
    </a>
</li>

<!-- Records -->
<li class="nav-item">
    <a href="/records" class="nav-link">
        <i class="nav-icon fas fa-folder"></i>
        <p>RECORDS</p>
    </a>
</li>


@if(Auth::user()->userStaff()->value('staff.position') === 'SAO Head')
<!-- Applicants -->
<li class="nav-item">
    <a href="/applicants" class="nav-link">
    <i class="nav-icon fas fa-user-clock"></i>
        <p>APPLICANTS<span class="right badge badge-danger">New</span></p>
    </a>
</li>
@endif