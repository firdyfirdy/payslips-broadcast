@extends('layouts.backend')

@section('title', 'Broadcast')

@section('content')
<div class="card">
    <div class="card-header">
        <h4>Broadcast</h4>
    </div>
    <div class="card-body">

        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-dismissible show fade">
                <p>{{ $message }}</p>
            </div>
        @endif
        @if ($message = Session::get('error'))
            <div class="alert alert-danger alert-dismissible show fade">
                <p>{{ $message }}</p>
            </div>
        @endif

        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NIK</th>
                        <th>Nama</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($payslips as $key => $payslip)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $payslip->employee->nik }}</td>
                        <td>{{ $payslip->employee->nama }}</td>
                        <td>{{ $payslip->employee->email }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="card-footer text-left">
        <div class="form-group tb-8">
            <a href="javascript:void(0)" class="btn btn-icon icon-left btn-primary" id="btn-send">Send</a>
        </div>
    </div>
</div>
@endsection
@section('js')
    <script>
        $("#btn-send").click(function(event){
            event.preventDefault();

            $(this).text("Sending...")

            $.ajax({
                url: "{{ route('payslips.send') }}",
                type: "POST",
                data: {
                    _token: "{{ csrf_token() }}"
                }
            })
            .done(function (msg) {
                console.log(msg)
                location.href = "{{ route('payslips.index') }}"
            })
        })
    </script>
@endsection