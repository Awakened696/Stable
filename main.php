<?php

//Класс животных
abstract class Animal{
    //Статическая переменая для хранения ключа
    static $id = 1;
    //Номер животного
    public $idAnimal=0;
    //Сколько дает
    public abstract function getProduct();

    public function getNameOfClass()
    {
        return static::class;
    }
}

//Класс курица
class Chicken extends Animal{
    //Коснтруктор класса, задаем уникальный номер
    function __construct() {
        $this->idAnimal=parent::$id++;
    }
    public function getProduct(){
        return rand(0,1);
    }
}

//Класс корова
class Cow extends Animal{
    //Коснтруктор класса, задаем уникальный номер
    function __construct() {
        $this->idAnimal=parent::$id++;
    }
    public function getProduct(){
        return rand(8, 12);
    }
}

//Хлев животных
class Stable
{
    //Добавляем курицу в хлев
    public function createСhicken(): chicken
    {
        return new chicken;
    }
    //Добавляем корову в хлев
    public function createCow(): cow
    {
        return new cow;
    }
}

$factory=new Stable();
//Массив со всеми животными
$a = array();

//Добавляем 10 коров в хлев
for($i=1;$i<=10;$i++){
    $a[]=$factory->createCow();
}

//Добавляем 20 кур в хлев
for($i=1;$i<=20;$i++){
    $a[]=$factory->createСhicken();
}

//Корзина с молоком и яйцами пустая
$milk=0;

$egg=0;

//Обходим и собираем продукцию
foreach ($a as $value){

    switch ($value->getNameOfClass()) {
        case "Cow":
            $milk +=$value->getProduct();
            break;
        case "Chicken":
            $egg +=$value->getProduct();
            break;
    }
}

echo "Собрано молока: ".$milk."<br>";

echo "Собрано яиц: ".$egg;