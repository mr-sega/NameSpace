<?php

class Autoloader
{
    protected $prefixes = array();

    public function addNamespace(string $prefix, string $dir)
    {
        $prefix .= '\\';
        $dir .= '/';
        if (isset($this->prefixes[$prefix]) === false) {
            $this->prefixes[$prefix] = array();
        }
        array_push($this->prefixes[$prefix], $dir);
    }

    public function register()
    {
        spl_autoload_register(array($this, 'autoload'));
    }

    public function autoload($class)
    {
        $prefix = $class;
        while (false !== $pos = strrpos($prefix, '\\')) {
            $prefix = substr($class, 0, $pos + 1);
            $relative_class = substr($class, $pos + 1);
            if (isset($this->prefixes[$prefix]) !== false) {
                foreach ($this->prefixes[$prefix] as $dir) {
                    $file = $dir . str_replace('\\', '/', $relative_class) . '.php';
                    require_once $file;
                }
            }
            $prefix = rtrim($prefix, '\\');
        }
    }
}

$autoloader = new Autoloader();
$autoloader->addNamespace('Hillel','src');
$autoloader->register();