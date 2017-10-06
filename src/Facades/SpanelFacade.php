<?php
/**
 * Created by PhpStorm.
 * User: 303729
 * Date: 30.09.2017
 * Time: 11:23
 */

namespace Omerhan\Spanel\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * Description of KurecellFacade
 *
 * @author phpuzem
 */
class SpanelFacade extends Facade {

    protected static function getFacadeAccessor()
    {
        return 'spanel';
    }
}