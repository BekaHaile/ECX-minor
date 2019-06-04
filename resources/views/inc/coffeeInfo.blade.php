<div class="row">
    <div class="col-md-8 order-md-1">
        <h4 class="mb-3"> <b> Coffee Information </b> </h4>
    </div>
</div>
<div class="table-wrapper-scroll-y my-custom-scrollbar">
    <table class="table table-hover ">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Owner Name</th>
            <th scope="col">Phone Number</th>
            <th scope="col">Region</th>
            <th scope="col">Washing Station</th>
        </tr>
        </thead>
        <tbody>
        {{--<div class="table-bordered bg-light" style="margin-bottom: 10px;">--}}
        <tr>
            <td>
                {{ $coffee -> id }}
            </td>
            <td>
                {{ $coffee -> ownerName }}
            </td>
            <td>
                {{ $coffee -> ownerPhone }}
            </td>
            <td>
                {{ $coffee -> region }}
            </td>
            <td>
                {{ $coffee -> washingStation }}
            </td>
        </tr>
        </tbody>
    </table>
</div>