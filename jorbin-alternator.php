<?php
/**
* Plugin Name: Alternator 
* Description: Add classes for odd and even on non single post pages
* Version: 0.0.1 
* Author: Aaron Jorbin
* Author URI: http://aaron.jorb.in
*/

class jorbinAlternator{
    
    public $currentCount;

    function __construct(){
        add_action('template_redirect', array($this, 'template_redirect'));
        $this->currentCount = 0;
    }

    function template_redirect(){
        if ( ! is_single() )
            add_filter('post_class', array($this, 'post_class'));
    }

    function post_class($classes){
        $this->currentCount++;
        $class = ($this->currentCount % 2 == 1) ? 'odd' : 'even';
        array_push($classes, $class);
        return $classes;
    }


}

$jorbinAlternator = new jorbinAlternator();
