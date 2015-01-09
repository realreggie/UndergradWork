print "Welcome to the Rutger's Cafe "
print ' Here is our menu: '
print ' Salads:'
print '   1 - caeser salad      $3.50'
print '   2 - chicken salad     $2.50'
print '   3 - tuna salad        $3.00'
print ' Sandwiches:'
print '   1 - tuna             $4.50'
print '   2 - chicken          $3.50'
print '   3 - steak sandwich   $5.00'
print ' Drinks'
print '   1 - soda             $2.00'
print '   2 - coffee           $3.50'
print '   3 - iced tea         $2.50'
saladloop = 0
cscount = 0
menuloop = 0
sandloop = 0
drinkloop = 0
totalchk = 0

#Salads Menu
while menuloop == 0:
    while saladloop == 0:
        cscount = 0
        saladerror = 0
        cscount = raw_input('Enter the number of Caeser Salads - Enter 0 for none ')
        try:
            cscount = float(cscount)
        except:
            print 'Ceaser Salad input count is not valid - try again'
            saladerror = 1
        if saladerror == 0:
            cs2count = raw_input('Enter the number of Chicken Salad - Enter 0 for none ')
            try:
                cs2count = float(cs2count)
            except:
                print ' Chicken Salad input is not valid - try again'
                saladerror = 1
        if saladerror == 0:
            tscount = raw_input('Enter the number of Tuna Salad - Enter 0 for none ')
            try:
                tscount = float(tscount)
            except:
                print ' Tuna Salad input is not valid - try again'
                saladerror = 1
        if saladerror == 0 :
                saladloop = 1        
   #Sandwich Menu
    while sandloop == 0:
        tunasand = 0
        chsand = 0
        stsand = 0
        sanderror = 0
        tunacount = raw_input('Enter the number of tuna sandwiches - Enter 0 for none: ')
        try:
           tunacount = float(tunacount)
        except:
           print 'Tuna sandwich input not valid - try again'
           sanderror = 1
        if sanderror == 0:
            chcount = raw_input('Enter the number of chicken sandwiches - Enter 0 for none ')
            try:
               chcount = float(chcount)
            except:
               print ' Chicken Sandwich input not valid - try again'
               sanderror = 1
        if sanderror == 0:
            stcount = raw_input('Enter the number of steak sandwiches - Enter 0 for none ')
            try:
               stcount = float(stcount)
            except:
               print ' Steak Sandwich input not valid - try again'
               sanderror = 1
        if sanderror == 0 :
            sandloop = 1
    #Drink Menu
    while drinkloop == 0:
        coffee = 0
        soda = 0
        icedtea = 0
        drinkerror = 0
        sodacount = raw_input('Enter the number of sodas - Enter 0 for none: ')
        try:
           sodacount = float(sodacount)
        except:
           print 'Soda input not valid - try again'
           drinkerror = 1
        if drinkerror == 0:
            coffeecount = raw_input('Enter the number of coffees - Enter 0 for none ')
            try:
               coffeecount = float(coffeecount)
            except:
               print ' input not valid - try again'
               drinkerror = 1
        if drinkerror == 0:
            teacount = raw_input('Enter the number of iced teas - Enter 0 for none ')
            try:
               teacount = float(teacount)
            except:
               print ' input not valid - try again'
               drinkerror = 1
        if drinkerror == 0 :
            drinkloop = 1
###   Receipt
    print " Rutger's Cafe Receipt "
    print
    print 'Salads:'
    totalchk = totalchk + cscount * 3.5
    totalchk = totalchk + cs2count * 2.5
    totalchk = totalchk + tscount * 3.0
    if cscount > 0:
        print int(cscount), ' Caeser Salad(s)         $%0.2f' % (cscount * 3.5)
    if cs2count > 0:
        print int(cs2count), ' Chicken Salad(s)           $%0.2f' % (cs2count * 2.5)
    if tscount > 0:
        print int(tscount), ' Tuna Salad(s)           $%0.2f' % (tscount * 3.0)
    print 'Total Salad(s)                $%0.2f ' % (cscount * 3.5 + cs2count * 2.5 + tscount * 3.0)
    print
    print 'Sandwichs: '
    totalchk = totalchk + tunacount * 4.50
    totalchk = totalchk + chcount * 3.50
    totalchk = totalchk + stcount * 5.00
    if tunacount > 0:
        print int(tunacount), ' Tuna sandwich(s)         $%0.2f' % (tunacount * 4.5)
    if chcount > 0:
        print int(chcount), ' Chicken sandwich(s)   $%0.2f' % (chcount * 3.5)
    if stcount > 0:
        print int(stcount), ' Steak sandwich(s)   $%0.2f' % (stcount * 5.0)
    print 'Total sandwich(s)           $%0.2f ' % (tunacount * 4.5 + chcount * 3.5 + stcount * 5.0)
    print
    print 'drinks: '
    totalchk = totalchk + sodacount * 2.00
    totalchk = totalchk + coffeecount * 3.50
    totalchk = totalchk + teacount * 2.50
    if sodacount > 0:
        print int(sodacount), ' Soda(s)                   $%0.2f' % (sodacount * 2.0)
    if coffeecount > 0:
        print int(coffeecount), ' Coffee(s)                 $%0.2f' % (coffeecount * 3.5)
    if teacount > 0:
        print int(teacount), ' Iced Tea(s)                 $%0.2f' % (teacount * 2.5)
    print 'Total drinks)                $%0.2f ' % (sodacount * 2.0 + coffeecount * 3.5 + teacount * 2.5)
    print
    print 'Your total check amount is  $%0.2f ' % totalchk
    ans = raw_input('\nWould you like to enter another order - (y)es or (n)o? ')
    print
    if ans == 'y':
       totalchk = 0
       sandloop = 0
       saladloop = 0
       drinkloop = 0
    else:
        menuloop = 1
print "Thank you for ordering at the Rutgers' Cafe - Come Back Soon!!"