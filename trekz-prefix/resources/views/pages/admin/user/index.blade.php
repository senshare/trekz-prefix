@extends('layouts.admin')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
  @include('includes.alert')

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">User</h1>
    <a href="{{ route('user.create') }}" class="btn btn-primary btn-sm shadow-sm">
      <i class="fa fa-plus fa-sm text-white-50"></i>
      Tambah User
    </a>
  </div>

  <!-- Content Row -->
  <div class="row">
    <div class="card-body">
      <div class="mb-3">
        <form action="{{ route('user.index') }}" method="GET">
          <div class="custom-control custom-checkbox custom-control-inline">
            <input type="checkbox" class="custom-control-input" name="roles[]" id="includeAdmin" value="ADMIN" {{ Request::has('roles') ? (in_array('ADMIN', Request::get('roles')) ? 'checked' : '') : '' }}>
            <label class="custom-control-label" for="includeAdmin">ADMIN</label>
          </div>
          <div class="custom-control custom-checkbox custom-control-inline">
            <input type="checkbox" class="custom-control-input" name="roles[]" id="includeUser" value="USER" {{ Request::has('roles') ? (in_array('USER', Request::get('roles')) ? 'checked' : '') : '' }}>
            <label class="custom-control-label" for="includeUser">USER</label>
          </div>
          <div class="custom-control custom-checkbox custom-control-inline pl-0">
            <button class="btn btn-secondary btn-sm">Apply</button>
          </div>
        </form>
      </div>
      <div class="table-responsive">
        <table class="table table-bordered" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>ID</th>
              <th>Name</th>
              <th>Email</th>
              <th>Role</th>
              <th>Created Date</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @forelse ($users as $user)
            <tr>
              <td>{{ $loop->index + 1 }}</td>
              <td>{{ $user->name }}</td>
              <td>{{ $user->email }}</td>
              <td>{{ $user->roles }}</td>
              <td>{{ $user->created_at }}</td>
              <td>
                @if ($user->id == Auth::id())
                  <a href="{{ route('user.edit', $user->id) }}" class="btn btn-info">
                    <i class="fas fa-pencil-alt"></i>
                  </a>
                @endif
                @if ($user->roles == 'USER')
                  <form
                    action="{{ route('user.destroy', $user->id) }}"
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
                @endif
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