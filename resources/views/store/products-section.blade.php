<section class="products-section bg-light">
    <div class="products-title">
        <h3>Tienda Virtual</h3>
    </div>
    <div class="container align-items-center">
        <div class="row justify-content-center">
            @foreach ($kits as $kit)
                <a href="{{ route('store.kit_show', $kit->type) }}" class="btn card" target="_black">
                    <div class="content-kit-img">
                        <div class="kit-min-img">
                            @foreach ($kit->files as $item)
                                <img id="img" src="/storage/energy/{{ $item->name }}" alt="Attachment">
                            @endforeach
                        </div>
                    </div>
                    <div class="text">
                        <div class="card-title">{{ $kit->name }}</div>
                        <div class="card-title">{{ $kit->type }}</div>
                        <div class="card-title"><b>
                                <h4>${{ number_format($kit->price, 2, ',', '.') }}</h4>
                            </b></div>
                    </div>
                </a>
            @endforeach
            @foreach ($products as $item)
                <a href="{{ route('store.products_show', $item->type) }}" class="btn card" target="_black">
                    <div class="img">
                        @foreach ($item->files as $items)
                            <img id="img" src="/storage/energy/{{ $items->name }}" alt="Attachment">
                        @endforeach
                    </div>
                    <div class="text">
                        <div class="card-title">{{ $item->type }}</div>
                        <div class="card-title">{{ $item->model }}</div>
                        <div class="card-title"><b>
                                <h4>${{ number_format($item->price, 2, ',', '.') }}</h4>
                            </b></div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</section>

<style>
    .products-section {
        height: auto;
        padding: 20px 0;
    }

    .products-section .products-title {
        text-align: center;
        font-weight: bold;
    }

    .products-section .container .row {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 20px;
    }

    .products-section .container .card {
        flex: 1 1 250px;
        max-width: 280px;
        min-width: 200px;
        height: auto;
        border-radius: 20px;
        padding: 0%;
        transition: all 0.3s ease-in-out;
    }

    .products-section .container .card .img {
        height: 200px;
        overflow: hidden;
    }

    .products-section .container .card .text {
        height: 30%;
        display: flex;
        flex-direction: column;
        justify-content: center;
        margin-top: 5%;
    }

    .products-section .container .card .img img {
        object-fit: cover;
        height: 100%;
        border-top-left-radius: 20px;
        border-top-right-radius: 20px;
    }

    .kit-min-img {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        align-content: center;
        width: 100%;
        height: 200px;
        overflow: hidden;
        align-items: center;
        justify-items: center;
    }

    .kit-min-img img {
        width: 80%;
        height: auto;
        object-fit: contain;
    }

    @media (max-width: 768px) {
        .products-section .container .card {
            flex: 1 1 75%;
            max-width: 75%;
        }
    }
</style>
