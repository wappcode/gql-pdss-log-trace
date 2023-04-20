<?php

declare(strict_types=1);

namespace GPDLogTrace\Entities;

use Doctrine\ORM\Mapping as ORM;
use GPDCore\Entities\AbstractEntityModel;
use GraphQL\Doctrine\Annotation as API;

/**
 * @ORM\Entity
 * @ORM\Table("gpd_log_trace",indexes={
 * @ORM\Index(name="resource_key_idx",columns={"resource_key"}),
 * @ORM\Index(name="action_key_idx",columns={"action_key"}),
 * @ORM\Index(name="referenceid_idx",columns={"reference_id"}),
 * @ORM\Index(name="referencelabel_idx",columns={"reference_label"}),
 * @ORM\Index(name="source_idx",columns={"source_ip"}),
 * @ORM\Index(name="created_idx",columns={"created"}),
 * })
 *
 */
class LogTrace extends AbstractEntityModel
{

    const RELATIONS_MANY_TO_ONE = [];

    /**
     *
     * @var string
     * @ORM\Column(type="string", length=255, nullable=false, name="resource_key")
     */
    protected $resource;
    /**
     * @var string
     * @ORM\Column(type="string", length=255, nullable=false, name="action_key")
     */
    protected $action;
    /**
     * @var ?array
     * @ORM\Column(type="json", nullable=true) 
     */
    protected $input;
    /**
     * @var ?string
     * @ORM\Column(type="string", length=255, name="source_ip", nullable=true) 
     */
    protected $sourceIP;

    /**
     *
     * @var ?string
     * @ORM\Column(type="string", length=255, nullable=true, name="reference_id")
     */
    protected $referenceId;

    /**
     * @var ?string
     * @ORM\Column(type="string", length=255, nullable=true, name="reference_label")
     * 
     */
    protected $referenceLabel;

    /**
     * Id del usuario relacionado
     * @ORM\Column(type="string", nullable=true, name="user_id")
     * @var ?string
     */
    protected $user;

    /**
     *
     * @var ?string
     * @ORM\Column(type="string",nullable=true, length=255, name="user_fullname")
     */
    protected $userFullName;


    /**
     * Get the value of resource
     *
     * @return  string
     */
    public function getResource(): string
    {
        return $this->resource;
    }

    /**
     * Set the value of resource
     *
     * @param  string  $resource
     *
     * @return  self
     */
    public function setResource(string $resource)
    {
        $this->resource = $resource;

        return $this;
    }

    /**
     * Get the value of action
     *
     * @return  string
     */
    public function getAction(): string
    {
        return $this->action;
    }

    /**
     * Set the value of action
     *
     * @param  string  $action
     *
     * @return  self
     */
    public function setAction(string $action)
    {
        $this->action = $action;

        return $this;
    }



    /**
     * Get the value of referenceId
     *
     * @return  ?string
     */
    public function getReferenceId(): ?string
    {
        return $this->referenceId;
    }

    /**
     * Set the value of referenceId
     *
     * @param  ?string  $referenceId
     *
     * @return  self
     */
    public function setReferenceId(?string $referenceId)
    {
        $this->referenceId = $referenceId;

        return $this;
    }

    /**
     * Get the value of referenceLabel
     *
     * @return  ?string
     */
    public function getReferenceLabel(): ?string
    {
        return $this->referenceLabel;
    }

    /**
     * Set the value of referenceLabel
     *
     * @param  ?string  $referenceLabel
     *
     * @return  self
     */
    public function setReferenceLabel(?string $referenceLabel)
    {
        $this->referenceLabel = $referenceLabel;

        return $this;
    }

    /**
     * Get the value of userFullName
     *
     * @return  ?string
     */
    public function getUserFullName(): ?string
    {
        return $this->userFullName;
    }

    /**
     * Set the value of userFullName
     *
     * @param  ?string  $userFullName
     *
     * @return  self
     */
    public function setUserFullName(?string $userFullName)
    {
        $this->userFullName = $userFullName;

        return $this;
    }



    /**
     * Get the value of sourceIP
     *
     * @return  ?string
     */
    public function getSourceIP(): ?string
    {
        return $this->sourceIP;
    }

    /**
     * Set the value of sourceIP
     *
     * @param  ?string  $sourceIP
     *
     * @return  self
     */
    public function setSourceIP(?string $sourceIP)
    {
        $this->sourceIP = $sourceIP;

        return $this;
    }

    /**
     * Get the value of input
     *
     * @API\Field(type="JSONData")
     * @return  ?array
     */
    public function getInput(): ?array
    {
        return $this->input;
    }

    /**
     * Set the value of input
     * 
     * @API\Input(type="JSONData")
     * @param  ?array  $input
     *
     * @return  self
     */
    public function setInput(?array $input)
    {
        $this->input = $input;

        return $this;
    }
    /**
     * Get id del usuario relacionado
     *
     * @return  ?string
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set id del usuario relacionado
     *
     * @param  ?string  $user  Id del usuario relacionado
     *
     * @return  self
     */
    public function setUser(?string $user)
    {
        $this->user = $user;

        return $this;
    }
}
