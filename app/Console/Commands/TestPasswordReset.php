<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Illuminate\Support\Facades\Password;

class TestPasswordReset extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:password-reset {email}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Test password reset functionality for a given email';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $email = $this->argument('email');
        
        $this->info("Testing password reset for email: {$email}");
        
        // Clean the email
        $cleanEmail = strtolower(trim($email));
        $this->info("Cleaned email: {$cleanEmail}");
        
        // Check if user exists
        $user = User::where('email', $cleanEmail)->first();
        
        if (!$user) {
            $this->error("User not found with email: {$cleanEmail}");
            return 1;
        }
        
        $this->info("User found: ID {$user->id}, Name: {$user->name}");
        $this->info("Email verified: " . ($user->email_verified_at ? 'Yes' : 'No'));
        
        // Test password reset
        $status = Password::sendResetLink(['email' => $cleanEmail]);
        
        $this->info("Password reset status: {$status}");
        
        if ($status === Password::RESET_LINK_SENT) {
            $this->info("✅ Password reset link sent successfully!");
        } else {
            $this->error("❌ Failed to send password reset link: {$status}");
        }
        
        return 0;
    }
}