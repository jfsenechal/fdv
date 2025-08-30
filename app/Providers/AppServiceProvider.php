<?php


namespace App\Providers;

use Filament\Tables\Table;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;

final class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        // Set the root URL for record link in tables

        if (!app()->isLocal()) {
            URL::useOrigin(config('app.url'));
        }
        $this->configureTable();
    }

    private function configureTable(): void
    {
        Table::configureUsing(function (Table $table): void {
            $table->striped()
                ->deferLoading();
        });
    }
}
