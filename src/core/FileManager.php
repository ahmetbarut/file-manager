<?php

namespace ahmetbarut\core;

class FileManager
{
    /** 
     * Dosyayı düz metin olarak okur. 
     * Not: dosyaya herhangi bir stil işlemi uygulanmıyor. <pre> etiketini kullanmanız bunu düzeltebilir 
     * @return string
     */
    public function readFile($file): string
    {
        $openFile = fopen($file, 'r');
        $readFie = fread($openFile, filesize($file));
        fclose($openFile);
        return $readFie;
    }

    /** Belirtilen dosyayı kalıcı olarak siler.
     *  @return bool
     */
    public function deleteFile(string $file): bool
    {
        return unlink($file);
    }

    /** Belirtilen dizinde dosya oluşturur.
     *  @param string $file
     *  @param string $content
     *  @return
     */
    public function createFile(string $file, string $content = ''): string
    {
        if (file_exists($file)) {
            return false;
        }
        $st = fopen($file, 'w+');
        $write = fwrite($st, $content);
        fclose($st);
        return ($write === false) ? false : true;
    }

    /** Belirtilen dosyayı günceller.
     *  @param string $file
     *  @param string $content
     *  @return bool 
     */
    public function updateFile(string $file, string $content)
    {
        $st = fopen($file, 'w+');
        $write = fwrite($st, $content);
        fclose($st);
        return ($write === false) ? false : true;
    }
}
