<section class="projects-section">
    <div class="products-title text-center">
        <h3>Proyectos de Colsolytel SAS</h3>
    </div>
    <div class="container align-items-center">
        <div class="row justify-content-center">
            <div class="row text-center">
                @foreach ($projects as $project)
                    <div class="col-md-4">
                        <a href="{{ route('album_projects.gallery') }}">
                            <div class="thumbnail">
                                <img src="{{ asset($project->cover_image ?? 'assets/img/default.jpg') }}"
                                    class="img-responsive img-thumbnail" style="height: 200px; object-fit: cover;">
                                <div class="caption text-center">
                                    <br>
                                    <h4 style="color: #7390ca ">{{ Str::limit($project->name, 20) }}</h4>
                                    <p>{{ Str::limit($project->description, 100) }}</p>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-12 text-center">
                <a href="{{ route('album_projects.gallery') }}" class="btn btn-primary">Ver todos los proyectos</a>
            </div>
        </div>
    </div>
</section>

<style>
     .projects-section {
        padding: 1rem 0;
        /* background: linear-gradient(to bottom, #000000 0%, rgba(0, 0, 0, 0.6) 100%, rgba(0, 0, 0, 0.9) 75%); */
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

    .thumbnail {
        position: relative;
        overflow: hidden;
        border-radius: 10px;
        cursor: pointer;
        text-decoration: none;
        color: black;
        background-color: white;
        /* padding: 10px; */
    }

    .thumbnail:hover .album-image {
        transform: scale(1.05);
    }

</style>
