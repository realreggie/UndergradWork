// isDivisible

import UIKit

func isDivisble(#diviend: Int, #divisor: Int) -> Bool?{
    if diviend % divisor == 0 {
        return true
    } else {
        return nil
    }
}

if let result = isDivisble(diviend: 15, divisor: 3){
    println("Divisible")
}else {
    println("Not Divisible")
}