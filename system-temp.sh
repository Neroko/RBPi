#!/bin/bash

systemTemperature=$( \
	sensors --fahrenheit | \
	grep "temp1" | \
	cut -f2- -d"+" | \
	cut -f1- -d"F" | \
	cut -f1 -d" " \
)

echo "$systemTemperature"
