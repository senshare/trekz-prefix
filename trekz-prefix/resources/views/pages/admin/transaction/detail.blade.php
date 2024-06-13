@extends('layouts.admin')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Detail Transaksi {{ $item->user->name }}</h1>
    <a href="{{ route('transaction.index') }}" class="btn btn-secondary btn-sm shadow-sm">
      <i class="fas fa-arrow-left fa-sm text-white-50"></i>
      Kembali
    </a>
  </div>

  <div class="card">
    <div class="card-body">
      <table class="table table-bordered" width="100%" cellspacing="0">
        <tr>
          <th>ID</th>
          <th>{{ $item->id }}</th>
        </tr>
        <tr>
          <th>Paket Travel</th>
          <th>{{ $item->travelPackage->title }}</th>
        </tr>
        <tr>
          <th>Pembeli</th>
          <th>{{ $item->user->name }}</th>
        </tr>
        <tr>
          <th>VISA</th>
          <th>${{ $item->additional_visa }}</th>
        </tr>
        <tr>
          <th>Total Transaksi</th>
          <th>${{ $item->transaction_total }}</th>
        </tr>
        <tr>
          <th>Status Transaksi</th>
          <th>{{ $item->transaction_status }}</th>
        </tr>
        <tr>
          <th>Pembelian</th>
          <td>
            <table class="table-bordered">
              <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Kebangsaan</th>
                <th>VISA</th>
                <th>DOE Passport</th>
              </tr>
              @foreach ($item->details as $detail)
              <tr>
                <td>{{ $detail->id }}</td>
                <td>{{ $detail->username }}</td>
                <td>{{ $detail->nationality }}</td>
                <td>{{ $detail->is_visa ? '30 Days' : 'N/A' }}</td>
                <td>{{ $detail->doe_passport }}</td>
              </tr>
              @endforeach
            </table>
          </td>
        </tr>
      </table>
    </div>
  </div>
</div>
@endsection