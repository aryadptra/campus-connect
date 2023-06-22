@extends('layouts.frontend')

@section('title', 'Pengguna')

@section('content')
    <div class="profile-setting ">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">

                    {{-- Success --}}
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{ session('success') }}</strong>
                        </div>
                    @endif

                    {{-- Any Error --}}
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
                    <div class="breadcrumb-main">
                        <h4 class="text-capitalize breadcrumb-title">My profile</h4>
                    </div>

                </div>
                <div class="col-xxl-12 col-lg-12 col-sm-7">
                    <div class="mb-50">
                        <div class="tab-content" id="v-pills-tabContent">
                            <div class="tab-pane fade  show active" id="v-pills-home" role="tabpanel"
                                aria-labelledby="v-pills-home-tab">
                                <!-- Edit Profile -->
                                <div class="edit-profile mt-25">
                                    <div class="card">
                                        <div class="card-header px-sm-25 px-3">
                                            <div class="edit-profile__title">
                                                <h6>Edit Profile</h6>
                                                <span class="fs-13 color-light fw-400">Set up your personal
                                                    information</span>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="row justify-content-center">
                                                <div class="col-xxl-6">
                                                    <div class="edit-profile__body mx-xl-20">
                                                        <form action="{{ route('user.update') }}" method="post">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="form-group mb-20">
                                                                <label for="names">name</label>
                                                                <input type="text" class="form-control"
                                                                    value="{{ Auth::user()->name }}" name="name"
                                                                    id="name" placeholder="Duran Clayton">
                                                            </div>
                                                            <div class="form-group mb-20">
                                                                <label for="phoneNumber1">phone number</label>
                                                                <input type="tel" class="form-control"
                                                                    value="{{ Auth::user()->phone }}" name="phone"
                                                                    id="phoneNumber1" placeholder="+440 2546 5236">
                                                            </div>
                                                            <div class="form-group mb-20">
                                                                <label for="website">email1</label>
                                                                <input type="email" value="{{ Auth::user()->email }}"
                                                                    class="form-control" name="email" id="email"
                                                                    placeholder="example@mail.com">
                                                            </div>
                                                            <div class="form-group mb-20">
                                                                <label for="userBio">user bio</label>
                                                                <textarea class="form-control" name="address" id="userBio" rows="5">{{ Auth::user()->address }} </textarea>
                                                            </div>
                                                            <div class="button-group d-flex flex-wrap pt-30 mb-15">


                                                                <button type="submit"
                                                                    class="btn btn-primary btn-default btn-squared me-15 text-capitalize btn-sm">update
                                                                    profile
                                                                </button>
                                                                {{-- <button
                                                                    class="btn btn-light btn-default btn-squared fw-400 text-capitalize btn-sm">cancel
                                                                </button> --}}
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Edit Profile End -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
