<?php
namespace kernel;

/**
 * return la vue 
 */
class View{

    private $filename;
    private $params;

    public function __construct($filename,$params)
    {
        $this->filename=$filename;
        $this->params=$params;
    }


    /**
     * inclure la vue
     *
     * @return void
     */
    public function display()
    {
        foreach($this->params as $key =>$value)
        {
            $$key=$value;
        }
        include ('../app/views/'.$this->filename);
    }

}