<?php

namespace Convivere\Selectors;

use Convivere\Selectors\selectorInterface;
use Illuminate\Database\Eloquent\Model;

/**
 * Selector for all entries
 *
 * @author simon
 */
class allSelector implements selectorInterface {
   
    /**
     * Returns all entries
     * 
     * @param \Illuminate\Database\Eloquent\Model $model
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getCollection( Model $model ) {
        return $model::withTrashed()->get();
    }

}
