@extends('backend.layout.master')

@push('plugin-styles')
  <link href="{{ asset('backend/assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}" rel="stylesheet" />

@endpush

@section('extra_css')

@endsection



@section('content')
  <div class="col-lg-12">
    @if (session('success'))

      <div class="alert alert-success">
        {{ session('success') }}
      </div>

      @else

    @endif
  </div>



  <div class="row">
    <div class="col-md-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <div class="row">
            <div class="col-lg-8">
              <h6 class="card-title">Find Orders</h6>
            </div>
          </div>

          <form class="" action="{{ route('search') }}" method="get">
            <div class="row">
              <div class="col-sm-4">
                <div class="form-group">
                  <label class="control-label">Order From</label>
                  <div class="input-group date datepicker" id="datePickerExample2">
                    <input type="text" name="start_date" class="form-control"><span class="input-group-addon"><i data-feather="calendar"></i></span>
                  </div>
                </div>
              </div><!-- Col -->
              <div class="col-sm-4">
                <div class="form-group">
                  <label class="control-label">Order To</label>
                  <div class="input-group date datepicker" id="datePickerExample">
                    <input type="text" name="end_date" class="form-control"><span class="input-group-addon"><i data-feather="calendar"></i></span>
                  </div>
                </div>
              </div><!-- Col -->
              <div class="col-sm-4">
                <div class="form-group">
                  <label class="control-label">Customer Name</label>
                  <input type="text" name="name" class="form-control">
                </div>
              </div><!-- Col -->
            </div><!-- Row -->
            <button type="submit" class="btn btn-primary submit">Find Orders</button>
          </form>

        </div>
      </div>
    </div>
  </div>




  <div class="col-md-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h6 class="card-title">Search Result</h6>
          <div class="table-responsive">
              <table class="table display" id="dataTableExample">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>User Name</th>
                    <th>Family Member</th>
                    <th>Property</th>
                    <th>Price</th>
                    <th>From(Date)</th>
                    <th>To(Date)</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse ($orders as $order)
                    <tr>
                      <th scope="row">{{ $loop->iteration }}</th>
                      <td>{{ $order->name }}</td>
                      <td>{{ $order->family_member }}</td>
                      <td>{{ findProperty($order->property_id)->title }}</td>
                      <td>${{ findProperty($order->property_id)->price }}</td>
                      <td>{{ Carbon\Carbon::parse($order->from)->format('Y-m-d') }}</td>
                      <td>{{ Carbon\Carbon::parse($order->to)->format('Y-m-d') }}</td>
                      <td>

                        @if ($order->to >= Carbon\Carbon::today())
                          <span class="badge badge-success">paid</span>
                          @else
                            <span class="badge badge-danger">Unpaid</span>
                        @endif

                      </td>
                      <td>
                        @if ($order->to >= Carbon\Carbon::today())
                          <a href="{{ route('payment.details', $order->id) }}" class="btn btn-secondary">Details</a>
                        @else
                          <a href="{{ route('rent.mail', $order->id) }}" class="btn btn-primary">Notice</a>
                          <a href="{{ route('payment.details', $order->id) }}" class="btn btn-secondary">Details</a>
                        @endif


                      </td>
                    </tr>
                  @empty

                  @endforelse
                </tbody>
              </table>
          </div>
        </div>
      </div>
    </div>

  @if (Auth::user()->role == 'manager')
    {{-- <div class="container">

      <div class="row">

        <div class="col-lg-12">

          @if (session('success'))

            <div class="alert alert-success">
              {{ session('success') }}
            </div>

            @else

          @endif

          <table class="table">
            <thead class="">
              <tr>
                <th scope="col">#</th>
                <th scope="col">User Name</th>
                <th scope="col">Family Member</th>
                <th scope="col">Property</th>
                <th scope="col">Price</th>
                <th scope="col">From(Date)</th>
                <th scope="col">To(Date)</th>
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
                  <td>{{ $order->from }}</td>
                  <td>{{ $order->to }}</td>
                  <td>

                    @if ($order->to >= Carbon\Carbon::today())
                      <span class="badge badge-success">paid</span>
                      @else
                        <span class="badge badge-warning">Unpaid</span>
                    @endif

                  </td>
                  <td>
                    <a href="{{ route('rent.mail', $order->id) }}" class="btn btn-success">Notice</a>
                    <a href="{{ route('payment.details', $order->id) }}" class="btn btn-success">Payment Details</a>
                  </td>
                </tr>
              @empty

              @endforelse


            </tbody>
          </table>

        </div>

      </div>

    </div> --}}



    @else

  @endif

@endsection



@section('extra_js')

@endsection

@push('plugin-scripts')
  <script src="{{ asset('backend/assets/plugins/chartjs/Chart.min.js') }}"></script>
  <script src="{{ asset('backend/assets/plugins/jquery.flot/jquery.flot.js') }}"></script>
  <script src="{{ asset('backend/assets/plugins/jquery.flot/jquery.flot.resize.js') }}"></script>
  <script src="{{ asset('backend/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
  <script src="{{ asset('backend/assets/plugins/apexcharts/apexcharts.min.js') }}"></script>
  <script src="{{ asset('backend/assets/plugins/progressbar-js/progressbar.min.js') }}"></script>
@endpush

@push('custom-scripts')
  <script src="{{ asset('backend/assets/js/dashboard.js') }}"></script>
  <script src="{{ asset('backend/assets/js/datepicker.js') }}"></script>
@endpush
