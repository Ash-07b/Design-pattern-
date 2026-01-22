<?php

// Implementor interface
interface DrawingAPI {
    public function drawCircle($x, $y, $radius);
    public function drawRectangle($x, $y, $width, $height);
}

// Concrete Implementor 1
class DrawingAPI1 implements DrawingAPI {
    public function drawCircle($x, $y, $radius) {
        echo "API1.circle at ($x,$y) radius $radius\n";
    }

    public function drawRectangle($x, $y, $width, $height) {
        echo "API1.rectangle at ($x,$y) width $width height $height\n";
    }
}

// Concrete Implementor 2
class DrawingAPI2 implements DrawingAPI {
    public function drawCircle($x, $y, $radius) {
        echo "API2.circle at ($x,$y) radius $radius\n";
    }

    public function drawRectangle($x, $y, $width, $height) {
        echo "API2.rectangle at ($x,$y) width $width height $height\n";
    }
}

// Abstraction
abstract class Shape {
    protected $drawingAPI;

    protected function __construct(DrawingAPI $drawingAPI) {
        $this->drawingAPI = $drawingAPI;
    }

    abstract public function draw();
    abstract public function resizeByPercentage($pct);
}

// Refined Abstraction: Circle
class Circle extends Shape {
    private $x, $y, $radius;

    public function __construct($x, $y, $radius, DrawingAPI $drawingAPI) {
        parent::__construct($drawingAPI);
        $this->x = $x;
        $this->y = $y;
        $this->radius = $radius;
    }

    public function draw() {
        $this->drawingAPI->drawCircle($this->x, $this->y, $this->radius);
    }

    public function resizeByPercentage($pct) {
        $this->radius *= $pct;
    }
}

// Refined Abstraction: Rectangle
class Rectangle extends Shape {
    private $x, $y, $width, $height;

    public function __construct($x, $y, $width, $height, DrawingAPI $drawingAPI) {
        parent::__construct($drawingAPI);
        $this->x = $x;
        $this->y = $y;
        $this->width = $width;
        $this->height = $height;
    }

    public function draw() {
        $this->drawingAPI->drawRectangle($this->x, $this->y, $this->width, $this->height);
    }

    public function resizeByPercentage($pct) {
        $this->width *= $pct;
        $this->height *= $pct;
    }
}

// Usage example
$api1 = new DrawingAPI1();
$api2 = new DrawingAPI2();

$circle1 = new Circle(1, 2, 3, $api1);
$circle2 = new Circle(5, 7, 11, $api2);

$rectangle1 = new Rectangle(10, 20, 30, 40, $api1);
$rectangle2 = new Rectangle(15, 25, 35, 45, $api2);

$shapes = [$circle1, $circle2, $rectangle1, $rectangle2];

foreach ($shapes as $shape) {
    $shape->draw();
}

?>
