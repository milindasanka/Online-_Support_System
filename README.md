## About Online Support System

<p>Online Support System is a web application which helps service providers and sellers to
provide after-sales support for their customers. Customers are allowed to open a ticket when
they need assistance on something related to the product or service they purchased. Support
agents get in contact with the ticket owner to help resolve their issues.</p>

## Functional Requirements
1. Anyone can open a support ticket
2. Guest users are allowed to open a support ticket by entering the following details.
   a. Customer Name
   b. Problem Description
   c. Email
   d. Phone Number
3. When submitted, a unique reference number is generated and issued to the customer.
   This reference number should be used to check the status of the ticket afterwards.
4. An acknowledgement email is sent to the customer’s email address after ticket details
   are stored in the system.
5. Support agent can check the pending tickets list
6. Support agents are required to login to the system to see the tickets opened by the
   customers.
7. Tickets list has following features
   a. Search using the customer name
   b. Pagination
   c. New tickets (ones that are not opened yet) are highlighted
   d. Support agents can open the tickets to see the ticket details.
8. Support agent replies the ticket
9. Once opened, the ticket has a form which can be used to reply to the ticket.
10. Reply is recorded in the system and email with reply message is sent to the customer.
11. Customer checks the ticket status
12. Customers are allowed to check the status of their tickets by entering the reference
    number issued at opening the support ticket.
13. The reply provided by the support agent must be visible on the ticket view.

## System Requirement 
1. php version ^8.1
2. Composer 2
3. npm ^8.2
4. Node 16.02^

## How to Install
1. Clone the repo from:
https://github.com/milindasanka/Online-_Support_System.git
2. Navigate to the project directory Online-_Support_System
3. Install the project dependencies:  
    1. run Composer install: `Composer install`
    2. run npm : `npm install`
4. Edite the Example.Env fil to .Env
5. Add Email & Database Details to .ENV file
6. run migration : `php artisan migration`
7. run the build UI : `npm run Dev`
8. run the project : `php artisan serve`

Packages & CDN
1. Boostrap
2. npm
3. Jquery
4. Jquery Datatable
5. SMTP
6. Sweetalert
