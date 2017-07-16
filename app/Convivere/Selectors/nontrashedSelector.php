<?php 

namespace Convivere\Selectors;

use Illuminate\Database\Eloquent\Model;
use Convivere\Selectors\selectorInterface;

/**
 * Selector for all nontrashed entries
 *
 * @author simon
 */
class nontrashedSelector implements selectorInterface {
    
    /**
     * Returns all nontrashed entries
     * 
     * @param \Illuminate\Database\Eloquent\Model $model
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getCollection( Model $model ) {
        return $model::all();
    }

}
