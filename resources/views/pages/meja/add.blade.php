@extends('layouts.dashboard')

@section('contents')
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h5>Tambah Data Meja</h5>
                </div>
                <div class="card-body px-4 py-4">
                    <form role="form" method="POST" action="{{ route('meja.store') }}">
                        @csrf
                        <div class="mb-3">
                            <input type="number" class="form-control form-control-lg" placeholder="No Meja"
                                aria-label="no meja" name="no_meja" required>
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control form-control-lg" aria-label="status" name="status"
                                value="TERSEDIA" hidden>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-lg btn-success btn-lg w-100 mt-4 mb-0">Submit</button>
                            <a href="{{ route('meja.index') }}"
                                class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
