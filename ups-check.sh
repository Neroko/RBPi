#!/bin/bash

ups_command=$(upsc ups@localhost)
usb_command=$(lsusb)

usb_info() {
    # $1 = Vendor ID
    # $2 = Product ID

#    echo "$usb_command" | grep "UPS"
    echo "$usb_command" | grep "UPS" | cut -f6 -d' ' | cut -f1 -d':'
    echo "$usb_command" | grep "UPS" | cut -f6 -d' ' | cut -f2- -d':'
}

ups_info() {
    echo "$ups_command" | grep "$1" | cut -f2- -d' '
}

displaytime() {
    local T=$1
    local D=$((T/60/60/24))
    local H=$((T/60/60%24))
    local M=$((T/60%60))
    local S=$((T%60))
    (( $D > 0 )) && printf '%d days ' $D
    (( $H > 0 )) && printf '%d hours ' $H
    (( $M > 0 )) && printf '%d minutes ' $M
    (( $D > 0 || $H > 0 || $M > 0 ))
    printf '%d seconds\n' $S
}

ups_mfr=$(ups_info "device.mfr:")
if [ "$ups_mfr" == "CPS" ]; then
    ups_mfr=$(echo "CyberPower")
fi
ups_model=$(ups_info "device.model:")
ups_vendor=$(usb_info)

ups_status=$(ups_info "ups.status:")
if [ "$ups_status" == "OB DISCHRG" ]; then
    ups_status=$(echo "Discharging")
elif [ "$ups_status" == "OL CHRG" ]; then
    ups_status=$(echo "Charging")
elif [ "$ups_status" == "OL" ]; then
    ups_status=$(echo "Charged")
fi
ups_load=$(ups_info "ups.load:")

batt_level=$(ups_info "battery.charge:")
batt_runtime=$(ups_info "battery.runtime:")
batt_runtime=$(displaytime "$batt_runtime")
batt_type=$(ups_info "battery.type:")
batt_volt=$(ups_info "battery.voltage:")
input_volt=$(ups_info "input.voltage:")
output_volt=$(ups_info "output.voltage:")

clear
#echo
echo
echo "---------------------------------------"
echo ""$ups_mfr" "$ups_model" : Connected"
echo "---------------------------------------"
echo "Status = "$ups_status""
echo "Runtime = "$batt_runtime""
echo "Load Level = "$ups_load"%"
echo "Battery Level = "$batt_level"%"
echo "Battery Voltage = "$batt_volt"VDC"
echo "Voltage Input = "$input_volt"VAC"
echo "Voltage Output = "$output_volt"VAC"
#echo "---------------------------------------"
#echo "$ups_vendor"
#echo "---------------------------------------"
