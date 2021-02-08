<?php

namespace App\Console\Commands;

use App\Models\User;
use Hash;
use Illuminate\Console\Command;
use Str;

class CreateOrUpdateAdmin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:admin';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create an admin or update an exist admin.';

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
    public function handle(): int
    {
        $username = $this->ask('What is your username?');
        $user = User::where('username', '=', $username)->first();
        if ($user) {
            $this->line('Hi, ' . $user->name . '!');
            $options = ['Change Name', 'Change Username', 'Change Email', 'Reset Password', 'Nothing'];
            while ($choice = $this->choice('What do you need?', $options)) {
                switch ($choice) {
                    case $options[0]:
                        $name = $this->ask('Okay, what is your new name?');
                        $user->update(['name' => $name]);
                        $this->info('Done!');
                        break;
                    case $options[1]:
                        $username = $this->ask('Okay, what is your new username?');
                        $user->update(['username' => $username]);
                        $this->info('Done! You can now use ' . $username . ' to login');
                        break;
                    case $options[2]:
                        $email = $this->ask('Okay, what is your new email?');
                        $user->update(['email' => $email]);
                        $this->info('Done! You can now use ' . $email . ' to login');
                        break;
                    case $options[3]:
                        $this->line('Okay, let me reset your password!');
                        $password = Str::random(8);
                        $user->update(['password' => Hash::make($password)]);
                        $this->line('Done! Here are your new password: ' . $password);
                        $this->warn('Please keep your password, you\'ll not see it again.');
                        break;
                    default:
                        // Do nothing
                        break;
                }
                if ($choice === end($options)) {
                    $this->line('Okay, bye!');
                    break;
                }
            }
        } else {
            if (!$this->confirm('There is no user called \'' . $username . '\'. Should we create one?', false)) {
                $this->line('Okay, bye!');
                return 0;
            }
            $this->line('Okay, let\'s start!');
            $name = $this->ask('What should we call you?');
            $email = $this->ask('What is your email?');
            $password = Str::random(8);
            User::create(
                [
                    'name'     => $name,
                    'username' => $username,
                    'email'    => $email,
                    'password' => Hash::make($password),
                ]
            );
            $this->info('Okay, ' . $name . '!You can now use the following credentials to login:');
            $this->line('Username: ' . $username);
            $this->line('Email   : ' . $email);
            $this->line('Password: ' . $password);
            $this->warn('Please keep your password, you\'ll not see it again.');
        }
        return 0;
    }
}
