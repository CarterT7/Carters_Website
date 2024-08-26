# Carter's Website

This website is a project I worked on while taking a class in web development, in which I learned HTML, CSS, JavaScript, and PHP.

The following is a breakdown of what changed in each version of my website.

- **v2** — Simple web app with one HTML page
- **v3** — Added links, lists, images, and another page which can be accessed by a link on the main page.
- **v4** — Recreated `index.html` with tables and added more images. Main part of the app is still a single page (excluding the page added in v3). Added an HTML-styled navbar at the top with anchor links to jump to each section of the page.
- **v5** — Separated the main page, `index.html`, into individual pages for each section. Each page has the same navigation bar ("navbar") at the top.
- **v6** — Restyled the navbar with CSS
- **v7** — Redesigned app with Bootstrap using an online style template, which I customized to fit my needs. Navbar now indicates the active page.
- **v8** — Made a simple JavaScript program to display a greeting on the homepage based on the time of day.
- **v9** — Side quest: simple, single-page intro to input validation with JavaScript (event listeners). Not really a version of the website.
- **v10** — Created a contact form, `contact.html`, incorporating JavaScript for input validation and Bootstrap CSS for error/success hints. "Send" button is not yet functional.
- **v11** — Side quest: simple, single-page intro to PHP. Not really a version of the website.
- **v12** — Contact form now stores submitted form data when "Send" button is clicked, and a results page, `results.php`, uses PHP to retrieve and display the form data (form method: GET). Invalid form inputs can still be submitted — this will be addressed in a later version.
- **v13** — Combined contact and results pages into one. `contact.php` displays the contact form until the "Send" button is clicked. Then, `contact.php` sends the data to itself (method: POST) and the page changes to display the data. The functional advantage of this is that the form data—the account credentials and personal information—will no longer be exposed in the URL.
- **v14** — Implemented server-side input validation for the contact form. When the form is submitted, all input fields are checked. If all inputs are valid, the page will refresh to display the submitted data. If any fields contain invalid inputs, the form refreshes, keeping all inputs filled so the user does not have to start over. Invalid fields are highlighted in red for easy identification.
- **v15** — App is now a single-page solution that uses PHP to redraw the main page, `index.php`, based on which section is clicked in the navbar. Navbar code was rewritten for a single-page layout to dynamically indicate the active tab.
- **v16** — Navbar code moved from `index.php` to its own file, `navigation.php`.
- **v17** — App is now connected to a MySQL database. When a contact form is submitted and all the data is valid, a database connection is established and the submitted information is inserted into a "contact_data" table.
- **v18** — Added a results page which queries the database and displays the contents of the "contact_data" table (except for username and password).
- **v19** — Results page now uses jQuery to query the database at timed intervals and dynamically refreshes the page to display changes to the "contact_data" table in real time. 
- **v20** — Created two new pages that now support the functionality behind user interaction: Login and Register. The results page still exists, but the user must log in with valid account credentials before it can be viewed. Password hashing has been implemented to increase security and privacy of stored account credentials. 
Note: in a production environment, the Contact page and its database would now be removed, but as this is an educational project, I decided to leave it intact to showcase the work I put into it.


The CSS and JavaScript files that I created (the rest are from third parties):
- `main.css` (v6)
- `add-content.js` (v8)
- `event-listener.js` (v10)
- `event-listener2.js` (v20)
