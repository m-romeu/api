<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class OfficeServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
	
	public function register(){
		
		$this->app->bind(
			'App\Services\IOfficeService',
			'App\Services\OfficeService'			
		);
		$this->app->bind(		
			'App\Models\IApiOffice',
			'App\Models\ApiOffice'
		);
	}
}
