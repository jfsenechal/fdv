<?php

declare(strict_types=1);

namespace App\Providers;

use Filament\Tables\Table;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;

final class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        // Set the root URL for record link in tables

        if (! app()->isLocal()) {
            URL::useOrigin(config('app.url'));
        }
        $this->configureTable();
        $this->configureLivewireSubdirectory();
    }

    /**
     * Prefix Livewire's update and script routes with the subdirectory from
     * APP_URL (e.g. "/plantes") so requests resolve correctly when the app is
     * served from a subdirectory. Falls back to Livewire defaults when APP_URL
     * has no path (e.g. local development).
     */
    private function configureLivewireSubdirectory(): void
    {
        $basePath = mb_rtrim((string) parse_url((string) config('app.url'), PHP_URL_PATH), '/');

        if ($basePath === '') {
            return;
        }

        Livewire::setUpdateRoute(fn ($handle) => Route::post($basePath.'/livewire/update', $handle)
            ->middleware('web'));

        Livewire::setScriptRoute(fn ($handle) => Route::get($basePath.'/livewire/livewire.js', $handle));
    }

    private function configureTable(): void
    {
        Table::configureUsing(function (Table $table): void {
            $table->striped()
                ->deferLoading();
        });
    }
}
