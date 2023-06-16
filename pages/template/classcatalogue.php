<?php

class Catalogue
{
    public array $items;

    public function __construct()
    {
        
    }

    public function addItems(Item $item): Catalogue 
    {
       $this->items[] = $item;
       return $this;
    }

    public function getItems()
    {
        return $this->items;
    }
    
}