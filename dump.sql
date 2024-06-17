
START TRANSACTION;

INSERT INTO users VALUES(1,'Manuel','rojas.manuelr@gmail.com',NULL,'$2y$12$yVvS94/kxYf03XLQLBBryeletexHrMwt.qn76zBCLsXcAk26IKNLa','ZRCBuWgwWioRc8DwBLBiHnKa9nDoM13kYTWCHZBgynVHAIWbw1OmE8zHF6hn','2024-06-09 19:14:58','2024-06-09 19:14:58');
INSERT INTO bancos VALUES(1,'Galicia','2024-06-09 19:27:58','2024-06-09 19:27:58');
INSERT INTO bancos VALUES(2,'HSBC','2024-06-09 19:28:07','2024-06-09 19:28:07');
INSERT INTO cuentas VALUES(1,1,'USD',1000.0,'2024-06-09 19:28:36','2024-06-09 19:28:36');
INSERT INTO cuentas VALUES(2,1,'ARS',1000.0,'2024-06-09 19:28:43','2024-06-09 19:28:43');
INSERT INTO cuentas VALUES(3,2,'USD',1000.0,'2024-06-09 19:28:50','2024-06-09 19:28:50');
INSERT INTO cuentas VALUES(4,2,'ARS',1000.0,'2024-06-09 19:28:57','2024-06-09 19:28:57');
INSERT INTO instrumentos VALUES(1,'Wells Fargo','WFCD','WFC',5,'2024-06-09 21:43:41','2024-06-10 17:05:54',12.6999999999999992,15120.0);
INSERT INTO instrumentos VALUES(2,'BERKSHIRE HATHAWAY INC','brkbd','brkb',22,'2024-06-09 21:45:18','2024-06-10 17:05:56',19.1499999999999985,24433.0);
INSERT INTO instrumentos VALUES(3,'Amazon','AMZND','AMZN',144,'2024-06-09 22:08:16','2024-06-10 17:05:58',1.34000000000000008,1707.5);
INSERT INTO instrumentos VALUES(4,'Google','GOGLD','GOOGL',58,'2024-06-09 22:08:55','2024-06-10 17:06:00',3.14999999999999991,3950.0);
INSERT INTO instrumentos VALUES(5,'Microsoft','MSFTD','MSFT',30,'2024-06-09 22:09:34','2024-06-10 17:06:04',14.5999999999999996,18621.0);
INSERT INTO instrumentos VALUES(6,'Apple','AAPLD','AAPL',20,'2024-06-09 22:09:59','2024-06-10 17:06:06',9.99000000000000021,12596.0);
INSERT INTO instrumentos VALUES(7,'Facebook / Meta','METAD','META',24,'2024-06-09 22:10:37','2024-06-10 17:06:08',21.5,27301.5);
INSERT INTO instrumentos VALUES(8,'SPY SPDR S&P 500','SPYD','SPY',20,'2024-06-09 22:11:17','2024-06-10 17:06:10',27.6000000000000014,34963.0);
INSERT INTO instrumentos VALUES(9,'Bank of America','BA.CD','BA.C',4,'2024-06-09 22:11:57','2024-06-10 17:06:12',10.0999999999999996,12988.0);
INSERT INTO instrumentos VALUES(10,'XLE','XLED','XLE',4,'2024-06-09 22:12:37','2024-06-10 17:06:17',46.3999999999999985,59288.5);
INSERT INTO instrumentos VALUES(11,'Coca Cola','KOD','KO',5,'2024-06-09 22:12:58','2024-06-10 17:06:19',12.9000000000000003,16634.5);
INSERT INTO instrumentos VALUES(12,'Walmart','WMTD','WMT',18,'2024-06-09 22:13:27','2024-06-10 17:06:21',3.85999999999999987,4846.0);
INSERT INTO instrumentos VALUES(13,'Vista Energy','VISTD','VIST',3,'2024-06-09 22:13:51','2024-06-10 17:06:23',15.0,19272.5);
INSERT INTO instrumentos VALUES(14,'Nu Holding','NUD','NU',2,'2024-06-09 22:14:43','2024-06-10 17:06:25',6.26999999999999957,7779.5);
INSERT INTO operacion VALUES(1,1,'2021-10-19','C',39,1.0,429.670000000000015,83618.0,1,'2024-06-09 21:55:56','2024-06-10 00:54:02');
INSERT INTO operacion VALUES(2,13,'2024-03-03','C',23,1.0,297.569999999999993,302032.71000000002,1,'2024-06-10 00:49:03','2024-06-10 00:49:03');
INSERT INTO operacion VALUES(3,13,'2024-03-20','C',12,1.0,182.50999999999999,189264.269999999989,1,'2024-06-10 00:49:59','2024-06-10 00:49:59');
INSERT INTO operacion VALUES(4,13,'2024-03-22','C',24,1.0,368.339999999999974,381600.0,1,'2024-06-10 00:50:50','2024-06-10 00:50:50');
INSERT INTO operacion VALUES(5,13,'2024-05-31','C',13,1.0,220.129999999999995,267457.010000000009,1,'2024-06-10 00:51:31','2024-06-10 00:51:31');
INSERT INTO operacion VALUES(6,1,'2022-03-15','C',12,1.0,124.560000000000002,24042.0,1,'2024-06-10 00:54:54','2024-06-10 00:54:54');
INSERT INTO operacion VALUES(7,3,'2022-01-19','C',240,1.0,310.54000000000002,59877.8600000000005,1,'2024-06-09 23:19:01','2024-06-09 23:19:01');
INSERT INTO operacion VALUES(8,6,'2022-01-19','C',32,1.0,293.610000000000013,59366.4199999999982,1,'2024-06-09 23:21:47','2024-06-09 23:21:47');
INSERT INTO operacion VALUES(9,9,'2021-10-19','C',36,1.0,439.620000000000004,87219.8500000000058,1,'2024-06-10 00:10:59','2024-06-10 00:10:59');


COMMIT;