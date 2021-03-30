-----------------------------------1-------

and' :: Bool -> Bool -> Bool
and' False _ = False
and' _ False = False
and' _ _ = True

or' :: Bool -> Bool -> Bool
or' True _ = True 
or' _ True = True 
or' _ _ = False 

negate' :: Bool -> Bool 
negate' True = False 
negate' _ = True 

nand' :: Bool -> Bool -> Bool
nand' _ False = True 
nand' False _ = True 
nand' _ _ = False 

nor' :: Bool -> Bool -> Bool
nor' _ True = False 
nor' True _ = False 
nor' _ _ = True 

implication :: Bool -> Bool -> Bool 
implication True False = False 
implication _ _ = True 

dimplication :: Bool -> Bool -> Bool 
dimplication True False = False 
dimplication False True = False 
dimplication _ _ = True 

-----------------------------------2-------

hasDivisors :: Integer -> Integer -> Integer -> Bool
hasDivisors n a b | a > b          = False
hasDivisors n a b | n `mod` a == 0 = True 
hasDivisors n a b                  = hasDivisors n (a+1) b    

isPrime :: Integer -> Bool
isPrime n = not (hasDivisors n 2 (n-1))

-----------------------------------3-------

cmmdc :: Integer -> Integer -> Integer
cmmdc x y | x == 0 = y
          | y == 0 = x    
          | x > y = cmmdc(x-y) y
          | otherwise = cmmdc x (y-x)
     
cmmdc' :: Integer -> Integer -> Integer
cmmdc' x y | y == 0   = x
           | otherwise = cmmdc' y (x `mod` y)

cmmdc'' :: Integer -> Integer -> Integer
cmmdc'' x y | x == y = x
            | x == 0 = y 
            | y == 0 = x
            | even x && odd y = cmmdc'' (x `div` 2) y  
            | even x && even y = 2 * cmmdc'' (x `div` 2) (y `div` 2)
            | odd x && even y = cmmdc'' x (y `div` 2)
            | odd x && (x > y) = cmmdc'' ((x-y) `div` 2)  y
            | otherwise  = cmmdc'' ((y-x) `div` 2) x 

-----------------------------------4-------

--Da, folosirea unui acumulator.

-----------------------------------5-------

fibo :: Integer -> Integer 
fibo 0 = 0
fibo 1 = 1
fibo x = fibo (x-1) + fibo (x-2)


fiboaux :: Integer -> Integer -> Integer -> Integer
fiboaux 0 a _ = a
fiboaux n a b = fiboaux (n-1) b (b+a)

-- a si b sunt doua numere Fibonacci consecutive

fibo'' :: Integer -> Integer
fibo'' n = fiboaux n 0 1

-----------------------------------6-------

eeuclid :: Integer -> Integer -> (Integer,Integer,Integer)
eeuclid 0 y = (y, 0, 1)
eeuclid x y =  let(d, xx, yy) = eeuclid(y `mod` x) x in (d, yy -(y `div` x) *xx, xx)

-----------------------------------7-------

succ' :: Integer -> Integer
succ' x = x + 1

-----------------------------------8-------

add' :: Integer -> Integer -> Integer 
add' x y | x == 0 = y
         | otherwise = add' (x-1) (succ y)

prod :: Integer -> Integer -> Integer 
prod x y | y == 1 = x
         | otherwise = add' x  (prod x (y-1))

rid :: Integer -> Integer -> Integer
rid x y | y == 1 = x
        | otherwise = prod x (rid x (y-1))
-----------------------------------9-------

div' :: Integer -> Integer -> Integer
div' x y | x < y = 0
         | otherwise  = add' 1 (div' (x-y) y)

mod' :: Integer -> Integer -> Integer
mod' x y | x < y = x
         | otherwise  = mod' (x-y) y
 
{-
//////////////////////////////1///////////
*Main> and' True False
False
*Main> or' True False
True
*Main> negate' True
False
*Main> nand' True False
True
*Main> nor' True False
False
*Main> implication True False
False
*Main> dimplication True False
False

//////////////////////////////2///////////

*Main> isPrime 13
True
*Main> isPrime 8
False

//////////////////////////////3///////////

*Main> cmmdc 12 9
3
*Main> cmmdc' 12 9
3
*Main> cmmdc'' 12 9
3

//////////////////////////////5///////////

*Main> fibo 4
3
*Main> fibo 5
5
*Main> fibo 6
8
*Main> fibo'' 4
3
*Main> fibo'' 5
5
*Main> fibo'' 6
8

//////////////////////////////6///////////

*Main> eeuclid 12 9
(3,1,-1)
*Main> eeuclid 35 15
(5,1,-2)

//////////////////////////////7///////////

*Main> succ' 6
7
*Main> succ' 7
8

//////////////////////////////8///////////

*Main> add' 5 6
11
*Main> add' 6 7 
13
*Main> prod 5 6 
30
*Main> prod 6 7 
42
*Main> rid 2 3 
8
*Main> rid 10 2
100

//////////////////////////////9///////////

*Main> div' 5 2
2
*Main> div' 8 2
4
*Main> mod' 5 2
1
*Main> mod' 8 2
0
-}
 