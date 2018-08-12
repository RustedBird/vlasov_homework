<?php

echo 'Lesson 11<br>';

interface IGetSquare
{
    function getArea();
}

class Figure
{
    const SIDES = 0;
    public $square;
    public $color;

    function infoAbout()
    {
        return 'Это геометрическая фигура!';
    }
}

class Rectangle extends Figure implements IGetSquare
{
    const SIDES = 4;
    private $a;
    private $b;

    function __construct($a, $b)
    {
        $this->a = $a;
        $this->b = $b;
    }

    function getArea()
    {
        return 'Его площадь равна: ' .$this->a * $this->b . '<br>';
    }

    final function infoAbout()
    {
        return 'Это класс прямоугольника. У него ' . self::SIDES . ' стороны <br>';
    }
}

class Triangle extends Figure implements IGetSquare
{
    const SIDES = 3;
    private $a;
    private $b;
    private $c;

    function __construct($a, $b, $c)
    {
        $this->a = $a;
        $this->b = $b;
        $this->c = $c;
    }

    function getArea()
    {
        $p = ($this->a + $this->b + $this->c) / 2;
        return 'Его площадь равна: ' .sqrt($p * ($p - $this->a) * ($p - $this->b) * ($p - $this->c)) . '<br>';
    }

    final function infoAbout()
    {
        return 'Это класс треугольника. У него ' . self::SIDES . ' стороны <br>';
    }

}

class Square extends Figure implements IGetSquare
{
    const SIDES = 4;
    private $a;

    function __construct($a)
    {
        $this->a = $a;
    }

    function getArea()
    {
        return 'Его площадь равна: ' .$this->a * $this->a . '<br>';
    }

    final function infoAbout()
    {
        return 'Это класс квадрата. У него ' . self::SIDES . ' стороны <br>';
    }
}

$figures[] = $rectangle1 = new Rectangle(2,5);
$figures[] = $rectangle2 = new Rectangle(300,150);

$figures[] = $triangle1 = new Triangle(200,150, 50);
$figures[] = $triangle2 = new Triangle(30,80, 100);

$figures[] = $square1 = new Square(20);
$figures[] = $square2 = new Square(80);


foreach ($figures as $figure)
{
    echo $figure->infoAbout();
    echo $figure->getArea();
}
