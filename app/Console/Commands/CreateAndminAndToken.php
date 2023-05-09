<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class CreateAndminAndToken extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'admin:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new user and generate a token';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $name = 'admin';
        $email = 'admin@admin.com';
        $password = 'admin';

        // Create the user
        $user = User::create([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password),
        ]);

        // Generate a token
        $tokenName = 'token_name'; // Specify the desired token name
        $token = $user->createToken($tokenName);

        $this->info('User created successfully!');
        $this->line('Token: ' . $token->plainTextToken);
    }
}
