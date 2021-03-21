<?php


namespace Entity;



class DirectoryManager
{
    public $path;
    protected $dir;

    public function __construct(string $path = "C:\\")
    {
        $this->path = $path;
        $this->dir = new \DirectoryIterator($this->path);
    }

    public function open(string $name)
    {
        foreach ($this->dir as $item) {

            if (!($item->isDir()) && $item->getExtension() == 'sys') {
                continue;
            }

            if ($item == $name) {
                if ($item->isDir()){
                   $this->openDirectory($item);
                } elseif ($item->isFile()) {
                    $this->openFile($item);
                }
                break;
            }
        }
    }

    public function goBack()
    {
        foreach ($this->dir as $item) {

            if ($item == '..') {
                $this->openDirectory($item);
                break;
            }
        }
    }

    protected function openFile($item)
    {
        echo "open file {$this->path}{$item}";
//        $item->openFile('r');
    }

    protected function openDirectory($item)
    {
        $this->path = $this->path . $item . "\\";
        $this->dir = new \DirectoryIterator($this->path);

        foreach ($this->dir as $item) {
            if ($item->isDir() && ($item == '.' || $item == '..')) continue;
            echo $item . "<br>";
        }
    }






}