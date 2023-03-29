<?php
class Ab{
    private $host ="localhost";
    private $felhasznalonev ="root";
    private $jelszo ="";
    private $abNev ="magyar_kartya";
    private $kapcsolat;
    function __construct()
    {
        $this->kapcsolat= new mysqli(
            $this->host,
            $this->felhasznalonev,
            $this->jelszo,
            $this->abNev);
        if($this->kapcsolat->connect_errno){
            $szoveg = "<p>Sikertelen kapcsolódás!</p>";
        }else{ 
            $szoveg ="<p>Sikeres kapcsolódás!</p>";
        }
        echo $szoveg;
        $this->kapcsolat->query("SET NAMES UTF8");
        $this->kapcsolat->query("set character set UTF8");
    }
    function adatleker($oszlop,$tabla){
        $sql = "SELECT $oszlop ,FROM $tabla";
        $phpTomb = $this->kapcsolat->query($sql);
        while($sor = $phpTomb->fetch_row()){
            echo "<img src = \"forras/$sor[0]\" alt=\"kártya képe\">";
            echo "<br>";
        }
    }

    function adatleker2($oszlop1,$oszlop2,$tabla){
        $sql = "SELECT $oszlop1, $oszlop2 FROM $tabla";
        $phpTomb = $this->kapcsolat->query($sql);
        echo "<table>";
        echo "<tr>";
        echo "<th>Név</th>";
        echo "<th>Kép</th>";
        echo "</tr>";

        while($sor = $phpTomb->fetch_assoc()){
            echo "<tr>";
            echo "<th>$sor[$oszlop1]</td>";
            echo "<td> <img src = \"forras/$sor[$oszlop2]\" alt=\"kártya képe\"> </td>";
            echo "</tr>";
        }

        echo "</table>";
    }

    function kapcsolatBezar(){
        $this->kapcsolat->close();
    }
}
?>