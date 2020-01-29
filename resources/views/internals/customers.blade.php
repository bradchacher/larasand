@extends('layout')

@section('title')
    Customers
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <h3>Customers</h3>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <form action="/customers" method="POST">

                <div class="form-group">
                    <label for="name">Name</label>
                    <input class="form-control" type="text" name="name" value="{{ old('name')}}">
                    <div>{{ $errors->first('name') }}</div>
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input class="form-control" type="text" name="email" value="{{old('email')}}">
                    <div>{{ $errors->first('email') }}</div>
                </div>

                {{-- <div class="form-group">
                    <label for="random">Random</label>
                    <input class="form-control" type="text" name="email" value="{{old('email')}}">
                    <div>{{ $errors->first('email') }}</div>
                </div> --}}

                <div class="form-group">
                    <label for="active">Status</label>
                    <select name="active" id="active" class="form-control">
                        <option value="" disabled>Select Customer Status</option>
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                    </select>
                </div>
                <button class="btn btn-success" type="submit">Add Customer</button>
                @csrf
            </form>
        </div>
    </div>

    <hr>

      <div class="row">
        <div class="col-6">
            <h5>Active Customers</h5>
            <ul>
                @foreach ($activeCustomers as $activeCustomer)
                <li>{{ $activeCustomer->name }} <span class='text-muted'>({{ $activeCustomer->email }}) </li>

                @endforeach
            </ul>
        </div>


        <div class="col-6">
            <h5>Inactive Customers</h5>
            <ul>
                @foreach ($inactiveCustomers as $inactiveCustomer)
                <li>{{ $inactiveCustomer->name }} <span class='text-muted'>({{ $inactiveCustomer->email }}) </li>

                @endforeach
            </ul>
        </div>
    </div>

@endsection
