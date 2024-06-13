@extends('layouts.admin')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
  @include('includes.alert')

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Paket Travel</h1>
    <a href="{{ route('travel-package.create') }}" class="btn btn-primary btn-sm shadow-sm">
      <i class="fa fa-plus fa-sm text-white-50"></i>
      Tambah Paket Travel
    </a>
  </div>

  <!-- Content Row -->
  <div class="row">
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>ID</th>
              <th>Title</th>
              <th>Location</th>
              <th>Type</th>
              <th>Departure Date</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @forelse ($items as $item)
            <tr>
              <td>{{ $loop->index + 1 }}</td>
              <td>{{ $item->title }}</td>
              <td>{{ $item->location }}</td>
              <td>{{ $item->type }}</td>
              <td>{{ $item->departure_date }}</td>
              <td>
                <a href="{{ route('travel-package.edit', $item->id) }}" class="btn btn-info">
                  <i class="fas fa-pencil-alt"></i>
                </a>
                <form
                  action="{{ route('travel-package.destroy', $item->id) }}"
                  method="POST"
                  class="d-inline"
                  onsubmit="return confirm('Apakah anda yakin ingin menghapus data ini?')"
                >
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger">
                    <i class="fas fa-trash"></i>
                  </button>
                </form>
              </td>
            </tr>
            @empty
            <tr>
              <td colspan="7" class="text-center">No Data</td>
            </tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection