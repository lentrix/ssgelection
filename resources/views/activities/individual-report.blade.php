@extends('base')

@section('content')

<h1 class="mt-3">Individual Attendance Report</h1>

<div class="row">
    <div class="col-md-6">
        <div class="input-group mb-3">
            <span class="input-group-text">
                <i class="fa fa-search"></i>
            </span>
            <input type="text" id="searchKey" class="form-control">
            <button class="btn btn-outline-dark" type="button" id="searchButton">
                Search Student
            </button>
        </div>
    </div>
</div>

<div class="row">
    <table class="table table-bordered table-striped">
        <thead>
            <tr class="bg-primary text-light">
                <th>Last Name</th>
                <th>First Name</th>
                <th>Program</th>
                <th>Year</th>
                <th>...</th>
            </tr>
        </thead>
        <tbody id="search-results">

        </tbody>
    </table>
</div>

@endsection

@section('scripts')

<script>

$(document).ready(()=>{

    search = () => {
        var key = $("#searchKey").val()

        fetch('{{url("/api/search-user")}}' + '/' + key)
        .then(res=>res.json())
        .then(data=>render(data))
        .catch(err=>console.log(err))
    }

    render = (data) => {
        var el = $("#search-results")
        var htmlString = ""

        $.each(data, (key, user)=>{
            htmlString = "<tr>"
            htmlString += "<td>" + user.lname + "</td>"
            htmlString += "<td>" + user.fname + "</td>"
            htmlString += "<td>" + user.program + "</td>"
            htmlString += "<td>" + user.year + "</td>"
            htmlString += "<td><a href='{{url("/activities/individual-report")}}/" + user.id + "' class='btn btn-sm btn-secondary'><i class='fa fa-eye'></i></td>"

            el.append(htmlString)
        })
    }

    $("#searchButton").click(()=>search())
})

</script>

@endsection
