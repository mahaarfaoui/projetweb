<?php
class com
{
    private ?string $name = null;
    private ?int $number = null;
    private ?string $address = null;
    private ?int $dateoford = null;
    private ?string $email = null;
    private ?string $pay = null;
    private ?string $city = null;
    private ?string $state = null;
    private ?string $pin = null;

    public function __construct($name = null, $a, $n,$e,$email,$pay,$city,$state,$pin)
    {
        $this->name = $name;
        $this->number = $a;
        $this->address = $n;
        $this->dateoford = $e;
        $this->email = $email;
        $this->pay= $pay;
        $this->city = $city;
        $this->state = $state;
        $this->pin = $pin;

    }

    /**
     * Get the value of name
     */
    public function getname()
    {
        return $this->name;
    }

    /**
     * Get the value of number
     */
    public function getnumber()
    {
        return $this->number;
    }

    /**
     * Set the value of number
     *
     * @return  self
     */
    public function setnumber($number)
    {
        $this->number = $number;

        return $this;
    }

    /**
     * Get the value of address
     */
    public function getaddress()
    {
        return $this->address;
    }

    /**
     * Set the value of address
     *
     * @return  self
     */
    public function setaddress($address)
    {
        $this->address = $address;

        return $this;
    }
    
     /**
     * Get the value of dateoford
     */
    public function getdateoford()
    {
        return $this->dateoford;
    }

    /**
     * Set the value of dateoford
     *
     * @return  self
     */
    public function setdateoford($dateoford)
    {
        $this->dateoford = $dateoford;

        return $this;
    }


    
}