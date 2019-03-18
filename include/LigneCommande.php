<?php
class LigneCommande
{
    public static $tableau_LigneCommande = array();
  
    public $id;
    public $idProduit;
    public $idCommande;
    public $quantite;
  	
	public function LigneCommande($id,$idProduit,$idCommande,$quantite)
    {
      $this->id = $id;
      $this->idProduit = $idProduit;
      $this->idCommande = $idCommande;
      $this->quantite = $quantite;
    }
	
	public static function ajouterLigneCommande(LigneCommande $uneLigneCommande)
    {
        if(!isset(self::$tableau_LigneCommande[$uneLigneCommande->id]))
        { 
            self::$tableau_LigneCommande[$uneLigneCommande->id] = $uneLigneCommande;
        }
    }
	
	 public static function creerLigneCommande($id,$idProduit,$idCommande,$quantite)
    {
        $ligneCommande = new LigneCommande($id, $idProduit,$idCommande,$quantite);
        self::ajouterLigneCommande($ligneCommande);
    }
	
}
//cache deprecated error 
error_reporting(E_ALL ^ E_DEPRECATED);
?>