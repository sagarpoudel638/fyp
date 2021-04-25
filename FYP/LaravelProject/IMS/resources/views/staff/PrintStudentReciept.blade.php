<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>IMS Admin</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
	<link href="https://fonts.googleapis.com/css?family=Chivo:300,700|Playfair+Display:700i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
<script type='text/javascript' src='/js/boootstrap.js'></script>
</head>
<body>
    <div id="print" class="container mt-5">
        <div class="d-flex justify-content-center row">
            <div class="col-md-8">
                <div class="p-3 bg-white rounded">
                    <div class="row">
                        <div class="col-md-6">
                            @if (session('id'))
                            <input type="hidden" name="student_id" value="{{'id'}}"/>
                            @endif
                            <h1 class="text-uppercase">Invoice</h1>
                            @foreach($studentdata as $studentdatum)
                            <div class="billed"><span class="font-weight-bold text-uppercase">Name:</span><span class="ml-1">{{$studentdatum-> StudentName }}</span></div>
                            <div class="billed"><span class="font-weight-bold text-uppercase">Address:</span><span class="ml-1">{{$studentdatum-> Address }}</span></div>
                            <div class="billed"><span class="font-weight-bold text-uppercase">Contact Number:</span><span class="ml-1">{{$studentdatum-> PrimaryNumber }}</span></div>
                            @endforeach
                            <div class="billed"><span class="font-weight-bold text-uppercase">Date:</span><span class="ml-1"><script> document.write(new Date().toDateString()); </script></span></div>

                        </div>
                        <div class="col-md-6 text-right mt-3">
                            <h4 class="text-danger mb-0">Success Education</h4><span>Nepalgunj Banke</span>
                        </div>
                    </div>
                    <div class="mt-3">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    @foreach($studentdata as $studentdatum)
                                    <tr>
                                        <th>Description</th>
                                        <th>Paid Fee</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Course : {{$studentdatum->Course}}</td>
                                        <td>{{$studentdatum->Payment}}</td>

                                    </tr>

                                    <tr>

                                        <td>Total</td>
                                        <td>{{$studentdatum->Payment}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    @foreach($studentdata as $studentdatum)
                    <div class="billed"><span class="font-weight-bold text-uppercase">Created By:</span><span class="ml-1">{{$studentdatum-> name }}</span></div>
                    @endforeach
                </div>

            </div>
        </div>
    </div>
    <div style="display:flex">
        <a style="margin-left:60%" class="btn btn-success" href="{{route('RegisterStudentDashboard')}}" role="button">Back</a>
    <a style="margin-left:2%" class="btn btn-primary" href="#" role="button">Print</a>

    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

    <script type="text/JavaScript" src="https://cdnjs.cloudflare.com/ajax/libs/jQuery.print/1.6.0/jQuery.print.js"></script>


<script type="text/javascript">
$("a.btn").on('click',function () {
    $("#print").print();
});
</script>
</body>
</html>

