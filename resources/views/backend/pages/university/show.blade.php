@extends('layouts.dashboard')

@section('title', 'Data Universitas')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                {{-- Jika ada flash session message --}}
                @if (session()->has('success'))
                    <div class=" alert alert-success alert-dismissible fade show mt-5" role="alert">
                        <div class="alert-content">
                            <p>
                                {{ session()->get('success') }}
                            </p>
                            <button type="button" class="btn-close text-capitalize" data-bs-dismiss="alert" aria-label="Close">
                                <img src="{{ asset('backend/img/svg/x.svg') }}" alt="x" class="svg"
                                    aria-hidden="true">
                            </button>
                        </div>
                    </div>
                @endif
            </div>
            <div class="col-12 col-md-12 mb-30">
                <div class="card mt-30">
                    <div class="card-body">
                        <div class="support-ticket-system support-ticket-system--search">
                            <div class="breadcrumb-main m-0 breadcrumb-main--table justify-content-sm-between">
                                <div class="d-flex flex-wrap justify-content-center breadcrumb-main__wrapper">
                                    <div
                                        class="d-flex align-items-center ticket__title justify-content-center me-md-25 mb-md-0 mb-20">
                                        <h4 class="text-capitalize fw-500 breadcrumb-title">
                                            Data Fakultas
                                        </h4>
                                    </div>
                                </div>
                                {{-- <div class="action-btn"> --}}
                                <a class="btn btn-primary" href="{{ route('university-faculties.create', $univId) }}">
                                    Tambah Data
                                </a>
                                {{-- </div> --}}
                            </div>
                            <div
                                class="support-form datatable-support-form d-flex justify-content-xxl-between justify-content-center align-items-center flex-wrap">
                                <div class="support-form__input">
                                </div>
                                <div class="support-form__search">
                                </div>
                            </div>
                            <div class="userDatatable userDatatable--ticket userDatatable--ticket--2 mt-1">
                                <div class="table-responsive">
                                    <table class="table mb-0 table-borderless">
                                        <thead>
                                            <tr class="userDatatable-header">
                                                <th>
                                                    <span class="userDatatable-title">no</span>
                                                </th>
                                                <th>
                                                    <span class="userDatatable-title">nama</span>
                                                </th>
                                                <th>
                                                    <span class="userDatatable-title float-end">action</span>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($faculties as $item)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $item->name }}</td>
                                                    <td>
                                                        <ul class="orderDatatable_actions mb-0 d-flex flex-wrap">
                                                            <div class="dropdown dropdown-click">
                                                                <button class="btn-link border-0 bg-transparent p-0"
                                                                    data-bs-toggle="dropdown" aria-haspopup="true"
                                                                    aria-expanded="false">
                                                                    <img src="{{ asset('backend/img/svg/more-horizontal.svg') }}"
                                                                        alt="more-horizontal" class="svg" />
                                                                </button>
                                                                <div
                                                                    class="dropdown-default dropdown-bottomLeft dropdown-menu-right dropdown-menu--dynamic dropdown-menu">
                                                                    <a class="dropdown-item"
                                                                        href="{{ route('university-faculties.show', $item->id) }}">Detail</a>
                                                                    <a class="dropdown-item"
                                                                        href="{{ route('university-faculties.edit', $item->id) }}">Edit</a>
                                                                    <form id="formDelete"
                                                                        action="{{ route('university-faculties.destroy', $item->id) }}"
                                                                        method="POST">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="submit" class="dropdown-item">
                                                                            Hapus
                                                                        </button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </ul>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="d-flex justify-content-end pt-30">
                                    <nav class="dm-page">
                                        {{-- Pagination --}}
                                        {{-- {{ $universities->links() }} --}}
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-6 mb-30">
                <div class="card mt-30">
                    <div class="card-body">
                        <div class="support-ticket-system support-ticket-system--search">
                            <div class="breadcrumb-main m-0 breadcrumb-main--table justify-content-sm-between">
                                <div class="d-flex flex-wrap justify-content-center breadcrumb-main__wrapper">
                                    <div
                                        class="d-flex align-items-center ticket__title justify-content-center me-md-25 mb-md-0 mb-20">
                                        <h4 class="text-capitalize fw-500 breadcrumb-title">
                                            Jadwal Pendaftaran SNM
                                        </h4>
                                    </div>
                                </div>
                            </div>
                            <div class="Vertical-form mt-30">
                                <form action="{{ route('university-register-snm.store') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('POST')
                                    <div class="row">
                                        <div class="col-12 col-md-12">
                                            <div class="form-group">
                                                <label for="formGroupExampleInput3"
                                                    class="color-dark fs-14 fw-500 align-center mb-10">Jadwal Mulai</label>
                                                <input type="text" hidden name="univ_id" value="{{ $univId }}"
                                                    id="">
                                                {{-- Date --}}
                                                <div class="date-picker-list mt-1 mb-2">
                                                    <div class="dm-date-picker">
                                                        <div class="form-group mb-0 form-group-calender">
                                                            <div class="position-relative">
                                                                <input type="text"
                                                                    value="{{ $univSnm[0]['start_date'] }}"
                                                                    name="start_date"
                                                                    class="form-control form-control-default"
                                                                    id="datepicker" placeholder="Januari 20, 2018">
                                                                <a href="#"><img class="svg"
                                                                        src="{{ asset('backend/img/svg/calendar.svg') }}"
                                                                        alt="calendar"></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="formGroupExampleInput3"
                                                    class="color-dark fs-14 fw-500 align-center mb-10">Jadwal
                                                    Selesai</label>
                                                {{-- Date --}}
                                                <div class="date-picker-list mt-1">
                                                    <div class="dm-date-picker">
                                                        <div class="form-group mb-0 form-group-calender">
                                                            <div class="position-relative">
                                                                <input type="text" name="end_date"
                                                                    value="{{ $univSnm[0]['end_date'] }}"
                                                                    class="form-control form-control-default"
                                                                    id="datepicker2" placeholder="Maret 20, 2018">
                                                                <a href="#"><img class="svg"
                                                                        src="{{ asset('backend/img/svg/calendar.svg') }}"
                                                                        alt="calendar"></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
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

            <div class="col-12 col-md-6 mb-30">
                <div class="card mt-30">
                    <div class="card-body">
                        <div class="support-ticket-system support-ticket-system--search">
                            <div class="breadcrumb-main m-0 breadcrumb-main--table justify-content-sm-between">
                                <div class="d-flex flex-wrap justify-content-center breadcrumb-main__wrapper">
                                    <div
                                        class="d-flex align-items-center ticket__title justify-content-center me-md-25 mb-md-0 mb-20">
                                        <h4 class="text-capitalize fw-500 breadcrumb-title">
                                            Jadwal Pendaftaran SBM
                                        </h4>
                                    </div>
                                </div>
                            </div>
                            <div class="Vertical-form mt-30">
                                <form action="{{ route('university-register-sbm.store') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('POST')
                                    <div class="row">
                                        <div class="col-12 col-md-12">
                                            <div class="form-group">
                                                <label for="formGroupExampleInput3"
                                                    class="color-dark fs-14 fw-500 align-center mb-10">Jadwal Mulai</label>
                                                <input type="text" hidden name="univ_id" value="{{ $univId }}"
                                                    id="">
                                                {{-- Date --}}
                                                <div class="date-picker-list mt-1 mb-2">
                                                    <div class="dm-date-picker">
                                                        <div class="form-group mb-0 form-group-calender">
                                                            <div class="position-relative">
                                                                <input type="text" name="start_date"
                                                                    value="{{ $univSbm->isEmpty() ? '' : $univSbm[0]['start_date'] }}"
                                                                    class="form-control form-control-default"
                                                                    id="datepicker3" placeholder="Januari 20, 2018">
                                                                <a href="#"><img class="svg"
                                                                        src="{{ asset('backend/img/svg/calendar.svg') }}"
                                                                        alt="calendar"></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="formGroupExampleInput3"
                                                    class="color-dark fs-14 fw-500 align-center mb-10">Jadwal
                                                    Selesai</label>
                                                {{-- Date --}}
                                                <div class="date-picker-list mt-1">
                                                    <div class="dm-date-picker">
                                                        <div class="form-group mb-0 form-group-calender">
                                                            <div class="position-relative">
                                                                <input type="text" name="end_date"
                                                                    value="{{ $univSbm->isEmpty() ? '' : $univSbm[0]['end_date'] }}"
                                                                    class="form-control form-control-default"
                                                                    id="datepicker4" placeholder="Maret 20, 2018">
                                                                <a href="#"><img class="svg"
                                                                        src="{{ asset('backend/img/svg/calendar.svg') }}"
                                                                        alt="calendar"></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
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

            <div class="col-12 col-md-6 mb-30">
                <div class="card mt-30">
                    <div class="card-body">
                        <div class="support-ticket-system support-ticket-system--search">
                            <div class="breadcrumb-main m-0 breadcrumb-main--table justify-content-sm-between">
                                <div class="d-flex flex-wrap justify-content-center breadcrumb-main__wrapper">
                                    <div
                                        class="d-flex align-items-center ticket__title justify-content-center me-md-25 mb-md-0 mb-20">
                                        <h4 class="text-capitalize fw-500 breadcrumb-title">
                                            Jadwal Pendaftaran Mandiri
                                        </h4>
                                    </div>
                                </div>
                            </div>
                            <div class="Vertical-form mt-30">
                                <form action="{{ route('university-register-mandiri.store') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('POST')
                                    <div class="row">
                                        <div class="col-12 col-md-12">
                                            <div class="form-group">
                                                <label for="formGroupExampleInput3"
                                                    class="color-dark fs-14 fw-500 align-center mb-10">Jadwal Mulai</label>
                                                <input type="text" hidden name="univ_id" value="{{ $univId }}"
                                                    id="">
                                                {{-- Date --}}
                                                <div class="date-picker-list mt-1 mb-2">
                                                    <div class="dm-date-picker">
                                                        <div class="form-group mb-0 form-group-calender">
                                                            <div class="position-relative">
                                                                <input type="text" name="start_date"
                                                                    value="{{ $univMandiri->isEmpty() ? '' : $univMandiri[0]['start_date'] }}"
                                                                    class="form-control form-control-default"
                                                                    id="datepicker5" placeholder="Januari 20, 2018">
                                                                <a href="#"><img class="svg"
                                                                        src="{{ asset('backend/img/svg/calendar.svg') }}"
                                                                        alt="calendar"></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="formGroupExampleInput3"
                                                    class="color-dark fs-14 fw-500 align-center mb-10">Jadwal
                                                    Selesai</label>
                                                {{-- Date --}}
                                                <div class="date-picker-list mt-1">
                                                    <div class="dm-date-picker">
                                                        <div class="form-group mb-0 form-group-calender">
                                                            <div class="position-relative">
                                                                <input type="text" name="end_date"
                                                                    value="{{ $univMandiri->isEmpty() ? '' : $univMandiri[0]['end_date'] }}"
                                                                    class="form-control form-control-default"
                                                                    id="datepicker6" placeholder="Maret 20, 2018">
                                                                <a href="#"><img class="svg"
                                                                        src="{{ asset('backend/img/svg/calendar.svg') }}"
                                                                        alt="calendar"></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
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
    </div>
@endsection

@push('scripts')
    {{-- On click deleteData mengarahkan ke form --}}
    <script>
        function deleteData() {
            event.preventDefault();
            document.getElementById('formDelete').submit();
        }
    </script>
@endpush
