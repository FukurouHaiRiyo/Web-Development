<?php
    class Animal{

        const TEST = "test";

        function test(){
            echo self::TEST;
        }

        public $nume;
        protected $nr_picioare;
        protected $rasa;

        function __construct($nume, $nr_picioare){
            $this->nume = $nume;
            $this->nr_picioare = $nr_picioare;
        }

        function __destruct(){
            echo "Obiectul " + $this->nume + " a fost distrus";
        }

        public function getNume(){
            return $this -> nume;
        }
        function getPicioare(){
            return $this -> picioare;
        }



        function setNume($nume){
            $this -> nume = $nume;
        }
        function setPicioare($picioare){
            $this -> picioare = $picioare;
        }
    }

    class AnimalX extends Animal{
        protected $culoare;

        function __construct($nume, $nr_picioare, $rasa, $culoare){
            $this->nume = $nume;
            $this->picioare = $nr_picioare;
            $this->rasa = $rasa;
            $this -> culoare = $culoare;
        }
    }

    // $animal1 = new Animal('Pisica', 4);
    // $animal1 -> setNume("Pisica");
    // print_r($animal1);
    // echo $animal1->getNume();
    // $animal1->nume = "Lup";
    // $animal1->rasa = "Caine";
    // echo $animal1->getNume();

    $animalx = new AnimalX("Pisica", 4, "Birmaneza", "Neagra");
    echo $animalx->getPicioare();
    echo $a -> test();
?>
