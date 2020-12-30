@extends('layouts.backend')

@section('title', 'Pay Slips')
@section('css')
    <link rel="stylesheet" href="{{ asset('stisla/modules/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('stisla/modules/bootstrap-daterangepicker/daterangepicker.css') }}">
@endsection

@section('content')
<div class="card">
    <form method="POST" action="{{ route('payslips.store') }}">
        @csrf @method('POST')

        <div class="card-header">
            <div class="section-header-back">
                <a href="{{ route('payslips.index') }}" class="btn btn-icon">
                    <i class="fas fa-arrow-left"></i>
                </a>
            </div>
            Add Pay Slip
        </div>
        <div class="card-body">
            <div class="form-group">
                <label>No Urut</label>
                <input type="text" class="form-control" name="no_urut" id="no_urut" required autofocus />
                @error('no_urut')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label>Pegawai</label>
                <select class="form-control select2" name="employee_id" id="employee_id">
                    @foreach ($employees as $employee)
                        <option value="{{ $employee->id }}">{{ $employee->nama }}</option>
                    @endforeach
                </select>
                @error('employee_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="bulan">Bulan</label>
                <input type="text" name="bulan" id="bulan" class="form-control datepicker">
                @error('bulan')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label>Gaji Pokok</label>
                <input type="text" class="form-control" name="gaji_pokok" id="gaji_pokok" required autofocus />
                @error('gaji_pokok')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label>Total Lembur</label>
                <input type="text" class="form-control" name="total_lembur" id="total_lembur" required autofocus />
                @error('total_lembur')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label>Potongan</label>
                <input type="text" class="form-control" name="potongan" id="potongan" required autofocus />
                @error('potongan')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label>Gaji Bersih</label>
                <input type="text" class="form-control" name="gaji_bersih" id="gaji_bersih" required autofocus />
                @error('gaji_bersih')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="card-footer text-right">
            <button class="btn btn-primary" type="submit">
                Save
            </button>
        </div>
    </form>
</div>
@endsection

@section('plugin')
    <script src="{{ asset('stisla/modules/select2/dist/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('stisla/modules/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
@endsection