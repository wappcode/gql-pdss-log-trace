<?php

namespace GPDLogTrace\Library;


class LogTraceInfo
{

    /**
     * @var string
     */
    protected $resource;
    /**
     * @var string
     */
    protected $action;
    /**
     * @var string
     */
    protected $referenceId;
    /**
     * @var string
     */
    protected $referenceLabel;
    /**
     * @var array
     */
    protected $input;

    /**
     * @var string
     */
    protected $userId;

    /**
     * @var string
     */
    protected $userName;

    public function isValid()
    {
        if (empty($this->resource)) {
            return false;
        }
        if (empty($this->action)) {
            return false;
        }
        if (empty($this->referenceId)) {
            return false;
        }
        if (!is_array($this->input)) {
            return false;
        }
        return true;
    }

    /**
     * Get the value of resource
     *
     * @return  string
     */
    public function getResource()
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
    public function getAction()
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
     * @return  string
     */
    public function getReferenceId()
    {
        return $this->referenceId;
    }

    /**
     * Set the value of referenceId
     *
     * @param  string  $referenceId
     *
     * @return  self
     */
    public function setReferenceId(string $referenceId)
    {
        $this->referenceId = $referenceId;

        return $this;
    }

    /**
     * Get the value of referenceLabel
     *
     * @return  string
     */
    public function getReferenceLabel()
    {
        return $this->referenceLabel;
    }

    /**
     * Set the value of referenceLabel
     *
     * @param  string  $referenceLabel
     *
     * @return  self
     */
    public function setReferenceLabel(string $referenceLabel)
    {
        $this->referenceLabel = $referenceLabel;

        return $this;
    }

    /**
     * Get the value of input
     *
     * @return  array
     */
    public function getInput()
    {
        return $this->input;
    }

    /**
     * Set the value of input
     *
     * @param  array  $input
     *
     * @return  self
     */
    public function setInput(array $input)
    {
        $this->input = $input;

        return $this;
    }

    /**
     * Get the value of userId
     *
     * @return  string
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * Set the value of userId
     *
     * @param  string  $userId
     *
     * @return  self
     */
    public function setUserId(string $userId)
    {
        $this->userId = $userId;

        return $this;
    }

    /**
     * Get the value of userName
     *
     * @return  string
     */
    public function getUserName()
    {
        return $this->userName;
    }

    /**
     * Set the value of userName
     *
     * @param  string  $userName
     *
     * @return  self
     */
    public function setUserName(string $userName)
    {
        $this->userName = $userName;

        return $this;
    }
}
