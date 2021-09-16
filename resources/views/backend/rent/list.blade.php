@extends('layouts.app')

@section('extra_css')

@endsection



@section('content')

  @if (Auth::user()->role == 'manager')
    <div class="container">

      <div class="row">

        <div class="col-lg-12">

          @if (session('success'))

            <div class="alert alert-success">
              {{ session('success') }}
            </div>

            @else

          @endif

          <table class="table">
            <thead class="table-success">
              <tr>
                <th scope="col">#</th>
                <th scope="col">User Name</th>
                <th scope="col">Family Member</th>
                <th scope="col">Property</th>
                <th scope="col">Price</th>
                <th scope="col">Ends At</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>

              @forelse (findOrders() as $order)
                <tr>
                  <th scope="row">{{ $loop->iteration }}</th>
                  <td>{{ findUser($order->user_id)->name }}</td>
                  <td>{{ $order->family_member }}</td>
                  <td>{{ findProperty($order->property_id)->title }}</td>
                  <td>${{ findProperty($order->property_id)->price }}</td>
                  <td>{{ $order->to }}</td>
                  <td>

                    @if ($order->to >= Carbon\Carbon::today())
                      <span class="badge badge-success">paid</span>
                      @else
                        <span class="badge badge-warning">Unpaid</span>
                    @endif

                  </td>
                  <td>
                    <a href="{{ route('rent.mail', $order->id) }}" class="btn btn-success">Send Notice</a>
                    <button type="button" class="btn btn-danger">Block</button>
                  </td>
                </tr>
              @empty

              @endforelse


            </tbody>
          </table>

        </div>

      </div>

    </div>



    @else

  @endif

@endsection



@section('extra_js')

@endsection
