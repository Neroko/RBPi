# Raspberry Pi 4 GPIO Pinout
#
# 5V|5V|--|14|15|18|--|23|24|--|25|08|07|01|--|12|--|16|20|21
# 3V|02|03|04|--|17|27|22|3V|10|09|11|--|00|05|06|13|19|26|--

#=============================================================
# Libraries
#=============================================================
# LED Control
from gpiozero import LED
# Timer Library
from time import sleep
# Font Fore/Background Color/Style
from colorama import Fore, Back, Style

ledsList = [14,15,18,23,24,25,8,7,1,12,16,20,21,26,19,13,6,5,0,11,9,10,22,27,17,4,3,2]
chaseTime = float(0.030)



#def color_function(color_choice, led_num):
#	print(color_choice + " " + led_num)




#while True:
#    for x in ledsList:
#        led = LED(x)
#        led.on()
#        sleep(chaseTime)
#        led.off()


print("=============================================================")
print("LED Chaser Test (Green Background Font Moving Later...)")
print("=============================================================")
print( \
	"|" \
		+ Back.BLUE \
		+ '5V' \
		+ Style.RESET_ALL \
	+ "|" \
		+ Back.BLUE \
		+ '5V' \
		+ Style.RESET_ALL \
	+ "|" \
		+ Style.DIM \
		+ '--' \
		+ Style.RESET_ALL \
	+ "|" \
		+ Back.GREEN \
		+ Fore.BLACK \
		+ "14" \
		+ Style.RESET_ALL \
	+ "|" \
		+ "15" \
	+ "|" \
		+ "18" \
	+ "|" \
		+ Style.DIM \
		+ '--' \
		+ Style.RESET_ALL \
	+ "|" \
		+ "23" \
	+ "|" \
		+ "24" \
	+ "|" \
		+ Style.DIM \
		+ '--' \
		+ Style.RESET_ALL \
	+ "|" \
		+ "25" \
	+ "|" \
		+ "08" \
	+ "|" \
		+ "07" \
	+ "|" \
		+ "01" \
	+ "|" \
		+ Style.DIM \
		+ '--' \
		+ Style.RESET_ALL \
	+ "|" \
		+ "12" \
	+ "|" \
		+ Style.DIM \
		+ '--' \
		+ Style.RESET_ALL \
	+ "|" \
		+ "16" \
	+ "|" \
		+ "20" \
	+ "|" \
		+ "21" \
	+ "|" \
)

print( \
	"|" \
		+ Back.RED \
		+ '3V' \
		+ Style.RESET_ALL \
	+ "|" \
		+ "02" \
	+ "|" \
		+ "03" \
	+ "|" \
		+ "04" \
	+ "|" \
		+ Style.DIM \
		+ '--' \
		+ Style.RESET_ALL \
	+ "|" \
		+ "17" \
	+ "|" \
		+ "27" \
	+ "|" \
		+ "22" \
	+ "|" \
		+ Back.RED \
		+ '3V' \
		+ Style.RESET_ALL \
	+ "|" \
		+ "10" \
	+ "|" \
		+ "09" \
	+ "|" \
		+ "11" \
	+ "|" \
		+ Style.DIM \
		+ '--' \
		+ Style.RESET_ALL \
	+ "|" \
		+ "00" \
	+ "|" \
		+ "05" \
	+ "|" \
		+ "06" \
	+ "|" \
		+ "13" \
	+ "|" \
		+ "19" \
	+ "|" \
		+ "26" \
	+ "|" \
		+ Style.DIM \
		+ '--' \
		+ Style.RESET_ALL \
	+ "|" \
)
print("=============================================================")


#=============================================================
# LED Chaser
#=============================================================
while True:
    for x in ledsList:
        led = LED(x)
        led.on()
        sleep(chaseTime)
        led.off()


#=============================================================
# Font Fore/Background Color/Style Test
#=============================================================
#print(Fore.RED + 'some red text')
#print(Back.GREEN + 'and with a green background')
#print(Style.DIM + 'and in dim text')
#print(Style.RESET_ALL)
#print('back to normal')


#=============================================================
# Single LED Test
#=============================================================
# Test Time (3 seconds)
#testTime = float(3.000)
# LED to turn on
#led = LED(00)
# Turn on LED
#led.on()
# Turn on for # amount of time
#sleep(testTime)
