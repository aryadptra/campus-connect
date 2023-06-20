@extends('layouts.dashboard')

@section('title', 'Data Universitas')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 mb-30">
                <div class="card mt-30">
                    <div class="card-body">
                        <div class="support-ticket-system support-ticket-system--search">
                            <div class="breadcrumb-main m-0 breadcrumb-main--table justify-content-sm-between">
                                <div class="d-flex flex-wrap justify-content-center breadcrumb-main__wrapper">
                                    <div
                                        class="d-flex align-items-center ticket__title justify-content-center me-md-25 mb-md-0 mb-20">
                                        <h4 class="text-capitalize fw-500 breadcrumb-title">
                                            Data Universitas
                                        </h4>
                                    </div>
                                </div>
                                {{-- <div class="action-btn"> --}}
                                <a class="btn btn-primary" href="{{ route('universities.create') }}">
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
                                                    <span class="userDatatable-title">logo</span>
                                                </th>
                                                <th data-type="html" data-name="name">
                                                    <span class="userDatatable-title">nama</span>
                                                </th>
                                                <th data-type="html" data-name="village">
                                                    <span class="userDatatable-title">kelurahan</span>
                                                </th>
                                                <th data-type="html" data-name='district'>
                                                    <span class="userDatatable-title">kecamatan</span>
                                                </th>
                                                <th data-type="html" data-name='city'>
                                                    <span class="userDatatable-title">kabupaten</span>
                                                </th>
                                                <th data-type="html" data-name='province'>
                                                    <span class="userDatatable-title">provinsi</span>
                                                </th>
                                                <th data-type="html" data-name="address">
                                                    <span class="userDatatable-title">alamat</span>
                                                </th>
                                                <th data-type="html" data-name='telephone'>
                                                    <span class="userDatatable-title">telepon</span>
                                                </th>
                                                <th data-type="html" data-name='email'>
                                                    <span class="userDatatable-title">email</span>
                                                </th>
                                                <th data-type="html" data-name='website'>
                                                    <span class="userDatatable-title">website</span>
                                                </th>
                                                <th data-type="html" data-name="status">
                                                    <span class="userDatatable-title">status</span>
                                                </th>
                                                <th>
                                                    <span class="userDatatable-title float-end">action</span>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach ($universities as $university)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>
                                                        <img src="{{ asset('storage/images/universities/' . $university->logo) }}"
                                                            alt="{{ $university->nama }}" width="100">
                                                    </td>
                                                    <td>{{ $university->name }}</td>
                                                    <td>{{ $university->village }}</td>
                                                    <td>{{ $university->district }}</td>
                                                    <td>{{ $university->city }}</td>
                                                    <td>{{ $university->province }}</td>
                                                    <td>{{ $university->address }}</td>
                                                    <td>{{ $university->telephone }}</td>
                                                    <td>{{ $university->email }}</td>
                                                    <td>{{ $university->website }}</td>
                                                    <td>
                                                        <div class="userDatatable-content d-inline-block">
                                                            @if ($university->status == 'active')
                                                                <span
                                                                    class="bg-opacity-success  color-success userDatatable-content-status active">Active</span>
                                                            @else
                                                                <span
                                                                    class="bg-opacity-danger color-danger userDatatable-content-status active">Inactive</span>
                                                            @endif
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <ul class="orderDatatable_actions mb-0 d-flex flex-wrap">
                                                            <li>
                                                                <a href="{{ route('universities.show', $university->id) }}"
                                                                    class="view">
                                                                    <i class="uil uil-setting"></i>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="{{ route('universities.edit', $university->id) }}"
                                                                    class="edit">
                                                                    <i class="uil uil-edit"></i>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="#" class="delete" onclick="deleteData()">
                                                                    <i class="uil uil-trash-alt"></i>
                                                                </a>
                                                                {{-- Form Delete --}}
                                                                <form hidden id="formDelete"
                                                                    action="{{ route('universities.destroy', $university->id) }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit" class="delete">
                                                                        <i class="uil uil-trash-alt"></i>
                                                                    </button>
                                                                </form>
                                                            </li>
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
                                        {{ $universities->links() }}
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
