<?php
class Item 
{
    private ?int $id;
    private string $name;
    private string $description;
    private int $price;
    private string $picture_url;
    private int $weight;
    private ?int $quantity;
    private int $sell;
    private ?int $discount;

    public function __construct(array $datas)
    {
        $this->setId($datas['id'])
             ->setName($datas['name'])
             ->setDescription($datas['description'])
             ->setPrice($datas['price'])
             ->setPictureUrl($datas['picture_url'])
             ->setWeight($datas['weight'])
             ->setQuantity($datas['quantity'])
             ->setSell($datas['sell'])
             ->setDiscount($datas['discount'])
        ;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): Item
    {
        $this->id = $id;
        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): Item
    {
        $this->name = $name;
        return $this;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): Item
    {
        $this->description = $description;
        return $this;
    }

    public function getPrice(): int
    {
        return $this->price;
    }

    public function setPrice(int $price): Item
    {
        $this->price = $price;
        return $this;
    }

    public function getWeight(): int
    {
        return $this->weight;
    }

    public function setWeight(int $weight): Item
    {
        $this->weight = $weight;
        return $this;
    }

    public function getPictureUrl(): string
    {
        return $this->picture_url;
    }

    public function setPictureUrl(string $picture_url): Item
    {
        $this->picture_url = $picture_url;
        return $this;
    }
    
    public function getQuantity(): int
    {
        return $this->quantity;
    }

    public function setQuantity(?int $quantity): Item
    {
        $this->quantity = $quantity;
        return $this;
    }

    public function getSell(): int
    {
        return $this->sell;
    }

    public function setSell(int $sell): Item
    {
        $this->sell = $sell;
        return $this;
    }

    public function getDiscount(): ?int
    {
        return $this->discount;
    }

    public function setDiscount(?int $discount): Item
    {
        $this->discount = $discount;
        return $this;
    }
}

