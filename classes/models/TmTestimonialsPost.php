<?php

class TmTestimonialsPost extends ObjectModel
{

    public $id_testimonial;
    public $author;
    public $title;
    public $body;
    public static $definition = array(
        'table'   => 'testimonials',
        'primary' => 'id_testimonials',
        'fields'  => array(
            'author' => array('type' => self::TYPE_STRING, 'validate' => 'isString'),
            'title' => array('type' => self::TYPE_STRING, 'validate' => 'isString'),
            'body' => array('type' => self::TYPE_STRING, 'validate' => 'isString')
        ),
    );

}
