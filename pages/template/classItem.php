<?php
class Item 
{
    public $name;
    public $description;
    public $price;
    public $picture_url;
    public $weight;
    public $quantity;
    public $sell;

    public function __construct(array $datas)
    {
        $this->name = $datas['name']
             ->description = $datas['description']
             ->price = $datas['price']
             ->picture_url = $datas['picture_url']
             ->weight = $datas['weight']
             ->quantity = $datas['quantity']
             ->sell = $datas['sell']
        ;
    }

    public function  displayItem($item)
    {
        $name= $item->name ;
        $description=$item->description;
        $price=$item->price;
        $picture_url=$item->picture_url;
        $weight=$item->weight;
        $quantity=$item->quantity;
        $sell=$item->sell;
    }

    

}

