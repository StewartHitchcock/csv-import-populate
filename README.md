This program imports csvs located in the storage/csvs folder, creates two tables based on them and populates them with the data from the csvs. 

It then takes that data and sorts the data by each candidate and their job history, sorted with the most recent job being first.

To run this program:
1. Clone this repository to a location on your local machine.
2. Create a database in your preferred database tool called csv-import-populate.
3. Ensure your connection to your database is running as expected. 
4. Navigate to the main project folder in a terminal and run: "composer install". Let this run to completion.
5. In the terminal run the command: "php artisan process:files".
