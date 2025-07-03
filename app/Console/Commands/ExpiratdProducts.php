<?php

namespace App\Console\Commands;

use App\Models\SolarProducts;
use Illuminate\Support\Facades\Log;
use Illuminate\Console\Command;
use Carbon\Carbon;
use App\Models\store\Pay;


class ExpiratdProducts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'reservas:liberar-expiradas';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Libera productos reservados cuya reserva ha expirado';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $now = Carbon::now();

        // Busca todas las reservas expiradas no pagadas
        $reservas = Pay::where('status', 'pendiente')
            ->where('expiration_date', '<=', $now)
            ->get();

        $contador = 0;

        foreach ($reservas as $reserva) {
            foreach ($reserva->products as $product) {
                $solar = SolarProducts::find($product['id']);
                if ($solar) {
                    $solar->status = 1;
                    $solar->save();
                }
            }

            $reserva->status = 'expirado';
            $reserva->save();
            $contador++;
        }

        $this->info("Se liberaron $contador reservas expiradas.");
    }
}
