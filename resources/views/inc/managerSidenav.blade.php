<style>
    li a{
        color: white;
    }
    .sidebar a:hover {
        color: #f1f1f1;
    }
</style>
<div class="wrapper jumbotron bg-dark" style="height: 100%;
        width: 200px;
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
                <a href="/coffees">View Dispatch</a>
            </li>
            {{--<li>--}}
                {{--<a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Pages</a>--}}
                {{--<ul class="collapse list-unstyled" id="pageSubmenu">--}}
                    {{--<li>--}}
                        {{--<a href="#">Page 1</a>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                        {{--<a href="#">Page 2</a>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                        {{--<a href="#">Page 3</a>--}}
                    {{--</li>--}}
                {{--</ul>--}}
            {{--</li>--}}
            <li>
                <a href="/comments">Comments</a>
            </li>
        </ul>
    </nav>

</div>