@extends('layouts.admin')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
  @include('includes.alert')
  
  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Transaksi</h1>
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
              <th>User</th>
              <th>VISA</th>
              <th>Total</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @forelse ($items as $item)
            <tr>
              <td>{{ $loop->index + 1 }}</td>
              <td>{{ $item->travelPackage->title }}</td>
              <td>{{ $item->user->name }}</td>
              <td>${{ $item->additional_visa }}</td>
              <td>${{ $item->transaction_total }}</td>
              <td>{{ $item->transaction_status }}</td>
              <td>
                <a href="{{ route('transaction.show', $item->id) }}" class="btn btn-primary">
                  <i class="fas fa-eye"></i>
                </a>
                <a href="{{ route('transaction.edit', $item->id) }}" class="btn btn-info">
                  <i class="fas fa-pencil-alt"></i>
                </a>
                <form
                  action="{{ route('transaction.destroy', $item->id) }}"
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