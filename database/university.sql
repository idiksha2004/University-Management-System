CREATE DATABASE IF NOT EXISTS university_db;
USE university_db;

CREATE TABLE users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(50) NOT NULL UNIQUE,
  password VARCHAR(100) NOT NULL,
  role ENUM('admin', 'faculty', 'student') NOT NULL
);

-- Example data
INSERT INTO users (username, password, role) VALUES
('admin01', 'admin123', 'admin'),
('faculty01', 'fac123', 'faculty'),
('student01', 'stu123', 'student');
CREATE TABLE courses (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100) NOT NULL,
  code VARCHAR(20) NOT NULL UNIQUE
);
INSERT INTO courses (name, code) VALUES 
('Mathematics', 'MATH101'),
('Computer Science', 'CS101');
CREATE TABLE students (
  id INT AUTO_INCREMENT PRIMARY KEY,
  user_id INT NOT NULL,
  name VARCHAR(100),
  email VARCHAR(100),
  department VARCHAR(100),
  FOREIGN KEY (user_id) REFERENCES users(id)
);

CREATE TABLE grades (
  id INT AUTO_INCREMENT PRIMARY KEY,
  student_id INT,
  course_name VARCHAR(100),
  grade VARCHAR(2),
  FOREIGN KEY (student_id) REFERENCES students(id)
);
-- Assume student01 has user_id = 3 (check users table)

INSERT INTO students (user_id, name, email, department) VALUES
(3, 'Riya Sharma', 'riya@student.edu', 'Computer Science');

INSERT INTO grades (student_id, course_name, grade) VALUES
(1, 'Mathematics', 'A'),
(1, 'Computer Science', 'B+');
