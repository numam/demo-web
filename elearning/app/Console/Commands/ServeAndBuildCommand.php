<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Process\Process;

class ServeAndBuildCommand extends Command
{
    protected $signature = 'serve:all';
    protected $description = 'Run PHP server and Vite simultaneously';

    public function handle()
    {
        $this->info('Starting PHP server and Vite...');

        // Jalankan PHP Artisan Serve
        $phpServer = new Process(['php', 'artisan', 'serve']);
        $phpServer->start();

        // Jalankan Vite
        $vite = new Process(['npm', 'run', 'dev']);
        $vite->start();

        // Monitoring output
        foreach ([$phpServer, $vite] as $process) {
            $process->wait(function ($type, $buffer) {
                $this->info($buffer);
            });
        }
    }
}
