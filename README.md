# Özet
Basit kullanımı amaçlayarak yazdım, kullanımı da oldukça kolay.

# Kurulum
```shell
    composer require ahmetbarut/file-manager
```

# Basit Kullanım

```php
    <?php
    require "vendor/autoload.php";

    $f = new \ahmetbarut\core\Manager;

    $f->readFile('./index.php');
```

| Method | Açıklama| Parametreler|
| :----  | :----:  | -----:     |
|readFile|Belirtilen dosyayı okur| $filename|
|formatSizeUnits|Dosya boyutunu döndürür|$filename|
|property|Dosya/dizin özelliklerini döndürür| $filename |
|diskSpace|Disk alanını döndürür| $path |
|directoryOpen|Dizin içeriğini döndürür|$path |
|readFile|Dosyayı okur ve içeriğini döndürür|$filename |
|deleteFile|Dosya siler| $filename |
|createFile|Dosya oluşturur| $filename, $content = ''|
|updateFile|Dosyayı günceller| $filename, $content |
