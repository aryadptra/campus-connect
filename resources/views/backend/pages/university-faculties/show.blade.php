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
                                            Data Program Studi
                                        </h4>
                                    </div>
                                </div>
                                <a class="btn btn-primary"
                                    href="{{ route('university-study-program.create', $facultyId) }}">
                                    Tambah Data
                                </a>
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
                                                    <span class="userDatatable-title">fakultas</span>
                                                </th>
                                                <th>
                                                    <span class="userDatatable-title float-end">action</span>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($studyProgram as $item)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $item->name }}</td>
                                                    <td>{{ $item->faculty->name }}</td>
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
                                                                        href="{{ route('university-study-program.edit', $item->id) }}">Edit</a>
                                                                    <form id="formDelete"
                                                                        action="{{ route('university-study-program.destroy', $item->id) }}"
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
