Step 1: Create a database named "byahecare_db" in localhost/phpMyAdmin in your browser

Step 2: Copy and Paste these in the SQL terminal.

-- Create the 'ratings' table
CREATE TABLE ratings (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    vehicle_license VARCHAR(50),
    vehicle_type VARCHAR(50),
    rating INT(11),
    notes TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Create the 'report' table
CREATE TABLE report (
    id INT(6) AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50),
    vehicle_license VARCHAR(20),
    vehicle_type VARCHAR(20),
    complaint_type VARCHAR(20),
    comments TEXT,
    imageUpload VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
