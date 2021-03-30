--------------------3.4----------------------------------------------------------

id x = x + x

sumThree :: Int -> Int -> Int -> Int
sumThree x y z = x + y + z

--------------------3.8----------------------------------------------------------

myMax :: Int -> Int -> Int
myMax x y = if x <= y then y else x

--------------------3.10---------------------------------------------------------

myMax2 :: Int -> Int -> Int -> Int 
myMax2 x y z = if y <= x && z <= x then x  else if y <=z then z else y

--------------------3.11---------------------------------------------------------

mySum :: Int -> Int
mySum x = if x <= 0 then 0 else x + mySum (x - 1)

--------------------3.12---------------------------------------------------------

fibo :: Int -> Int 
fibo 0 = 0
fibo 1 = 1
fibo x = fibo (x-1) + fibo (x-2)

--------------------3.13---------------------------------------------------------

cmmdc :: Int -> Int -> Int 
cmmdc x y = if x > y then cmmdc (x-y) y else if x<y then cmmdc (y-x) x else x

---------------------------------------------------------------------------------


{-
E:\Second C\VSCODE> ghci
GHCi, version 8.10.4: https://www.haskell.org/ghc/  :? for help

////////////////////2.1//////////////////////////////////////////////////////////

Prelude> 2
2
Prelude> 2+3
5        
Prelude> 2+3*5
17       
Prelude> (2+3)*5
25       
Prelude> 3/5
0.6      
Prelude>  45345345346536 * 54425523454534333
2467944156711854340070394620488
Prelude> 3/0
Infinity
Prelude> True
True
Prelude> False
False
Prelude>  True && False
False
Prelude> True || False
True
Prelude>  not True
False
Prelude> 2 <= 3
True
Prelude>  not (2 <= 3)
False
Prelude>  (2 <= 3) || True
True
Prelude>  "aaa" == "aba"
False
Prelude> "aba" == "aba"
True
Prelude> "aaa" ++ "aba"
"aaaaba"

////////////////////2.2//////////////////////////////////////////////////////////

Prelude> ((+) 2 3)
5
Prelude> ((+) 2 ((*)3 5))
17
Prelude> ((*)((+) 2 3) 5)
25
Prelude> (*) 45345345346536  54425523454534333
2467944156711854340070394620488
Prelude> (/) 3 0
Infinity
Prelude> (&&) True False
False
Prelude> (||) True False
True
Prelude> (<=) 2 3
True
Prelude>  not ((<=) 2 3)
False
Prelude> (||) ((<=) 2 3) True
True
Prelude> (==) "aaa" "aba"
False
Prelude> (==) "aba" "aba"
True
Prelude> (++) "aaa" "aba"
"aaaaba"

////////////////////2.3//////////////////////////////////////////////////////////

Prelude> :t True
True :: Bool
Prelude> :t False
False :: Bool
Prelude> :t True && False
True && False :: Bool
Prelude> :t True && (2<=4)
True && (2<=4) :: Bool

////////////////////2.4//////////////////////////////////////////////////////////

Prelude> :t "aaa"
"aaa" :: [Char]

////////////////////2.5//////////////////////////////////////////////////////////

Prelude> :t 2    
2 :: Num p => p
Prelude> :t 2+3
2+3 :: Num a => a
Prelude> :t (+)
(+) :: Num a => a -> a -> a

////////////////////2.6//////////////////////////////////////////////////////////

Prelude> not 2

<interactive>:43:5: error:
    * No instance for (Num Bool) arising from the literal `2'
    * In the first argument of `not', namely `2'
      In the expression: not 2
      In an equation for `it': it = not 2

////////////////////2.7//////////////////////////////////////////////////////////

Prelude> :t not
not :: Bool -> Bool
Prelude> :t 2
2 :: Num p => p

////////////////////3.1//////////////////////////////////////////////////////////

Prelude> succ 5
6
Prelude> pred 5
4
Prelude> max 2 5
5
Prelude> min 2 5
2
Prelude> :t succ
succ :: Enum a => a -> a
Prelude> :t max
max :: Ord a => a -> a -> a
Prelude> :t min
min :: Ord a => a -> a -> a
Prelude> :t pred
pred :: Enum a => a -> a

////////////////////3.2//////////////////////////////////////////////////////////

Prelude> id x = x
Prelude> id 5
5


////////////////////3.3//////////////////////////////////////////////////////////

Prelude> sumThree x y z = x + y + z
Prelude> sumThree 4 5 6
15

////////////////////3.4//////////////////////////////////////////////////////////

*Main> prodThree x y z = x * y * z
*Main> prodThree 4 6 2
48

////////////////////3.7//////////////////////////////////////////////////////////

Prelude> sumThree 3.2 2 4
9.2

////////////////////3.8//////////////////////////////////////////////////////////

*Main> sumThree 3.2 2 4

<interactive>:10:10: error:
    * No instance for (Fractional Int) arising from the literal `3.2'
    * In the first argument of `sumThree', namely `3.2'
      In the expression: sumThree 3.2 2 4
      In an equation for `it': it = sumThree 3.2 2 4

////////////////////3.9//////////////////////////////////////////////////////////

*Main> :t myMax
myMax :: Int -> Int -> Int

////////////////////3.10//////////////////////////////////////////////////////////

*Main> myMax2 3 6 1
6

////////////////////3.11//////////////////////////////////////////////////////////

*Main> mySum 10
55

////////////////////3.12//////////////////////////////////////////////////////////

*Main> fibo 7
13

////////////////////3.13//////////////////////////////////////////////////////////

*Main> cmmdc 9 48
3

-}