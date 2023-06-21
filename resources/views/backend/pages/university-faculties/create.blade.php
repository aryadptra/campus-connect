@extends('layouts.dashboard')

@section('title', 'Tambahkan Data Fakultas')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 mb-5">
                <div class="card card-Vertical card-default card-md mb-4 mt-30">
                    <div class="card-header">
                        <h6>Tambah Data Fakultas</h6>
                    </div>
                    <div class="card-body pb-md-30">
                        {{-- Message Error --}}
                        @if ($errors->any())
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Whoops!</strong> There were some problems with your input.
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>

                            {{-- Foreach Error --}}
                            @foreach ($errors->all() as $error)
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <strong>{{ $error }}</strong>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endforeach
                        @endif
                        <div class="Vertical-form">
                            <form action="{{ route('university-faculties.store') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('POST')
                                <div class="row">
                                    <div class="col-12 col-md-12">
                                        <div class="form-group">
                                            <label for="formGroupExampleInput3"
                                                class="color-dark fs-14 fw-500 align-center mb-10">Universitas</label>
                                            <input type="text"
                                                class="form-control ih-medium ip-gray radius-xs b-light px-15"
                                                id="text" hidden name="university_id" value="{{ $university->id }}"
                                                placeholder="1">
                                            <input type="text"
                                                class="form-control ih-medium ip-gray radius-xs b-light px-15"
                                                id="text" readonly value="{{ $university->name }}" placeholder="1">
                                        </div>
                                        <div class="form-group">
                                            <label for="formGroupExampleInput"
                                                class="color-dark fs-14 fw-500 align-center mb-10">Name</label>
                                            <input type="text"
                                                class="form-control ih-medium ip-gray radius-xs b-light px-15"
                                                id="name" value="{{ old('name') }}" name="name" required
                                                placeholder="Universitas Pamulang">
                                        </div>
                                    </div>
                                </div>
                                <div class="layout-button mt-25">
                                    <a href="#" class="btn btn-default btn-squared btn-light px-20 ">Cancel</a>
                                    <button type="submit"
                                        class="btn btn-primary btn-default btn-squared px-30">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
