#!/bin/bash
 
# The IP for the server you wish to ping (8.8.8.8 is a public Google DNS server)
# SERVER=8.8.8.8
 
# Only send two pings, sending output to /dev/null
# ping -c2 ${SERVER} > /dev/null
# Using alternative method to pinging to check if the page exists
wget -q --spider http://www.google.com
   
# If the return code from ping / wget ($?) is not 0 (meaning there was an error)
if [ $? != 0 ]
then
    # Exit full screen in case of error
    xdotool search --onlyvisible "Chromium" windowactivate --sync key F11
    # Restart the wireless interface
    sudo ifdown --force wlan0
    sudo ifup wlan0
    # Sleep for 45 seconds to give a chance to the network adapter to get an IP
    sleep 45s
    # Reload the active page (Google Analytics)
    xdotool search --onlyvisible "Chromium" windowactivate --sync key F5
    # Restore full screen once connection is established
    xdotool search --onlyvisible "Chromium" windowactivate --sync key F11
fi
