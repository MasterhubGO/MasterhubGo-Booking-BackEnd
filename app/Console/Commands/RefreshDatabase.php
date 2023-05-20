<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class RefreshDatabase extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:refresh';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Сбрасывает БД и заново прогоняет миграции и сидеры';

    /**
     * Execute the console command.
     */
    public function handle()
    {
		if (app()->isProduction()) {
			$this->alert('Not for production!');
			return Command::FAILURE;
		}

        Artisan::call('migrate:fresh');
		
		Artisan::call('db:seed', ['--class' => 'CurrenciesSeeder']);
		Artisan::call('db:seed', ['--class' => 'BusinessRoleSeeder']);

		$this->call('admin:create');

		Artisan::call('db:seed', ['--class' => 'BusinessProfileSeeder']);

		return Command::SUCCESS;
    }
}
