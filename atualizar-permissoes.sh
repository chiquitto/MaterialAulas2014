# ref: http://stackoverflow.com/questions/3740152/how-to-set-chmod-for-a-folder-and-all-of-its-subfolders-and-files-in-linux-ubunt

# Set owner of files
chown -R alisson:alisson /home/alisson/Trabalho/MaterialAulas2014

# Set chmod 777 for directories
find /home/alisson/Trabalho/MaterialAulas2014 -type d -exec chmod 777 {} \;

# Set chmod 666 for files
find /home/alisson/Trabalho/MaterialAulas2014 -type f -exec chmod 666 {} \;
