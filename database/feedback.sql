CREATE DATABASE student_feedback;
USE student_feedback

CREATE TABLE students (
    reg_no VARCHAR(50) PRIMARY KEY,
    password VARCHAR(255) NOT NULL,
    name VARCHAR(100) NOT NULL
);

CREATE TABLE feedback (
    id INT AUTO_INCREMENT PRIMARY KEY,
    reg_no VARCHAR NOT NULL,
    subject VARCHAR(100) NOT NULL,
    faculty VARCHAR(100) NOT NULL,
    teaching_rating INT NOT NULL,
    clarity_rating INT NOT NULL,
    material_rating INT NOT NULL,
    interaction_rating INT NOT NULL,
    overall_rating DECIMAL(3,2) NOT NULL,
    comments TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    FOREIGN KEY (reg_no) REFERENCES students(reg_no)
);