-- MySQL Script generated by MySQL Workbench
-- 07/09/14 09:58:07
-- Model: New Model    Version: 1.0
SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema tlc_thgv
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `tlc_thgv` DEFAULT CHARACTER SET utf8 ;
USE `tlc_thgv` ;

-- -----------------------------------------------------
-- Table `tlc_thgv`.`fields`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tlc_thgv`.`fields` (
  `name` VARCHAR(255) NOT NULL,
  `decription` TEXT NULL DEFAULT NULL,
  `current_certificate_number` VARCHAR(50) NULL DEFAULT NULL,
  `certificated_number_suffix` VARCHAR(45) NULL DEFAULT NULL,
  `created_user_id` INT(10) UNSIGNED NOT NULL,
  `manage_user_id` INT(10) UNSIGNED NOT NULL,
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `tlc_thgv`.`chapters`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tlc_thgv`.`chapters` (
  `name` VARCHAR(255) NOT NULL,
  `field_id` INT(10) UNSIGNED NOT NULL,
  `decriptions` TEXT NULL DEFAULT NULL,
  `image` VARCHAR(100) NULL DEFAULT NULL,
  `image_path` VARCHAR(255) NULL DEFAULT NULL,
  `created` DATETIME NULL DEFAULT NULL,
  `modified` DATETIME NULL DEFAULT NULL,
  `created_user_id` INT(10) UNSIGNED NOT NULL,
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `fields_id` INT(10) UNSIGNED NOT NULL,
  `courses_id` INT(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`, `name`, `fields_id`, `courses_id`),
  INDEX `fk_chapters_fields1_idx` (`fields_id` ASC),
  CONSTRAINT `fk_chapters_fields1`
    FOREIGN KEY (`fields_id`)
    REFERENCES `tlc_thgv`.`fields` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 10
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `tlc_thgv`.`courses`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tlc_thgv`.`courses` (
  `name` VARCHAR(100) NOT NULL,
  `teacher_id` INT(10) UNSIGNED NOT NULL,
  `decription` TEXT NULL DEFAULT NULL,
  `max_enroll_number` INT(11) NOT NULL,
  `session_number` INT(11) NOT NULL,
  `is_published` TINYINT(1) NOT NULL DEFAULT '1',
  `enrolling_expiry_date` DATETIME NULL DEFAULT NULL,
  `status` INT(11) NOT NULL DEFAULT '1' COMMENT '1 - enrolling',
  `chung_chi_co_so` INT(11) NOT NULL DEFAULT '0',
  `created` DATETIME NULL DEFAULT NULL,
  `created_user_id` INT(10) UNSIGNED NOT NULL,
  `modified` DATETIME NULL DEFAULT NULL,
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `chapter_id` INT(10) UNSIGNED NOT NULL,
  `image` VARCHAR(255) NULL DEFAULT NULL,
  `image_path` VARCHAR(255) NULL DEFAULT NULL,
  `chapters_id` INT(10) UNSIGNED NOT NULL,
  `chapters_name` VARCHAR(255) NOT NULL,
  `chapters_fields_id` INT(10) UNSIGNED NOT NULL,
  `chapters_courses_id` INT(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`, `chapters_id`, `chapters_name`, `chapters_fields_id`, `chapters_courses_id`),
  INDEX `fk_courses_chapters1_idx` (`chapters_id` ASC, `chapters_name` ASC, `chapters_fields_id` ASC, `chapters_courses_id` ASC),
  CONSTRAINT `fk_courses_chapters1`
    FOREIGN KEY (`chapters_id` , `chapters_name` , `chapters_fields_id` , `chapters_courses_id`)
    REFERENCES `tlc_thgv`.`chapters` (`id` , `name` , `fields_id` , `courses_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 8
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `tlc_thgv`.`attachments`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tlc_thgv`.`attachments` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `model` VARCHAR(20) NOT NULL,
  `foreign_key` INT(11) NOT NULL,
  `name` VARCHAR(32) NOT NULL,
  `attachment` VARCHAR(255) NOT NULL,
  `dir` VARCHAR(255) NULL DEFAULT NULL,
  `type` VARCHAR(255) NULL DEFAULT NULL,
  `size` INT(11) NULL DEFAULT '0',
  `active` TINYINT(1) NULL DEFAULT '1',
  `decription` TEXT NULL DEFAULT NULL,
  `courses_id` INT(10) UNSIGNED NOT NULL,
  `chapters_id` INT(10) UNSIGNED NOT NULL,
  `chapters_name` VARCHAR(255) NOT NULL,
  `chapters_fields_id` INT(10) UNSIGNED NOT NULL,
  `chapters_courses_id` INT(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`, `courses_id`, `chapters_id`, `chapters_name`, `chapters_fields_id`, `chapters_courses_id`),
  INDEX `fk_attachments_courses1_idx` (`courses_id` ASC),
  INDEX `fk_attachments_chapters1_idx` (`chapters_id` ASC, `chapters_name` ASC, `chapters_fields_id` ASC, `chapters_courses_id` ASC))
ENGINE = MyISAM
AUTO_INCREMENT = 130
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `tlc_thgv`.`categories`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tlc_thgv`.`categories` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = MyISAM
AUTO_INCREMENT = 6
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `tlc_thgv`.`rooms`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tlc_thgv`.`rooms` (
  `name` VARCHAR(100) NOT NULL,
  `decription` TEXT NULL DEFAULT NULL,
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 7
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `tlc_thgv`.`courses_rooms`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tlc_thgv`.`courses_rooms` (
  `course_id` INT(10) UNSIGNED NOT NULL,
  `room_id` INT(10) UNSIGNED NOT NULL,
  `allDate` TINYINT(1) NOT NULL DEFAULT '0',
  `start` DATETIME NULL DEFAULT NULL,
  `end` DATETIME NULL DEFAULT NULL,
  `priority` INT(10) UNSIGNED NOT NULL,
  `note` VARCHAR(255) NULL DEFAULT NULL,
  `created` DATETIME NULL DEFAULT NULL,
  `created_user_id` INT(10) UNSIGNED NOT NULL,
  `modified` DATETIME NULL DEFAULT NULL,
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `color` VARCHAR(50) NULL DEFAULT NULL,
  `title` VARCHAR(50) NOT NULL,
  `courses_id` INT(10) UNSIGNED NOT NULL,
  `rooms_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`, `courses_id`, `rooms_id`),
  INDEX `fk_courses_rooms_courses1_idx` (`courses_id` ASC),
  INDEX `fk_courses_rooms_rooms1_idx` (`rooms_id` ASC),
  CONSTRAINT `fk_courses_rooms_courses1`
    FOREIGN KEY (`courses_id`)
    REFERENCES `tlc_thgv`.`courses` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_courses_rooms_rooms1`
    FOREIGN KEY (`rooms_id`)
    REFERENCES `tlc_thgv`.`rooms` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 44
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `tlc_thgv`.`departments`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tlc_thgv`.`departments` (
  `name` VARCHAR(50) NOT NULL,
  `parent_id` INT(11) NULL DEFAULT NULL,
  `phone_number` VARCHAR(45) NULL DEFAULT NULL,
  `decription` TEXT NULL DEFAULT NULL,
  `lft` INT(11) NULL DEFAULT NULL,
  `rght` INT(11) NULL DEFAULT NULL,
  `created` DATETIME NULL DEFAULT NULL,
  `modified` DATETIME NULL DEFAULT NULL,
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 6
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `tlc_thgv`.`groups`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tlc_thgv`.`groups` (
  `name` VARCHAR(50) NOT NULL,
  `alias` VARCHAR(50) NOT NULL,
  `image` VARCHAR(255) NULL DEFAULT NULL,
  `image_path` VARCHAR(255) NULL DEFAULT NULL,
  `decription` TEXT NULL DEFAULT NULL,
  `created` DATETIME NULL DEFAULT NULL,
  `modified` DATETIME NULL DEFAULT NULL,
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 7
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `tlc_thgv`.`hoc_ham`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tlc_thgv`.`hoc_ham` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(100) NOT NULL,
  `created_user_id` INT(11) NULL DEFAULT NULL,
  `created` DATETIME NULL DEFAULT NULL,
  `modified` DATETIME NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = MyISAM
AUTO_INCREMENT = 6
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `tlc_thgv`.`hoc_vi`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tlc_thgv`.`hoc_vi` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = MyISAM
AUTO_INCREMENT = 7
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `tlc_thgv`.`users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tlc_thgv`.`users` (
  `name` VARCHAR(50) NOT NULL,
  `sex` TINYINT(4) NULL DEFAULT NULL,
  `hoc_ham_id` INT(11) NULL DEFAULT NULL,
  `hoc_vi_id` INT(11) NULL DEFAULT NULL,
  `department_id` INT(10) UNSIGNED NULL DEFAULT NULL,
  `username` VARCHAR(50) NOT NULL,
  `password` CHAR(50) NOT NULL,
  `email` VARCHAR(100) NULL DEFAULT NULL,
  `birthday` DATE NULL DEFAULT NULL,
  `birthplace` VARCHAR(100) NULL DEFAULT NULL,
  `phone_number` CHAR(15) NULL DEFAULT NULL,
  `address` VARCHAR(255) NULL DEFAULT NULL,
  `avatar` VARCHAR(100) NULL DEFAULT NULL,
  `avatar_path` VARCHAR(255) NULL DEFAULT NULL,
  `activated` TINYINT(1) NOT NULL DEFAULT '1',
  `last_login` DATETIME NULL DEFAULT NULL,
  `created` DATETIME NULL DEFAULT NULL,
  `modified` DATETIME NULL DEFAULT NULL,
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `ip_address` VARCHAR(50) NULL DEFAULT NULL,
  `email_verified` TINYINT(4) NULL DEFAULT '0',
  `created_user_id` INT(11) NULL DEFAULT NULL,
  `dropbox_token` VARCHAR(100) NULL DEFAULT NULL,
  `dropbox_token_secret` VARCHAR(255) NULL DEFAULT NULL,
  `hoc_vi_id1` INT(10) UNSIGNED NOT NULL,
  `hoc_ham_id1` INT(10) UNSIGNED NOT NULL,
  `messages_id` INT(10) UNSIGNED NOT NULL,
  `departments_id` INT(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`, `hoc_vi_id1`, `hoc_ham_id1`, `messages_id`, `departments_id`),
  UNIQUE INDEX `username_UNIQUE` (`username` ASC),
  INDEX `fk_users_hoc_vi_idx` (`hoc_vi_id1` ASC),
  INDEX `fk_users_hoc_ham1_idx` (`hoc_ham_id1` ASC),
  INDEX `fk_users_departments1_idx` (`departments_id` ASC),
  CONSTRAINT `fk_users_hoc_vi`
    FOREIGN KEY (`hoc_vi_id1`)
    REFERENCES `tlc_thgv`.`hoc_vi` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_hoc_ham1`
    FOREIGN KEY (`hoc_ham_id1`)
    REFERENCES `tlc_thgv`.`hoc_ham` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_departments1`
    FOREIGN KEY (`departments_id`)
    REFERENCES `tlc_thgv`.`departments` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 21
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `tlc_thgv`.`messages`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tlc_thgv`.`messages` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(255) NOT NULL,
  `content` TEXT NOT NULL,
  `published` INT(11) NOT NULL DEFAULT '1',
  `created_user_id` INT(10) UNSIGNED NOT NULL,
  `created` DATETIME NULL DEFAULT NULL,
  `modified` DATETIME NULL DEFAULT NULL,
  `category_id` INT(11) NOT NULL,
  `categories_id` INT(10) UNSIGNED NOT NULL,
  `users_id` INT(10) UNSIGNED NOT NULL,
  `users_hoc_vi_id1` INT(10) UNSIGNED NOT NULL,
  `users_hoc_ham_id1` INT(10) UNSIGNED NOT NULL,
  `users_messages_id` INT(10) UNSIGNED NOT NULL,
  `users_departments_id` INT(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`, `categories_id`, `users_id`, `users_hoc_vi_id1`, `users_hoc_ham_id1`, `users_messages_id`, `users_departments_id`),
  INDEX `fk_messages_categories1_idx` (`categories_id` ASC),
  INDEX `fk_messages_users1_idx` (`users_id` ASC, `users_hoc_vi_id1` ASC, `users_hoc_ham_id1` ASC, `users_messages_id` ASC, `users_departments_id` ASC))
ENGINE = MyISAM
AUTO_INCREMENT = 5
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `tlc_thgv`.`students_courses`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tlc_thgv`.`students_courses` (
  `student_id` INT(10) UNSIGNED NOT NULL,
  `course_id` INT(10) UNSIGNED NOT NULL,
  `is_passed` TINYINT(1) NOT NULL DEFAULT '0',
  `is_recieved` TINYINT(1) NOT NULL DEFAULT '0',
  `recieve_date` DATETIME NULL DEFAULT NULL,
  `certificated_date` DATETIME NULL DEFAULT NULL,
  `certificated_number` VARCHAR(50) NULL DEFAULT NULL,
  `created` DATETIME NULL DEFAULT NULL,
  `modified` DATETIME NULL DEFAULT NULL,
  `note` TEXT NULL DEFAULT NULL,
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `users_id` INT(10) UNSIGNED NOT NULL,
  `users_hoc_vi_id1` INT(10) UNSIGNED NOT NULL,
  `users_hoc_ham_id1` INT(10) UNSIGNED NOT NULL,
  `courses_id` INT(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`, `users_id`, `users_hoc_vi_id1`, `users_hoc_ham_id1`, `courses_id`),
  INDEX `fk_students_courses_users1_idx` (`users_id` ASC, `users_hoc_vi_id1` ASC, `users_hoc_ham_id1` ASC),
  INDEX `fk_students_courses_courses1_idx` (`courses_id` ASC),
  CONSTRAINT `fk_students_courses_users1`
    FOREIGN KEY (`users_id` , `users_hoc_vi_id1` , `users_hoc_ham_id1`)
    REFERENCES `tlc_thgv`.`users` (`id` , `hoc_vi_id1` , `hoc_ham_id1`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_students_courses_courses1`
    FOREIGN KEY (`courses_id`)
    REFERENCES `tlc_thgv`.`courses` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 27
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `tlc_thgv`.`users_groups`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tlc_thgv`.`users_groups` (
  `user_id` INT(10) UNSIGNED NOT NULL,
  `group_id` INT(10) UNSIGNED NOT NULL,
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `users_id` INT(10) UNSIGNED NOT NULL,
  `users_hoc_vi_id1` INT(10) UNSIGNED NOT NULL,
  `users_hoc_ham_id1` INT(10) UNSIGNED NOT NULL,
  `users_messages_id` INT(10) UNSIGNED NOT NULL,
  `users_departments_id` INT(10) UNSIGNED NOT NULL,
  `groups_id` INT(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`, `users_id`, `users_hoc_vi_id1`, `users_hoc_ham_id1`, `users_messages_id`, `users_departments_id`, `groups_id`),
  INDEX `fk_users_groups_users1_idx` (`users_id` ASC, `users_hoc_vi_id1` ASC, `users_hoc_ham_id1` ASC, `users_messages_id` ASC, `users_departments_id` ASC),
  INDEX `fk_users_groups_groups1_idx` (`groups_id` ASC),
  CONSTRAINT `fk_users_groups_users1`
    FOREIGN KEY (`users_id` , `users_hoc_vi_id1` , `users_hoc_ham_id1` , `users_messages_id` , `users_departments_id`)
    REFERENCES `tlc_thgv`.`users` (`id` , `hoc_vi_id1` , `hoc_ham_id1` , `messages_id` , `departments_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_groups_groups1`
    FOREIGN KEY (`groups_id`)
    REFERENCES `tlc_thgv`.`groups` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 38
DEFAULT CHARACTER SET = utf8;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
