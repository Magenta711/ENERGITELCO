<div id="modal" class="modal">
    <div class="modal-content">
        <a href="{{ route('store.kit_show', $kitOff->type) }}" class="btn offer-body" target="_black">
            <div class="offer-img">
                <img src="https://www.pikpng.com/pngl/b/442-4420967_descuentos-y-ofertas-especiales-illustration-clipart.png"
                    alt="offer">
            </div>
            <div class="kit-img">
                @foreach ($productosOff as $imagenes)
                    @php
                        $i = 0;
                        $i++;
                    @endphp
                    @if ($i <= 4)
                        @foreach ($imagenes->files as $items)
                            <img id="img" src="/storage/energy/{{ $items->name }}" alt="Attachment">
                        @endforeach
                    @endif
                @endforeach
            </div>
            <div class="offer-title">
                <h2><b>{{ $kitOff->name }}</b></h2>
            </div>
            <div class="offer-info">
                <h3 class="text-danger"><b>${{ number_format($kitOff->price, 2, ',', '.') }}</b></h3>
                <br>
                <p>{{ $offer->description }}</p>
            </div>
            <div class="row offer-icons">
                <img src="https://energitelco.com/assets/img/logo.png" alt="ENERGITELCO">
                <img src="{{ asset('img/MUST.png') }}" />
            </div>
        </a>
        <footer class="modal-footer">
            <button type="button"
                onclick="document.getElementById('modal').style.display = 'none'; document.getElementById('page-top').style.overflow = 'auto';"
                class="btn btn-primary">Cerrar</button>
        </footer>
    </div>
</div>

<style>
    .modal {
        display: none;
        position: fixed;
        z-index: 1040;
        left: 0;
        top: 0;
        width: 100%;
        height: 100vh;
        background-color: rgba(0, 0, 0, 0.4);
        align-items: center;
    }

    .modal-content {
        margin: 15vh auto;
        width: 50%;
        height: 75vh;
        justify-content: center;
    }

    .modal-header {
        padding: 10px 15px;
    }

    .modal-footer {
        padding: 10px 15px;
        text-align: right;
    }

    .modal-footer .btn {
        margin-left: 5px;
    }

    .offer-body {
        display: flex;
        width: 100%;
        max-width: 100%;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        box-sizing: border-box;
        overflow: hidden;
        padding: 5%;
        height: 100%;
    }

    .kit-img {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 10px;
        width: 320px;
        align-content: center;
        padding: 10px;
        width: 100%;
        max-width: 40%;
        align-content: center;
        padding: 10px;
        box-sizing: border-box;
    }

    .offer-img {
        width: 25%;
        height: 50%;
        position: relative;
        display: flex;
        flex-direction: row;
        justify-content: center;
        align-items: center;
        /* margin-bottom: -150px; */
    }

    .offer-img img {
        width: 70%;
        position: absolute;
        top: 0;
        z-index: 1000;
        height: auto;
        pointer-events: none;
        overflow: hidden;

    }

    .kit-img img {
        width: 100%;
        height: auto;
        object-fit: cover;
    }

    .offer-icons {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 30px;
        margin-top: 15px;
        flex-wrap: nowrap;
    }

    .offer-icons img {
        max-width: 100px;
        height: auto;
    }

    @media (max-width: 768px) {

        .modal-content {
            margin: 20vh auto;
            width: 80%;
            height: 60vh;
        }

        .kit-img {
            max-width: 60%;
        }

        .offer-img {
            width: 25%;
            /* height: 50%; */
        }
    }
</style>

<script>
    document.getElementById('modal').style.display = 'none';
    document.getElementById('modal').style.display = 'block';
    document.getElementById('page-top').style.overflow = "hidden";
</script>
