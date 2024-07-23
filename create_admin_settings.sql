CREATE DATABASE IF NOT EXISTS my_database;
USE my_database;

CREATE TABLE IF NOT EXISTS admin_settings (
    id INT AUTO_INCREMENT PRIMARY KEY,
    site_title VARCHAR(255) NOT NULL,
    site_description TEXT,
    contact_email VARCHAR(255) NOT NULL,
    admin_email VARCHAR(255) NOT NULL,
    site_logo VARCHAR(255),
    maintenance_mode BOOLEAN,
    google_analytics VARCHAR(255),
    smtp_server VARCHAR(255),
    smtp_port INT,
    smtp_user VARCHAR(255),
    smtp_password VARCHAR(255),
    UNIQUE (contact_email)
);

INSERT INTO admin_settings (site_title, site_description, contact_email, admin_email, site_logo, maintenance_mode, google_analytics, smtp_server, smtp_port, smtp_user, smtp_password)
VALUES ('Meu Site', 'Descrição do meu site', 'contato@meusite.com', 'admin@meusite.com', 'logo.png', FALSE, 'UA-12345678-1', 'smtp.meusite.com', 587, 'usuario', 'senha');
