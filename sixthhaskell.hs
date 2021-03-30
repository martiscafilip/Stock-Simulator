----------------------------------1-------------------------------------------------------

minim ::  Ord a =>[a] -> a
minim (x:xs) = head (sortare (x:xs))

sortare :: Ord a => [a] -> [a]
sortare [] = []
sortare (x:xs) = sortare (filter (<=x) xs) ++ [x] ++ sortare (filter (>x) xs)  

fib :: Int -> Int
fib 0 = 0
fib 1 = 1
fib x = fib (x - 1) + fib (x - 2)
{-
*Main> minim [5,2,4,6]  
2
-}


----------------------------------2-------------------------------------------------------

{-
*Main> sortare [fib 10, fib 15, fib 5, fib 2, fib 26]
[1,5,55,610,121393]
(0.52 secs, 64,846,232 bytes)
*Main> sortare [fib 2, fib 5, fib 15, fib 16, fib 26]
[1,5,610,987,121393]
(0.45 secs, 65,341,600 bytes)
*Main> sortare [fib 26, fib 16, fib 15, fib 5, fib 2]
[1,5,610,987,121393]
(0.37 secs, 65,342,160 bytes)

*Main> minim [fib 10, fib 15, fib 5, fib 2, fib 26]  
1
(0.37 secs, 64,831,624 bytes)
*Main> minim [fib 2, fib 5, fib 15, fib 16, fib 26]
1
(0.33 secs, 65,325,440 bytes)
*Main> minim [fib 26, fib 16, fib 15, fib 5, fib 2] 
1
(0.34 secs, 65,327,280 bytes)
-}

----------------------------------3-------------------------------------------------------

fibb :: Int -> Int -> [Int]
fibb i j = i : (fibb j (i+j))

fibolist :: [Int]
fibolist = fibb 0 1

{-
*Main> fibolist !! 4
3
(0.00 secs, 49,944 bytes)
*Main> fibolist !! 5
5
(0.00 secs, 49,944 bytes)
*Main> fibolist !! 6
8
(0.00 secs, 49,944 bytes)
*Main> fibolist !! 7
13
(0.00 secs, 50,632 bytes)
*Main> fibolist
[0,1,1,2,3,5,8,13,21,34,55,89,144,233,377,610,987,1597,2584,4181,6765,10946,17711,Interrupted.
-}


----------------------------------4-------------------------------------------------------

prime :: Int -> Int  -> Bool 
prime x 0 = True 
prime x 1 = True 
prime x y = if x `rem` y == 0 then False else prime x (y-1)

primee :: Int -> [Bool]
primee i  = prime i (i-1) : (primee (i+1))

primelist :: [Bool]
primelist = primee 0 

{-
*Main> primelist !! 1
True
(0.00 secs, 52,432 bytes)
*Main> primelist !! 2
True
(0.00 secs, 52,128 bytes)
*Main> primelist !! 3
True
(0.00 secs, 52,424 bytes)
*Main> primelist !! 4
False
(0.00 secs, 53,216 bytes)
*Main> primelist !! 12
False
(0.00 secs, 55,632 bytes)
*Main>
*Main> primelist !! 13
True
(0.00 secs, 55,384 bytes)
*Main> primelist
[False,True,True,True,False,True,False,True,False,False,False,True,False,Interrupted.
-}


----------------------------------5-------------------------------------------------------


primee2 :: Int -> [Int]
primee2 i  = if prime i (i-1) == True then i:(primee2 (i+1)) else (primee2 (i+1))

primelist2 :: [Int]
primelist2 = primee2 0 

{-
*Main> primelist2 !! 1
2
(0.00 secs, 51,240 bytes)
*Main> primelist2 !! 2
3
(0.00 secs, 50,600 bytes)
*Main> primelist2 !! 3
5
(0.00 secs, 51,928 bytes)
*Main> primelist2 !! 4
7
(0.00 secs, 52,816 bytes)
*Main> primelist2 !! 5
11
(0.01 secs, 58,528 bytes)
*Main> primelist2     
[1,2,3,5,7,11,13,17,19,23,29,31,37,41,43,47,53,59,61,67,71,73,79,83,Interrupted.
-}

----------------------------------6-------------------------------------------------------

data Lista a = Vida | Cons a (Lista a) deriving (Eq, Show)

append :: Lista a -> Lista a -> Lista a 
append Vida l = l
append (Cons x xs) l = (Cons x(append xs l))

filter' :: (a -> Bool) -> Lista a -> Lista a
filter' f Vida = Vida 
filter' f (Cons x y) = if f x then Cons x (filter' f y) else filter' f y

sortare3 :: Ord a => Lista a -> Lista a 
sortare3 Vida = Vida
sortare3 (Cons x y) = append (append (sortare3 (filter' (<=x) y)) (Cons x Vida) ) (sortare3 (filter' (>x) y))    

head' :: Lista a -> a
head' (Cons x y) = x 

minimm :: Ord a => Lista a ->  a
minimm x = head' (sortare3 x) 



-- fibb :: Int -> Int -> [Int]
-- fibb i j = i : (fibb j (i+j))

-- fibolist :: [Int]
-- fibolist = fibb 0 1

fibo :: Num a => Lista a -> a  -> Lista a
fibo l i = append (fibo (Cons i Vida) (i+1)) l

fibolist2 :: Num a => Lista a 
fibolist2 = fibo Vida 1

{-
*Main> sortare3 (Cons 21(Cons 3(Cons 16(Vida))))
Cons 3 (Cons 16 (Cons 21 Vida))
(0.01 secs, 80,320 bytes)
*Main> sortare3 (Cons 21(Cons 3(Cons 16(Cons 1(Vida)))))
Cons 1 (Cons 3 (Cons 16 (Cons 21 Vida)))
(0.01 secs, 90,320 bytes)
*Main> minimm (Cons 21(Cons 3(Cons 16(Cons 1(Vida)))))  
1
(0.01 secs, 54,064 bytes)
*Main> minimm (Cons 21(Cons 3(Cons 16(Cons 6(Vida)))))
3
(0.01 secs, 52,800 bytes)
-}