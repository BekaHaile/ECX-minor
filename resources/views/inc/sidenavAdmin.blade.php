<style>
    li a{
        color: white;
    }
    .sidenav {
        height: 100%;
        width: 160px;
        position: fixed;
        z-index: 1;
        top: 40px;
        left: 30px;
        overflow-x: hidden;
        padding-top: 20px;
    }

    .sidenav a:hover {
        color: #f1f1f1;
    }
</style>
<div class="wrapper jumbotron bg-dark" style="height: 80%;
        width: 160px;
        position: fixed;
        z-index: 1;
        overflow-x: hidden;
         margin-bottom: 10px;
         margin-right: -10px; color: white;">
    <!-- Sidebar -->
    <nav id="sidebar">
        <div class="sidebar-header">
            <h3>Menu</h3>
        </div>

        <ul class="list-unstyled components">
            <p>Dummy Heading</p>
            <li class="active">
                <a href="#userSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Users</a>
                <ul class="collapse list-unstyled" id="userSubmenu">
                    <li>
                        <a href="/users/create">Create new user</a>
                    </li>
                    <li>
                        <a href="/users">View users</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="/coffees">Dispatch</a>
            </li>
            <li>
                <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Pages</a>
                <ul class="collapse list-unstyled" id="pageSubmenu">
                    <li>
                        <a href="#">Page 1</a>
                    </li>
                    <li>
                        <a href="#">Page 2</a>
                    </li>
                    <li>
                        <a href="#">Page 3</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="/comments">Comments</a>
            </li>
            <li>
                <a href="#">Contact</a>
            </li>
        </ul>
    </nav>

</div>