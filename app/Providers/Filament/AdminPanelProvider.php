<?php

declare(strict_types=1);

namespace App\Providers\Filament;

use App\Filament\Pages\Login;
use App\Models\Menu;
use App\Models\MenuItem;
use App\Models\MenuLocation;
use Awcodes\FilamentQuickCreate\QuickCreatePlugin;
use Datlechin\FilamentMenuBuilder\FilamentMenuBuilderPlugin;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Support\Enums\MaxWidth;
use Filament\Widgets;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('admin')
            ->path('admin')
            ->login(Login::class)
            ->passwordReset()
            ->colors([
                'primary' => Color::Amber,
            ])
            ->plugins([
                FilamentMenuBuilderPlugin::make()
                    ->usingMenuModel(Menu::class)
                    ->usingMenuItemModel(MenuItem::class)
                    ->usingMenuLocationModel(MenuLocation::class)
                    ->navigationSort(50)
                    ->addLocations([
                        'header' => 'Header',
                        'footer' => 'Footer',
                    ]),

                QuickCreatePlugin::make(),

            ])
            ->topNavigation()
            ->maxContentWidth(MaxWidth::Full)
            ->darkMode(false)
            ->viteTheme('resources/css/filament/admin/theme.css')
            ->brandLogo(fn () => view('filament.brand'))
            ->brandLogoHeight('3rem')
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\\Filament\\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\\Filament\\Pages')
            ->pages([
                Pages\Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\\Filament\\Widgets')
            ->widgets([
                Widgets\AccountWidget::class,
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ]);
    }
}
