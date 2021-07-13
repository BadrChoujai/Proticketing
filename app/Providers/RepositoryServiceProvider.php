<?php

namespace App\Providers;

use App\Repositories\CategorieRepository;
use App\Repositories\CommentRepository;
use App\Repositories\EloquentCategorie;
use App\Repositories\EloquentComment;
use App\Repositories\EloquentRole;
use App\Repositories\EloquentStatus;
use App\Repositories\EloquentTicket;
use App\Repositories\EloquentUser;
use App\Repositories\RoleRepository;
use App\Repositories\StatusRepository;
use App\Repositories\TicketRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\ServiceProvider;
use App\Repositories\EloquentPriority;
use App\Repositories\PriorityRepository;
use App\Repositories\EloquentPermission;
use App\Repositories\PermissionRepository;
use App\Repositories\EloquentCitie;
use App\Repositories\CitieRepository;


class RepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(TicketRepository::class, EloquentTicket::class);
        $this->app->bind(UserRepository::class, EloquentUser::class);
        $this->app->bind(CommentRepository::class, EloquentComment::class);
        $this->app->bind(StatusRepository::class, EloquentStatus::class);
        $this->app->bind(CategorieRepository::class, EloquentCategorie::class);
        $this->app->bind(RoleRepository::class, EloquentRole::class);
        $this->app->bind(PriorityRepository::class, EloquentPriority::class);
        $this->app->bind(CitieRepository::class, EloquentCitie::class);
        $this->app->bind(PermissionRepository::class, EloquentPermission::class);
    }
}
