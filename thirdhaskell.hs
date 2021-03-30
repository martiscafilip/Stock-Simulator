-----------------------------------1.2-------

data MobileDevice = Smartphone Int String Culori
                  | Laptop Int String Culori
                  | Tablet Int String Culori
                  deriving (Show)

-----------------------------------1.3-------
data Culori = Green
            | Blue
            | Red 
            | Yellow
            deriving (Show)

data MobileDevice' = Smartphone'
                   | Laptop'
                   | Tablet' 
                   deriving (Show)

descriere :: MobileDevice' -> String
descriere Laptop' = "Acesta este un laptop de culoare roz."
descriere Tablet' = "Aceasta este o tableta mov."
descriere Smartphone' = "Acesta este un telefon mobil."

color :: MobileDevice -> Culori
color (Laptop x y z) = z
color (Smartphone x y z) = z
color (Tablet x y z) = z

-----------------------------------2.1-------

data Arb = Frunza Integer | Nod Integer Arb Arb deriving (Show, Eq)

-----------------------------------2.2-------

maxim :: Arb  -> Integer  
maxim (Frunza f)  = f
maxim (Nod x y z)  =  max x (max (maxim y) (maxim z))   

minim :: Arb  -> Integer  
minim (Frunza f)  = f
minim (Nod x y z)  =  min x (min (minim y) (minim z))


isBST :: Arb -> Bool
isBST (Frunza f) = True
isBST (Nod x y z)| x < maxim z && x > minim y = isBST y && isBST z 
                 | otherwise = False

-----------------------------------2.3-------

search :: Arb -> Integer -> Bool
search (Frunza f) x | f==x = True 
                    | f/=x = False 
search (Nod x y z) i | x==i = True 
                     | otherwise = search y i || search z i


-----------------------------------2.5-------

maxim' :: Arb  -> Integer  
maxim' (Frunza f)  = f
maxim' (Nod x y z)  =  max x (max (maxim' y) (maxim' z))   

minim' :: Arb  -> Integer  
minim' (Frunza f)  = f
minim' (Nod x y z)  =  min x (min (minim' y) (minim' z))

-----------------------------------4.1-------

data Nat = Zero | Succ Nat deriving (Show, Eq)

add :: Nat -> Nat -> Nat
add Zero y = y
add (Succ x) y = Succ (add x y)

mult :: Nat -> Nat -> Nat
mult Zero y = Zero
mult (Succ x) y =  add y (mult x y)


exp' :: Nat -> Nat -> Nat
exp' Zero y = Succ Zero 
exp' (Succ x) y = mult y (exp' x y) 


comp :: Nat -> Nat -> Bool -- comp x y inseamna "x < y"
comp Zero Zero = False 
comp Zero y = True 
comp x Zero = False 
comp (Succ x)(Succ y)= comp x y 

dif :: Nat -> Nat -> Nat
dif Zero Zero = Zero
dif Zero y = y 
dif x Zero = x 
dif (Succ x)(Succ y)= dif x y

impartire :: Nat -> Nat -> Nat
impartire Zero y = Zero 
impartire  x y = add ( Succ(Zero)) (impartire (dif x y)y)


rest :: Nat -> Nat -> Nat
rest Zero y = Zero 
rest x y | comp x y = x
rest  x y = rest (dif x y) y

convert :: Nat -> Int
convert Zero = 0
convert (Succ x) = 1 + convert x


convert' :: Int -> Nat
convert' 0 = Zero 
convert' x = add (Succ (Zero)) (convert' (x-1))

-----------------------------------5.1-------

data ErrorNat = Error | Val Nat deriving (Show)

dif' :: Nat -> Nat -> ErrorNat
dif' Zero Zero = Val Zero
dif' Zero y = Error 
dif' x Zero = Val x 
dif' (Succ x)(Succ y)=dif' x y

-----------------------------------6.1-------

data List = Vida | Start Int List deriving (Show, Eq)

-----------------------------------6.2-------

search' :: List -> Int -> Bool 
search' Vida z = False 
search' (Start x y) i | x==i = True 
                    |otherwise = search' y i


-----------------------------------6.3-------

add'' :: List -> Int -> List
add'' Vida i = Start i Vida
add'' (Start x y) i = Start x (add'' y i)




{-

//////////////////////////////1.2///////////

*Main> True
True
*Main> Laptop

<interactive>:3:1: error:
    * No instance for (Show MobileDevice) arising from a use of `print'
    * In a stmt of an interactive GHCi command: print it
*Main> Laptop
Laptop
*Main> :t (Tablet 12)
(Tablet 12) :: MobileDevice
*Main> :t (Tablet 15)
(Tablet 15) :: MobileDevice
*Main> :t (Tablet 15 "Asus")
(Tablet 15 "Asus") :: MobileDevice
*Main> :t (Tablet 15 "Apple")
(Tablet 15 "Apple") :: MobileDevice

//////////////////////////////1.3///////////

*Main> :t (Tablet 15 "Apple" Green)  
(Tablet 15 "Apple" Green) :: MobileDevice
*Main> :t (Laptop 15 "Apple" Green)
(Laptop 15 "Apple" Green) :: MobileDevice
*Main> :t (Smartphone 15 "Apple" Green)
(Smartphone 15 "Apple" Green) :: MobileDevice

*Main> descriere Laptop'
"Acesta este un laptop de culoare roz."

*Main> color (Laptop 15 "Asus" Green)
Green
*Main> color (Tablet 5 "Asus" Yellow) 
Yellow
//////////////////////////////2.2///////////

*Main> isBST (Nod 4 (Nod 3 (Frunza 2) (Frunza 5))(Frunza 6))  
True
*Main> isBST (Nod 4 (Nod 3 (Frunza 2) (Frunza 2))(Frunza 6))
False

//////////////////////////////2.3///////////

*Main> search (Nod 3 (Frunza 2) (Frunza 4)) 4
True
*Main> search (Nod 3 (Frunza 2) (Frunza 4)) 5
False

//////////////////////////////2.5///////////

*Main> maxim' (Nod 4 (Nod 3 (Frunza 2) (Frunza 5))(Frunza 6))
6
*Main> minim' (Nod 4 (Nod 3 (Frunza 2) (Frunza 5))(Frunza 6))
2

//////////////////////////////4.1///////////

*Main> add (Succ (Succ Zero))(Succ(Zero))                 
Succ (Succ (Succ Zero))
*Main> add (Succ (Succ Zero))(Succ(Succ(Zero))) 
Succ (Succ (Succ (Succ Zero)))

*Main> mult (Succ (Succ( Zero)))(Succ(Zero)) 
Succ (Succ Zero)
*Main> mult (Succ (Succ( Zero)))(Succ(Succ(Succ(Zero)))) 
Succ (Succ (Succ (Succ (Succ (Succ Zero)))))
*Main> mult (Succ (Succ( Zero)))(Succ(Succ(Zero)))       
Succ (Succ (Succ (Succ Zero)))


*Main> exp' (Succ (Zero)) (Succ(Succ(Succ (Zero))))      
Succ (Succ (Succ Zero))
*Main> exp' (Succ (Zero)) (Succ(Succ(Succ(Succ (Zero)))))
Succ (Succ (Succ (Succ Zero)))
*Main> exp' (Succ(Succ (Zero))) (Succ(Succ(Succ(Succ (Zero)))))
Succ (Succ (Succ (Succ (Succ (Succ (Succ (Succ (Succ (Succ (Succ (Succ (Succ (Succ (Succ (Succ Zero)))))))))))))))

*Main> comp (Succ(Succ(Succ (Zero)))) (Succ(Zero))
False
*Main> comp (Succ(Succ(Succ (Zero)))) (Succ(Succ(Succ(Succ(Zero)))))
True

*Main> dif (Succ(Succ(Succ (Zero)))) (Succ(Succ((Zero))))
Succ Zero
*Main> dif (Succ(Succ(Succ (Zero)))) (Succ(Zero))        
Succ (Succ Zero)

*Main> impartire (Succ(Succ(Succ(Succ(Succ(Succ(Zero))))))) (Succ(Succ(Zero)))
Succ (Succ (Succ Zero))
*Main> impartire (Succ(Succ(Succ(Succ(Zero))))) (Succ(Succ(Zero)))            
Succ (Succ Zero)

*Main> rest (Succ(Succ(Succ(Succ(Zero))))) (Succ(Succ(Zero)))      
Zero
*Main> rest (Succ(Succ(Succ(Zero)))) (Succ(Succ(Zero)))      
Succ Zero

*Main> convert (Succ(Succ(Succ(Succ(Zero)))))                
4
*Main> convert (Succ(Succ(Succ(Zero))))      
3

*Main> convert' 4
Succ (Succ (Succ (Succ Zero)))
*Main> convert' 7
Succ (Succ (Succ (Succ (Succ (Succ (Succ Zero))))))


//////////////////////////////5.1///////////

*Main> dif' (Succ(Succ(Succ(Zero)))) (Succ(Succ(Zero))) 
Val (Succ Zero)
*Main> dif' (Succ(Succ(Succ(Zero)))) (Succ(Succ(Succ(Succ(Zero)))))
Error

//////////////////////////////6.1///////////

*Main> Start 5(Start 9(Vida))             
Start 5 (Start 9 Vida)

//////////////////////////////6.2///////////
*Main> search' (Start 5(Start 9(Vida))) 9
True
*Main> search' (Start 5(Start 9(Vida))) 19
False

//////////////////////////////6.3///////////

*Main> add'' (Start 5(Start 9(Vida))) 9
Start 5 (Start 9 (Start 9 Vida))
*Main> add'' (Start 5(Start 9(Vida))) 10
Start 5 (Start 9 (Start 10 Vida))
-}