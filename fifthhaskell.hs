
-----------------------------------1-------

data Nat = Zero | Double Nat | DoubleAddOne Nat

{-
3 = DoubleAddOne (DoubleAddOne Zero)

0 = Zero = Double Zero

7 = DoubleAddOne 3 = DoubleAddOne (DoubleAddOne 1) = DoubleAddOne (DoubleAddOne (DoubleAddOne Zero))
8 = Double (Double (Double (DoubleAddOne Zero)))
-}


-----------------------------------2-------

instance Eq Nat where
    (==)  Zero Zero = True 
    (==)  (Double _) Zero = False 
    (==)   Zero (Double _) = False
    (==)  (DoubleAddOne _) Zero = False 
    (==)   Zero (DoubleAddOne _) = False
    (==)  (Double x) (Double y) = (==) x y 
    (==)   (DoubleAddOne x) (DoubleAddOne y) = (==) x y 
    (==)  (Double x) (DoubleAddOne y) = False
    (==)   (DoubleAddOne x)(Double y) = False 

instance Ord Nat where 
    (<=) Zero Zero = True 
    (<=) Zero (DoubleAddOne _) = True 
    (<=) Zero (Double _) = True 
    (<=) (DoubleAddOne _) Zero  = False  
    (<=) (Double _) Zero  = False  
    (<=) (Double x) (Double y) =  (<=) x y 
    (<=) (DoubleAddOne x) (DoubleAddOne y) = (<=) x y 
    (<=) (Double x) (DoubleAddOne y) | ((==) x y) == True = True
    (<=) (DoubleAddOne x)(Double y) | ((==) x y) == True = False 

