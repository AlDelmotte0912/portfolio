<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class Hello extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'say:hello {argument}';// l'argument est ce que l'on doit donner à la fin de la commande

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'La commande dit Hello';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        echo $this->alert('Hello'
            . $this->argument('argument'));
        return command::SUCCESS;
    }
}
