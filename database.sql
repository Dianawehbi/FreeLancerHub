
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
    password VARCHAR(200) NOT NULL,
    country VARCHAR(30) NOT NULL,
    role INT(11) NOT NULL,
    link VARCHAR(500) NOT NULL,
    description TEXT NOT NULL,
    profilepic  VARCHAR(100) DEFAULT 'default.jpg',
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
('Tech Innovations', 'tech_innovation', 'johnson@techinnovations.com', '4567', '202cb962ac59075b964b07152d234b70', 'Egypt', 3, 'http://jjj', 'A company specializing in cutting-edge technology solutions to enhance business operations.'),
('ShopEase Inc.', 'ShopEase_Inc', 'emily.carter@shopease.com', '+1-555-123-4567', '202cb962ac59075b964b07152d234b70', 'Lebanon', 3, 'https://www.shopease.com/caree', 'ShopEase Inc. is a leading provider of innovative retail solutions, empowering businesses to optimize shopping experiences.'),
('FitPro Solutions', 'FitPro_Solutions', 'david.johnson@fitpro.com', '+1-555-234-567', '202cb962ac59075b964b07152d234b70', 'Jordan', 3, 'https://www.fitprosolutions.com/jc', 'FitPro Solutions specializes in creating cutting-edge fitness technologies and health management software for individuals and businesses.'),
('DataVision Analytics', 'DataVision_Analytics', 'sarah.kim@datavision.com', '+1-555-345-6789', '202cb962ac59075b964b07152d234b70', 'Egypt', 3, 'https://www.datavisionanalytics.c', 'DataVision Analytics delivers advanced AI and machine learning insights for business intelligence and decision-making.'),
('CloudShift Solutions', 'CloudShift_Solutions', 'michael.lee@cloudshift.com', '+1-555-456-7890', '202cb962ac59075b964b07152d234b70', 'Morocco', 3, 'https://www.cloudshiftsolutions.c(with-us', 'CloudShift Solutions provides secure and scalable cloud computing solutions for businesses of all sizes.'),
('SpeedData Inc.', 'SpeedData_Inc', 'jennifer.davis@speeddata.com', '+1-555-567-8901', '202cb962ac59075b964b07152d234b70', 'Syria', 3, 'https://www.speeddata.com/jobs', 'SpeedData Inc. focuses on delivering high-performance database management systems and solutions to optimize data-driven operations.'),
('Scalable Tech', 'Scalable_Tech', 'robert.wilson@scalabletech.com', '+1-555-678-9012', '202cb962ac59075b964b07152d234b70', 'Tunisia', 3, 'https://www.scalabletech.com/cal', 'Scalable Tech specializes in modern software architecture and design, helping companies scale their software systems efficiently.'),
('SecureBank Systems', 'SecureBank_Systems', 'laura.hernandez@securebank.com', '+1-555-789-0123', '202cb962ac59075b964b07152d234b70', 'Algeria', 3, 'https://www.securebank.com/car', 'SecureBank Systems provides top-tier cybersecurity solutions to protect financial institutions against digital threats.'),
('PlayMore Studios', 'PlayMore_Studios', 'kevin.brown@playmorestudios.co', '+1-555-890-1234', '202cb962ac59075b964b07152d234b70', 'Lebanon', 3, 'https://www.playmorestudios.com', 'PlayMore Studios is a creative game development studio delivering immersive and engaging gaming experiences.'),
('EaseDesign Lab', 'EaseDesign_Lab', 'natalie.moore@easedesign.com', '+1-555-901-2345', '202cb962ac59075b964b07152d234b70', 'Palestine', 3, 'https://www.easedesignlab.com/c', 'EaseDesign Lab specializes in delivering elegant and user-friendly UI/UX designs for software applications.'),
('DevFlow Systems', 'DevFlow_Systems', 'thomas.martinez@devflowsystems', '+1-555-012-3456', '202cb962ac59075b964b07152d234b70', 'Iraq', 3, 'https://www.devflowsystems.com', 'DevFlow Systems offers DevOps and automation solutions to streamline software development and deployment processes.');

INSERT INTO user (name, username, email, phone, password, country, role, link, description) VALUES
('Diana Wehbi', 'diana.wehbi', 'diana.wehbi@gmail.com', '+973-39-456-7890', '202cb962ac59075b964b07152d234b70', 'Lebanon', 2, 'https://www.diana-portfolio.com', 'Back-end developer.'),
('Ahmed Al-Farouq', 'ahmed.alfarouq', 'ahmed.alfarouq@example.com', '+20-123-456-7890', '202cb962ac59075b964b07152d234b70', 'Egypt', 2, 'https://www.behance.net/ahmeda', 'Mobile app and web developer.'),
('Fatima Al-Zahra', 'fatima.zahra', 'fatima.zahra@example.com', '+971-50-234-5678', '202cb962ac59075b964b07152d234b70', 'UAE', 2, 'https://www.fatima-portfolio.com', 'UI/UX designer.'),
('Omar Al-Mansour', 'omar.almansou', 'omar.almansour@example.com', '+966-55-345-6789', '202cb962ac59075b964b07152d234b70', 'Saudi Arabia', 2, 'https://www.omaldev.com', 'Full-stack developer.'),
('Layla Kassem', 'layla.kassem', 'layla.kassem@example.com', '+961-71-234-5678', '202cb962ac59075b964b07152d234b70', 'Lebanon', 2, 'https://www.behance.net/laylakas', 'Graphic designer and front-end developer.'),
('Ali Hassan', 'ali.hassan', 'ali.hassan@example.com', '+212-660-123-456', '202cb962ac59075b964b07152d234b70', 'Morocco', 2, 'https://www.aliportfolio.com', 'Backend developer.'),
('Maya El-Khatib', 'maya.elkhatib', 'maya.elkhatib@example.com', '+961-71-234-5678', '202cb962ac59075b964b07152d234b70', 'Lebanon', 2, 'https://www.mayaelkhatib.dev', 'Full-stack developer.'),
('Youssef Ben Ali', 'youssef.benali', 'youssef.benali@example.com', '+966-55-678-9012', '202cb962ac59075b964b07152d234b70', 'Saudi Arabia', 2, 'https://www.youssefbenali.com', 'Software engineer.'),
('Rania Ahmed', 'rania.ahmed', 'rania.ahmed@example.com', '+20-100-234-5678', '202cb962ac59075b964b07152d234b70', 'Egypt', 2, 'https://www.rania-ahmed.com', 'UI/UX designer.'),
('Tariq Al-Karim', 'tariq.alkarim', 'tariq.alkarim@example.com', '+973-33-123-4567', '202cb962ac59075b964b07152d234b70', 'Bahrain', 2, 'https://www.tariq-dev.com', 'Mobile app developer.'),
('Zainab Ali', 'zainab.ali', 'zainab.ali@example.com', '+961-71-234-567', '202cb962ac59075b964b07152d234b70', 'Bahrain', 2, 'https://www.zainab-portfolio.com', 'Web developer.');


INSERT INTO `task` (`id`, `name`, `description`, `rate`, `category_id`, `company_id`, `deadline`) VALUES
(NULL, 'Develop AI-Driven Business Insights Tool', 'Create an AI-driven analytics tool to enhance business operations.', 3000, 3, 1, '2025-01-15'),
(NULL, 'Optimize Cloud Infrastructure', 'Improve scalability and performance of the cloud environment.', 3500, 4, 2, '2025-02-20'),
(NULL, 'Build a Secure Web Application', 'Develop a secure web app for tech innovation workflows.', 2800, 1, 3, '2025-03-10'),
(NULL, 'Architect Scalable Software Solutions', 'Design software solutions for handling high loads and traffic.', 3200, 6, 4, '2025-04-05'),
(NULL, 'Design a Seamless Shopping Experience', 'Enhance user experience with intuitive UI/UX for the e-commerce platform.', 2200, 9, 5, '2025-01-25'),
(NULL, 'Build a Secure Payment Gateway', 'Implement a highly secure payment gateway for transactions.', 2700, 7, 6, '2025-03-01'),
(NULL, 'Create a Mobile Shopping App', 'Develop a mobile app for a seamless shopping experience.', 3000, 2, 7, '2025-02-10'),
(NULL, 'Set Up a Cloud-Based Inventory System', 'Design a cloud solution for real-time inventory management.', 2900, 4, 8, '2025-03-25'),
(NULL, 'Develop a Fitness Tracking App', 'Create a cross-platform app to monitor and track fitness activities.', 2600, 2, 9, '2025-02-05'),
(NULL, 'Implement Health Data Analytics Dashboard', 'Build an analytics dashboard to visualize health metrics.', 3200, 3, 10, '2025-03-15'),
(NULL, 'Design an Interactive Workout Game', 'Develop a game for interactive fitness and exercise.', 2800, 8, 11, '2025-04-10'),
(NULL, 'Build a Health-Focused UI/UX', 'Create a user-friendly design for health apps.', 2500, 9, 1, '2025-05-01'),
(NULL, 'Design a Machine Learning Model for Data Insights', 'Develop a robust ML model to uncover actionable insights.', 4000, 3, 2, '2025-01-30'),
(NULL, 'Optimize Database for Data Processing', 'Enhance database performance to handle large datasets efficiently.', 2800, 5, 3, '2025-02-25'),
(NULL, 'Create DevOps Pipeline for Data Workflows', 'Implement CI/CD pipelines for data science projects.', 3000, 10, 4, '2025-03-20'),
(NULL, 'Develop a Cloud Data Integration System', 'Build a system for seamless data integration in the cloud.', 3500, 4, 5, '2025-04-15'),
(NULL, 'Migrate Legacy Systems to the Cloud', 'Move on-premises systems to a secure and scalable cloud environment.', 3400, 4, 6, '2025-01-18'),
(NULL, 'Implement Multi-Tenant Architecture', 'Develop a multi-tenant architecture for SaaS applications.', 3700, 6, 7, '2025-02-22'),
(NULL, 'Build Cloud-Based Security Features', 'Develop security solutions for cloud-hosted applications.', 3100, 7, 8, '2025-03-10'),
(NULL, 'Develop Cloud-Native Web Apps', 'Create web apps optimized for cloud environments.', 3000, 1, 9, '2025-04-05'),
(NULL, 'Optimize High-Performance Database Systems', 'Improve database systems for real-time data processing.', 3300, 5, 10, '2025-01-22'),
(NULL, 'Develop Data Replication Solutions', 'Build solutions for efficient data replication and redundancy.', 2900, 5, 11, '2025-02-28'),
(NULL, 'Enhance DevOps for Big Data Workflows', 'Create DevOps tools to streamline big data processes.', 3200, 1, 34, '2025-03-12'),
(NULL, 'Create a Scalable Data Visualization Dashboard', 'Develop a dashboard for real-time data visualization.', 2800, 3, 2, '2025-04-01'),
(NULL, 'Create Scalable Software Architecture', 'Design scalable software solutions for growing applications.', 3500, 6, 3, '2025-01-20'),
(NULL, 'Develop Modular Codebases for Efficiency', 'Implement modular codebases to enhance software maintainability.', 3100, 6, 4, '2025-02-15'),
(NULL, 'Build a Cloud-Based Microservices Platform', 'Develop a platform for cloud-based microservices.', 3700, 4, 5, '2025-03-10'),
(NULL, 'Create Secure APIs for Enterprise Software', 'Develop secure APIs for enterprise-grade software solutions.', 3000, 7, 6, '2025-04-01'),
(NULL, 'Enhance Cybersecurity Measures', 'Implement advanced cybersecurity protocols for financial systems.', 4000, 7, 7, '2025-01-25'),
(NULL, 'Develop Secure Data Encryption Tools', 'Create tools to encrypt sensitive financial data effectively.', 3700, 7, 8, '2025-03-10'),
(NULL, 'Automate Security Monitoring Systems', 'Build tools to automate monitoring of cybersecurity threats.', 3200, 10, 9, '2025-04-05'),
(NULL, 'Optimize Cloud Security for Banking Applications', 'Enhance cloud security features for financial apps.', 3600, 4, 10, '2025-05-01'),
(NULL, 'Develop an Immersive Role-Playing Game', 'Create a role-playing game with engaging storylines and graphics.', 4500, 8, 11, '2025-01-30'),
(NULL, 'Implement Advanced Game Physics Engine', 'Develop a physics engine for realistic gameplay.', 4200, 8, 1, '2025-02-20'),
(NULL, 'Design Intuitive Game UI/UX', 'Create user-friendly interfaces for enhanced gameplay.', 2800, 9, 2, '2025-03-05'),
(NULL, 'Build Multiplayer Server Architecture', 'Develop server solutions for online multiplayer games.', 3400, 6, 3, '2025-04-01'),
(NULL, 'Create Intuitive UI for a Mobile App', 'Design a user-friendly UI for a cross-platform mobile application.', 2300, 9, 4, '2025-01-28'),
(NULL, 'Redesign Website for Better Accessibility', 'Enhance website design to comply with accessibility standards.', 2000, 9, 5, '2025-02-18'),
(NULL, 'Build a Design System for Consistency', 'Develop a design system to ensure consistent branding and style.', 2500, 6, 6, '2025-03-10'),
(NULL, 'Optimize Web Assets for Faster Performance', 'Improve website performance by optimizing assets.', 2100, 1, 7, '2025-04-01'),
(NULL, 'Automate CI/CD Pipelines', 'Implement automated CI/CD pipelines to improve software delivery.', 3100, 10, 8, '2025-01-20'),
(NULL, 'Build DevOps Monitoring Tools', 'Develop tools to monitor and optimize DevOps workflows.', 2900, 10, 9, '2025-02-10'),
(NULL, 'Create a Cloud DevOps Environment', 'Develop a DevOps framework optimized for cloud-based applications.', 3200, 4, 10, '2025-03-01'),
(NULL, 'Design Containerized Deployment Strategies', 'Implement container-based deployment strategies for scalability.', 3500, 6, 11, '2025-04-01');
