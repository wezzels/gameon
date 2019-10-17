#!/bin/bash

DISPLAY=:0 xdotool search --name ci-monitor windowactivate --sync key F5 >> ~/log/tmp.log 2>&1
