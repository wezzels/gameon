

apt-get -y install vim openssh-server git htop midori nginx php-common matchbox unclutter
echo "sudo xinit /home/pi/startMidori.sh &" >> /etc/rc.local
cd
scp -r wez@wezzel.com:.ssh .
scp -r wez@wezzel.com:/data/nginx/html/wezzel.com/gameon .
scp -r wez@wezzel.com:/data/nginx/conf.d/wezzel.*ssl*.conf .

echo "*/5 * * * * DISPLAY=:0 /home/pi/dashboardrefresh.sh > /dev/null 2>&1" > crontab
