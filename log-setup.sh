#!/bin/bash

timestamp_date=$(date +"%Y-%m-%d")
timestamp_time=$(date +"%H-%M-%S")

log_directory=""$HOME"/logs"

if [ ! -d "$log_directory" ]; then
	mkdir -v "$log_directory"
fi

