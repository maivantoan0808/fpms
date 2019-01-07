<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Interfaces\ProjectRepositoryInterface;
use App\Repositories\Eloquent\ProjectRepository;
use App\Repositories\Interfaces\ReleaseRepositoryInterface;
use App\Repositories\Eloquent\ReleaseRepository;
use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Repositories\Eloquent\UserRepository;
use App\Repositories\Interfaces\DocumentVersionRepositoryInterface;
use App\Repositories\Eloquent\DocumentVersionRepository;
use App\Repositories\Interfaces\DocumentRepositoryInterface;
use App\Repositories\Eloquent\DocumentRepository;
use App\Repositories\Eloquent\SprintRepository;
use App\Repositories\Eloquent\MeetingRepository;
use App\Repositories\Eloquent\MeetingMetaRepository;
use App\Repositories\Eloquent\MeetingTypeRepository;
use App\Repositories\Interfaces\SprintRepositoryInterface;
use App\Repositories\Interfaces\MeetingRepositoryInterface;
use App\Repositories\Interfaces\MeetingTypeRepositoryInterface;
use App\Repositories\Interfaces\MeetingMetaRepositoryInterface;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
    
    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            ProjectRepositoryInterface::class,
            ProjectRepository::class
        );
        $this->app->bind(
            UserRepositoryInterface::class,
            UserRepository::class
        );
        $this->app->bind(
            ReleaseRepositoryInterface::class,
            ReleaseRepository::class
        );
        $this->app->bind(
            DocumentVersionRepositoryInterface::class,
            DocumentVersionRepository::class
        );
        $this->app->bind(
            DocumentRepositoryInterface::class,
            DocumentRepository::class
        );
        $this->app->bind(
            SprintRepositoryInterface::class,
            SprintRepository::class
        );
        $this->app->bind(
            MeetingTypeRepositoryInterface::class,
            MeetingTypeRepository::class
        );
        $this->app->bind(
            MeetingRepositoryInterface::class,
            MeetingRepository::class
        );
        $this->app->bind(
            MeetingMetaRepositoryInterface::class,
            MeetingMetaRepository::class
        );
    }
}
