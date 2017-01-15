README – Online Store

Site Url: https://cse335-melooka23.c9users.io/
Cloud 9 Link: https://ide.c9.io/melooka23/cse335

Parameters To Test the Site:
The site can be tested without a username and password, as it is possible for a user to register/create an account.

We implemented the website using php and MySQL. This was done through cloud 9 (c9) service provider.

The website currently features a responsive user interface which was built from the ground up using bootstrap. The backend uses a Model/View/Controller (MVC) type structure to implement and run the website. It allows for user registration, login and log out. Additionally, it allows for users to be either just purchasers or both buyers and sellers. If a user opts to be a seller, they can add new products to the website via the sell page, and associate them with categories. All users can shop for products on the website. These products can be added to a shopping cart (which is stored within the session), and then when a user checks out, the stock of each of these products is update.  A user can update the shopping cart by adding new items or deleting items in the cart before check out. We have also implemented a my account page where sellers can update the current stock of their product (given a new shipment or increased inventory), and can edit their information. 

Have you implemented any additional features that are not included in the original topic specifications? 
-	My account page
-	Users and sellers can edit their account information and keep it up to date
-	Sellers can view and update the stock of each of their products
-	Responsive user interface and design
-	Users can register themselves on the website

Are there required features incomplete?
No, the required functionality of the site has all been implemented.

Summarize the contributions from each group member in the entire project.

Michael Looka:
-	Wrote business rules and worked on ERD with Mark
-	Set up MVC framework for backend implementation
-	Created Database and set up USER Table
-	Set up connection variable in php to connect with database
-	Checkout functionality (Updating product stock via php code, updating session variables)
-	Wrote Database Scripts for submission
-	Wrote Readme file for submission

Parth Patel
-	Original website mock-ups
-	Front end design and development
-	All user interface screens/views: homepage, cart page, product page, registration page, login page, my account page, views by category, sell page
-	All css stylesheets
-	Dynamic presentation of information on view pages using php and html
-	

Mark Easterly
-	Worked on original ERD
-	Created PRODUCT and CATEGORY tables in database
-	Set up repository for each view with database queries
-	Wrote dynamic database queries which adapt to page submission forms from views (Stored in repositories, called from controller)
-	Controller pages: created functions for each action on the view pages
