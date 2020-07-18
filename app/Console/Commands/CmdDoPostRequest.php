<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Jobs\DoPostRequest;
use Illuminate\Foundation\Bus\DispatchesJobs;

use App\Lib\PostRequest;

class CmdDoPostRequest extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:CmdDoPostRequest';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Comando para realizar solicitudes post';

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
     * @return int
     */
    public function handle()
    {
        /*
        iniciamos la solicitud del trabajo que se ejecutara en back para realizar todas las peticiones 
        y nos dara un estado para poder filtrar las fallas y solicitar el reintento 
        */
        
        $intEndValue = 1;
        $bar = $this->output->createProgressBar($intEndValue);
        $bar->start();
        for ($x = 0; $x <= $intEndValue; $x++) {
            dispatch(new DoPostRequest());
            $bar->advance();
        }
        
        $bar->finish();

        return 0;
    }
}
