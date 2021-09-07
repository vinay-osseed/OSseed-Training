<?php
// 1-> Write program with oops like class objects inheritance abstract class.
abstract class games{
     /*abstract class*/
    abstract public function getType();
}
class chess extends games{
    /*normal class accessing 1 method from games*/
    protected $type;
    public function __construct($type)
    {
        $this->type = $type;
    }

    public function getType()
    {
        echo "Game Type is {$this->type}.\n";
    }
}
$chess = new chess("indoor");  /* instance of chess class */
$chess->getType();
?>
