<?php
    
    class Veicolo {

        protected $ruote;
        protected $nome;
        protected $brandGomme;
        protected $prezzo;
        protected $status;#visibile, nascosto

        public function __construct($nome, $ruote)
        {
            $this->ruote = $ruote;
            $this->nome = $nome;
    
        }

        public function quanteRuoteHo(){
            var_dump("Ho " . $this->ruote . "ruote");
        }

        public function getNome(){
            return $this->nome;
        }
        public function getPrezzo(){
            return $this->prezzo;
        }
        public function getBrandGomme(){
            return $this->brandGomme;
        }

        public function setBrandGomme($nomeBrand){
            $this->brandGomme = $nomeBrand;
        }

        public function setPrezzo($prezzo){
            if(!is_numeric($prezzo)){
                throw new Exception('Accettiamo solo numeri');
            }
            $this->prezzo = $prezzo;
        }

    }

    class Moto extends Veicolo {
        
         public function __construct($nome)
        {
            $this->ruote = 2;
            $this->nome = $nome;
        }

    }

     class Auto extends Veicolo {
        
         public function __construct($nome)
        {
            $this->ruote = 4;
            $this->nome = $nome;
        }

    }

//ufficio inserisce
$motoDucati = new Moto("Ducati");
$motoGuzzi = new Moto("Guzzi");
$motoHonda = new Moto("Honda");

//prezzi
$motoDucati->setPrezzo(23);
$motoGuzzi->setPrezzo(29);
$motoHonda->setPrezzo(32);


class Catalogo {
    protected $products;
    protected $typology;


    public function __construct($typology){
        $this->typology = $typology;
        $this->products = [];
    }

    public function aggiungiAuto($nome, $prezzo){
        $nuovaMoto = new Auto($nome);
        $nuovaMoto->setPrezzo($prezzo);
        $this->products[] = $nuovaMoto;
    }

     public function aggiungiMoto($nome, $prezzo){
        $nuovaMoto = new Moto($nome);
        $nuovaMoto->setPrezzo($prezzo);
        $this->products[] = $nuovaMoto;
    }
    
    public function dammiCatalogo(){
        return $this->products;
    }

}

$catalogo2021 = new Catalogo("Auto");

$catalogo2021->aggiungiAuto("Nissan", 3000);
$catalogo2021->aggiungiAuto("Opel", 3000);
$catalogo2021->aggiungiMoto("Yamaha", 5000);

#var_dump($catalogo2021->dammiCatalogo());

?>

<html>
<head>

</head>
<body>
    <h1>Benvenuto al negozio</h1>
    <p> I nostri prodotti</p>
    <ul>
    <?php 
    $prodotti = $catalogo2021->dammiCatalogo();
    foreach($prodotti as $product){ ?>

        <li>
            <?php echo("Nome: {$product->getNome()}, prezzo: {$product->getPrezzo()} ") ?>
        </li>
    <?php }?>
    </ul>
</body>

</html>