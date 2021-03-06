USE [master]
GO

/****** Object:  Database [OSTERMANN]    Script Date: 28/05/2021 11:00:37 ******/
CREATE DATABASE [OSTERMANN]
 CONTAINMENT = NONE
 ON  PRIMARY 
( NAME = N'OSTERMANN', FILENAME = N'C:\Program Files\Microsoft SQL Server\MSSQL14.SQLSERVERSIO\MSSQL\DATA\OSTERMANN.mdf' , SIZE = 8192KB , MAXSIZE = UNLIMITED, FILEGROWTH = 65536KB )
 LOG ON 
( NAME = N'OSTERMANN_log', FILENAME = N'C:\Program Files\Microsoft SQL Server\MSSQL14.SQLSERVERSIO\MSSQL\DATA\OSTERMANN_log.ldf' , SIZE = 8192KB , MAXSIZE = 2048GB , FILEGROWTH = 65536KB )
GO

IF (1 = FULLTEXTSERVICEPROPERTY('IsFullTextInstalled'))
begin
EXEC [OSTERMANN].[dbo].[sp_fulltext_database] @action = 'enable'
end
GO

ALTER DATABASE [OSTERMANN] SET ANSI_NULL_DEFAULT OFF 
GO

ALTER DATABASE [OSTERMANN] SET ANSI_NULLS OFF 
GO

ALTER DATABASE [OSTERMANN] SET ANSI_PADDING OFF 
GO

ALTER DATABASE [OSTERMANN] SET ANSI_WARNINGS OFF 
GO

ALTER DATABASE [OSTERMANN] SET ARITHABORT OFF 
GO

ALTER DATABASE [OSTERMANN] SET AUTO_CLOSE OFF 
GO

ALTER DATABASE [OSTERMANN] SET AUTO_CREATE_STATISTICS ON 
GO

ALTER DATABASE [OSTERMANN] SET AUTO_SHRINK OFF 
GO

ALTER DATABASE [OSTERMANN] SET AUTO_UPDATE_STATISTICS ON 
GO

ALTER DATABASE [OSTERMANN] SET CURSOR_CLOSE_ON_COMMIT OFF 
GO

ALTER DATABASE [OSTERMANN] SET CURSOR_DEFAULT  GLOBAL 
GO

ALTER DATABASE [OSTERMANN] SET CONCAT_NULL_YIELDS_NULL OFF 
GO

ALTER DATABASE [OSTERMANN] SET NUMERIC_ROUNDABORT OFF 
GO

ALTER DATABASE [OSTERMANN] SET QUOTED_IDENTIFIER OFF 
GO

ALTER DATABASE [OSTERMANN] SET RECURSIVE_TRIGGERS OFF 
GO

ALTER DATABASE [OSTERMANN] SET  DISABLE_BROKER 
GO

ALTER DATABASE [OSTERMANN] SET AUTO_UPDATE_STATISTICS_ASYNC OFF 
GO

ALTER DATABASE [OSTERMANN] SET DATE_CORRELATION_OPTIMIZATION OFF 
GO

ALTER DATABASE [OSTERMANN] SET TRUSTWORTHY OFF 
GO

ALTER DATABASE [OSTERMANN] SET ALLOW_SNAPSHOT_ISOLATION OFF 
GO

ALTER DATABASE [OSTERMANN] SET PARAMETERIZATION SIMPLE 
GO

ALTER DATABASE [OSTERMANN] SET READ_COMMITTED_SNAPSHOT OFF 
GO

ALTER DATABASE [OSTERMANN] SET HONOR_BROKER_PRIORITY OFF 
GO

ALTER DATABASE [OSTERMANN] SET RECOVERY SIMPLE 
GO

ALTER DATABASE [OSTERMANN] SET  MULTI_USER 
GO

ALTER DATABASE [OSTERMANN] SET PAGE_VERIFY CHECKSUM  
GO

ALTER DATABASE [OSTERMANN] SET DB_CHAINING OFF 
GO

ALTER DATABASE [OSTERMANN] SET FILESTREAM( NON_TRANSACTED_ACCESS = OFF ) 
GO

ALTER DATABASE [OSTERMANN] SET TARGET_RECOVERY_TIME = 60 SECONDS 
GO

ALTER DATABASE [OSTERMANN] SET  READ_WRITE 
GO

