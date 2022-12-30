# Web Server Configuration and Setup

The web server for our online business is configured as follows:

1. Apache HTTP Server is installed and configured as the web server software.
2. Virtual directories are created to segregate the different areas of the website and assign different permissions to each of them. The directories are organized as follows:
   - `public_html`: Contains the main website files, including the homepage, product listings, and account management pages. This directory is accessible to all users.
   - `protected`: Contains sensitive files that are only meant to be accessed by authorized users. This directory is protected with HTTP authentication.
3. Virtual servers are configured to allow us to host multiple websites on a single physical server, each with its own unique domain name.
4. PHP is installed and configured to run as an Apache module, allowing it to communicate directly with the web server.
5. MySQL is installed and configured as the database management system for the website.
6. HTTP authentication is configured to protect certain areas of the website with a login system.
7. SSL certificates are installed to secure the connection between the server and the client.
8. CGI applications are enabled to allow us to run scripts on the server to generate dynamic content.
9. PHP applications are created to provide advanced features on the website, such as user accounts and order tracking.

The configuration files for the web server are organized as follows:

- `conf/httpd.conf`: Contains the main configuration settings for the Apache HTTP Server.
- `conf/extra/httpd-ssl.conf`: Contains the SSL configuration settings for the web server.
- `conf/extra/httpd-vhosts.conf`: Contains the virtual host configuration settings for the web server.

The website files are organized as follows:

- `public_html/index.php`: Contains the homepage of the website.
- `public_html/images`: Contains image files used on the website.
- `public_html/styles`: Contains style sheets for the website.
- `public_html/account-management.php`: Contains the account management page for authorized users.
- `public_html/login.php`: Contains the login page for the website.
- `public_html/logout.php`: Contains the logout page for the website.
- `public_html/products.php`: Contains the product listings page for the website.
- `public_html/cart.php`: Contains the shopping cart page for the website.
- `protected/db-connect.php`: Contains the database connection settings for the website.
- `protected/functions.php`: Contains custom functions used on the website.
