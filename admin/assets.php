<?php

/**
 * @var KodiCMS\Assets\Contracts\MetaInterface $meta
 * @var KodiCMS\Assets\Contracts\PackageManagerInterface $packages
 *
 * @see http://sleepingowladmin.ru/docs/assets
 */


//$meta
//    ->css('custom', asset('custom.css'))
//    ->js('custom', asset('custom.js'), 'admin-default');

//$packages->add('jquery')
//    ->js(null, asset('libs/jquery.js'));
$packages->add('admin_custom')
->css('admin_custom',asset('css/main.css'),'admin-default');
$packages->add('admin_bsp')
->css('bsp4',asset('css/bootstrap.min.css'),'bp4');
$packages->add('js')->js('js_custom',asset('js/admin.js'),'admin-default');


