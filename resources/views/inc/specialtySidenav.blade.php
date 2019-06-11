<style>
    li a{
        color: white;
    }
</style>
<div class="wrapper jumbotron bg-dark" style="margin-right: -10px; color: white;
height: 100%;     width: 220px;
/*position: fixed;*/
z-index: 1;
overflow-x: hidden;
margin-bottom: 5px;">
    <!-- Sidebar -->
    <nav id="sidebar">
        <div class="sidebar-header">
            <h3>Specialty Menu</h3>
        </div>

        <ul class="list-unstyled components">
            <li>
                <a href="/specialty">Add Specialty info</a>
                <i class="fa fa-envelope fa-2x" aria-hidden="true"></i>
                <span class="badge" style="background:red; position: relative; top: -15px; left: -10px;">{{$count}}</span>
            </li>
            <li>
                <a href="/viewSpecialtyFilled">View Existing</a>
            </li>
        </ul>
    </nav>

</div>