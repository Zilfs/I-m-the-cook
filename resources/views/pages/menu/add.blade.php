@extends('layouts.dashboard')

@section('contents')
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h5>Add Data Menu</h5>
                </div>
                <div class="card-body px-4 py-4">
                    <form role="form" method="POST" action="{{ route('menu.store') }}">
                        @csrf
                        <div class="mb-3">
                            <input type="text" class="form-control form-control-lg" placeholder="Nama Menu"
                                aria-label="Nama Menu" name="nama_menu" required>
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control form-control-lg" placeholder="Harga"
                                aria-label="Harga" name="harga" required>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-lg btn-success btn-lg w-100 mt-4 mb-0">Submit</button>
                            <a href="{{ route('menu.index') }}"
                                class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
