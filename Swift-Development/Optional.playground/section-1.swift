// Optional - Helps keep app from crashing
// Optionals can eithe have a value or a nil
// Adding a ? to a type make it an optional (String, Int, Bcoolean, etc)
// Bang operator = !
// let aptNumber = culprit! basically unraps value of culprit

import UIKit


func sendNoticeTo(#aptNumber: Int){
    
}

func findApt (aptNumber : String ) -> String? {
    let aptNumbers = ["101", "202", "303", "404"]
    for tempAptNumber in aptNumbers {
        if ( tempAptNumber == aptNumber) {
            return aptNumber
        }
    }
    return nil
}

if let culprit = findApt("101")?.toInt() {
        sendNoticeTo(aptNumber: culprit)

}
