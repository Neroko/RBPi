#!/bin/bash

#timestamp=$(date +"%Y-%m-%d-%H-%M-%S")
timestamp_date=$(date +"%Y-%m-%d")
timestamp_time=$(date +"%H-%M-%S")

#echo $timestamp

drive="$1"

check_space () {
	drive_info=$(df -h "$drive" | grep "$drive" | sed -r 's/[[:blank:]]+/ /g')

	device_name=$(echo "$drive_info" | cut -f1 -d " ")
	total_size=$(echo "$drive_info" | cut -f2 -d " ")
	used_size=$(echo "$drive_info" | cut -f3 -d " ")
	free_size=$(echo "$drive_info" | cut -f4 -d " ")
	used_prec=$(echo "$drive_info" | cut -f5 -d " ")
	device_mount=$(echo "$drive_info" | cut -f6 -d " ")

	echo ""$timestamp_date" "$timestamp_time" "$device_name" "$total_size" "$used_size" "$free_size" "$used_prec" "$device_mount""
}

check_space "$drive"
