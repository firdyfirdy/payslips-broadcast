@extends('layouts.backend')

@section('title', 'Pay Slips')

@section('content')
<div class="card">
    <div class="card-header">
        <h4>Pay Slips</h4>
        <hr>
        <div class="btn">
            <a href="{{ route('payslips.create') }}" class="btn btn-success">Create</a>
        </div>
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
                        <th>
                            <div class="custom-checkbox custom-control">
                                <input type="checkbox" data-checkboxes="mygroup" data-checkbox-role="dad" class="custom-control-input" id="checkbox-all">
                                <label for="checkbox-all" class="custom-control-label">&nbsp;</label>
                            </div>
                        </th>
                        <th>No</th>
                        <th>Nama</th>
                        <th>No Urut</th>
                        <th>Periode</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($payslips as $key => $payslip)
                    <tr>
                        <td>
                            <div class="custom-checkbox custom-control">
                            <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" name="payslips_id" id="checkbox-{{ $key }}" value="{{ $payslip->id }}">
                            <label for="checkbox-{{ $key }}" class="custom-control-label">&nbsp;</label>
                          </div>
                        </td>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $payslip->employee->nama }}</td>
                        <td>{{ $payslip->no_urut }}</td>
                        <td>{{ $payslip->bulan }}</td>
                        <td>
                            <form action="{{ route('payslips.destroy', $payslip->id) }}" method="POST">
                                <a href="{{ route('payslips.show', $payslip->id) }}" title="show">
                                    <i class="fas fa-eye text-success  fa-lg"></i>
                                </a>

                                <a href="{{ route('payslips.edit', $payslip->id) }}">
                                    <i class="fas fa-edit fa-lg"></i>
                                </a>
                                @csrf
                                @method('DELETE')

                                <button type="submit" title="delete" style="border: none; background-color:transparent;">
                                    <i class="fas fa-trash fa-lg text-danger"></i>
                                </button>
                            </form>
                        </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {!! $payslips->links() !!}
        </div>
    </div>
    <div class="card-footer text-left">
        <div class="form-group tb-8">
            <button class="btn btn-icon icon-left btn-primary" onclick="doBroadcast()">Broadcast</button>
        </div>
    </div>
</div>
@endsection

@section('js')
    <script>
        $('#checkbox-all').change(function(e) {
            if (e.currentTarget.checked) {
                $('.custom-checkbox').find('input[type="checkbox"]').prop('checked', true);
            } else {
                $('.custom-checkbox').find('input[type="checkbox"]').prop('checked', false);
            }
        });

        function doBroadcast() {
            var payslips_id = $("input[type='checkbox']:checked").map(function() {
                return this.value;
            }).get();
            $.ajax({
                url: "{{ route('payslips.set_session') }}",
                method: 'POST',
                data: {"payslip_id": payslips_id, "_token": " {{ csrf_token() }}"}
            }).done(function (msg) {
                window.location = "{{ route('payslips.broadcast') }}"
            })
        }
    </script>
@endsection