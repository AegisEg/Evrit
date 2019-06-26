<?php

/**
 * @var \SleepingOwl\Admin\Contracts\Navigation\NavigationInterface $navigation
 * @see http://sleepingowladmin.ru/docs/menu_configuration
 */

use SleepingOwl\Admin\Navigation\Page;

\AdminNavigation::setFromArray([
    
        [
            'title' => 'Dashboard',
            'icon'  => 'fa fa-dashboard',
            'id'    =>'content',
        ]
    
]);
