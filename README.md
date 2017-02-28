wet-boew-codecharge
===================

CodeCharge Studio variant of the Web Experience Toolkit (WET)
<br />
Demo site: TBD

Version: WET 4.0.X

## Overview

This features WET based Design templates for use with YesSoftware CodeCharge Studio 5.x (CCS).
CCS facilitates Rapid web Application Development (RAD) in ASP, dotnet, Coldfusion, JSP, Perl,or php.
Application can be generated to run on IIS or Apache web server, and to support a variety of databases (MySQL, Oracle, DB2, MSSQL, PostgreSQL,...).

##Benefits

* Provides CodeChargeStudio developers with a clf compliant Master Template for existing and new projects, starting with the theme-boew-intranet. 
* Only one web page per language, regardless of the number of user languages or theme used.
* Localization separated from the page, managed in simple text based resource text files (en.txt, fr.txt,...)
* Truly separates look and feel format and content development for easier web development effort.

* Conforms to WCAG 2.0 AA
* Uses WAI-ARIA to enhance accessibility
* Supports Firefox, Opera, Safari, Chrome, and IE 7+ 

##Minimum Requirements

* Design Template: CodeCharge Studio 5.X
* Demos: LAMP stack** (Linux-Apache-MySQL-PHP). 

##Additional Notes

* wet-boew-codecharge vs wet-boew-php:

Codecharge variant provides re-usable Master Templates for CodeCharge Studio 5 (CCS5). the Template provided supports CCS5 php generated sites.
Demo provided was generated in php, using the Master Template.
In the Codecharge variant, Html and php code files are completely separated (.php and .html), keeping a clear separation between presentation and code.

Synchronization of the resource variables used (languages) in both projects on ToDo list.

* Demo environment tailoring**

To run demo on Linux (lampp) or Windows (wammp): Copy the application folder in your htdocs. Create the initial database with SQL scripts located in /data subfolder.

To run demo using ASP/dotnet/JSP/Coldfusion: Purchase CodechargeStudio5, open demo project file, change Code Language, and re-generate demo. Copy the application folder in your htdocs. Create the initial database with SQL scripts.

To run demo uisng another database only (MSAccess/Oracle/MSSQL/DB2/PostgresSQL): Get CodechargeStudio5, open demo project file, change database connections, and re-generate demo. Conversion of the schema from MySQL SQL syntax to the other SQL dbms syntax will be required.
