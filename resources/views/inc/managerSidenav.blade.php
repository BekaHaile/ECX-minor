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
            {{--<li>--}}
                {{--<a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Coffee</a>--}}
                {{--<ul class="collapse list-unstyled" id="pageSubmenu">--}}
                    {{--<li>--}}
                        {{--<a href="/coffees">Dispatch Info</a>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                        {{--<a href="/viewScaleFilled">Scale Info</a>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                        {{--<a href="/viewSampleFilled">Sample Info</a>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                        {{--<a href="/viewSpecialtyFilled">Specialty Info</a>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                        {{--<a href="/viewGradeFilled">Grade Info</a>--}}
                    {{--</li>--}}
                {{--</ul>--}}
            {{--</li>--}}
            <li>
                <a href="#jarSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">JAR</a>
                <ul class="collapse list-unstyled" id="jarSubmenu">
                    {{--<li>--}}
                        {{--<a href="/jar">Approve Jars</a>--}}
                        {{--<i class="fa fa-envelope fa-2x" aria-hidden="true"></i>--}}
                        {{--<span class="badge" style="background:red; position: relative; top: -15px; left: -10px;">{{$count}}</span>--}}
                    {{--</li>--}}
                    <li>
                        <a href="/viewJarApproved">View Approved Jars</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="/comments">Comments</a>
            </li>
            <li>
                <a href="#reportSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Report</a>
                <ul class="collapse list-unstyled" id="reportSubmenu">
                    <li>
                        <a href="/priceReport">Price Report</a>
                    </li>
                    <li>
                        <a href="/userReport">Coffee Report</a>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>

</div>