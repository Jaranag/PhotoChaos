<?php

class Model
{
    protected $_dbh = null;
    protected $_table = "";

    public function __construct()
    {
        // conectamos a la base de datos
        try {
            $this->_dbh = new PDO(
                sprintf(
                    "%s:host=%s;dbname=%s",
                    "mysql",
                    "127.0.0.1:3306",
                    "photochaos"
                ),
                /*configurar con las credenciales que toquen*/
                "root",  //user
                "", //password
                array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
            );
        } catch (PDOException $ex) {
            //sino existe, la creamos
            $this->_dbh = new PDO(
                sprintf(
                    "%s:host=%s;dbname=%s",
                    "mysql",
                    "127.0.0.1:3306",
                    "photochaos"
                ),
                /*configurar con las credenciales que toquen*/
                "root", //user
                "", //password
                array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
            );

            $this->createDB();
            $this->createTables();
        }
    }

    public function createDB()
    {
        $sql = "CREATE DATABASE  IF NOT EXISTS `photochaos`; 
		USE `photochaos`;";

        $this->_dbh->exec($sql);
    }

    public function createTables()
    {
        $sql = "CREATE TABLE `photo` (
            `id_photo` int unsigned NOT NULL,
            `title` varchar(45) NOT NULL,
            `file_name` varchar(45) NOT NULL,
            `file_extension` varchar(4) NOT NULL,
            `created_at` timestamp NOT NULL,
            `dimensions` int NOT NULL,
            `resolution` int NOT NULL,
            `id_autor` int unsigned NOT NULL,
            `score` decimal(10,0) DEFAULT NULL,
            PRIMARY KEY (`id_photo`,`id_autor`),
            UNIQUE KEY `id_photo_UNIQUE` (`id_photo`),
            UNIQUE KEY `file_name_UNIQUE` (`file_name`),
            KEY `fk_photo_photographer1_idx` (`id_autor`),
            CONSTRAINT `fk_photo_photographer1` FOREIGN KEY (`id_autor`) REFERENCES `photographer` (`id_photographer`) ON DELETE RESTRICT ON UPDATE CASCADE
          ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;";

        $sql .= "INSERT INTO `photo` VALUES (0,'Irritable Bowel Syndrome Therapy','arcused','jpg','2022-11-01 01:34:22',0,0,1,0),(1,'Antiseptic','luctus','jpg','2022-03-01 00:58:29',0,0,1,5),(2,'Phentermine Hydrochloride','leoodioporttitor','png','2022-07-21 17:48:54',0,0,2,4),(3,'EC-Naprosyn','hachabitasse','jpg','2021-12-19 19:57:10',0,0,3,2),(4,'HEADACHE VOMITING','faucibuoorciluctus','jpg','2022-01-25 22:48:49',0,0,4,0);";

        $sql .= "CREATE TABLE `photo_has_tag` (
            `id_photo` int unsigned NOT NULL,
            `id_tag` int NOT NULL,
            PRIMARY KEY (`id_photo`,`id_tag`),
            KEY `fk_photo_has_tag_tag1_idx` (`id_tag`),
            KEY `fk_photo_has_tag_photo1_idx` (`id_photo`),
            CONSTRAINT `fk_photo_has_tag_photo1` FOREIGN KEY (`id_photo`) REFERENCES `photo` (`id_photo`) ON DELETE RESTRICT ON UPDATE CASCADE,
            CONSTRAINT `fk_photo_has_tag_tag1` FOREIGN KEY (`id_tag`) REFERENCES `tag` (`id_tag`) ON DELETE RESTRICT ON UPDATE CASCADE
          ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;";

        $sql .= "INSERT INTO `tag` VALUES (1,'drugs'),(0,'plant');";

        $sql .= "CREATE TABLE `photographer` (
            `id_photographer` int unsigned NOT NULL,
            `username` varchar(45) NOT NULL,
            `email` varchar(45) NOT NULL,
            `password` varchar(100) NOT NULL,
            `created_at` timestamp NOT NULL,
            `first_name` varchar(45) NOT NULL,
            `last_name` varchar(45) NOT NULL,
            `birthdate` date NOT NULL,
            `presentation` varchar(150) NOT NULL,
            `image_profile` varchar(50) DEFAULT NULL,
            `total_uploads` int DEFAULT NULL,
            `total_votes` int DEFAULT NULL,
            PRIMARY KEY (`id_photographer`),
            UNIQUE KEY `id_photographer_UNIQUE` (`id_photographer`),
            UNIQUE KEY `email_UNIQUE` (`email`),
            UNIQUE KEY `username_UNIQUE` (`username`),
            UNIQUE KEY `password_UNIQUE` (`password`)
          ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;";

        $sql .= "INSERT INTO `photographer` VALUES (0,'bsmallacombe0','bsmallacombe0@bizjournals.com','416zinvelzj','2022-03-31 03:51:03','BreeSmal','Smallacombe','1991-10-22','dfasdfsa','gqerqg',0,0),(1,'dmeneely1','dmeneely1@epa.gov','aCevQuNqBq','2022-04-14 11:11:00','Dasie','Meneely','2013-06-12','fasd','gqerg',2,0),(2,'mstandering2','mstandering2@weather.com','VfT3yMoevkrQ','2022-01-08 02:41:55','Mahala','Standering','2007-07-09','fasd','gqeg',1,3),(3,'gparris3','gparris3@rediff.com','0GlV8c','2022-05-11 20:26:57','Gayla','Parris','2021-04-24','fasdf','gqeg',1,1),(4,'rrapier4','rrapier4@google.es','ilZ9N6t87tE','2022-11-12 21:30:36','Rustin','Rapier','2022-06-10','gasdga','erqgr',1,0);";

        $sql .= "CREATE TABLE `vote` (
            `id_vote` int unsigned NOT NULL,
            `score` int NOT NULL,
            `comments` varchar(250) DEFAULT NULL,
            `id_photographer` int unsigned NOT NULL,
            `id_photo` int unsigned NOT NULL,
            PRIMARY KEY (`id_vote`,`id_photographer`,`id_photo`),
            UNIQUE KEY `id_vote_UNIQUE` (`id_vote`),
            KEY `fk_vote_photographer_idx` (`id_photographer`),
            KEY `fk_vote_photo1_idx` (`id_photo`),
            CONSTRAINT `fk_vote_photo1` FOREIGN KEY (`id_photo`) REFERENCES `photo` (`id_photo`) ON DELETE RESTRICT ON UPDATE CASCADE,
            CONSTRAINT `fk_vote_photographer` FOREIGN KEY (`id_photographer`) REFERENCES `photographer` (`id_photographer`) ON DELETE RESTRICT ON UPDATE CASCADE
          ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;";

        $sql .= "INSERT INTO `vote` VALUES (0,5,'fsdfasdfaf',2,1),(1,4,NULL,2,2),(2,2,'fasdfasfa',2,3),(3,5,NULL,3,1);
          ";

        $this->_dbh->exec($sql);
    }

    public function getTable($table)
	{
        $this->_table = $table;

		$sql = 'select * from ' . $this->_table;

		$statement = $this->_dbh->prepare($sql); 
		$statement->execute(); 

		return $statement->fetchAll(PDO::FETCH_OBJ);
	}
    
}
