<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class FixPasswords extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fix:passwords';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fix user passwords by hashing plain text passwords';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Checking and fixing user passwords...');
        
        $users = User::all();
        $fixedCount = 0;
        
        foreach ($users as $user) {
            // Check if password is already hashed
            $passwordInfo = password_get_info($user->password);
            
            if ($passwordInfo['algo'] === null) {
                // Password is plain text, hash it
                $user->password = Hash::make($user->password);
                $user->save();
                $this->info("Fixed password for user: {$user->name}");
                $fixedCount++;
            } else {
                $this->line("User {$user->name} already has hashed password");
            }
        }
        
        $this->info("Fixed {$fixedCount} passwords successfully!");
        
        return Command::SUCCESS;
    }
}