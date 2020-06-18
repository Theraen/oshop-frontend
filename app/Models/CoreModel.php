<?php

namespace oShop\Models;

/**
 * Je défini un ancêtre commun à tous mes modèles
 */
class CoreModel {

    protected $id;
    protected $name;
    protected $created_at;
    protected $updated_at;


    /**
     * Get the value of id
     *
     * @return  int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of name
     *
     * @return  string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @param   string  $name  
     *
     */
    public function setName($name)
    {
        $this->name = $name;

    }

    /**
     * Get the value of created_at
     *
     * @return  string
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * Set the value of created_at
     *
     * @param   striog  $created_at  
     *
     */
    public function setCreatedAt($created_at)
    {
        $this->created_at = $created_at;
    }

    /**
     * Get the value of updated_at
     *
     * @return  string
     */
    public function getUpdated_at()
    {
        return $this->updated_at;
    }

    /**
     * Set the value of updated_at
     *
     * @param   string  $updated_at  
     *
     */
    public function setUpdated_at($updated_at)
    {
        $this->updated_at = $updated_at;
    }
}