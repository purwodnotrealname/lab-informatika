@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Submit Payout</h2>
    <form id="form" method="POST" class="w-full" enctype="multipart/form-data" action="{{ route('payment.payouts.create') }}">
        @csrf
        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" required class="form-control">
        </div>
        <div class="form-group">
            <label>Amount</label>
            <input type="number" name="amount" required class="form-control" min="10000">
        </div>
        <button type="submit" class="btn btn-primary">Submit Payout</button>
    </form>
</div>
@endsection