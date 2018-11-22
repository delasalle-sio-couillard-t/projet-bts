<?php
class LigneCommande
{
    public static $tableau_LigneCommande = array();
  
    public $id;
    public $idProduit;
    public $idCommande;
    public $quantite;
  	
	public function __construct($id,$idProduit,$idCommande,$quantite)
    {
      $this->id = $id;
      $this->idProduit = $idProduit;
      $this->idCommande = $idCommande;
      $this->quantite = $quantite;
    }
}

class LigneCommandeService
{
    public static $tableau_LigneCommande = array();
    
    public static function ajouterLigneCommande(LigneCommande $uneLigneCommande)
    {
        if(!isset(self::$tableau_LigneCommande[$uneLigneCommande->id]))
        { 
            self::$tableau_LigneCommande[$uneLigneCommande->id] = $uneLigneCommande;
        }
    }
    
    public static function creerLigneCommande($pId, $pNom,$pPrixPetite,$pPrixGrande,$pBase,$pIngredients)
    {
        $ligneCommande = new LigneCommande($id, $idProduit,$idCommande,$quantite);
        self::ajouterLigneCommande($ligneCommande);
    }
} 
?>