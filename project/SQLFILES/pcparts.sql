CREATE DATABASE /*!32312 IF NOT EXISTS*/ `pcparts` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE 'pcparts';

DROP TABLE IF EXISTS `makers`;

CREATE TABLE makers (
  brand VARCHAR (30),
  type VARCHAR (15),
  directLink VARCHAR (60),
  PRIMARY KEY (brand, type)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `makers` WRITE;
INSERT INTO makers (brand, type, directLink)
VALUES
  ('Intel','cpu','https://www.intel.com/content/www/us/en/homepage.html'),
  ('AMD','cpu','http://www.amd.com/en/home'),
  ('AMD','gpu','http://www.amd.com/en/home'),
  ('ASROCK','motherboard','http://www.asrock.com/index.asp'),
  ('BIOSTAR','motherboard','http://www.biostar-usa.com/app/en-us/'),
  ('GIGABYTE','gpu','http://www.gigabyte.us/'),
  ('ASUS','gpu','https://www.asus.com/us/'),
  ('PNY','gpu','https://www.pny.com/'),
  ('EVGA','gpu','https://www.evga.com/'),
  ('MSI','gpu','https://us.msi.com/'),
  ('ZOTAC','gpu','https://www.zotac.com/'),
  ('G.SKILL','ram','https://www.gskill.com/en/'),
  ('CORSAIR','ram','http://www.corsair.com/en-us'),
  ('TEAM','ram','http://www.teamgroupinc.com/en/index.php');
UNLOCK TABLES;


CREATE TABLE socketType (
  socket VARCHAR (12),
  PRIMARY KEY(socket)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `socketType` WRITE;
INSERT INTO socketType (socket)
VALUES
  ('AM4'),
  ('LGA 1151'),
  ('LGA 2066'),
  ('LGA 2011-v3');
UNLOCK TABLES;

CREATE TABLE ramSpeed (
  speed INT,
  type VARCHAR (15),
  PRIMARY KEY (speed)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `ramSpeed` WRITE;
INSERT INTO ramSpeed (speed, type)
VALUES
  (4333,'288-Pin DDR4'),
  (4266,'288-Pin DDR4'),
  (4200,'288-Pin DDR4'),
  (4133,'288-Pin DDR4'),
  (4000,'288-Pin DDR4'),
  (3866,'288-Pin DDR4'),
  (2400,'240-Pin DDR3'),
  (2133,'240-Pin DDR3');
UNLOCK TABLES;

CREATE TABLE gpumem (
  gpu VARCHAR (30),
  memory INT,
  memoryType VARCHAR (10),
  memoryInterface INT,
  PRIMARY KEY (gpu)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `gpumem` WRITE;
INSERT INTO gpumem (gpu, memory, memoryType, memoryInterface)
VALUES
  ('GeForce GTX 1080 Ti',11,'GDDR5X',352),
  ('GeForce GTX 1080',8,'GDDR5X',256),
  ('GeForce GTX 1060',3,'GDDR5X',192),
  ('GeForce GTX 1050',2,'GDDR5',128),
  ('Radeon Vega Frontier Edition',16,'HBM2',2048);
UNLOCK TABLES;

CREATE TABLE cpu (
  name VARCHAR(30),
  brand VARCHAR(5),
  gen VARCHAR(15),
  socket VARCHAR(12),
  core INT,
  thread INT,
  speed DECIMAL(2,1),
  lthree DOUBLE,
  tdp INT,
  price DECIMAL(6,2),
  series VARCHAR(12),
  turbo DECIMAL(2,1),
  ltwo DOUBLE,
  PRIMARY KEY(name),
  FOREIGN KEY (brand) REFERENCES makers (brand) ON DELETE CASCADE,
  FOREIGN KEY (socket) REFERENCES socketType (socket) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `cpu` WRITE;
INSERT INTO cpu (name, brand, gen, socket, core, thread, speed, lthree, tdp, price, series, turbo, ltwo)
VALUES
('7900X','Intel','SkyLakeX','LGA 2066',10,20,3.3,13.75,140,1059.99,'i9',4.3,10),
('7820X','Intel','SkyLakeX','LGA 2066',8,16,3.6,11,140,599.99,'i7',4.3,8),
('7800X','Intel','SkyLakeX','LGA 2066',6,12,3.5,8.25,140,529.99,'i7',4.0,6),
('7740X','Intel','KabyLakeX','LGA 2066',4,8,4.3,8,112,349.99,'i7', 4.5,4),
('7700K','Intel','KabyLake','LGA 1151',4,8,4.2,8,91,339.99,'i7', 4.5, 1),
('7700','Intel','KabyLake','LGA 1151',4,8,3.6,8,65,309.99,'i7',4.2,1),
('6700K','Intel','SkyLake','LGA 1151',4,8,4.0,8,91,329.99,'i7',4.2,1),
('6700','Intel','SkyLake','LGA 1151',4,8,3.4,8,65,304.99,'i7',4.0, 1),
('6950X','Intel','Broadwell-E','LGA 2011-v3',10,20,3.0,25,140,1730.37,'i7',3.5,2.56),
('6900K','Intel','Broadwell-E','LGA 2011-v3',8,16,3.2,20,140,1049.99,'i7',3.7,2),
('6850K','Intel','Broadwell-E','LGA 2011-v3',6,12,3.6,15,140,389.99,'i7',3.8,1.5),
('6800K','Intel','Broadwell-E','LGA 2011-v3',6,12,3.4,15,140,349.99,'i7',3.6,1.5),
('7640X','Intel','KabyLakeX','LGA 2066',4,4,4.0,6,112,249.99,'i5',4.2,4),
('7600K','Intel','KabyLake','LGA 1151',4,4,3.8,6,91,239.99,'i5',4.2,1),
('7600','Intel','KabyLake','LGA 1151',4,4,3.5,6,65,229.99,'i5',4.1,1),
('7500','Intel','KabyLake','LGA 1151',4,4,3.4,6,65,209.99,'i5',3.8,1),
('7400','Intel','KabyLake','LGA 1151',4,4,3.0,6,65,189.99,'i5',3.5,1),
('6600K','Intel','SkyLake','LGA 1151',4,4,3.5,6,91,234.99,'i5',3.9,1),
('6600','Intel','SkyLake','LGA 1151',4,4,3.3,6,65,219.99,'i5',3.9,1),
('6500','Intel','SkyLake','LGA 1151',4,4,3.2,6,65,204.99,'i5',3.6,1),
('6400','Intel','SkyLake','LGA 1151',4,4,2.7,6,65,184.99,'i5',3.3,1),
('7100','Intel','KabyLake','LGA 1151',2,4,3.9,3,51,129.99,'i3',null,0.5),
('7300','Intel','KabyLake','LGA 1151',2,4,4.0,4,51,149.99,'i3',null,0.5),
('7320','Intel','KabyLake','LGA 1151',2,4,4.1,4,51,159.99,'i3',null,0.5),
('7350K','Intel','KabyLake','LGA 1151',2,4,4.2,4,60,169.99,'i3',null,0.5),
('6100','Intel','SkyLake','LGA 1151',2,4,3.7,3,51,119.99,'i3',null,0.5),
('6300','Intel','SkyLake','LGA 1151',2,4,3.8,4,65,134.99,'i3',null,0.5),
('6320','Intel','SkyLake','LGA 1151',2,4,3.9,4,65,154.99,'i3',null,0.5),
('G4560','Intel','KabyLake','LGA 1151',2,4,3.5,3,54,59.99,'Pentium',null,0.5),
('G4600','Intel','KabyLake','LGA 1151',2,4,3.6,3,51,69.99,'Pentium',null,0.5),
('G4620','Intel','KabyLake','LGA 1151',2,4,3.7,3,51,79.99,'Pentium',null,0.5),
('G4400','Intel','SkyLake','LGA 1151',2,2,3.3,3,54,54.99,'Pentium',null,0.5),
('G4500','Intel','SkyLake','LGA 1151',2,2,3.5,3,65,64.99,'Pentium',null,0.5),
('G4520','Intel','SkyLake','LGA 1151',2,2,3.6,3,65,74.99,'Pentium',null,0.5),
('G3930','Intel','KabyLake','LGA 1151',2,2,2.9,2,51,39.99, 'Celeron',null,0.5),
('G3950','Intel','KabyLake','LGA 1151',2,2,3.0,2,51,49.99, 'Celeron',null,0.5),
('G3900','Intel','SkyLake','LGA 1151',2,2,2.8,2,65,34.99, 'Celeron',null,0.5),
('G3920','Intel','SkyLake','LGA 1151',2,2,2.9,2,65,44.99, 'Celeron',null,0.5),
('1950X','AMD','SummitRidge','AM4',16,32,3.4,32,180,999.99, 'ThreadRipper',4.0,8),
('1920X','AMD','SummitRidge','AM4',12,24,3.5,32,180,799.99, 'ThreadRipper',4.0,6),
('1800X','AMD','SummitRidge','AM4',8,16,4.0,16,95,459.99, 'Ryzen 7',4.0,4),
('1700X','AMD','SummitRidge','AM4',8,16,3.4,16,95,329.99, 'Ryzen 7',3.8,4),
('1700','AMD','SummitRidge','AM4',8,16,3.0,16,65,299.99, 'Ryzen 7',3.7,4),
('1600X','AMD','SummitRidge','AM4',6,12,3.6,16,95,229.99, 'Ryzen 5',4.0,3),
('1600','AMD','SummitRidge','AM4',6,12,3.2,16,65,214.99, 'Ryzen 5',3.6,3),
('1500X','AMD','SummitRidge','AM4',4,8,3.5,16,65,189.99, 'Ryzen 5',3.7,2),
('1400','AMD','SummitRidge','AM4',4,8,3.2,8,65,164.99, 'Ryzen 5',3.4,2),
('1300X','AMD','SummitRidge','AM4',4,4,3.5,8,65,129.99, 'Ryzen 3',3.7,2),
('1200','AMD','SummitRidge','AM4',4,4,3.1,8,65,109.99, 'Ryzen 3',3.4,2);
UNLOCK TABLES;

CREATE TABLE videoCard (
  name VARCHAR (30),
  brand VARCHAR (30),
  coreClock INT,
  gpu VARCHAR(30),
  price DECIMAL(6,2),
  PRIMARY KEY (name),
  FOREIGN KEY (brand) REFERENCES makers (brand) ON DELETE CASCADE,
  FOREIGN KEY (gpu) REFERENCES gpumem (gpu) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `videoCard` WRITE;
INSERT INTO videoCard (name, brand, coreClock, gpu, price)
VALUES
  ('1080tiA','ASUS',1480,'GeForce GTX 1080 Ti',739.77),
  ('1080tiE','EVGA',1556,'GeForce GTX 1080 Ti',749.99),
  ('1080tiG','GIGABYTE',1544,'GeForce GTX 1080 Ti',719.99),
  ('1080tiM','MSI',1506,'GeForce GTX 1080 Ti',729.99),
  ('1080tiP','PNY',1582,'GeForce GTX 1080 Ti',739.99),
  ('1080tiZ','ZOTAC',1569,'GeForce GTX 1080 Ti',759.99),
  ('1080A','ASUS',1695,'GeForce GTX 1080',578.99),
  ('1080E','EVGA',1708,'GeForce GTX 1080',549.99),
  ('1080G','GIGABYTE',1721,'GeForce GTX 1080',549.99),
  ('1080M','MSI',1771,'GeForce GTX 1080',579.99),
  ('1080P','PNY',1708,'GeForce GTX 1080',569.99),
  ('1080Z','ZOTAC',1620,'GeForce GTX 1080',539.99),
  ('1060A','ASUS',1594,'GeForce GTX 1060',259.77),
  ('1060E','EVGA',1506,'GeForce GTX 1060',219.99),
  ('1060G','GIGABYTE',1620,'GeForce GTX 1060',244.99),
  ('1060M','MSI',1544,'GeForce GTX 1060',229.99),
  ('1060P','PNY',1506,'GeForce GTX 1060',229.99),
  ('1060Z','ZOTAC',1506,'GeForce GTX 1060',249.99),
  ('1050A','ASUS',1404,'GeForce GTX 1050',129.99),
  ('1050E','EVGA',1354,'GeForce GTX 1050',114.99),
  ('1050G','GIGABYTE',1379,'GeForce GTX 1050',119.99),
  ('1050M','MSI',1354,'GeForce GTX 1050',119.99),
  ('1050P','PNY',1354,'GeForce GTX 1050',119.99),
  ('1050Z','ZOTAC',1354,'GeForce GTX 1050',109.99),
  ('vegaA','AMD',1382,'Radeon Vega Frontier Edition',999.99),
  ('vegalcA','AMD',1382,'Radeon Vega Frontier Edition',1499.99);
UNLOCK TABLES;

CREATE TABLE ram (
  name VARCHAR (30),
  brand VARCHAR (30),
  capacity INT,
  speed INT,
  timing VARCHAR (15),
  cas INT,
  price DECIMAL(6,2),
  PRIMARY KEY (name),
  FOREIGN KEY (brand) REFERENCES makers (brand) ON DELETE CASCADE,
  FOREIGN KEY (speed) REFERENCES ramSpeed (speed) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `ram` WRITE;
INSERT INTO ram (name, brand, capacity, speed, timing, cas, price)
VALUES
  ('4333venCOR','CORSAIR',16,4333,'19-26-26-46',19,319.99),
  ('4266venCOR','CORSAIR',16,4266,'19-26-26-46',19,329.99),
  ('4266triG.S','G.SKILL',16,4266,'19-19-19-39',19,251.99),
  ('4200venCOR','CORSAIR',8,4200,'19-26-26-46',19,199.99),
  ('4200triG.S','G.SKILL',8,4200,'19-26-26-46',19,384.99),
  ('4133venCOR','CORSAIR',32,4133,'19-25-25-45',19,489.99),
  ('4133triG.S','G.SKILL',16,4133,'19-19-19-39',19,240.99),
  ('4000domCOR','CORSAIR',8,4000,'19-23-23-45',19,159.99),
  ('4000venCOR','CORSAIR',64,4000,'19-23-23-45',19,799.99),
  ('4000ripG.S','G.SKILL',8,4000,'19-21-21-41',19,115.99),
  ('4000triG.S','G.SKILL',16,4000,'19-21-21-41',19,212.99),
  ('4000t-fTEA','TEAM',16,4000,'18-20-20-44',18,228.99),
  ('3866domCOR','CORSAIR',32,3866,'18-22-22-40',18,499.99),
  ('3866venCOR','CORSAIR',32,3866,'18-22-22-40',18,386.99),
  ('3866ripG.S','G.SKILL',8,3866,'18-22-22-42',18,109.99),
  ('3866triG.S','G.SKILL',32,3866,'18-19-19-39',18,483.99),
  ('3866t-fTEA','TEAM',16,3866,'18-20-20-44',19,207.99),
  ('2400domCOR','CORSAIR',8,2400,'11-13-13-31',11,89.99),
  ('2400venCOR','CORSAIR',8,2400,'11-13-13-31',11,69.99),
  ('2400areG.S','G.SKILL',8,2400,'11-13-13-31',11,64.99),
  ('2400ripG.S','G.SKILL',8,2400,'11-13-13-31',11,64.99),
  ('2400sniG.S','G.SKILL',8,2400,'11-13-13-31',11,65.99),
  ('2400triG.S','G.SKILL',8,2400,'10-12-12-31',10,85.99),
  ('2400darTEA','TEAM',16,2400,'11-13-13-35',11,104.99),
  ('2133venCOR','CORSAIR',8,2133,'11-12-12-27',11,69.99),
  ('2133areG.S','G.SKILL',8,2133,'11-11-11',11,63.99),
  ('2133ripG.S','G.SKILL',8,2133,'10-12-12-31',10,64.99),
  ('2133sniG.S','G.SKILL',8,2133,'10-12-12-31',10,65.99),
  ('2133triG.S','G.SKILL',16,2133,'9-11-11-31',9,122.99);
UNLOCK TABLES;

CREATE TABLE mobo (
  name VARCHAR (30),
  brand VARCHAR (30),
  socket VARCHAR (12),
  chipset VARCHAR (15),
  memoryCap INT,
  memoryStandard VARCHAR (10),
  usbPorts INT,
  PCI INT,
  price DECIMAL(6,2),
  type VARCHAR (5),
  PRIMARY KEY (name),
  FOREIGN KEY (brand) REFERENCES makers (brand) ON DELETE CASCADE,
  FOREIGN KEY (socket) REFERENCES socketType (socket) ON DELETE CASCADE,
  FOREIGN KEY (type) REFERENCES makers (brand) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `mobo` WRITE;
INSERT INTO mobo (name, brand, socket, chipset, memoryCap, memoryStandard, usbPorts, PCI, price, type)
VALUES
  ('am4B','BIOSTAR','AM4','X370',32,'DDR4',7,1,109.99,'AMD'),
  ('am4AR','ASROCK','AM4','B350',64,'DDR4',7,1,74.99,'AMD'),
  ('am4A','ASUS','AM4','B350',64,'DDR4',8,1,89.99,'AMD'),
  ('am4G','GIGABYTE','AM4','B350',64,'DDR4',7,1,109.99,'AMD'),
  ('am4M','MSI','AM4','B350',64,'DDR4',6,1,101.99,'AMD'),
  ('lga1151A','ASUS','LGA 1151', 'Z270',64,'DDR4',8,3,629.99,'Intel'),
  ('lga1151M','MSI','LGA 1151','Z170',64,'DDR4',7,3,546.99,'Intel'),
  ('lga1151G','GIGABYTE','LGA 1151','Z270',64,'DDR4',9,2,499.99,'Intel'),
  ('lga1151AS','ASROCK','LGA 1151','Z170',64,'DDR4',12,3,169.99,'Intel'),
  ('lga1151B','BIOSTAR','LGA 1151','Z270',64,'DDR4',9,3,154.99,'Intel'),
  ('lga2066A','ASUS','LGA 2066','X299',128,'DDR4',13,9,339.99,'Intel'),
  ('lga2066AS','ASROCK','LGA 2066','X299',128,'DDR4',11,4,389.99,'Intel'),
  ('lga2066G','GIGABYTE','LGA 2066','X299',128,'DDR4',12,5,249.99,'Intel'),
  ('lga2066M','MSI','LGA 2066','X299',128,'DDR4',13,4,399.99,'Intel'),
  ('lga2011-v3A','ASUS','LGA 2011-v3','X99',128,'DDR4',12,7,239.99,'Intel'),
  ('lga2011-v3AS','ASROCK','LGA 2011-v3','X99',128,'DDR4',13,5,329.99,'Intel'),
  ('lga2011-v3E','EVGA','LGA 2011-v3','X99',128,'DDR4',14,5,219.99,'Intel'),
  ('lga2011-v3G','GIGABYTE','LGA 2011-v3','X99',128,'DDR4',10,4,219.99,'Intel'),
  ('lga2011-v3M','MSI','LGA 2011-v3','X99',128,'DDR4',15,4,329.99,'Intel');
UNLOCK TABLES;
