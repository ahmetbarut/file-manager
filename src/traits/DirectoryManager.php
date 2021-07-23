<?php

namespace ahmetbarut\traits;

class DirectoryManager extends FileManager
{
    /** 
     * Belirtilen dizini açar 
     * @param string $path
     * @return array
     */
    public function directoryOpen(string $path): array
    {
        $pathInfo =  $this->path($path);
        $directory = [];
        $open = opendir($path);
        while (($file = readdir($open)) !== false) {
            array_push($directory, [
                'path' => $pathInfo['dirname'],
                'basename' => '/'. $pathInfo['basename'],
                'name' => $file,
                'is_dir' => ''
            ]);
        }
        closedir($open);

        return $directory;
    }


    public function path($path): array
    {
        return pathinfo($path);
    }
}
