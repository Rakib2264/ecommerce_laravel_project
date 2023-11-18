@extends('user.layouts.template')
@section('main-content')
     <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="box_main">

                <div class="container mt-5">
                    <div class="row justify-content-center">
                        <div class="col-md-10">
                            <form action="{{route('addshoppingaddress')}}" method="POST" class="rounded p-4 shadow">
                                @csrf
                                <h2 class="text-center mb-4">Provide Your Shipping Informaction</h2>
                                <div class="mb-3 form-group">
                                    <label for="phone" class="form-label">Phone Number</label>
                                    <input type="tel" class="form-control" id="phone" name="phone" placeholder="Enter your phone number" required>
                                </div>
                                <div class="mb-3 form-group">
                                    <label for="address" class="form-label">City/Village Name</label>
                                    <input type="text" class="form-control" id="address" name="address" placeholder="Enter city or village name" required>
                                </div>
                                <div class="mb-3 form-group">
                                    <label for="code" class="form-label">Postal Code</label>
                                    <input type="number" class="form-control" id="code" name="code" placeholder="Enter postal code" required>
                                </div>
                                <button type="submit" class="btn btn-info btn-block">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
