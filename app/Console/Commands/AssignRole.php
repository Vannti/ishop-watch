<?php

namespace App\Console\Commands;

use App\Models\Role;
use App\Models\User;
use Illuminate\Console\Command;

class AssignRole extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'assign:role {role} {userId}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Assigns role to user';

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
        try{
            $slug = $this->argument('role');
            $userId = $this->argument('userId');

            $role = Role::where('slug', $slug)->first();
            $user = User::where('id', $userId)->first();

            if ($role && $user){
                $user->roles()->attach($role);
                $this->info("User ID: $userId now has role $slug");
            }
            else {
                if (!$role){
                    $this->error("Invalid role $role");
                }

                if (!$user){
                    $this->error("Invalid User Id $userId");
                }
            }
        }
        catch (\Exception $ex){
            $this->error($ex->getMessage());
        }
    }
}
