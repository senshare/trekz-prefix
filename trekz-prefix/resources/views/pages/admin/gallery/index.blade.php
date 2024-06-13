@extends('layouts.admin')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
  @include('includes.alert')
  
  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Galeri</h1>
    <a href="{{ route('gallery.create') }}" class="btn btn-primary btn-sm shadow-sm">
      <i class="fa fa-plus fa-sm text-white-50"></i>
      Tambah Galeri
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
              <th>Travel</th>
              <th>Gambar</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @forelse ($items as $item)
            <tr>
              <td>{{ $loop->index + 1 }}</td>
              <td>{{ $item->travelPackage->title }}</td>
              <td>
                <img src="{{ Storage::url($item->image) }}" class="img-thumbnail" style="width: 150px;">
              </td>
              <td>
                <a href="{{ route('gallery.edit', $item->id) }}" class="btn btn-info">
                  <i class="fas fa-pencil-alt"></i>
                </a>
                <form
                  action="{{ route('gallery.destroy', $item->id) }}"
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