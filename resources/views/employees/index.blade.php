@extends('layouts.backend')

@section('title', 'Employees')

@section('content')
<div class="card">
    <div class="card-header">
        <h4>Employees</h4>
        <hr>
        <div class="btn">
            <a href="{{ route('employees.create') }}" class="btn btn-success">Create</a>
        </div>
    </div>
    <div class="card-body">
        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-dismissible show fade">
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
                        <th>Departemen</th>
                        <th>Jabatan</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($employees as $key => $employee)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $employee->nik }}</td>
                            <td>{{ $employee->nama }}</td>
                            <td>{{ $employee->email }}</td>
                            <td>{{ $employee->departemen }}</td>
                            <td>{{ $employee->jabatan }}</td>
                            <td>
                                <form action="{{ route('employees.destroy', $employee->id) }}" method="POST">
                                    <a href="{{ route('employees.show', $employee->id) }}" title="show">
                                        <i class="fas fa-eye text-success  fa-lg"></i>
                                    </a>
    
                                    <a href="{{ route('employees.edit', $employee->id) }}">
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
            {!! $employees->links() !!}
        </div>
    </div>
</div>
@endsection