// Associated Values

import UIKit

enum Status{
    case Success(String)
    case Failure(String)
}

let downloadStatus = Status.Failure("Network connection unavailbale")

switch downloadStatus{
case .Success(let success):
    println(success)
case .Failure(let failure):
    println(failure)
}