
print "Welcome to the New Brunswick Parking Lot System"

print '''	
1 - 1 hour $2.00
2 - 2 hours $4.00
3 - 3 hours $6.00
4 - 4 hours $8.00
5 - 5 hours $10.00
6 - 6 hours $12.00
7 - 7 hours $15.00
8 - 8 hours $18.00
9 - 24 hours $20.00
10 - LOST $22.00'''

hours = 0
## while hours == 0:
hours = int(raw_input("Enter number that represent length of stay here: "))

if hours == 1:
	try: 
		hours = float(hours)
		print 'The price of parking is $2.00'
		hours = 0
		if hours == 2:
			try: 
				hours = float(hours)
				print 'The price of parking is $4.00'
				hours = 0
				if hours == 3:
					try: 
						hours = float(hours)
						print 'The price of parking is $6.00'
						hours = 0
						if hours == 4:
							try: 
								hours = float(hours)
								print 'The price of parking is $8.00'
								hours = 0
								if hours == 5:
									try: 
										hours = float(hours)
										print 'The price of parking is $10.00'
										hours = 0
										if hours == 6:
											try: 
												hours = float(hours)
												print 'The price of parking is $12.00'
												hours = 0
												if hours == 7:
													try: 
														hours = float(hours)
														print 'The price of parking is $15.00'
														hours = 0
														if hours == 8:
															try: 
																hours = float(hours)
																print 'The price of parking is $18.00'
																hours = 0
																if hours == 9:
																	try: 
																		hours = float(hours)
																		print 'The price of parking is $20.00'
																		hours = 0
																		if hours == 10:
																			try: 
																			 hours = float(hours)
																			 print 'The price of parking is $22.00'
																			 hours = 0