-----------------------------------I-------


f :: (Int, Int) -> Int
f (x,y) = x + y

g :: Int -> Int -> Int
g x y = x + y


-----------------------------------1.1-------

addThree :: (Int, Int, Int) -> Int
addThree (x,y,z) = x + y + z


addThree' :: Int->(Int ->(Int->Int))
addThree' x y z = x + y + z 

-----------------------------------II-------


process :: (Int -> Int) -> Int -> Int
process f x = f x

process' :: (a -> a) -> a -> a
process' f x = f x

-----------------------------------2.1-------

functie ::  (Int -> Int) -> Int -> Int -> Int
functie f x y | x < y = f x + (functie f (x+1) y) 
              | otherwise = f x

-----------------------------------2.2-------

compunere :: (b->c)->(a->b)-> a -> c
compunere f g x = f(g x)

-----------------------------------2.3-------

compunere' :: [a -> a] -> a -> a 
compunere' [] = \y -> y 
compunere' (f : xs) = \y -> (compunere' xs) (f y)   

-----------------------------------2.4-------

sumlist :: [Integer] -> Integer 
sumlist [] = 0
sumlist (x: xs) =  x + sumlist xs

-----------------------------------2.5-------

fctlist :: (Integer-> Integer)-> [Integer]-> [Integer]
fctlist f [] = []
fctlist f (x:xs) =  f x : (fctlist f xs)

-----------------------------------2.6-------

fctBool :: (Integer -> Bool) -> [Integer]-> [Integer]
fctBool f [] = []
fctBool f (x: xs) = let xs' = fctBool f xs in 
                        if f x then x: xs'
                        else xs' 

-----------------------------------2.7-------

data List = Vida | Start Int List deriving (Show, Eq)


foldl' :: (List->List->List)->List->[List]->List     
foldl' f x [Vida] = x
foldl' f x (y:ys) = foldl' f (f x y) ys

foldr' :: (List->List->List)->List->[List]->List
foldr' f x [z]  = f z x  
foldr' f x (y:ys) = f y (foldr' f x ys)


-----------------------------------3.1-------

compare' :: Integer -> Integer -> Bool  
compare'  x  y = x > y  


sort' :: (a -> a -> Bool) -> [a] -> [a]
sort' _ [] = []
sort' f (x:xs) =
    let smaller = sort' f (filter (f x) xs)
        bigger  = sort' f (filter (not . f x) xs)
    in smaller ++ [x] ++ bigger

-----------------------------------3.2-------

data Name = Left' | Right' deriving Show

data Either' = Name Int String deriving (Show, Eq)


{-
//////////////////////////////1.1///////////

*Main> addThree' 5 6 7 
18
*Main> addThree' 1 2 2 
5

//////////////////////////////2.1///////////

*Main> functie ((+) 2) 1 3 
12
*Main> functie ((+) 2) 1 2 
7

//////////////////////////////2.2///////////

*Main> compunere ((+)2) ((*)2) 2
6
*Main> compunere ((+)2) ((*)2) 3
8

//////////////////////////////2.3///////////

*Main> compunere' [((+)2), ((*)2)] 2
8
*Main> compunere' [((+)2), ((*)2)] 3
10

//////////////////////////////2.4///////////

*Main> sumlist [1,2,3]
6
*Main> sumlist[1,1,1,1]
4

//////////////////////////////2.5///////////

*Main> fctlist ((*)2) [1,2,3,4]
[2,4,6,8]
*Main> fctlist ((*)2) [1,1,1,1]
[2,2,2,2]

//////////////////////////////2.6///////////

*Main> fctBool (\x -> x `mod` 2 == 0) [1,2,1,4,2,3,5,123,57]
[2,4,2]
*Main> fctBool (\x -> x `mod` 2 == 0) [1,2,1,4,2,3,5,123,572]
[2,4,2,572]

//////////////////////////////2.7///////////

*Main> foldl' (\x y -> y) (Start 5 (Vida)) [(Start 6 (Vida)),(Start 7 (Vida)),(Start 8 (Vida))]
Start 8 Vida
*Main> foldl (\x y -> y) (Start 5 (Vida)) [(Start 6 (Vida)),(Start 7 (Vida)),(Start 8 (Vida))] 
Start 8 Vida
*Main> foldl (\x y -> x) (Start 5 (Vida)) [(Start 6 (Vida)),(Start 7 (Vida)),(Start 8 (Vida))]
Start 5 Vida
*Main> foldl' (\x y -> x) (Start 5 (Vida)) [(Start 6 (Vida)),(Start 7 (Vida)),(Start 8 (Vida))]
Start 5 Vida

*Main> foldr' (\x y -> y) (Start 5 (Vida)) [(Start 6 (Vida)),(Start 7 (Vida)),(Start 8 (Vida))]
Start 5 Vida
*Main> foldr (\x y -> y) (Start 5 (Vida)) [(Start 6 (Vida)),(Start 7 (Vida)),(Start 8 (Vida))] 
Start 5 Vida
*Main> foldr (\x y -> x) (Start 5 (Vida)) [(Start 6 (Vida)),(Start 7 (Vida)),(Start 8 (Vida))]
Start 6 Vida
*Main> foldr' (\x y -> x) (Start 5 (Vida)) [(Start 6 (Vida)),(Start 7 (Vida)),(Start 8 (Vida))]
Start 6 Vida

//////////////////////////////3.1///////////

*Main> sort' compare' [5,1,2,3,24,42,3] 
[1,2,3,3,5,24,42]
*Main> sort' compare' [5,1,2,3,24,42,3,11,1,1,1,1,1,1]
[1,1,1,1,1,1,1,2,3,3,5,11,24,42]

//////////////////////////////3.2///////////

*Main> Left 1    
Left 1
*Main> Right "test"
Right "test"



-}