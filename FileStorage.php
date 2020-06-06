<?php


require ('Operations.php');


class FileStorage extends Operations
{
    private $file;
    private $name;
    public function __construct($file)
    {
        $this->file = fopen($file, "a");
        $this->name = $file;
    }

    public function Add($post)
    {
        $author = trim($post['author']);
        $data = trim($post['data']);
        if($author=='' || $data=='')
            return;
        fwrite($this->file, $author.'|'.$data.PHP_EOL);
    } // создание новой записи
    public function Delete($id)
    {
        $data = file_get_contents($this->name);
        $data = explode(PHP_EOL,$data);
        unset($data[$id]);
        $handle = fopen("file.txt","w+");
        $data = implode(PHP_EOL,$data);
        fwrite($handle,$data); // Записать переменную в файл
        fclose($handle);
    }
}