-- Create the database
CREATE DATABASE cia;

-- Use the database
USE cia;

-- Create the table
CREATE TABLE arithmetic (
    QID INT AUTO_INCREMENT PRIMARY KEY,
    difficulty ENUM('easy', 'average', 'difficult'),
    questions VARCHAR(255),
    answers ENUM('T', 'F')
);

-- Insert 50 entries into the table
INSERT INTO arithmetic (difficulty, question, answer)
VALUES
('easy', '1 + 1 = 2', 'T'),
('easy', '2 + 2 = 5', 'F'),
('easy', '3 + 3 = 6', 'T'),
('easy', '4 + 4 = 7', 'F'),
('easy', '5 + 5 = 10', 'T'),
('easy', '6 + 6 = 11', 'F'),
('easy', '7 + 7 = 14', 'T'),
('easy', '8 + 8 = 15', 'F'),
('easy', '9 + 9 = 18', 'T'),
('easy', '10 + 10 = 19', 'F'),
('easy', '2 - 1 = 1', 'T'),
('easy', '5 - 2 = 4', 'F'),
('easy', '8 - 3 = 5', 'T'),
('easy', '11 - 4 = 6', 'F'),
('easy', '14 - 5 = 9', 'T'),
('average', '15 + 15 = 30', 'T'),
('average', '16 + 16 = 31', 'F'),
('average', '17 + 17 = 34', 'T'),
('average', '18 + 18 = 35', 'F'),
('average', '19 + 19 = 38', 'T'),
('average', '20 + 20 = 39', 'F'),
('average', '25 - 10 = 15', 'T'),
('average', '30 - 12 = 17', 'F'),
('average', '35 - 15 = 20', 'T'),
('average', '40 - 18 = 21', 'F'),
('average', '45 - 20 = 25', 'T'),
('difficult', '21 + 21 = 42', 'T'),
('difficult', '22 + 22 = 43', 'F'),
('difficult', '23 + 23 = 46', 'T'),
('difficult', '24 + 24 = 47', 'F'),
('difficult', '25 + 25 = 50', 'T'),
('difficult', '50 - 25 = 24', 'F'),
('difficult', '60 - 30 = 30', 'T'),
('difficult', '70 - 35 = 34', 'F'),
('difficult', '80 - 40 = 40', 'T'),
('difficult', '90 - 45 = 44', 'F'),
('easy', '2 * 2 = 4', 'T'),
('easy', '3 * 3 = 9', 'T'),
('easy', '4 * 4 = 16', 'T'),
('easy', '5 * 5 = 24', 'F'),
('easy', '6 * 6 = 36', 'T'),
('average', '7 * 7 = 48', 'F'),
('average', '8 * 8 = 64', 'T'),
('average', '9 * 9 = 80', 'F'),
('average', '10 * 10 = 100', 'T'),
('difficult', '11 * 11 = 120', 'F'),
('difficult', '12 * 12 = 144', 'T'),
('easy', '7 * 1 = 7', 'T'),
('easy', '8 * 1 = 8', 'T'),
('easy', '9 * 1 = 9', 'T'),
('easy', '10 * 1 = 10', 'T');