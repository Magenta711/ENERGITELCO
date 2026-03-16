@extends('welcome')

@section('content')
    <section class="gallery-section py-5">
        <div class="container text-center">
            <div class="gallery">
                <h2 class="text-white mb-5">
                    <b>Proyectos Realizados por COLSOLYTEL</b>
                </h2>

                <div class="row justify-content-center">

                    @foreach ($projects as $project)
                        <div class="col-lg-4 col-md-6 mb-4 ">

                            <a href="{{ route('album_projects.show_gallery', [$project->slug, $project->id]) }}">

                                <div class="card shadow h-100" id="card-gallery">

                                    <img src="{{ asset($project->cover_image ?? 'assets/img/default.jpg') }}" class="card-img-top"
                                        style="height:220px; object-fit:cover;">

                                    <div class="card-body" id="card-gallery-body">

                                        <h5 style="color:#7390ca">
                                            {{ Str::limit($project->name, 20) }}
                                        </h5>

                                        <p>
                                            {{ Str::limit($project->description, 100) }}
                                        </p>

                                    </div>

                                </div>

                            </a>

                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </section>
@endsection

<style>
    .gallery-section {
        background: linear-gradient(to bottom, rgba(0, 0, 0, 0.3) 0%, rgba(0, 0, 0, 0.7) 75%, #000000 100%), url(https://energitelco.com/assets/img/as.jpg);
        background-position: center;
        background-repeat: no-repeat;
        background-attachment: scroll;
        background-size: cover;
    }

    .gallery{
        margin-top:5rem;
    }

    .album-card {
        position: relative;
        overflow: hidden;
        border-radius: 10px;
        cursor: pointer;
        text-decoration: none;
        color: black;
    }

    .album-image {
        width: 100%;
        height: 250px;
        object-fit: cover;
        transition: transform 0.4s ease;
    }

    #card-gallery {
        overflow: hidden;
        border-radius: 10px;
        cursor: pointer;
        text-decoration: none;
        color: black;
        background-color: rgb(255, 255, 255);
        transition: transform 0.4s ease;
        height:100%;

    }

    #card-gallery:hover{
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0,0,0,.2);
    }

    #card-gallery-body{
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }
</style>
