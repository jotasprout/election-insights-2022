-- --------------------------------------------------------

CREATE TABLE candidates2016 (
  candidateID int(2) NOT NULL,
  candidateName varchar(72) NOT NULL,
  PRIMARY KEY (candidateID)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------
--
-- Dumping data for table `candidates2016`
--

INSERT INTO candidates2016 (candidateID, candidateName) VALUES 
(01,'Frank Atwood'), 
(02,'Darrell L. Castle'), 
(03,'Hillary Clinton'), 
(04,'Scott Copeland'), 
(05,'Roque "Rocky" De La Fuente'), 
(06,'Richard Duncan'), 
(07,'Rocky Giordani'), 
(08,'James "Jim" Hedges'), 
(09,'Tom Hoefling'), 
(10,'Princess Jacob'), 
(11,'Gary Johnson'), 
(12,'Lynn S. Kahn'), 
(13,'Chris Keniston'), 
(14,'Alyson Kennedy'), 
(15,'Kyle Kenley Kopitke'), 
(16,'Laurence Kotlikoff'), 
(17,'Gloria Estela La Riva'), 
(18,'Bradford Lyttle'), 
(19,'Joseph Allen Maldonado'), 
(20,'Michael A. Maturen'), 
(21,'Evan McMullin'), 
(22,'Monica Moorehead'), 
(23,'Ryan Alan Scott'), 
(24,'Rod Silva'), 
(25,'Peter Skewes'), 
(26,'Mike Smith'), 
(27,'Emidio Soltysik'), 
(28,'Jill Stein'), 
(29,'Donald J. Trump'), 
(30,'Dan R. Vacek'), 
(31,'Jerry White');