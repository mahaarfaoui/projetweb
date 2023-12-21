<?php
class Livraison
{
    private ?int $refLiv = null;
    private ?string $adresseLiv = null;
    private ?int $numFact = null;
    private ?string $etatLiv = null;

    public function __construct($refLiv = null, $a, $n,$e)
    {
        $this->refLiv = $refLiv;
        $this->adresseLiv = $a;
        $this->numFact = $n;
        $this->etatLiv = $e;
    }

    /**
     * Get the value of refLiv
     */
    public function getRefLiv()
    {
        return $this->refLiv;
    }

    /**
     * Get the value of adresseLiv
     */
    public function getAdresseLiv()
    {
        return $this->adresseLiv;
    }

    /**
     * Set the value of adresseLiv
     *
     * @return  self
     */
    public function setAdresseLiv($adresseLiv)
    {
        $this->adresseLiv = $adresseLiv;

        return $this;
    }

    /**
     * Get the value of numFact
     */
    public function getNumFact()
    {
        return $this->numFact;
    }

    /**
     * Set the value of numFact
     *
     * @return  self
     */
    public function setNumFact($numFact)
    {
        $this->numFact = $numFact;

        return $this;
    }
    
     /**
     * Get the value of etatLiv
     */
    public function getEtatLiv()
    {
        return $this->etatLiv;
    }

    /**
     * Set the value of etatLiv
     *
     * @return  self
     */
    public function setEtatLiv($etatLiv)
    {
        $this->etatLiv = $etatLiv;

        return $this;
    }

}