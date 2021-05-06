<?php

namespace ahmetbarut\core;

use ahmetbarut\traits\DirectoryManager;
use ahmetbarut\traits\FileManager;

class Manager extends DirectoryManager
{

    /** Dosya boyutunu döndürür.
     *  @param $bytes
     *  @source stackoverflow https://stackoverflow.com/questions/5501427/php-filesize-mb-kb-conversion
     */
    public function formatSizeUnits($bytes)
    {
        if ($bytes >= 1073741824) {
            $bytes = number_format($bytes / 1073741824, 2) . ' GB';
        } elseif ($bytes >= 1048576) {
            $bytes = number_format($bytes / 1048576, 2) . ' MB';
        } elseif ($bytes >= 1024) {
            $bytes = number_format($bytes / 1024, 2) . ' KB';
        } elseif ($bytes > 1) {
            $bytes = $bytes . ' bytes';
        } elseif ($bytes == 1) {
            $bytes = $bytes . ' byte';
        } else {
            $bytes = '0 bytes';
        }

        return $bytes;
    }

    /** Dosya bilgilerini döndürür
     *  @param string $file
     *  @return array
     */
    public function property(string $file): array
    {
        return [
            'size' => $this->formatSizeUnits(filesize($file)),
            'fileType' => filetype($file),
            'lastAccess' => fileatime($file),
            'lastChange' => date('d-F-Y H:i:s.', filectime($file)),
            'fileGroup' => filegroup($file),
            'fileOwner' => fileowner($file),
            'filePerms' => fileperms($file),
        ];
    }

    /** Disk alanını döndürür.
     *  @param string $dir
     *  @return array
     */
    public function diskSpace(string $dir)
    {
        return [
            'disk_free_space' => $this->formatSizeUnits(disk_free_space($dir)),
            'disk_total_space' => $this->formatSizeUnits(disk_total_space($dir)),
        ];
    }
}
