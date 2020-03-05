<?php

namespace App;



class Cart
{
    
   public $items = null;
   public $totalQty=null;
   public $totalPrice=null;
   public $totalDisPre=null;
   

    


    
  public function __construct($oldCart){

     if($oldCart){
     	$this->items=$oldCart->items;
     	$this->totalQty=$oldCart->totalQty;
     	$this->totalPrice=$oldCart->totalPrice;
      $this->totalDisPre=$oldCart->totalDisPre;
      
     }
    

  }

  public function add($item,$id){

    $storedItems=['qty'=>0,'price'=>$item->price, 'dispre'=>$item->prem_dis,'disgold'=>$item->gold_dis, 'item'=>$item];
    
    if($this->items){
         if(array_key_exists($id, $this->items)){

             $storedItems=$this->items[$id];
              //$this->totalDisPre+=$item->prem_dis;
         }


    }

    $storedItems['qty']++;
    $storedItems['price']=$item->price * $storedItems['qty'];
    $storedItems['dispre']=($item->price-(($item->prem_dis*$item->price)/100))*$storedItems['qty'];
    //$storedItems['dispre']=$item->prem_dis * $storedItems['qty'];
    //$storedItems['dispre']+=$storedItems['dispre'];
   // $storedItems['disgold']=$item->gold_dis * $storedItems['qty'];


    $this->items[$id]=$storedItems;

    $this->totalQty++;
    $this->totalPrice+=$item->price;
    $this->totalDisPre+=$item->price-(($item->prem_dis*$item->price)/100);
    

  }



     public function rem($id) {

       if(!$this->items || !isset($this->items[$id])) {
            return false;  // maybe throw an exception here?
        }

        // keep those totals in sync...... 
        // todo: instead of having this info in variables and keeping them in sync with the real data of $this->items, create a method to calculate the totals when needed.
        $this->totalQty -= $this->items[$id]['qty'];
       // $this->shippingCost = ($this->totalQty * 1) + 1;
       $this->totalPrice -=  $this->items[$id]['price'] ;
       $this->totalDisPre -=  $this->items[$id]['dispre'] ;
       //$this->totalDisGold -=  $this->items[$id]['disgold'] ;
        //$this->subTotal = $this->totalPrice + $this->shippingCost;

        // and remove the item
        unset($this->items[$id]);
    }


}
