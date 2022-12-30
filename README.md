# Small Online Business Application

This is a small online business application that allows customers to browse and purchase products, manage their accounts, and track their orders.

## Assessment Deliverables

The following files contain the deliverables for this assessment:

1. [Scenario Description](assessment-deliverables/scenario_description.md): A description of the scenario for our web server, including a justification for each technological feature implemented.

2. [Business Justification](assessment-deliverables/business_justification.md): Business justification for each technological feature implemented in your web server.

3. [Server Documentation](assessment-deliverables/server_documentation.md): Detailed documentation on the configuration and setup of our web server.

4. [Configuration Files](conf/): A directory containing all of the configuration files for our web server.

5. [Server Logs](logs/): A directory containing evidence from server logs and monitoring tools that our server is fully operational.

## Features

- Product catalog with images and descriptions
- Secure checkout with SSL certificates
- Customer account management system
- Order tracking and history
- HTTP authentication for protected areas

## Technologies

- Apache web server
- PHP scripting language
- MySQL database
- SSL certificates

## Directory Structure

The application is organized as follows:

```txt
online-business
├── conf
│   ├── extra
│   │   ├── httpd-ssl.conf
│   │   └── httpd-vhosts.conf
│   └── httpd.conf
├── public_html
│   ├── index.php
│   ├── images
│   ├── styles
│   ├── account-management.php
│   ├── login.php
│   ├── logout.php
│   ├── products.php
│   └── cart.php
└── protected
    ├── db-connect.php
    └── functions.php
```

- The "public_html" directory contains the website's HTML files, images, and styles.
- The "protected" directory contains the customer account management system and order processing scripts, which are protected by HTTP authentication.
- The "logs" directory contains the Apache access and error logs.
- The "conf" directory contains the Apache, MySQL, and PHP configuration files.

## Configuration

To configure the web server and application, edit the following files:

- Apache configuration file: `/var/www/html/online-business/conf/httpd.conf`
- MySQL configuration file: `/var/www/html/online-business/conf/my.cnf`
- PHP configuration file: `/var/www/html/online-business/conf/php.ini`

## Deployment

To deploy the application, start the Apache web server and MySQL database:

```bash
sudo service apache2 start
sudo service mysql start
```

To access the application, visit the URL "http://example.com" in a web browser.

To access the protected areas, such as the customer account management system and order processing scripts, enter the HTTP authentication credentials when prompted.

## Monitoring

To monitor the performance and activity of the web server and application, use the following tools:

```bash
# View the Apache access log
tail -f /var/log/apache2/access.log

# View the Apache error log
tail -f /var/log/apache2/error.log

# Enable the Apache Status module
LoadModule status_module modules/mod_status.so
<Location /server-status>
    SetHandler server-status
    Require host localhost
</Location>

# View the Apache Status information
http://example.com/server-status
