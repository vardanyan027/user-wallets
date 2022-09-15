@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h3 class="card-title">{{ $wallet->name }}</h3>
                        <h4 class="card-title">{{ $wallet->type }}</h4>
                        <h5 class="card-title">{{ $wallet->totalAmount }}</h5>
                    </div>
                </div>
                @foreach($records as $record)
                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title">{{ $record->type  }}</h5>
                            <h6 class="card-subtitle mb-2 text-muted">{{ $record->amount  }}</h6>
                        </div>
                    </div>
                @endforeach

                <button type="button" class="btn btn-primary w-100 mt-3" data-bs-toggle="modal" data-bs-target="#exampleModal">Create Wallet</button>
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form name="wallet-data" id="wallet-data" method="POST" action="{{ url('record/create')  }}">
                        @csrf
                        <div class="form-group">
                            <label for="name" class="col-form-label">Record type:</label>
                            <select class="form-control" id="type" name="type">
                                <option value="credit">Credit</option>
                                <option value="debit">Debit</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="type" class="col-form-label">Record amount:</label>
                            <input type="number" class="form-control" id="amount" name="amount">
                        </div>
                        <input type="hidden" value="{{ $wallet->id }}" name="id" id="id">
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
