-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 09, 2017 at 04:10 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `emd`
--

-- --------------------------------------------------------

--
-- Table structure for table `carddetails`
--

CREATE TABLE `carddetails` (
  `id` int(11) NOT NULL,
  `cardNumber` text NOT NULL,
  `expiry` date NOT NULL,
  `cardHolder` text NOT NULL,
  `cvv` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `carddetails`
--

INSERT INTO `carddetails` (`id`, `cardNumber`, `expiry`, `cardHolder`, `cvv`) VALUES
(2, '1234567812345678', '2018-01-01', 'Sanjay George', '552'),
(3, '1234567887654321', '2017-05-30', 'John Smith', '102'),
(4, '456789123456', '2017-06-01', 'Some Guy', '007'),
(5, '546789123456', '2017-06-01', 'Hans Zimmer', '007');

-- --------------------------------------------------------

--
-- Table structure for table `diseases`
--

CREATE TABLE `diseases` (
  `d_id` int(11) NOT NULL,
  `d_bodypart` varchar(25) NOT NULL,
  `d_symptoms` text NOT NULL,
  `d_disease` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `diseases`
--

INSERT INTO `diseases` (`d_id`, `d_bodypart`, `d_symptoms`, `d_disease`) VALUES
(1, '', 'Coughing', 'Tuberculosis'),
(1, '', 'Fatigue', 'Tuberculosis'),
(1, '', 'Loss of appetite', 'Tuberculosis'),
(1, '', 'Night sweats', 'Tuberculosis'),
(1, '', 'Chills', 'Tuberculosis'),
(1, '', 'Fever', 'Tuberculosis'),
(2, '', 'Excessive urination', 'Diabetes'),
(2, '', 'Blurred vision', 'Diabetes'),
(2, '', 'Excessive thirst', 'Diabetes'),
(2, '', 'Weight loss', 'Diabetes'),
(2, '', 'Fatigue', 'Diabetes'),
(3, '', 'Fever', 'Influenza'),
(3, '', 'Chills', 'Influenza'),
(3, '', 'Cough', 'Influenza'),
(3, '', 'Headache', 'Influenza'),
(3, '', 'Muscle pain', 'Influenza'),
(3, '', 'Fatigue', 'Influenza'),
(3, '', 'Sore throat', 'Influenza'),
(4, '', 'Joint redness', 'Arthritis'),
(4, '', 'Joint swelling', 'Arthritis'),
(4, '', 'Joint tenderness', 'Arthritis'),
(4, '', 'Limping', 'Arthritis'),
(4, '', 'Stiffness', 'Arthritis'),
(4, '', 'Weakness', 'Arthritis'),
(5, '', 'Abdominal pain', 'Diaherria'),
(5, '', 'Cramping', 'Diaherria'),
(5, '', 'Loose motions', 'Diaherria'),
(5, '', 'Dehydration', 'Diaherria'),
(6, '', 'Cough', 'Conjunctivitis'),
(6, '', 'Earache', 'Conjunctivitis'),
(6, '', 'Eye discharge', 'Conjunctivitis'),
(6, '', 'Eye pain', 'Conjunctivitis'),
(6, '', 'Eye redness', 'Conjunctivitis'),
(6, '', 'Itching eyes', 'Conjunctivitis'),
(6, '', 'Runny nose', 'Conjunctivitis'),
(6, '', 'Sinus', 'Conjunctivitis'),
(6, '', 'Congestion', 'Conjunctivitis'),
(6, '', 'Swollen eyelids', 'Conjunctivitis'),
(6, '', 'Tearing', 'Conjunctivitis'),
(7, '', 'Jaundice', 'Hepatitis'),
(7, '', 'Abdominal pain', 'Hepatitis'),
(7, '', 'Loss of appetite', 'Hepatitis'),
(7, '', 'Nausea', 'Hepatitis'),
(7, '', 'Vomiting', 'Hepatitis'),
(7, '', 'Diarrhea', 'Hepatitis'),
(7, '', 'Fever', 'Hepatitis'),
(8, '', 'Chills', 'Meningitis'),
(8, '', 'High fever', 'Meningitis'),
(8, '', 'Loss of appetite', 'Meningitis'),
(8, '', 'Lethargy', 'Meningitis'),
(8, '', 'Rashes', 'Meningitis'),
(8, '', 'Stiffness', 'Meningitis'),
(8, '', 'Nausea', 'Meningitis'),
(8, '', 'Increased Heart rate', 'Meningitis'),
(8, '', 'Headache', 'Meningitis'),
(10, '', 'Loss of voice', 'Laryngitis'),
(10, '', 'Weakened voice', 'Laryngitis'),
(10, '', 'Hoarse', 'Laryngitis'),
(10, '', 'Dry throat', 'Laryngitis'),
(10, '', 'Minor throat irritation', 'Laryngitis'),
(10, '', 'Dry cough', 'Laryngitis'),
(11, '', 'Sudden high fever', 'Strep throat'),
(11, '', 'Sore red throat', 'Strep throat'),
(11, '', 'Headache', 'Strep throat'),
(11, '', 'Chills', 'Strep throat'),
(11, '', 'Loss of appetite', 'Strep throat'),
(11, '', 'Trouble swallowing', 'Strep throat'),
(12, '', 'Night sweats', 'Leukemia'),
(12, '', 'Joint pain', 'Leukemia'),
(12, '', 'Pain in bones', 'Leukemia'),
(12, '', 'Chills', 'Leukemia'),
(12, '', 'Fever', 'Leukemia'),
(12, '', 'Loss of appetite', 'Leukemia'),
(12, '', 'Fatigue', 'Leukemia'),
(12, '', 'Sweating', 'Leukemia'),
(12, '', 'Weakness', 'Leukemia'),
(12, '', 'Dizziness', 'Leukemia'),
(12, '', 'Diarrhea', 'Leukemia'),
(12, '', 'Shortness of breath', 'Leukemia'),
(12, '', 'Pale skin', 'Leukemia'),
(13, '', 'Chest pain', 'Stomach Ulcers'),
(13, '', 'Abdominal pain', 'Stomach Ulcers'),
(13, '', 'Belching', 'Stomach Ulcers'),
(13, '', 'Heart burn', 'Stomach Ulcers'),
(13, '', 'Fatigue', 'Stomach Ulcers'),
(13, '', 'Nausea', 'Stomach Ulcers'),
(14, '', 'Learning disorders', 'William''s Syndrome'),
(14, '', 'Attention deficiency', 'William''s Syndrome'),
(14, '', 'Feeding problems', 'William''s Syndrome'),
(14, '', 'Phobias', 'William''s Syndrome'),
(14, '', 'Speech delays', 'William''s Syndrome'),
(14, '', 'Sunken chest', 'William''s Syndrome'),
(14, '', 'Farsightedness', 'William''s Syndrome'),
(14, '', 'Kidney abnormalities', 'William''s Syndrome'),
(15, '', 'Fatigue', 'Stroke'),
(15, '', 'Dizziness', 'Stroke'),
(15, '', 'Nausea', 'Stroke'),
(15, '', 'Sweating', 'Stroke'),
(15, '', 'Pain between shoulder blades', 'Stroke'),
(15, '', 'Shortness of breath', 'Stroke'),
(15, '', 'Back pain', 'Stroke'),
(15, '', 'Jaw pain', 'Stroke'),
(15, '', 'Chest pain', 'Stroke'),
(15, '', 'Severe headache', 'Stroke'),
(16, '', 'Chills', 'Malaria'),
(16, '', 'Fever', 'Malaria'),
(16, '', 'Headache', 'Malaria'),
(16, '', 'Shivering', 'Malaria'),
(16, '', 'Sweating', 'Malaria'),
(16, '', 'Fatigue', 'Malaria'),
(16, '', 'Pallor', 'Malaria'),
(16, '', 'Fast heart rate', 'Malaria'),
(16, '', 'Muscle pain', 'Malaria'),
(17, '', 'Slowness of voluntary movements', 'Parkinson''s Disease'),
(17, '', 'Decreased facial expressions', 'Parkinson''s Disease'),
(17, '', 'Stooped posture', 'Parkinson''s Disease'),
(17, '', 'Unsteady posture', 'Parkinson''s Disease'),
(17, '', 'Abnormal Tone', 'Parkinson''s Disease'),
(17, '', 'Stiffness', 'Parkinson''s Disease'),
(17, '', 'Swelling', 'Parkinson''s Disease'),
(17, '', 'Light headedness', 'Parkinson''s Disease'),
(17, '', 'Fainting', 'Parkinson''s Disease'),
(18, '', 'Shortness of breath', 'Asthma'),
(18, '', 'Chest tightness', 'Asthma'),
(18, '', 'Fast heart rate', 'Asthma'),
(18, '', 'Breathing difficulty', 'Asthma'),
(18, '', 'Rapid breathing', 'Asthma'),
(18, '', 'Anxiety', 'Asthma'),
(18, '', 'Wheezing', 'Asthma'),
(18, '', 'Chest pain', 'Asthma');

-- --------------------------------------------------------

--
-- Table structure for table `medicine`
--

CREATE TABLE `medicine` (
  `m_id` int(11) NOT NULL,
  `m_disease` varchar(255) NOT NULL,
  `m_agegroup` varchar(255) NOT NULL,
  `m_medicine` varchar(255) NOT NULL,
  `m_dosage` varchar(255) NOT NULL,
  `m_cost` float NOT NULL,
  `m_quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `medicine`
--

INSERT INTO `medicine` (`m_id`, `m_disease`, `m_agegroup`, `m_medicine`, `m_dosage`, `m_cost`, `m_quantity`) VALUES
(1, 'Tuberculosis', '18-60', 'Isoniazid', '300mg', 25.5, 50),
(1, 'Tuberculosis', '16-40', 'Rifampin', '450mg', 55.05, 20),
(1, 'Tuberculosis', '2-16', 'Streptomycin', '1gm', 10, 100),
(2, 'Diabetes', '18-60', 'Glyciphage ', '550mg', 25.5, 30),
(2, 'Diabetes', '16-80', 'Amaryl', '3mg', 125, 15),
(2, 'Diabetes', '15-70', 'Chlorpropamide', '50mg', 5, 100),
(3, 'Influenza', '18-40', 'zanamivir', '100mg', 100, 15),
(3, 'Influenza', '18-70', 'oseltamivir phosphate', '75mg', 1000, 10),
(3, 'Influenza', '2-70', 'peramivir', '600mg', 250, 10),
(4, 'Arthritis', '10-70', 'NSAIDs', '500mg', 200, 30),
(4, 'Arthritis', '10-70', 'Acetaminophen', '500mg', 350, 20),
(5, 'Diarrhea', '15-50', 'Imodium', '2mg', 13.5, 50),
(5, 'Diarrhea', '10-70', 'Kaopectate', '350mg', 300, 30),
(5, 'Diarrhea', '15-50', '\r\nLoperamide', '2mg', 10, 50),
(6, 'Conjunctivitis', '15-70', 'Sulfacetamide', '10ml', 15, 50),
(6, 'Conjunctivitis', '10-70', 'moxifloxacin', '10mL', 70, 40),
(6, 'Conjunctivitis', '10-70', '\r\nAerosporin', '5L', 250, 40),
(6, 'Conjunctivitis', '5-50', 'Elucin', '60mL', 25, 40),
(7, 'Hepatitis', '18-75', 'Cytocom', '150mg', 200, 30),
(7, 'Hepatitis', '5-80', 'Adfovir', '150mg', 150, 30),
(7, 'Hepatitis', '30-80', '\r\nEntavir', '1mg', 700, 20),
(8, 'Meningitis', '10-70', 'Cefotim', '250mg', 15, 50),
(8, 'Meningitis', '10-50', 'Ampicillin', '250mg', 70, 30),
(8, 'Meningitis', '18-80', 'Ancomycin', '500mg', 300, 20),
(10, 'laryngitis', '20-70', 'paracetamol', '500mg', 25, 100),
(10, 'laryngitis', '15-60', 'ibuprofen', '400mg', 30, 70),
(10, 'laryngitis', '17-70', 'aspirin', '150mg', 20, 40),
(11, 'Strep throat', '20-80', 'Advil', '100mg', 50, 50),
(11, 'Strep throat', '15-60', 'Motrin', '400mg', 70, 60),
(11, 'Strep throat', '10-70', 'Aleve', '150mg', 50, 40),
(12, 'Leukemia', '20-60', 'cyclophosphamide', '500mg', 60, 30),
(12, 'Leukemia', '20-50', 'alemtuzumab ', '150mg', 1000, 20),
(12, 'Leukemia', '18-60', 'rituximab', '10mL', 7500, 15),
(13, 'Stomach Ulcers', '15-60', ' amoxicillin', '250mg', 200, 40),
(13, 'Stomach Ulcers', '20-50', 'clarithromycin', '250mg', 110, 45),
(13, 'Stomach Ulcers', '15-70', 'lansoprazole', '30mg', 40, 50),
(15, 'Stroke', '20-60', 'Aspirin', '75mg', 50, 100),
(15, 'Stroke', '20-70', 'Aggrenox', '25mg', 2000, 20),
(15, 'Stroke', '20-70', 'Plavix', '75mg', 1500, 20),
(16, 'malaria', '15-70', 'Chloroquine', '250mg', 15, 60),
(16, 'malaria', '10-60', 'Mefloquine', '250mg', 300, 30),
(16, 'malaria', '10-80', 'Malarone', '150mg', 500, 20),
(17, 'Parkinson''s Disorder', '18-65', 'Levodopa', '250mg', 30, 50),
(17, 'Parkinson''s Disorder', '10-80', 'Sinemet', '150mg', 780, 45),
(18, 'Asthma', '10-50', 'Theophylline', '100mg', 60, 50),
(18, 'Asthma', '15-60', 'fluticasone', '250mg', 300, 30),
(18, 'Asthma', '18-60', 'Terbutaline', '100mL', 40, 25);

-- --------------------------------------------------------

--
-- Table structure for table `orderdetails`
--

CREATE TABLE `orderdetails` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `medicine` text NOT NULL,
  `quantity` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orderdetails`
--

INSERT INTO `orderdetails` (`id`, `order_id`, `u_id`, `medicine`, `quantity`, `total`) VALUES
(1, 23767223, 1, 'Acetaminophen', 1, '350.00'),
(2, 23767223, 1, ' amoxicillin', 1, '200.00'),
(3, 44054295, 1, 'Acetaminophen', 2, '700.00'),
(4, 44054295, 1, ' amoxicillin', 2, '400.00'),
(5, 53338190, 1, 'Acetaminophen', 2, '700.00'),
(6, 53338190, 1, ' amoxicillin', 1, '200.00'),
(107, 33484294, 1, 'Acetaminophen', 1, '350.00'),
(108, 33484294, 1, 'Adfovir', 1, '150.00'),
(109, 33484294, 1, ' amoxicillin', 1, '200.00'),
(110, 52287286, 1, 'Acetaminophen', 3, '1050.00'),
(111, 52287286, 1, 'Adfovir', 3, '450.00'),
(112, 52287286, 1, ' amoxicillin', 1, '200.00'),
(113, 99445091, 1, 'Chlorpropamide', 1, '5.00'),
(114, 99445091, 1, 'peramivir', 3, '750.00'),
(115, 99445091, 1, 'NSAIDs', 1, '200.00'),
(116, 99445091, 1, 'Acetaminophen', 3, '1050.00'),
(117, 99445091, 1, 'aspirin', 1, '20.00'),
(118, 99445091, 1, 'Motrin', 1, '70.00'),
(119, 99445091, 1, 'lansoprazole', 3, '120.00'),
(120, 99445091, 1, 'Aspirin', 1, '50.00'),
(121, 99445091, 1, 'Levodopa', 1, '30.00'),
(122, 12684769, 1, 'Chlorpropamide', 1, '5.00'),
(123, 12684769, 1, 'zanamivir', 1, '100.00'),
(124, 12684769, 1, 'Motrin', 1, '70.00'),
(125, 12684769, 1, 'cyclophosphamide', 3, '180.00'),
(126, 12684769, 1, 'clarithromycin', 1, '110.00'),
(127, 12684769, 1, 'Mefloquine', 5, '1500.00'),
(128, 12684769, 1, 'Sinemet', 1, '780.00'),
(129, 12684769, 1, 'Terbutaline', 1, '40.00'),
(130, 47776736, 1, 'Rifampin', 4, '220.20'),
(131, 47776736, 1, 'Streptomycin', 1, '10.00'),
(132, 78482913, 1, 'Isoniazid', 2, '51.00');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `name` text NOT NULL,
  `email` text NOT NULL,
  `contact` text NOT NULL,
  `address` text NOT NULL,
  `pincode` text NOT NULL,
  `totalAmount` decimal(10,2) NOT NULL,
  `payStatus` int(11) NOT NULL DEFAULT '0',
  `order_id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`name`, `email`, `contact`, `address`, `pincode`, `totalAmount`, `payStatus`, `order_id`, `u_id`) VALUES
('Sanjay George', 'sanjaygeorge16@gmail.com', '778897789', 'blue hill, 123 road, California', '998856', '2785.00', 1, 12684769, 1),
('Sanjay George', 'sanjaygeorge16@gmail.com', '9558661237', 'Svnit, Surat', '395007', '2663.50', 1, 20995957, 0),
('divy shit', 'divya@lazy.com', '9788225522', 'bb ds adf daf dasf', '123456', '2490.00', 1, 31462892, 0),
('Will Smith', 'willy@wonka.com', '9238827700', 'address, road, street, world, universe', '500050', '525.00', 1, 32489193, 0),
('Some Random Patel', 'patel@gmail.com', '7550014239', 'Surat, Gujarat, India', '385662', '160.00', 1, 47465949, 0),
('', '', '', '', '', '230.20', 0, 47776736, 1),
('John Doe', 'john@gmail.com', '9586778823', 'Bhutan', '778988', '280.00', 1, 48352623, 0),
('sanjay george', 'sanjaygeorge16@gmail.com', '123456789', 'some address , svnit, surat', '395001', '1700.00', 1, 52287286, 1),
('Bradley ', 'bradley@cooper.com', '9999999999999999', 'machan house, kakkanad, kerala', '395007', '150.00', 0, 75576333, 0),
('john smith', 'sanjaygeorge16@gmail.com', '9898989898', 'hdf dfaf ad fad f adf', '395007', '51.00', 1, 78482913, 1),
('Sanjay George', 'sanjaygeorge16@gmail.com', '993729012', 'Building, street, city', '123456', '2295.00', 1, 99445091, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `u_id` int(11) NOT NULL,
  `u_name` text NOT NULL,
  `u_email` text NOT NULL,
  `u_pass` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`u_id`, `u_name`, `u_email`, `u_pass`) VALUES
(1, 'SANJAY', 'sanjaygeorge16@gmail.com', '766c32f42272064af1740dd974e3e47e'),
(2, 'New person', 'sadf@dasf.com', '823647ffddff7c7ab1dd1a1230f59c47');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carddetails`
--
ALTER TABLE `carddetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carddetails`
--
ALTER TABLE `carddetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `orderdetails`
--
ALTER TABLE `orderdetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
