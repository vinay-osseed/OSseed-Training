<?php
abstract class games
{
    abstract public function getType();
}

class chess extends games
{
    protected $type;
    public function __construct($type)
    {
        $this->type = $type;
    }

    public function getType()
    {
        echo "Game Type is {$this->type}.";
    }
}

$chess = new chess("indoor\n");
$chess->getType();