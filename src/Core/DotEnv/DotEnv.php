<?php

namespace Core\DotEnv;

class DotEnv
{
    private $path = null;

    public function __construct($path = null)
    {
        $this->path = $path;
        if(!$this->path) {
            $this->path = $_SERVER['DOCUMENT_ROOT'] . '/../.env';
        }

        $this->parse();
    }

    private function process($key, $value)
    {
        $key = trim($key);
        $value = trim($value);

        putenv("{$key}=$value");
        $_ENV[$key] = $value;
    }

    public function parse()
    {
        if(!file_exists($this->path))
        {
            throw new \Exception("Environment File Missing at {$this->path}");
        }

        $envcontent = file_get_contents($this->path);
        $envlines = explode(PHP_EOL, $envcontent);
        foreach($envlines as $line)
        {
            if(trim($line))
            {
                $kv = explode('=', $line);

                // Force a blank if second value is invalid
                if(!isset($kv[1]) || !$kv[1])
                {
                    $kv[1] = "";
                }

                $this->process($kv[0], $kv[1]);
            }
        }
    }
}



