@extends('lte.layouts')

@section('content')
    <section class="content-header">
        <h1>
            Energía Solar <small>ENERGÍAS</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-home"></i> Inicio</a></li>
            <li><a href="#">Álbumes de Proyecto</a></li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header">
                        <div class="box-title text-center">Álbumes de Proyectos</div>
                        <div class="box-tools">
                            @can('Crear Album')
                            <a href="{{ route('album_projects.create') }}" class="btn btn-info"><i class="fa fa-plus"></i>
                                Nuevo proyecto</a>
                            @endcan
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="box-body">
                            <div class="row">
                                @foreach ($projects as $project)
                                    <div class="col-md-4">
                                        <a href="{{ route('album_projects.images', [$project->slug, $project->id]) }}">
                                            <div class="thumbnail">
                                                <img src="{{ asset($project->cover_image ?? 'assets/img/default.jpg') }}"
                                                    class="img-responsive img-thumbnail"
                                                    style="height: 200px; object-fit: cover;">
                                                <div class="caption text-center">
                                                    <h4 style="color: #7390ca ">{{ Str::limit($project->name, 30) }}</h4>
                                                    <p>{{ Str::limit($project->description, 100) }}</p>
                                                    <span
                                                        class="label label-{{ $project->status == 1 ? 'success' : 'default' }}">
                                                        {{ $project->status == 1 ? 'Visible' : 'Oculto' }}
                                                    </span>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
@endsection

@section('style')
    <style>
        .album-card {
            position: relative;
            overflow: hidden;
            border-radius: 10px;
            cursor: pointer;
        }

        .album-image {
            width: 100%;
            height: 250px;
            object-fit: cover;
            transition: transform 0.4s ease;
        }

        .album-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;

            background: rgba(0, 0, 0, 0.6);
            color: white;

            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;

            opacity: 0;
            transition: opacity 0.4s ease;
            text-align: center;
            padding: 20px;
        }

        .album-card:hover .album-overlay {
            opacity: 1;
        }

        .album-card:hover .album-image {
            transform: scale(1.1);
        }
    </style>
@endsection
