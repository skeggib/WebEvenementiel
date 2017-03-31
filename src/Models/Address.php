<?php

namespace WebEvents\Models;

class Address
{
    private     $id;
    private     $num;
    private     $rue;
    private     $ville;
    private     $cp;

    public function __construct($id,
                                $num,
                                $rue,
                                $ville,
                                $cp)
    {
        $this->id = $id;
        $this->num = $num;
        $this->rue = $rue;
        $this->ville = $ville;
        $this->cp = $cp; 
    }

    public function getId()
    {
        return $this->id;
    }

    public function getNum()
    {
        return $this->num;
    }

    public function setNum($num)
    {
        $this->num = $num;
    }

    public function getRue()
    {
        return $this->rue;
    }

    public function setRue($rue)
    {
        $this->$rue = rue;
    }

    public function getVille()
    {
        return $this->ville;
    }

    public function setVille($ville)
    {
        $this->$ville = ville;
    }

    public function getCp()
    {
        return $this->cp;
    }

    public function setCp($cp)
    {
        $this->cp = $cp;
    }
}