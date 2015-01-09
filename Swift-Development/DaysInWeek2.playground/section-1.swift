// Enum Members and Raw values 


import UIKit


enum Day: Int {
    case Monday = 1, Tuesday = 2, Wednesday = 3, Thursday = 4, Friday = 5, Saturday = 6, Sunday = 7
}

func daysTillWeekend(day: Day) -> Int {
    return Day.Saturday.rawValue - day.rawValue
}

daysTillWeekend(Day.Monday)

if let firstDayOfWeek = Day(rawValue: 1) {
    daysTillWeekend(firstDayOfWeek)
}
