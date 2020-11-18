<?php
namespace Model;

class Career{
    private $careerId;
    private $name;
    private $active;

    public function __construct($careerId="", $name="", $active=""){
        $this->careerId = $careerId;
        $this->name = $name;
        $this->active = $active;
    }

    /**
     * Get the value of id
     */ 
    public function getCareerId()
    {
        return $this->careerId;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setCareerId($careerId)
    {
        $this->careerId = $careerId;

        return $this;
    }

    /**
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */ 
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of active
     */ 
    public function getActive()
    {
        return $this->active;
    }

    /**
     * Set the value of active
     *
     * @return  self
     */ 
    public function setActive($active)
    {
        $this->active = $active;

        return $this;
    }
}
?>