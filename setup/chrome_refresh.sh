xdotool windowactivate $(xdotool search --class Chromium) &&
xdotool key F5 &&
xdotool windowactivate $(xdotool getactivewindow)
