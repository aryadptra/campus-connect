@extends('layouts.dashboard')

@section('title', 'Data Universitas')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 mb-30">
                <div class="card mt-30">
                    <div class="card-body">
                        <div class="userDatatable adv-table-table global-shadow border-light-0 w-100 adv-table">
                            <div class="table-responsive">
                                <div class="adv-table-table__header">
                                    <h4>Data Universitas</h4>
                                    <div class="adv-table-table__button">
                                        <div class="dropdown">
                                            <a class="btn btn-primary dropdown-toggle dm-select" href="#"
                                                role="button" id="dropdownMenuLink" data-bs-toggle="dropdown"
                                                aria-haspopup="true" aria-expanded="false">
                                                Export
                                            </a>

                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                <a class="dropdown-item" href="#">copy</a>
                                                <a class="dropdown-item" href="#">csv</a>
                                                <a class="dropdown-item" href="#">print</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="filter-form-container"></div>
                                <table class="table mb-0 table-borderless adv-table" data-sorting="true"
                                    data-filter-container="#filter-form-container" data-paging-current="1"
                                    data-paging-position="right" data-paging-size="10">
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
                                                            <a href="#" class="view">
                                                                <i class="uil uil-setting"></i>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#" class="edit">
                                                                <i class="uil uil-edit"></i>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#" class="remove">
                                                                <i class="uil uil-trash-alt"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
