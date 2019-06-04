<div class="wrapper jumbotron bg-dark" style="height: 100%;
        width: 240px;
        /*position: fixed;*/
        z-index: 1;
        overflow-x: hidden;
         margin-bottom: 5px;
         margin-right: -10px;
         color: white;">
    <!-- Sidebar -->
    <nav id="sidebar">
        <div class="sidebar-header">
            <h3>Manager Menu</h3>
        </div>

        <ul class="list-unstyled components">
            <li class="active">
                <a href="#userSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Users</a>
                <ul class="collapse list-unstyled" id="userSubmenu">
                    <li>
                        <a href="/users">View users</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Coffee</a>
                <ul class="collapse list-unstyled" id="pageSubmenu">
                    <li>
                        <a href="/coffees">Dispatch Info</a>
                    </li>
                    <li>
                        <a href="/viewScaleFilled">Scale Info</a>
                    </li>
                    <li>
                        <a href="/viewSampleFilled">Sample Info</a>
                    </li>
                    <li>
                        <a href="/viewSpecialityFilled">Speciality Info</a>
                    </li>
                    <li>
                        <a href="/viewGradeFilled">Grade Info</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="/comments">Approve Jar</a>
            </li>
            <li>
                <a href="/comments">Comments</a>
            </li>
        </ul>
    </nav>

</div>