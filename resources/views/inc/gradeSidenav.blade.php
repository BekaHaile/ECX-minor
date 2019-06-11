<div class="wrapper jumbotron bg-dark" style="margin-right: -10px; color: white;
height: 100%;     width: 200px;
/*position: fixed;*/
z-index: 1;
overflow-x: hidden;
margin-bottom: 5px;">
    <!-- Sidebar -->
    <nav id="sidebar">
        <div class="sidebar-header">
            <h3>Grade Menu</h3>
        </div>

        <ul class="list-unstyled components">
            <li>
                <a href="/grade">Add Grade info</a>
                <i class="fa fa-envelope fa-2x" aria-hidden="true"></i>
                <span class="badge" style="background:red; position: relative; top: -15px; left: -10px;">{{$count}}</span>
            </li>
            <li>
                <a href="/viewGradeFilled">View Existing</a>
            </li>
        </ul>
    </nav>

</div>