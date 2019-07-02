<?php

namespace Admin\Providers;

use Admin\Policies\ContactsSectionModelPolicy;
use Illuminate\Routing\Router;
use SleepingOwl\Admin\Contracts\Navigation\NavigationInterface;
use SleepingOwl\Admin\Contracts\Template\MetaInterface;
use SleepingOwl\Admin\Contracts\Widgets\WidgetsRegistryInterface;
use SleepingOwl\Admin\Providers\AdminSectionsServiceProvider as ServiceProvider;
use PackageManager;
use Meta;

class AdminSectionsServiceProvider extends ServiceProvider
{
    /**
     * @var array
     */
    protected $widgets = [
        \Admin\Widgets\DashboardMap::class,
        \Admin\Widgets\NavigationNotifications::class,
        \Admin\Widgets\NavigationUserBlock::class,
    ];

    /**
     * @var array
     */
    protected $sections = [
        \App\User::class=> 'Admin\Http\Sections\Users',
        \App\Model\City::class => 'Admin\Http\Sections\Cities',
        \App\Model\Area::class => 'Admin\Http\Sections\Areas',
    ];

    /**
     * @param \SleepingOwl\Admin\Admin $admin
     *
     * @return void
     */
    public function boot(\SleepingOwl\Admin\Admin $admin)
    {
        $this->loadViewsFrom(base_path("admin/resources/views"), 'admin');
    
        // Meta::addJs('jquery', asset('js/jquery-3.3.1.min.js'), null, 1);
        // Meta::addJs('ckeditor', asset('packages/sleepingowl/ckeditor/ckeditor.js'), null, 0);
        // Meta::addJs('custom', asset('js/admin.js'), null, 1);

        $this->app->call([$this, 'registerRoutes']);
        $this->app->call([$this, 'registerNavigation']);

        parent::boot($admin);

        $this->app->call([$this, 'registerViews']);
        $this->app->call([$this, 'registerMediaPackages']);
    }

    /**
     * @param NavigationInterface $navigation
     */
    public function registerNavigation(NavigationInterface $navigation)
    {
        require base_path('admin/navigation.php');
    }

    /**
     * @param WidgetsRegistryInterface $widgetsRegistry
     */
    public function registerViews(WidgetsRegistryInterface $widgetsRegistry)
    {
        foreach ($this->widgets as $widget) {
            $widgetsRegistry->registerWidget($widget);
        }
    }

    /**
     * @param Router $router
     */
    public function registerRoutes(Router $router)
    {
        $router->group([
            'prefix'     => config('sleeping_owl.url_prefix'),
            'middleware' => config('sleeping_owl.middleware')
        ], function ($router) {
            require base_path('admin/Http/routes.php');
        });
    }
    public function registerMediaPackages(MetaInterface $meta)
    {
        $packages = $meta->assets()->packageManager();
        // require base_path( 'admin/assets.php' );
        // Meta::loadPackage(['admin_custom','admin_bsp']);

    }
}
