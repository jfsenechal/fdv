# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Project Overview

This is a Laravel 12.x + FilamentPHP 4.x application for managing a botanical plant database (Flore de la Vallée). The application provides an admin panel for managing plants, families, genera, types, and photos with taxonomic classification and seasonal information.

## Development Commands

### Quick Development
```bash
composer dev
```
Runs all development services concurrently (web server, queue worker, log viewer, and Vite dev server).

### Code Quality & Testing
```bash
composer review          # Run all code quality tools (pint, rector, phpstan, pest)
composer pint            # Fix code style
composer rector          # Run automated refactoring
composer phpstan         # Run static analysis
composer pest            # Run tests with Pest
composer test            # Run tests with config clear
```

### Individual Commands
```bash
php artisan serve        # Start development server
npm run dev              # Start Vite dev server
npm run build            # Build assets for production
php artisan migrate      # Run database migrations
php artisan db:seed      # Seed the database
```

## Code Quality Standards

This project enforces strict code quality standards:

- **PHP Version**: Requires PHP 8.3+
- **Strict Types**: All files use `declare(strict_types=1);`
- **Final Classes**: All classes are marked as `final` (enforced by Pint)
- **Static Analysis**: PHPStan level 5
- **Code Style**: Laravel preset with strict comparison, ordered class elements, and immutable dates
- **Testing**: Pest framework with Laravel, Livewire, and Faker plugins

## Architecture

### Filament Resource Structure

Filament resources follow a modular pattern with separated concerns:

```
app/Filament/Resources/{Resource}/
├── {Resource}Resource.php          # Main resource definition
├── Pages/                           # CRUD pages (List, Create, Edit, View)
├── Schemas/                         # Form and Infolist definitions
├── Tables/                          # Table configuration
└── RelationManagers/                # Relationship panels
```

**Key Pattern**: Form, table, and infolist schemas are extracted into separate classes in the `Schemas/` and `Tables/` directories rather than being inline in the Resource class. For example:
- `PlantForm::configure($schema)` in `Schemas/PlantForm.php`
- `PlantsTable::configure($table)` in `Tables/PlantsTable.php`
- `PlantInfolist::configure($schema)` in `Schemas/PlantInfolist.php`

### Models & Database

The application manages botanical entities with taxonomic relationships:

- **Plant**: Main entity with fields for names (latin, french, english), descriptions, habitat, flowering/fruiting periods, conservation status, ecological role, usages, and etymology
- **Family**: Taxonomic family (e.g., Rosaceae)
- **Genus**: Taxonomic genus (e.g., Rosa)
- **Type**: Plant type classification
- **Photo**: Plant photos with seasonal categorization (spring, summer, autumn, winter) and cover photo designation
- **CategoryPhoto**: Photo categories

**Relationships**:
- Plant `belongsTo` Family, Genus, Type
- Plant `hasMany` Photos (with `photosBySeason()` helper method)
- Photos can be marked as cover photo (`has_cover` field)

### Enums

Enums implement Filament contracts (`HasColor`, `HasIcon`, `HasLabel`) for rich UI presentation:

- **SeasonEnum**: Seasons (spring, summer, autumn, winter) with colors and Tabler icons
- **NavigationGroupEnum**: Filament navigation grouping

### Filament Configuration

- **SPA Mode**: Enabled by default for smoother navigation
- **Tables**: Globally configured with striped rows and deferred loading (see `AppServiceProvider`)
- **Custom Theme**: Pre-configured custom theme
- **Editor**: Shared RichEditor toolbar configuration in `app/Filament/Forms/FormOptions.php`
- **Authentication**: Custom login page at `app/Filament/Pages/Auth/Login.php`

### Public Routes

Simple public-facing routes in `routes/web.php`:
- `/` - Home page listing plants
- `/show/{id}` - Plant detail page

Handled by `HomeController`.

### Migration Stubs

Custom migration stubs in `stubs/` directory remove the `down()` method by default.

## Testing

- **Framework**: Pest
- **Configuration**: `phpunit.xml` with in-memory SQLite database
- **Locations**: `tests/Feature/` and `tests/Unit/`
- **Run Parallel**: `./vendor/bin/pest --parallel`

## Frontend

- **Build Tool**: Vite with Laravel plugin
- **CSS Framework**: Tailwind CSS 4.x
- **Icons**: Tabler Icons via `secondnetwork/blade-tabler-icons`

## Dependencies Notes

- **nunomaduro/essentials**: Provides strict models, eagerly loaded relationships, and immutable dates
- **Laravel Debugbar**: Available in development for query and performance insights