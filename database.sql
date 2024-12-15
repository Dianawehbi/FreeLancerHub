
-- Create the 'role' table
CREATE TABLE role (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(25) NOT NULL
);

INSERT INTO role (name) VALUES 
('Admin'),
('Freelancer'),
('Organization');


-- Create the 'user' table
CREATE TABLE user (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(25) NOT NULL,
    username VARCHAR(30) NOT NULL,
    email VARCHAR(30) NOT NULL,
    phone VARCHAR(100) NOT NULL,
    password VARCHAR(30) NOT NULL,
    country VARCHAR(30) NOT NULL,
    role INT(11) NOT NULL,
    link VARCHAR(500) NOT NULL,
    description TEXT NOT NULL,
    FOREIGN KEY (role) REFERENCES role(id) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE review (
    id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    type VARCHAR(30) NOT NULL
);

INSERT INTO review (type) VALUES 
('Very Good'),
('Good'),
('Not Bad'),
('Poor');


CREATE TABLE categories (
    id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL
);

INSERT INTO categories (name) VALUES
('Web Development'),
('Mobile Development'),
('AI and Machine Learning'),
('Cloud Computing'),
('Database Management'),
('Software Architecture and Design'),
('Cybersecurity'),
('Game Development'),
('UX/UI Design'),
('DevOps and Automation');


CREATE TABLE task (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    description TEXT NOT NULL,
    rate INT(11) NOT NULL,
    category_id INT(11) NOT NULL,
    company_id INT(11) NOT NULL,
    deadline DATE NOT NULL,
    FOREIGN KEY (category_id) REFERENCES categories(id) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (company_id) REFERENCES user(id) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE tasksdone (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    freelancer_id INT(11) NOT NULL,
    task_id INT(11) NOT NULL,
    review INT(11) NOT NULL,
    FOREIGN KEY (freelancer_id) REFERENCES user(id) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (task_id) REFERENCES task(id) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (review) REFERENCES review(id) ON DELETE CASCADE ON UPDATE CASCADE
);

INSERT INTO user (name, username, email, phone, password, country, role, link, description) VALUES
('Tech Innovations', 'tech_innovation', 'johnson@techinnovations.com', '4567', '123', 'Egypt', 3, 'http://jjj', 'A company specializing in cutting-edge technology solutions to enhance business operations.'),
('ShopEase Inc.', 'ShopEase_Inc', 'emily.carter@shopease.com', '+1-555-123-4567', '123', 'Lebanon', 3, 'https://www.shopease.com/caree', 'ShopEase Inc. is a leading provider of innovative retail solutions, empowering businesses to optimize shopping experiences.'),
('FitPro Solutions', 'FitPro_Solutions', 'david.johnson@fitpro.com', '+1-555-234-567', '123', 'Jordan', 3, 'https://www.fitprosolutions.com/jc', 'FitPro Solutions specializes in creating cutting-edge fitness technologies and health management software for individuals and businesses.'),
('DataVision Analytics', 'DataVision_Analytics', 'sarah.kim@datavision.com', '+1-555-345-6789', '123', 'Egypt', 3, 'https://www.datavisionanalytics.c', 'DataVision Analytics delivers advanced AI and machine learning insights for business intelligence and decision-making.'),
('CloudShift Solutions', 'CloudShift_Solutions', 'michael.lee@cloudshift.com', '+1-555-456-7890', '123', 'Morocco', 3, 'https://www.cloudshiftsolutions.c(with-us', 'CloudShift Solutions provides secure and scalable cloud computing solutions for businesses of all sizes.'),
('SpeedData Inc.', 'SpeedData_Inc', 'jennifer.davis@speeddata.com', '+1-555-567-8901', '123', 'Syria', 3, 'https://www.speeddata.com/jobs', 'SpeedData Inc. focuses on delivering high-performance database management systems and solutions to optimize data-driven operations.'),
('Scalable Tech', 'Scalable_Tech', 'robert.wilson@scalabletech.com', '+1-555-678-9012', '123', 'Tunisia', 3, 'https://www.scalabletech.com/cal', 'Scalable Tech specializes in modern software architecture and design, helping companies scale their software systems efficiently.'),
('SecureBank Systems', 'SecureBank_Systems', 'laura.hernandez@securebank.com', '+1-555-789-0123', '123', 'Algeria', 3, 'https://www.securebank.com/car', 'SecureBank Systems provides top-tier cybersecurity solutions to protect financial institutions against digital threats.'),
('PlayMore Studios', 'PlayMore_Studios', 'kevin.brown@playmorestudios.co', '+1-555-890-1234', '123', 'Lebanon', 3, 'https://www.playmorestudios.com', 'PlayMore Studios is a creative game development studio delivering immersive and engaging gaming experiences.'),
('EaseDesign Lab', 'EaseDesign_Lab', 'natalie.moore@easedesign.com', '+1-555-901-2345', '123', 'Palestine', 3, 'https://www.easedesignlab.com/c', 'EaseDesign Lab specializes in delivering elegant and user-friendly UI/UX designs for software applications.'),
('DevFlow Systems', 'DevFlow_Systems', 'thomas.martinez@devflowsystems', '+1-555-012-3456', '123', 'Iraq', 3, 'https://www.devflowsystems.com', 'DevFlow Systems offers DevOps and automation solutions to streamline software development and deployment processes.');

INSERT INTO user (name, username, email, phone, password, country, role, link, description) VALUES
('Diana Wehbi', 'diana.wehbi', 'diana.wehbi@gmail.com', '+973-39-456-7890', '123', 'Bahrain', 2, 'https://www.diana-portfolio.com', 'Back-end developer.'),
('Ahmed Al-Farouq', 'ahmed.alfarouq', 'ahmed.alfarouq@example.com', '+20-123-456-7890', '123', 'Egypt', 2, 'https://www.behance.net/ahmeda', 'Mobile app and web developer.'),
('Fatima Al-Zahra', 'fatima.zahra', 'fatima.zahra@example.com', '+971-50-234-5678', '123', 'UAE', 2, 'https://www.fatima-portfolio.com', 'UI/UX designer.'),
('Omar Al-Mansour', 'omar.almansou', 'omar.almansour@example.com', '+966-55-345-6789', '123', 'Saudi Arabia', 2, 'https://www.omaldev.com', 'Full-stack developer.'),
('Layla Kassem', 'layla.kassem', 'layla.kassem@example.com', '+961-71-234-5678', '123', 'Lebanon', 2, 'https://www.behance.net/laylakas', 'Graphic designer and front-end developer.'),
('Ali Hassan', 'ali.hassan', 'ali.hassan@example.com', '+212-660-123-456', '123', 'Morocco', 2, 'https://www.aliportfolio.com', 'Backend developer.'),
('Maya El-Khatib', 'maya.elkhatib', 'maya.elkhatib@example.com', '+961-71-234-5678', '123', 'Lebanon', 2, 'https://www.mayaelkhatib.dev', 'Full-stack developer.'),
('Youssef Ben Ali', 'youssef.benali', 'youssef.benali@example.com', '+966-55-678-9012', '123', 'Saudi Arabia', 2, 'https://www.youssefbenali.com', 'Software engineer.'),
('Rania Ahmed', 'rania.ahmed', 'rania.ahmed@example.com', '+20-100-234-5678', '123', 'Egypt', 2, 'https://www.rania-ahmed.com', 'UI/UX designer.'),
('Tariq Al-Karim', 'tariq.alkarim', 'tariq.alkarim@example.com', '+973-33-123-4567', '123', 'Bahrain', 2, 'https://www.tariq-dev.com', 'Mobile app developer.'),
('Zainab Ali', 'zainab.ali', 'zainab.ali@example.com', '+961-71-234-567', '123', 'Bahrain', 2, 'https://www.zainab-portfolio.com', 'Web developer.');

INSERT INTO `task`(`id`, `name`, `description`, `rate`, `category_id`, `company_id`, `deadline`) VALUES
(NULL, 'Design and Optimize a Relational Database for E-C', 'Create a robust relational database for an e-comme', 1000, 15, 1, '2025-01-20'),
(NULL, 'Develop a Responsive E-Commerce Website', 'Build a responsive e-commerce website using modern', 2100, 16, 2, '2025-02-15'),
(NULL, 'Build a Cross-Platform Fitness Tracker App', 'Develop a fitness tracker app compatible with both', 2550, 17, 3, '2025-03-10'),
(NULL, 'Develop a Machine Learning Model for Customer Segm', 'Design and train a machine learning model to segme', 1950, 18, 4, '2025-01-28'),
(NULL, 'Migrate On-Premises Infrastructure to AWS Cloud', 'Perform a complete migration of an existing on-pre', 3450, 19, 5, '2025-03-05'),
(NULL, 'Optimize SQL Queries for High-Traffic Application', 'Analyze and optimize SQL queries for a high-traffi', 850, 20, 6, '2025-01-25'),
(NULL, 'Design a Scalable Microservices Architecture', 'Create a microservices architecture for a SaaS pla', 3050, 21, 7, '2025-02-10'),
(NULL, 'Perform Penetration Testing for a Banking Applica', 'Conduct thorough penetration testing on a banking', 4250, 22, 8, '2025-02-25'),
(NULL, 'Develop a 2D Puzzle Game for Android', 'Design and develop a 2D puzzle game for Android de', 1550, 23, 9, '2025-03-15'),
(NULL, 'Redesign a Mobile App for Better Usability', 'Redesign the UI/UX of an existing mobile app to im', 1300, 24, 10, '2025-01-30'),
(NULL, 'Set Up CI/CD Pipeline for a Web Application', 'Configure a CI/CD pipeline for an existing web app', 1850, 24, 11, '2025-02-20'),
(NULL, 'Redesign a Mobile App for Better Usability', 'Redesign the UI/UX of an existing mobile app to im', 1300, 18, 1, '2025-01-30'),
(NULL, 'Develop a 2D Puzzle Game for Android', 'Design and develop a 2D puzzle game for Android de', 1550, 20, 2, '2025-03-15'),
(NULL, 'Perform Penetration Testing for a Banking Applica', 'Conduct thorough penetration testing on a banking', 4250, 19, 3, '2025-02-25'),
(NULL, 'Design a Scalable Microservices Architecture', 'Create a microservices architecture for a SaaS pla', 3050, 17, 4, '2025-02-10'),
(NULL, 'Optimize SQL Queries for High-Traffic Application', 'Analyze and optimize SQL queries for a high-traffi', 850, 16, 5, '2025-01-25'),
(NULL, 'Migrate On-Premises Infrastructure to AWS Cloud', 'Perform a complete migration of an existing on-pre', 3450, 15, 6, '2025-03-05'),
(NULL, 'Develop a Machine Learning Model for Customer Segm', 'Design and train a machine learning model to segme', 1950, 21, 7, '2025-01-28'),
(NULL, 'Build a Cross-Platform Fitness Tracker App', 'Develop a fitness tracker app compatible with both', 2550, 22, 8, '2025-03-10');
