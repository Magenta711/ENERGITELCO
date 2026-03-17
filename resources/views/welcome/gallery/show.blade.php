@extends('welcome')
@section('content')
    {{-- <header class="masthead"> --}}
    <section class="gallery-section">
        <div class="container d-flex align-items-center" id="container-gallery">
            <div class="mx-auto text-center">
                <h2 class="text-white mb-5"><b>{{ strtoupper($project->name) }}</b></h2>
                <p class="text-white-50 mb-5"><b>{{ strtoupper($project->location) }}</b></p>
                <div class="justify-content-center">
                    <div class="row text-center" id="row-gallery">
                        <div class="col-md-12 mb-4">
                            <p class="text-white-50">{{ strtoupper($project->description) }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card-columns el-element-overlay">
                                @if ($project->images)
                                    @foreach ($project->images->where('type', 'video') as $image)
                                        <div class="card">
                                            <div class="el-card-image">
                                                <div class="el-card-avatar el-overlay-1">
                                                    <video controls width="100%" class="pinterest-item" loading="lazy">
                                                        <source src="{{ asset($image->image) }}" type="video/mp4">
                                                        Your browser does not support the video tag.
                                                    </video>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                    @foreach ($project->images->where('type', 'image') as $image)
                                        <div class="card">
                                            <div class="el-card-image">
                                                <div class="el-card-avatar el-overlay-1">
                                                    <a href="{{ asset($image->image) }}" data-lightbox="gallery"
                                                        class="pinterest-item" target="_blank">
                                                        <img src="{{ asset($image->image) }}" data-lightbox="gallery"
                                                            alt="{{ $image->name }}" width="100%" loading="lazy" />
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
    {{-- </header> --}}

    <style>
        .gallery-section {
            background: linear-gradient(to bottom, rgba(0, 0, 0, 0.3) 0%, rgba(0, 0, 0, 0.7) 75%, #000000 100%), url(https://energitelco.com/assets/img/as.jpg);
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: scroll;
            background-size: cover;
        }

        .mx-auto {
            margin-top: 10rem;
        }

        .pinterest-gallery {
            column-count: 4;
            column-gap: 15px;
        }

        .el-overlay-1 {
            position: relative;
            overflow: hidden;
            border-radius: 10px;
        }

        .pinterest-item {
            break-inside: avoid;
            margin-bottom: 15px;
            overflow: hidden;
            border-radius: 10px;
        }

        .pinterest-item img {
            width: 100%;
            display: block;
            border-radius: 10px;
            transition: transform 0.4s ease;
            border: 0;
        }

        .pinterest-item:hover img {
            transform: scale(1.05);
        }

        /* Responsive */

        @media (max-width: 1200px) {
            .pinterest-gallery {
                column-count: 3;
            }
        }

        @media (max-width: 768px) {
            .pinterest-gallery {
                column-count: 2;
            }
        }

        @media (max-width: 480px) {
            .pinterest-gallery {
                column-count: 1;
            }
        }
    </style>

@endsection
