<?php





abstract class Operations
{
    protected  $allData=[[]];
    public function Delete($id)
    {}
    // удаление
    public function Find($data){}
    public function Add($post)
    {

    } // создание новой записи
}

//1,2 группа - задание на сегодня по практике WEB(создать
//абстрактный класс по работе с
    //информацией(создание новой записи ,удаление,поиск)
//и 2 класса наследника 1 для записи в файл 2 для записи в базу).
//Применить оба класса по очереди(то есть сначала сделав задание с одним классом,
//затем с другим) для того чтобы сделать
//систему комментариев на странице(комментарий - это автор и его сообщение)