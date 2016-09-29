-- MySQL Script generated by MySQL Workbench
-- 09/28/16 22:04:33
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema OPTIC
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema OPTIC
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `OPTIC` DEFAULT CHARACTER SET utf8 ;
USE `OPTIC` ;

-- -----------------------------------------------------
-- Table `OPTIC`.`TIENDA`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `OPTIC`.`TIENDA` (
  `TIE_ID` INT NOT NULL AUTO_INCREMENT,
  `TIE_NAME` VARCHAR(45) NULL,
  PRIMARY KEY (`TIE_ID`),
  UNIQUE INDEX `TIE_ID_UNIQUE` (`TIE_ID` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `OPTIC`.`PRODUCTO`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `OPTIC`.`PRODUCTO` (
  `PRO_ID` INT NOT NULL AUTO_INCREMENT,
  `PRO_NAME` VARCHAR(45) NULL,
  `PRO_STOCK` INT NULL,
  `PRO_PRICE` INT NULL,
  `PRO_ACTIVE` INT NULL,
  `TIENDA_TIE_ID` INT NOT NULL,
  PRIMARY KEY (`PRO_ID`),
  UNIQUE INDEX `PRO_ID_UNIQUE` (`PRO_ID` ASC),
  INDEX `fk_PRODUCTO_TIENDA_idx` (`TIENDA_TIE_ID` ASC),
  CONSTRAINT `fk_PRODUCTO_TIENDA`
    FOREIGN KEY (`TIENDA_TIE_ID`)
    REFERENCES `OPTIC`.`TIENDA` (`TIE_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `OPTIC`.`VENTA`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `OPTIC`.`VENTA` (
  `VEN_ID` INT NOT NULL AUTO_INCREMENT,
  `VEN_CORRELATIVE` INT NULL,
  `VEN_DATE_CREATE` DATE NULL,
  `VEN_HOUR_CREATE` VARCHAR(45) NULL,
  `VEN_COM_TOTAL` INT NULL,
  `TIENDA_TIE_ID` INT NOT NULL,
  PRIMARY KEY (`VEN_ID`),
  UNIQUE INDEX `VEN_ID_UNIQUE` (`VEN_ID` ASC),
  INDEX `fk_VENTA_TIENDA1_idx` (`TIENDA_TIE_ID` ASC),
  CONSTRAINT `fk_VENTA_TIENDA1`
    FOREIGN KEY (`TIENDA_TIE_ID`)
    REFERENCES `OPTIC`.`TIENDA` (`TIE_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `OPTIC`.`DETALLE`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `OPTIC`.`DETALLE` (
  `DET_ID` INT NOT NULL AUTO_INCREMENT,
  `DET_PRO_PRICE` INT NULL,
  `DET_TYPE` VARCHAR(45) NULL,
  `DET_INTERP` VARCHAR(45) NULL,
  `DET_OD_1` VARCHAR(45) NULL,
  `DET_CLI_1` VARCHAR(45) NULL,
  `DET_EJE_1` VARCHAR(45) NULL,
  `DET_OD_2` VARCHAR(45) NULL,
  `DET_CLI_2` VARCHAR(45) NULL,
  `DET_EJE_2` VARCHAR(45) NULL,
  `PRODUCTO_PRO_ID` INT NOT NULL,
  `VENTA_VEN_ID` INT NOT NULL,
  PRIMARY KEY (`DET_ID`),
  UNIQUE INDEX `DET_ID_UNIQUE` (`DET_ID` ASC),
  INDEX `fk_DETALLE_PRODUCTO1_idx` (`PRODUCTO_PRO_ID` ASC),
  INDEX `fk_DETALLE_VENTA1_idx` (`VENTA_VEN_ID` ASC),
  CONSTRAINT `fk_DETALLE_PRODUCTO1`
    FOREIGN KEY (`PRODUCTO_PRO_ID`)
    REFERENCES `OPTIC`.`PRODUCTO` (`PRO_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_DETALLE_VENTA1`
    FOREIGN KEY (`VENTA_VEN_ID`)
    REFERENCES `OPTIC`.`VENTA` (`VEN_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `OPTIC`.`METODO_PAGO`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `OPTIC`.`METODO_PAGO` (
  `MET_ID` INT NOT NULL AUTO_INCREMENT,
  `MET_NAME` VARCHAR(45) NULL,
  PRIMARY KEY (`MET_ID`),
  UNIQUE INDEX `MET_ID_UNIQUE` (`MET_ID` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `OPTIC`.`ABONO`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `OPTIC`.`ABONO` (
  `ABO_ID` INT NOT NULL AUTO_INCREMENT,
  `ABO_DATE` DATE NULL,
  `ABO_TOTAL` INT NULL,
  `VENTA_VEN_ID` INT NOT NULL,
  `METODO_PAGO_MET_ID` INT NOT NULL,
  PRIMARY KEY (`ABO_ID`),
  UNIQUE INDEX `ABO_ID_UNIQUE` (`ABO_ID` ASC),
  INDEX `fk_ABONO_VENTA1_idx` (`VENTA_VEN_ID` ASC),
  INDEX `fk_ABONO_METODO_PAGO1_idx` (`METODO_PAGO_MET_ID` ASC),
  CONSTRAINT `fk_ABONO_VENTA1`
    FOREIGN KEY (`VENTA_VEN_ID`)
    REFERENCES `OPTIC`.`VENTA` (`VEN_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_ABONO_METODO_PAGO1`
    FOREIGN KEY (`METODO_PAGO_MET_ID`)
    REFERENCES `OPTIC`.`METODO_PAGO` (`MET_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `OPTIC`.`DESPACHO`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `OPTIC`.`DESPACHO` (
  `DES_ID` INT NOT NULL AUTO_INCREMENT,
  `DES_DATE` DATE NULL,
  `DES_CRISTAL` VARCHAR(45) NULL,
  `DES_ALTURA` VARCHAR(45) NULL,
  `VENTA_VEN_ID` INT NOT NULL,
  PRIMARY KEY (`DES_ID`),
  UNIQUE INDEX `DES_ID_UNIQUE` (`DES_ID` ASC),
  INDEX `fk_DESPACHO_VENTA1_idx` (`VENTA_VEN_ID` ASC),
  CONSTRAINT `fk_DESPACHO_VENTA1`
    FOREIGN KEY (`VENTA_VEN_ID`)
    REFERENCES `OPTIC`.`VENTA` (`VEN_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `OPTIC`.`CAPTADOR`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `OPTIC`.`CAPTADOR` (
  `CAP_ID` INT NOT NULL AUTO_INCREMENT,
  `CAP_NAME` VARCHAR(45) NULL,
  `CAP_PHONE` INT NULL,
  PRIMARY KEY (`CAP_ID`),
  UNIQUE INDEX `CAP_ID_UNIQUE` (`CAP_ID` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `OPTIC`.`COMISION`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `OPTIC`.`COMISION` (
  `COM_ID` INT NOT NULL,
  `COM_TOTAL` INT NULL,
  `COM_PAID` VARCHAR(45) NULL,
  `VENTA_VEN_ID` INT NOT NULL,
  `CAPTADOR_CAP_ID` INT NOT NULL,
  PRIMARY KEY (`COM_ID`),
  INDEX `fk_COMISION_VENTA1_idx` (`VENTA_VEN_ID` ASC),
  INDEX `fk_COMISION_CAPTADOR1_idx` (`CAPTADOR_CAP_ID` ASC),
  CONSTRAINT `fk_COMISION_VENTA1`
    FOREIGN KEY (`VENTA_VEN_ID`)
    REFERENCES `OPTIC`.`VENTA` (`VEN_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_COMISION_CAPTADOR1`
    FOREIGN KEY (`CAPTADOR_CAP_ID`)
    REFERENCES `OPTIC`.`CAPTADOR` (`CAP_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `OPTIC`.`PAGO`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `OPTIC`.`PAGO` (
  `PAG_ID` INT NOT NULL AUTO_INCREMENT,
  `PAG_TOTAL` INT NULL,
  `PAG_DATE` DATE NULL,
  `CAPTADOR_CAP_ID` INT NOT NULL,
  PRIMARY KEY (`PAG_ID`),
  UNIQUE INDEX `PAG_ID_UNIQUE` (`PAG_ID` ASC),
  INDEX `fk_PAGO_CAPTADOR1_idx` (`CAPTADOR_CAP_ID` ASC),
  CONSTRAINT `fk_PAGO_CAPTADOR1`
    FOREIGN KEY (`CAPTADOR_CAP_ID`)
    REFERENCES `OPTIC`.`CAPTADOR` (`CAP_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `OPTIC`.`CRISTAL`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `OPTIC`.`CRISTAL` (
  `CRI_ID` INT NOT NULL AUTO_INCREMENT,
  `CRI_TOTAL` INT NULL,
  `CRI_DATE` DATE NULL,
  `TIENDA_TIE_ID` INT NOT NULL,
  PRIMARY KEY (`CRI_ID`),
  UNIQUE INDEX `CRI_ID_UNIQUE` (`CRI_ID` ASC),
  INDEX `fk_CRISTAL_TIENDA1_idx` (`TIENDA_TIE_ID` ASC),
  CONSTRAINT `fk_CRISTAL_TIENDA1`
    FOREIGN KEY (`TIENDA_TIE_ID`)
    REFERENCES `OPTIC`.`TIENDA` (`TIE_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `OPTIC`.`INSUMO`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `OPTIC`.`INSUMO` (
  `INS_ID` INT NOT NULL,
  `INS_DATE` DATE NULL,
  `INS_NAME` VARCHAR(45) NULL,
  `INS_DESC` VARCHAR(450) NULL,
  `INS_TOTAL` INT NULL,
  `TIENDA_TIE_ID` INT NOT NULL,
  PRIMARY KEY (`INS_ID`),
  INDEX `fk_INSUMO_TIENDA1_idx` (`TIENDA_TIE_ID` ASC),
  CONSTRAINT `fk_INSUMO_TIENDA1`
    FOREIGN KEY (`TIENDA_TIE_ID`)
    REFERENCES `OPTIC`.`TIENDA` (`TIE_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
