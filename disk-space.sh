#!/bin/bash

argument="$1"
single_line="0"
multi_line="0"

#timestamp=$(date +"%Y-%m-%d-%H-%M-%S")
#timestamp_date=$()
#timestamp_time=$()

#echo $timestamp

if [[ "$argument" == "-s" ]]; then
	# Single Line
	drive="$2"
	single_line="1"
elif [[ "$argument" == "-m" ]]; then
	# Multi Lines
	drive="$2"
	multi_line="1"
else
	drive="$1"
fi

os_drive="/dev/mmcblk0p2"
storage_drive="/mnt/storage"

check_space () {
	drive_info=$(df -h "$1" | grep "$1" | sed -r 's/[[:blank:]]+/ /g')

	device_name=$(echo "$drive_info" | cut -f1 -d " ")
	total_size=$(echo "$drive_info" | cut -f2 -d " ")
	used_size=$(echo "$drive_info" | cut -f3 -d " ")
	free_size=$(echo "$drive_info" | cut -f4 -d " ")
	used_prec=$(echo "$drive_info" | cut -f5 -d " ")
	device_mount=$(echo "$drive_info" | cut -f6 -d " ")

	if [[ "$single_line" == "1" ]]; then
		echo ""$device_name" "$total_size" "$used_size" "$free_size" "$used_prec" "$device_mount""
	elif [[ "$multi_line" == "1" ]]; then
		echo "$device_name"
		echo "$total_size"
		echo "$used_size"
		echo "$free_size"
		echo "$used_prec"
		echo "$device_mount"
	else
		echo "Device: "$device_name""
		echo "Size: "$total_size""
		echo "Used: "$used_size""
		echo "Avail: "$free_size""
		echo "Use%: "$used_prec""
		echo "Mount: "$device_mount""
	fi
}

if [[ -z "$drive" ]]; then
	check_space "$os_drive"
	check_space "$storage_drive"
else
	check_space "$drive"
fi
