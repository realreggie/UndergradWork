print "Welcome to the Rutger's Cafe "
print ' Here is our menu: '
print ' Salads:'
print '   1 - caeser salad      $3.50'
print '   2 - chicken salad     $2.50'
print '   3 - tuna salad        $3.00'
print '   4 - greek salad		$5.00'
print '   5 - tossed salad		$3.50'
print ' Sandwiches:'
print '   1 - tuna              $4.50'
print '   2 - chicken           $3.50'
print '   3 - steak sandwich    $5.00'
print '   4 - turkey sandwich   $3.00'
print '   5 - ham sandwich      $2.50'
print ' Drinks'
print '   1 - soda              $2.00'
print '   2 - coffee            $3.50'
print '   3 - iced tea          $2.50'
print '   4 - orange juice      $3.00'
print '   5 - apple juice       $2.75'

saladloop = 0
cscount = 0
menuloop = 0
sandloop = 0
drinkloop = 0
subchk = 0


#Salads Menu
while menuloop == 0:
    while saladloop == 0:
        cscount = 0
        cs2count = 0
        tscount = 0
        ts2count = 0
        gscount = 0
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
        if saladerror == 0:
            gscount = raw_input('Enter the number of Greek Salad - Enter 0 for none ')
            try:
                gscount = float(gscount)
            except:
                print ' Greek Salad input is not valid - try again'
                saladerror = 1
        if saladerror == 0:
            ts2count = raw_input('Enter the number of Tossed Salad - Enter 0 for none ')
            try:
                ts2count = float(ts2count)
            except:
                print ' Tossed Salad input is not valid - try again'
                saladerror = 1
        if saladerror == 0 :
                saladloop = 1        
   #Sandwich Menu
    while sandloop == 0:
        tunasand = 0
        chsand = 0
        stsand = 0
        tkcount = 0
        hcount = 0
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
        if sanderror == 0:
            tkcount = raw_input('Enter the number of Turkey sandwiches - Enter 0 for none ')
            try:
               tkcount = float(tkcount)
            except:
               print ' Turkey Sandwich input not valid - try again'
               sanderror = 1
        if sanderror == 0:
            hcount = raw_input('Enter the number of Ham sandwiches - Enter 0 for none ')
            try:
               hcount = float(hcount)
            except:
               print ' Ham Sandwich input not valid - try again'
               sanderror = 1
        if sanderror == 0 :
            sandloop = 1
    #Drink Menu
    while drinkloop == 0:
        coffee = 0
        soda = 0
        icedtea = 0
        orgcount = 0
        appcount = 0
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
               print 'Coffees input not valid - try again'
               drinkerror = 1
        if drinkerror == 0:
            teacount = raw_input('Enter the number of iced teas - Enter 0 for none ')
            try:
               teacount = float(teacount)
            except:
               print 'Iced Teas input not valid - try again'
               drinkerror = 1
        if drinkerror == 0:
            orgcount = raw_input('Enter the number of orange juice - Enter 0 for none ')
            try:
               orgcount = float(orgcount)
            except:
               print 'Orange juice input not valid - try again'
               drinkerror = 1
        if drinkerror == 0:
            appcount = raw_input('Enter the number of apple juice - Enter 0 for none ')
            try:
               appcount = float(appcount)
            except:
               print 'Apple Juice input not valid - try again'
               drinkerror = 1
        if drinkerror == 0 :
            drinkloop = 1
###   Receipt
    print " Rutger's Cafe Receipt "
    print
    print 'Salads:'
    cstotal = cscount * 3.5
    cs2total = cs2count * 2.5
    tstotal = tscount * 3.0
    gstotal = gscount * 5.0
    ts2total = ts2count * 3.5
    subchk = subchk + cscount * 3.5
    subchk = subchk + cs2count * 2.5
    subchk = subchk + tscount * 3.0
    subchk = subchk + gscount * 5.0
    subchk = subchk + ts2count * 3.5
    if cscount > 0:
        print int(cscount), ' Caeser Salad(s)         $%0.2f' % cstotal
    if cs2count > 0:
        print int(cs2count), ' Chicken Salad(s)           $%0.2f' % cs2total
    if tscount > 0:
        print int(tscount), ' Tuna Salad(s)           $%0.2f' % tstotal
    if gscount > 0:
        print int(gscount), ' Greek Salad(s)           $%0.2f' % gstotal
    if ts2count > 0:
        print int(ts2count), ' Tossed Salad(s)           $%0.2f' % ts2total
    print 'Total Salad(s)                $%0.2f ' % (cstotal + cs2total + tstotal + gstotal + ts2total)
    print
    print 'Sandwichs: '
    tunatotal = tunacount * 4.5
    chtotal = chcount * 3.5
    tktotal = tkcount * 3.0
    htotal = hcount * 2.5
    sttotal = stcount * 5.0
    subchk = subchk + tunacount * 4.5
    subchk = subchk + chcount * 3.5
    subchk = subchk + stcount * 5.0
    subchk = subchk + tkcount * 3.0
    subchk = subchk + hcount * 2.5
    
    if tunacount > 0:
        print int(tunacount), ' Tuna sandwich(s)         $%0.2f' % tunatotal
    if chcount > 0:
        print int(chcount), ' Chicken sandwich(s)   $%0.2f' % chtotal
    if tkcount > 0:
        print int(tkcount), ' Turkey sandwich(s)   $%0.2f' % tktotal
    if hcount > 0:
        print int(hcount), ' Ham sandwich(s)   $%0.2f' % htotal
    if stcount > 0:
        print int(stcount), ' Steak sandwich(s)   $%0.2f' % sttotal
    print 'Total sandwich(s)           $%0.2f ' % (tunatotal + chtotal + tktotal +htotal + sttotal)
    print
    print 'Drinks: '
    sodatotal = sodacount * 2.0
    coffeetotal = coffeecount * 3.5
    teatotal = teacount * 2.5
    orgtotal = orgcount * 3.0
    apptotal = appcount * 2.75
    subchk = subchk + sodacount * 2.00
    subchk = subchk + coffeecount * 3.50
    subchk = subchk + teacount * 2.50
    subchk = subchk + orgcount * 3.0
    subchk = subchk + appcount * 2.75
    if sodacount > 0:
        print int(sodacount), ' Soda(s)                   $%0.2f' % sodatotal
    if coffeecount > 0:
        print int(coffeecount), ' Coffee(s)                 $%0.2f' % coffeetotal
    if teacount > 0:
        print int(teacount), ' Iced Tea(s)                 $%0.2f' % teatotal
    if orgcount > 0:
        print int(orgcount), ' Orange Juice(s)                 $%0.2f' % orgtotal
    if appcount > 0:
        print int(appcount), ' Apple Juice(s)                 $%0.2f' % apptotal

    print 'Total drinks)                $%0.2f ' % (sodatotal + coffeetotal + teatotal + orgtotal + apptotal)
    print
    print 'Your subtotal check amount is  $%0.2f ' % subchk
    totalchk = (subchk * .07) + subchk
    
    print 'Your total check amount is  $%0.2f ' % totalchk

    ans = raw_input('\nWould you like to enter another order - (y)es or (n)o? ')
    if ans == 'y':
       subchk = 0
       sandloop = 0
       saladloop = 0
       drinkloop = 0
    else:
        menuloop = 1
print "Thank you for ordering at the Rutgers' Cafe - Come Back Soon!!"