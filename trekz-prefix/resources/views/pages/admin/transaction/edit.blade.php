@extends('layouts.admin')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Edit Transaksi {{ $item->user->name }}</h1>
    <a href="{{ route('transaction.index') }}" class="btn btn-secondary btn-sm shadow-sm">
      <i class="fas fa-arrow-left fa-sm text-white-50"></i>
      Kembali
    </a>
  </div>

  @include('includes.alert')

  <div class="card">
    <div class="card-body">
      <form action="{{ route('transaction.update', $item->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
          <label for="transaction_status">Status</label>
          <select class="form-control" name="transaction_status" id="transaction_status" required>
            <option value="{{ $item->transaction_status }}">Jangan diubah ({{ $item->transaction_status }})</option>
            <option value="IN_CART">In Cart</option>
            <option value="PENDING">Pending</option>
            <option value="SUCCESS">Success</option>
            <option value="CANCEL">Cancel</option>
            <option value="FAILED">Failed</option>
          </select>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
      </form>
    </div>
  </div>
</div>
@endsection