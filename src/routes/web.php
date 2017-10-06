<?php
/**
 * Created by PhpStorm.
 * User: 303729
 * Date: 06.10.2017
 * Time: 10:36
 */

Route::get('spanel', function (){
    return Spanel::generate();
})->middleware();


