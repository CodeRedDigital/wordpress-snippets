# Password Protect a Wordpress System

This can be used for the locking down of a Wordpress instance during Build.

#Setting up the Users and Passwords

1. create a folder `mkdir /etc/apache2/.htpasswds`
2. create the passwords file `touch /etc/apache2/.htpasswds/.htpasswd`
3. create a user `htpasswd -m /etc/apache2/.htpasswds/.htpasswd [user1]` This will create a user called user1 do not use the [] unless you want them as the username
4. Follow the prompt and enter the password for the user
5. Follow the prompt and re-enter the password for the user
6. Edit the `.htaccess` file to include the location of the `.htpasswd` file an example can be found `/.htaccess`