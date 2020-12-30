@extends('layouts.backend')

@section('title', 'Employee')
@section('content')
<div class="card">
    <form method="POST" action="{{ route('employees.store') }}">
        @csrf @method('POST')
        <div class="card-header">
            <div class="section-header-back">
                <a href="{{ route('employees.index') }}" class="btn btn-icon">
                    <i class="fas fa-arrow-left"></i>
                </a>
            </div>
            Add Pay Slip
        </div>
        <div class="card-body">
            <div class="form-group">
                <label>No. Induk</label>
                <input type="text" class="form-control" name="nik" id="nik" required autofocus />
                @error('nik')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label>Nama</label>
                <input type="text" class="form-control" name="nama" id="nama" required autofocus />
                @error('nama')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control" name="email" id="email" required autofocus />
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label>Jabatan</label>
                <input type="text" class="form-control" name="jabatan" id="jabatan" required autofocus />
                @error('jabatan')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label>Departemen</label>
                <input type="text" class="form-control" name="departemen" id="departemen" required autofocus />
                @error('departemen')
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