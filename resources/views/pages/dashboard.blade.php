@extends('layouts.app')

@section('title', 'General Dashboard')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/jqvmap/dist/jqvmap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/summernote/dist/summernote-bs4.min.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Dashboard Admin</h1>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-primary">
                            <i class="far fa-user"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Total Admin</h4>
                            </div>
                            <div class="card-body">
                                {{ $total_admin }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-12 col-12 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Bar Chart - Admin baru berdasarkan bulan</h4>
                        </div>
                        <div class="card-body">
                            {!! $bar_chart->renderHtml() !!}
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-12 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Line Chart - Admin baru berdasarkan hari</h4>
                        </div>
                        <div class="card-body">

                            {!! $line_chart->renderHtml() !!}

                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-12 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Google Maps - Crocodic</h4>
                        </div>
                        <div class="card-body">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3959.5297486060836!2d110.41395247475849!3d-7.064405092938145!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e70894c3b713051%3A0x1bee99b12cd19f4c!2sCrocodic%20-%20Mobile%20Apps%20Developer%20Indonesia%20-%20Jasa%20Pembuatan%20Aplikasi%20Android%20iOS!5e0!3m2!1sid!2sid!4v1722241103454!5m2!1sid!2sid"
                                width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                </div>
            </div>

        </section>
    </div>
@endsection

@push('scripts')
    {!! $bar_chart->renderChartJsLibrary() !!}
    {!! $bar_chart->renderJs() !!}
    {!! $line_chart->renderJs() !!}
@endpush
