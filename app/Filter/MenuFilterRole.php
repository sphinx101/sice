<?php
/**
 * Created by PhpStorm.
 * User: Neo
 * Date: 23/06/2018
 * Time: 08:11 PM
 */

namespace sice\Filter;


use Illuminate\Support\Facades\Auth;
use JeroenNoten\LaravelAdminLte\Menu\Builder;
use JeroenNoten\LaravelAdminLte\Menu\Filters\FilterInterface;

class MenuFilterRole implements FilterInterface{

    public function transform($item, Builder $builder){

       if(!$this->isVisible($item)){
           return false;
       }
       if(isset($item['header'])){
           $item=$item['header'];
       }

       return $item;
    }

    protected function isVisible($item_menu){

        if(isset($item_menu['role'])){
           if(Auth::user()->hasRole($item_menu['role'])){
               return true;
           }
           return false;
        }
    }
}