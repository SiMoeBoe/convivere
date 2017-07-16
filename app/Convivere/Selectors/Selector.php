<?php

namespace Convivere\Selectors;

use Illuminate\Support\Facades\Cookie;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

/**
 * Description of Selectors
 *
 * @author simon
 */
class Selector {

    /**
     * Name of selector class
     * 
     * @var string
     */
    private $selector;
    
    /**
     * Namespace of selector classes
     * 
     * @var string 
     */
    private $selectorNamespace = 'Convivere\Selectors\\';
    
    /**
     * Name of the cookie of instance
     * 
     * @var string
     */
    private $selectorCookie;

    /**
     * Construct new instance of Selector
     * 
     * @param string $selectorCookie
     */
    public function __construct( $selectorCookie = 'selectorCookie' ) {
        
        $this->selectorCookie = $selectorCookie;
        $this->selector = Cookie::get( $selectorCookie, 'allSelector' );
    }

    /**
     * Writes selector class name into the cookie of instance
     * 
     * @param string $selector
     * @return boolean
     */
    public function setSelectorCookie( $selector = 'allSelector' ) {

        $selectorClass     = $this->selectorNamespace . $selector;
        $selectorInterface = $this->selectorNamespace . 'selectorInterface';

        if ( !class_exists( $selectorClass ) || !in_array( $selectorInterface, class_implements( $selectorClass ) ) ) {
            LOG::error( $selector . ' is not a known Selector' );
            $selector = 'allSelector';
        }
        Cookie::forever( $this->selectorCookie, $selector );
        $this->selector = $selector;

        return true;
    }

    /**
     * Returns selected Collection
     * 
     * @param \Illuminate\Database\Eloquent\Model $model
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getCollection( Model $model ) {
        $selectorClass = $this->selectorNamespace . $this->selector;
        $selector      = new $selectorClass;
        return $selector->getCollection( $model );
    }

}
