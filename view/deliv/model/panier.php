<?php
class panier
{
    private ?int $id = null;
    private ?string $name = null;
	private ?int $price = null;
    private ?string $image = null;

    public function __construct($id = null, $n, $p, $a)
    {
        $this->id = $id;
        $this->name = $n;
		$this->price = $p;
        $this->image = $a;
    }

    /**
     * Get the value of id
     */
    public function getid()
    {
        return $this->id;
    }

    /**
     * Get the value of name
     */
    public function getname()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */
    public function setname($name)
    {
        $this->name = $name;

        return $this;
    }



    /**
     * Get the value of price
     */
    public function getprice()
    {
        return $this->price;
    }

    /**
     * Set the value of price
     *
     * @return  self
     */
    public function setprice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get the value of image
     */
    public function getimage()
    {
        return $this->image;
    }

    /**
     * Set the value of image
     *
     * @return  self
     */
    public function setimage($image)
    {
        $this->image = $image;

        return $this;
    }

	
}

