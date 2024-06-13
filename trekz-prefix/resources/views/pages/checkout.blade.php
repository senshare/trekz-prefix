@extends('layouts.checkout')

@section('title', 'Checkout')

@section('content')
<header class="detail-header"></header>

<main>
  <div class="container">
    <div class="row">
      <div class="col-12 px-0">
        <nav>
          <ol class="breadcrumb p-lg-0 bg-transparent">
            <li class="breadcrumb-item"><a href="#" class="text-decoration-none">Paket Travel</a></li>
            <li class="breadcrumb-item"><a href="#" class="text-decoration-none">Details</a></li>
            <li class="breadcrumb-item active" aria-current="page">Checkout</li>
          </ol>
        </nav>
      </div>
      <div class="col-12 col-lg-8 px-lg-0 mb-3 mb-lg-0">
        <div class="card card-members">
          @include('includes.alert')
          <h1 class="card-members-title mb-1">Who is Going?</h1>
          <p class="card-members-location">Trip to {{ $item->travelPackage->title }}, {{ $item->travelPackage->location }}</p>
          <table class="table table-responsive-sm text-center">
            <tr>
              <th class="align-middle">Picture</th>
              <th class="align-middle">Name</th>
              <th class="align-middle">Nationality</th>
              <th class="align-middle">VISA</th>
              <th class="align-middle">Passport</th>
              <th class="align-middle"> Remove </th>
            </tr>
            @forelse ($item->details as $detail)
              <tr>
                <td class="align-middle">
                  <img
                    src="https://ui-avatars.com/api/?name={{ $detail->username }}"
                    class="member-avatar"
                    alt="{{ $detail->username }}"
                  >
                </td>
                <td class="align-middle">{{ $detail->username }}</td>
                <td class="align-middle">{{ $detail->nationality }}</td>
                <td class="align-middle">{{ $detail->is_visa ? '30 Days' : 'N/A' }}</td>
                <td class="align-middle">{{ $detail->is_passport_active }}</td>
                <td class="align-middle">
                
                    <a href="{{ route('checkout_remove', $detail->id) }}">
                      <img src="{{ url('frontend/images/remove.png') }}" class="btn-remove-member">
                    </a>
                  
                </td>
              </tr>
            @empty
              <tr>
                <td class="text-center" colspan="6">No visitor</td>
              </tr>
            @endforelse
          </table>
          <div class="add-member">
            <h2 class="add-member-title">Add Member</h2>
            <form action="{{ route('checkout-create', $item->id) }}" method="POST" class="form-inline">
              @csrf
              <label for="username" class="sr-only">Name</label>
              <input
                type="text"
                class="form-control mb-2 mr-sm-2"
                id="username"
                name="username"
                placeholder="Username"
              >
              <label for="nationality" class="sr-only">Nationality</label>
              <input
                type="text"
                class="form-control mb-2 mr-sm-2"
                id="nationality"
                name="nationality"
                style="width: 50px;"
                placeholder="Nationality"
              >
              <label for="is_visa" class="sr-only">VISA</label>
              <select
                class="form-control mb-2 mr-sm-2"
                id="is_visa"
                name="is_visa"
                placeholder="VISA"
              >
                <option value="" selected disabled>VISA</option>
                <option value="1">30 Days</option>
                <option value="0">N/A</option>
              </select>
              <label for="doe_passport" class="sr-only">DOE Passport</label>
              <div class="input-group mb-2 mr-sm-2">
                <input
                  class="form-control datepicker"
                  id="doe_passport"
                  name="doe_passport"
                  placeholder="DOE Passport"
                >
              </div>
              <button type="submit" class="btn btn-add-now mb-2 px-4">
                Add Now
              </button>
            </form>
            <h3 class="disclaimer-title mt-2 mb-0">Note</h3>
            <p class="disclaimer mb-0">
              You are only able to invite member that has registered in Nomads.
            </p>
          </div>
        </div>
      </div>
      <div class="col-12 col-lg-4">
        <div class="card card-checkout">
          <h2 class="card-checkout-title">Checkout Informations</h2>
          <table class="table table-borderless table-responsive-sm">
            <tr>
              <td class="p-0 pb-2">Members</td>
              <td class="text-right p-0 pb-2">{{ $item->details->count() }} person</td>
            </tr>
            <tr>
              <td class="p-0 pb-2">Additional VISA</td>
              <td class="text-right p-0 pb-2">$ {{ $item->additional_visa }},00</td>
            </tr>
            <tr>
              <td class="p-0 pb-2">Trip Price</td>
              <td class="text-right p-0 pb-2">$ {{ $item->travelPackage->price }}.00 / person</td>
            </tr>
            <tr>
              <td class="p-0 pb-2">Sub Total</td>
              <td class="text-right p-0 pb-2">$ {{ $item->transaction_total }},00</td>
            </tr>
            <tr>
              <td class="p-0 pb-2">Total (+Unique Code)</td>
              <td class="text-right p-0">
                <span class="total-nominal">$ {{ $item->transaction_total }},</span><span class="total-precision">{{ mt_rand(0, 99) }}</span>
              </td>
            </tr>
          </table>
          <hr class="mt-0">
          <h2 class="checkout-payment-title mb-2">Payment Instructions</h2>
          <p class="checkout-information-tip">
            Please complete your payment before to continue the wonderful trip
          </p>
          <div class="row flex-column payment-accounts">
            <div class="payments-account d-flex align-items-start col">
              <img src="{{ url('frontend/images/ic_bank.jpg') }}" class="mr-3">
              <div>
                <p class="mb-0">PT Nomads ID</p>
                <p class="mb-0">0881 8829 8800</p>
                <p class="mb-0">Bank Central Asia</p>
              </div>
            </div>
            <div class="payments-account d-flex align-items-start col">
              <img src="{{ url('frontend/images/ic_bank.jpg') }}" class="mr-3">
              <div>
                <p class="mb-0">PT Nomads ID</p>
                <p class="mb-0">0881 8829 8800</p>
                <p class="mb-0">Bank Central Asia</p>
              </div>
            </div>
          </div>
          <a href="{{ route('checkout-success', $item->id) }}" class="btn btn-made-payment">I Have Made Payment</a>
        </div>
        <a href="{{ route('detail', $item->travelPackage->slug) }}" class="btn btn-cancel-booking mx-auto mt-3 d-block">
          Cancel Booking
        </a>
      </div>
    </div>
  </div>
</main>
@endsection

@push('append-style')
<link rel="stylesheet" href="{{ url('frontend/libraries/gijgo/css/gijgo.min.css') }}">
<link rel="stylesheet" href="{{ url('frontend/styles/checkout.css') }}">
@endpush

@push('append-script')
<script src="{{ url('frontend/libraries/gijgo/js/gijgo.min.js') }}"></script>
<script>
  $(document).ready(function() {
    $('.datepicker').datepicker({
      format: 'yyyy-mm-dd',
      uiLibrary: 'bootstrap4',
      icons: {
        rightIcon: '<img src="{{ url("frontend/images/ic_doe.jpg") }}" />'
      }
    });
  });
</script>
@endpush