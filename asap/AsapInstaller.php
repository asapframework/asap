<?php

namespace Asap;


class AsapConfig
{
    /**
     * @var string
     */
    public $rootDir;
    public $asapDir;
    public $cacheDir;

    function __construct()
    {
        $this->asapDir = AsapUtils::joinPath(__DIR__);
        $this->rootDir = AsapUtils::joinPath($this->asapDir, '..');
        $this->cacheDir = AsapUtils::joinPath($this->rootDir, 'cache');
    }
}

class AsapUtils
{
    /**
     * @return string
     */
    public static function joinPath()
    {
        $paths = func_get_args();
        return join(DIRECTORY_SEPARATOR, $paths);
    }
}

class AsapInstaller
{
    /**
     * @var AsapConfig
     */
    public $config;

    function __construct()
    {
        $this->config = new \Asap\AsapConfig();
    }

    public function createCacheFolder()
    {
        if (!is_dir($this->config->cacheDir)) {
            mkdir($this->config->cacheDir, '0777');
        }
    }

    private function copyFileFromTemplate($filename, $templateFileName)
    {
        $pathToFile = AsapUtils::joinPath($this->config->rootDir, $filename);
        $pathToTemplateFile = AsapUtils::joinPath($this->config->asapDir, 'templates', $templateFileName);
        if (!is_file($pathToFile)) {
            copy($pathToTemplateFile, $pathToFile);
        }
    }

    public function createHtaccess()
    {
        $this->copyFileFromTemplate('.htaccess', 'htaccess.txt');
    }

    public function createIndex()
    {
        $this->copyFileFromTemplate('index.php', 'index.php.txt');
    }

    public function createConfig()
    {
        $this->copyFileFromTemplate('asap.json', 'asap.json.txt');
    }
}



// Create the asap.json

$installer = new AsapInstaller();
$installer->createCacheFolder();
$installer->createHtaccess();
$installer->createIndex();
$installer->createConfig();