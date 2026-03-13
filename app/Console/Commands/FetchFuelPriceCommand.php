<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Jobs\FetchFuelPrices;

class FetchFuelPRiceCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fuelprices:fetch';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch fuel prices from Tankerkönig';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        (new FetchFuelPrices())->handle();

        $this->info('Job wurde ausgeführt');
    }
}
