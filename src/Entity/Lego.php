<?php
namespace App\Entity;

class Lego {
    private $id; 
    private $name;
    private $collection;

    private $description;
    private $price;
    private $pieces;
    private $BoxImage;
    private $LegoImage;

    public function __construct( int $id ,string $name ,string $collection) {
        $this->name = $name;
        $this->id = $id;
        $this->collection = $collection;
    }
    


    /**
     * Set the value of collection
     */
    public function setCollection($collection): self
    {
        $this->collection = $collection;

        return $this;
    }


    /**
     * Set the value of name
     */
    public function setName($name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Get the value of collection
     */
    public function getCollection()
    {
        return $this->collection;
    }


    /**
     * Set the value of id
     */
    public function setId($id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of description
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Get the value of price
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Get the value of pieces
     */
    public function getPieces()
    {
        return $this->pieces;
    }


    /**
     * Set the value of description
     */
    public function setDescription($description): self
    {
        $this->description = $description;

        return $this;
    }


    /**
     * Set the value of price
     */
    public function setPrice($price): self
    {
        $this->price = $price;

        return $this;
    }


    /**
     * Set the value of pieces
     */
    public function setPieces($pieces): self
    {
        $this->pieces = $pieces;

        return $this;
    }


    /**
     * Set the value of BoxImage
     */
    public function setBoxImage($BoxImage): self
    {
        $this->BoxImage = $BoxImage;

        return $this;
    }


    /**
     * Set the value of LegoImage
     */
    public function setLegoImage($LegoImage): self
    {
        $this->LegoImage = $LegoImage;

        return $this;
    }

    /**
     * Get the value of BoxImage
     */
    public function getBoxImage()
    {
        return $this->BoxImage;
    }

    /**
     * Get the value of LegoImage
     */
    public function getLegoImage()
    {
        return $this->LegoImage;
    }
}


