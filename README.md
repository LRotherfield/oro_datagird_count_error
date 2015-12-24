##Datagrid count failure example
This bundle contains an example of the datagrid pagination incorrecly calculating the number of records in the database.  This is a very simplified version of something I have in one of my projects stripped back to show how the error occurs.

####Install instructions
To install the bundle, simply clone this repo into the src directory of a fresh installation of the platform-application.  Then import the included SQL file and visit /item

####Expected results
We would expect to see a grid with 4 items in it with a number of translations each totaling 11 translations

####Actual results
We see a grid that reports 11 records and when limited to 10 per page, the second page contains a duplication of the page with the remaining translation