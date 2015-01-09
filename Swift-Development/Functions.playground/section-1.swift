// Functions - Tuples

import UIKit

func searchNames (#name: String) -> (Bool, String){
    let names =
    ["Amit", "Andrews", "Ben", "Craig", "Dave", "Guil", "Hampton", "Jason", "Joy",
    "Kenneth", "Nick", "Pasan", "Zac"]
    
    var found = (false, "\(name) is not a Treehouse Teacher")
    
    for n in names {
        if n == name {
            found = (true, "\(name) is a Treehouse Teacher")
        }
    }
    return found
}

let result = searchNames(name: "Jon")

result.0
result.1
