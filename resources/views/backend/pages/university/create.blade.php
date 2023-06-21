@extends('layouts.dashboard')

@section('title', 'Tambahkan Data Universitas')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 mb-5">
                <div class="card card-Vertical card-default card-md mb-4 mt-30">
                    <div class="card-header">
                        <h6>Tambah Data Universitas</h6>
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
                            <form action="{{ route('universities.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('POST')
                                <div class="row">
                                    <div class="col-12 col-md-6">

                                        <div class="form-group">
                                            <label for="formGroupExampleInput"
                                                class="color-dark fs-14 fw-500 align-center mb-10">Name</label>
                                            <input type="text"
                                                class="form-control ih-medium ip-gray radius-xs b-light px-15"
                                                id="name" value="{{ old('name') }}" name="name" required
                                                placeholder="Universitas Pamulang">
                                        </div>
                                        <div class="form-group">
                                            <label for="formGroupExampleInput3"
                                                class="color-dark fs-14 fw-500 align-center mb-10">Email</label>
                                            <input type="email"
                                                class="form-control ih-medium ip-gray radius-xs b-light px-15"
                                                id="email" required name="email" value="{{ old('email') }}"
                                                placeholder="support@unpam@ac.id">
                                        </div>
                                        <div class="form-group">
                                            <label for="formGroupExampleInput3"
                                                class="color-dark fs-14 fw-500 align-center mb-10">Telephone</label>
                                            <input type="number"
                                                class="form-control ih-medium ip-gray radius-xs b-light px-15"
                                                id="telephone" required value="{{ old('telephone') }}" name="telephone"
                                                placeholder="6289662164536">
                                        </div>
                                        <div class="form-group">
                                            <label for="formGroupExampleInput3"
                                                class="color-dark fs-14 fw-500 align-center mb-10">Website</label>
                                            <input type="text"
                                                class="form-control ih-medium ip-gray radius-xs b-light px-15"
                                                id="website" value="{{ old('website') }}" required name="website"
                                                placeholder="https://unpam.ac.id">
                                        </div>
                                        <div class="form-group">
                                            <label for="formGroupExampleInput3"
                                                class="color-dark fs-14 fw-500 align-center mb-10">Deskripsi</label>
                                            <textarea class="form-control" name="description" required id="exampleFormControlTextarea1" rows="3"
                                                placeholder="Jl. Surya Kencana No. 1"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="formGroupExampleInput3"
                                                class="color-dark fs-14 fw-500 align-center mb-10">Logo</label>
                                            <div class="custom-file">
                                                <input class="form-control custom-file-input" name="logo" required
                                                    type="file" id="customFile">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">

                                        <div class="form-group">
                                            <label for="formGroupExampleInput2"
                                                class="color-dark fs-14 fw-500 align-center mb-10">Kelurahan</label>
                                            {{-- <div class="mb-25 select-style2">
                                        <div class="dm-select ">
                                            <select name="kelurahan" id="select-alerts2" class="form-control ">
                                                <option value="01">Option 1</option>
                                                <option value="02">Option 2</option>
                                                <option value="03">Option 3</option>
                                                <option value="04">Option 4</option>
                                                <option value="05">Option 5</option>
                                            </select>
                                        </div>
                                    </div> --}}
                                            <input type="text"
                                                class="form-control ih-medium ip-gray radius-xs b-light px-15"
                                                id="village" value="{{ old('village') }}" required name="village"
                                                placeholder="Pamulang Timur">
                                        </div>
                                        <div class="form-group">
                                            <label for="formGroupExampleInput2"
                                                class="color-dark fs-14 fw-500 align-center mb-10">Kecamatan</label>
                                            {{-- <div class="select-style2">
                                        <div class="dm-select ">
                                            <select name="select-option2" id="select-option2" class="form-control ">
                                                <option value="01">Option 1</option>
                                                <option value="02">Option 2</option>
                                                <option value="03">Option 3</option>
                                                <option value="04">Option 4</option>
                                                <option value="05">Option 5</option>
                                            </select>
                                        </div>
                                    </div> --}}
                                            <input type="text" required
                                                class="form-control ih-medium ip-gray radius-xs b-light px-15"
                                                id="district" name="district" value="{{ old('district') }}"
                                                placeholder="Pamulang">
                                        </div>
                                        <div class="form-group">
                                            <label for="formGroupExampleInput3"
                                                class="color-dark fs-14 fw-500 align-center mb-10">Kota</label>
                                            <input type="text"
                                                class="form-control ih-medium ip-gray radius-xs b-light px-15"
                                                id="city" required name="city" value="{{ old('city') }}"
                                                placeholder="Tangerang">
                                        </div>
                                        <div class="form-group">
                                            <label for="formGroupExampleInput3"
                                                class="color-dark fs-14 fw-500 align-center mb-10">Provinsi</label>
                                            <input type="text"
                                                class="form-control ih-medium ip-gray radius-xs b-light px-15"
                                                id="province" required value="{{ old('province') }}" name="province"
                                                placeholder="Banten">
                                        </div>
                                        <div class="form-group">
                                            <label for="formGroupExampleInput3"
                                                class="color-dark fs-14 fw-500 align-center mb-10">Alamat</label>
                                            <textarea class="form-control" name="address" required id="exampleFormControlTextarea1" rows="3"
                                                placeholder="Jl. Surya Kencana No. 1">{{ old('address') }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="layout-button mt-25">
                                    <a href="{{ route('universities.index') }}"
                                        class="btn btn-default btn-squared btn-light px-20 ">Cancel</a>
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
