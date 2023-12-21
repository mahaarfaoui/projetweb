<?php
class Facture
{
    private ?int $numFacture = null;
    private ?DateTime $dateFacture = null;
    private ?float $montant = null;

    public function __construct($numFacture = null, $d, $m)
    {
        $this->numFacture = $numFacture;
        $this->dateFacture = $d;
        $this->montant = $m;
    }

    /**
     * Get the value of numFacture
     */
    public function getNumFacture()
    {
        return $this->numFacture;
    }

    /**
     * Get the value of dateFacture
     */
    public function getDateFacture()
    {
        return $this->dateFacture;
    }

    /**
     * Set the value of dateFacture
     *
     * @return  self
     */
    public function setDateFacture($dateFacture)
    {
        $this->dateFacture = $dateFacture;

        return $this;
    }

    /**
     * Get the value of montant
     */
    public function getMontant()
    {
        return $this->montant;
    }

    /**
     * Set the value of montant
     *
     * @return  self
     */
    public function setMontant($montant)
    {
        $this->montant = $montant;

        return $this;
    }

}