@extends('layouts.frontend')

@section('title', 'Landing Page')

@section('content')
    {{-- Success --}}
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session('success') }}</strong>
        </div>
    @endif

    {{-- Error --}}
    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>{{ session('error') }}</strong>
        </div>
    @endif
    <div class="row mt-5">
        <div class="col-lg-8 mb-30">
            <div class="job-details-card">
                <div class="job-details-card__top flex-wrap">
                    <div class="job-item__image">
                        <a href="#">
                            <img class="job-item__image-img img-fluid"
                                src="{{ asset('storage/images/universities/' . $university->logo) }}" alt="digital-chair">
                        </a>
                        <div class="job-item__title">
                            <a href="jobDetails.html">
                                <h3 class="card-title">
                                    {{ $university->name }}
                                </h3>
                            </a>
                            <span>{{ $university->city }}, {{ $university->province }}</span>
                        </div>
                    </div>
                </div>
                <div class="job-details-card__middle">
                    <h4>Deskripsi</h4>
                    <p>{{ $university->description }}</p>
                    <h4>Fakultas</h4>
                    <ol>
                        @foreach ($faculty as $item)
                            <li>
                                {{ $item->name }}
                            </li>
                        @endforeach
                    </ol>
                    <h4>Jurusan</h4>
                    <ol>
                        @foreach ($studyProgram as $item)
                            <li>
                                {{ $item->name }}
                            </li>
                        @endforeach
                    </ol>
                </div>
            </div>
        </div>
        <div class="col-lg-4 mb-30">
            <div class="job-details-widget">
                <h4>Informasi Pendaftaran</h4>
                <div class="job-item__content d-inline-flex flex-column">
                    @foreach ($univSnm as $item)
                        <h5 class="mb-3">{{ $item->description }}</h5>
                        <div class="job-type">
                            <h6>Mulai:</h6>
                            <span>{{ $item->start_date }}</span>
                        </div>
                        <div class="job-Industry">
                            <h6>Selesai:</h6>
                            <span>{{ $item->end_date }}</span>
                        </div>
                    @endforeach
                </div>
                <br>
                <div class="job-item__content d-inline-flex flex-column">
                    @foreach ($univSbm as $item)
                        <h5 class="mb-3">{{ $item->description }}</h5>
                        <div class="job-type">
                            <h6>Mulai:</h6>
                            <span>{{ $item->start_date }}</span>
                        </div>
                        <div class="job-Industry">
                            <h6>Selesai:</h6>
                            <span>{{ $item->end_date }}</span>
                        </div>
                    @endforeach
                </div>
                <br>
                <div class="job-item__content d-inline-flex flex-column">
                    @foreach ($univMandiri as $item)
                        <h5 class="mb-3">{{ $item->description }}</h5>
                        <div class="job-type">
                            <h6>Mulai:</h6>
                            <span>{{ $item->start_date }}</span>
                        </div>
                        <div class="job-Industry">
                            <h6>Selesai:</h6>
                            <span>{{ $item->end_date }}</span>
                        </div>
                    @endforeach
                </div>

                <form action="{{ route('favorite', $item->id) }}" method="post">
                    @csrf
                    @method('POST')

                    <button type="submit" class="btn btn-primary w-100 mt-3">Tambah Favorit</button>
                </form>

                <form action="{{ route('unfavorite', $item->id) }}" method="post">
                    @csrf
                    @method('POST')

                    <button type="submit" class="btn btn-danger w-100 mt-3">Hapus Favorit</button>
                </form>

                {{-- <a href="{{ route('favorite', $item->id) }}" class="btn btn-primary w-100">Tambah Favorit</a> --}}
            </div>
        </div>
    </div>

    <div class="row mt-5">
        {{-- /Blog Card --}}
    </div>
@endsection
