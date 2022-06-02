<?php


namespace App\Models;

use App\Collection\MenuItemsCollection;
use Illuminate\Database\Eloquent\Model;

class MenuItem extends Model
{
    /**
     * Create a new Eloquent Collection instance.
     *
     * @param  array  $models
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function newCollection(array $models = [])
    {
        return new MenuItemsCollection($models);
    }
}
