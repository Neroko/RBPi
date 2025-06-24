#!/bin/bash

content=$(wget google.com -q -O -)
echo $content
