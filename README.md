# RBPi

Raspibarry Pi 4

Imager Filename: imager_1.9.4.exe
Image Filename: 2025-05-13-raspios-bookworm-arm64-lite.img

# Turn WiFi On
sudo nmcli radio wifi on

# List WiFi
sudo nmcli dev wifi list

# Connect to WiFi <SSID> using Password <PASSWORD>
sudo nmcli dev wifi connect <SSID> password <PASSWORD>

# Display Hostname
hostname -I
