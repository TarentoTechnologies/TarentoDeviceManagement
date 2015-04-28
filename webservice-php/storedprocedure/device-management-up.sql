-- MySQL dump 10.13  Distrib 5.5.41, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: device-management
-- ------------------------------------------------------
-- Server version	5.5.41-0ubuntu0.14.04.1
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Dumping routines for database 'device-management'
--
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `addDeviceDetails`(IN `device_id` VARCHAR(100), IN `make` VARCHAR(200), IN `name` VARCHAR(100), IN `type` VARCHAR(100), IN `os` VARCHAR(50), IN `IMEI` VARCHAR(100), IN `accessoryinfo` VARCHAR(300), IN `created_at` DATETIME, OUT `addDeviceResponse` INT, IN `empId` VARCHAR(10), IN `purpose` VARCHAR(200), IN `comments` VARCHAR(300), IN `device_status` TINYINT)
    NO SQL
BEGIN





DECLARE addDeviceResp INT;

DECLARE userID INT;

DECLARE lastUserID INT;


DECLARE exit handler for sqlexception
  BEGIN
   ROLLBACK;
  END;

START TRANSACTION;

insert into deviceinfo(device_id,make,name,type,os,IMEI,accessoryinfo,created_at) values(device_id,make,name,type,os,IMEI,accessoryinfo,created_at);

select LAST_INSERT_ID() into addDeviceResponse;

SET addDeviceResp=addDeviceResponse;

IF exists(Select 1 From users Where unique_id = empId)
THEN

select id into userID from users where unique_id = empId;

insert into device_holder_info(device_id,user_id,purpose,comments,device_status)values(addDeviceResp,userID,purpose,comments,device_status);

ELSE

insert into users(unique_id,pin) values(empId,"1111");


select LAST_INSERT_ID() into lastUserID;


insert into device_holder_info(device_id,user_id,purpose,comments,device_status)values(addDeviceResp,lastUserID,purpose,comments,device_status);


END IF;

COMMIT;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `change_pin`(IN `employee_id` VARCHAR(50), IN `old_pin` INT(50), IN `new_pin` INT(50))
    NO SQL
BEGIN

IF(exists(select 1 from users where unique_id=employee_id AND pin=old_pin)) 
THEN

update users set pin=new_pin where unique_id=employee_id AND pin=old_pin;

select 1;

ELSE

select 0;

END IF;



END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `device_transfer`(IN `mid` VARCHAR(100), IN `old_owner_id` VARCHAR(20), IN `old_owner_pin` VARCHAR(100), IN `new_owner_id` VARCHAR(100), IN `new_owner_pin` VARCHAR(100))
    NO SQL
BEGIN

DECLARE deviceId BIGINT;
DECLARE oldUserId BIGINT;
DECLARE newUserId BIGINT;

IF(exists(select 1 from deviceinfo where IMEI=mid) && exists(select 1 from users where unique_id=old_owner_id AND pin=old_owner_pin) && exists(select 1 from users where unique_id=new_owner_id AND pin=new_owner_pin)) THEN
SELECT id INTO deviceId from deviceinfo where IMEI=mid;
SELECT id INTO oldUserId from users where unique_id=old_owner_id AND pin=old_owner_pin;
SELECT id INTO newUserId from users  where unique_id=new_owner_id AND pin=new_owner_pin;

#select "welcome";
 
IF(exists(select 1 from device_holder_info where 
         device_id=deviceId AND user_id=oldUserId AND (device_status="Assigned" OR device_status="Available"))) THEN

UPDATE device_holder_info set device_status=2,device_released_date=NOW() where 
         device_id=deviceId AND user_id=oldUserId;

insert into device_holder_info(device_id,user_id,purpose,comments,device_status,device_assigned_date)values(deviceId,newUserId,'','',1,NOW());

select 2;

ELSE


select 0;



END IF;

ELSE

select 1;

END IF;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-04-28 11:04:33
