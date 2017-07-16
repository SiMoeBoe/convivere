<?php

namespace Convivere\Selectors;

use Convivere\Selectors\selectorInterface;
use Illuminate\Database\Eloquent\Model;

/**
 * Selector for all trashed entries
 *
 * @author simon
 */
class trashedSelector implements selectorInterface {
    
    /**
     * Returns all trashed entries
     * 
     * @param \Illuminate\Database\Eloquent\Model $model
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getCollection( Model $model ) {
        return $model::onlyTrashed()->get();
    }

}
