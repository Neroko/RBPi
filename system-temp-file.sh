#!/bin/bash

timestamp_date=$(date +"%Y-%m-%d")
timestamp_time=$(date +"%H-%M-%S")

log_directory=""$HOME"/logs"
temp_directory=""$log_directory"/temperature"
filename_log=""$timestamp_date"-temperature.log"
filename_current="0000-00-00-temperature-live.log"

if [ ! -d "$log_directory" ]; then
	mkdir -v "$log_directory"
fi

if [ ! -d "$temp_directory" ]; then
	mkdir -v "$temp_directory"
fi

systemTemperature=$( \
	sensors -u | \
	grep "temp1_input" | \
	cut -f2- -d":" | \
	cut -f2 -d" "
)

# Long Log
cat << EOF >> ""$temp_directory"/"$filename_log""
$timestamp_date $timestamp_time $systemTemperature
EOF

# Short Log
cat << EOF > ""$temp_directory"/"$filename_current""
$timestamp_date $timestamp_time $systemTemperature
EOF

echo "$systemTemperature"
