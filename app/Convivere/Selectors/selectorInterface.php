<?php

namespace Convivere\Selectors;

use Illuminate\Database\Eloquent\Model;

/**
 * Interface for model selectors
 * 
 * @author simon
 */
interface selectorInterface {

    /**
     * Return a collection of the model
     * 
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getCollection( Model $model );
}
