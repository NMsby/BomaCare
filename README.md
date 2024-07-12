# BomaCare

## License

This project is licensed under the [MIT License](https://opensource.org/licenses/MIT).

![MIT License](https://img.shields.io/badge/License-MIT-blue.svg)

## Description

BomaCare is a web application designed to connect homeowners with domestic workers efficiently. Built using Laravel and Jetstream, it provides a platform for job postings, applications, and secure payments via the Daraja API. This project aims to streamline the process of finding domestic help while creating job opportunities for workers.

## Project Setup/Installation Instructions

### Dependencies

- PHP >= 7.3
- Laravel >= 8.x
- Composer
- Node.js and npm
- MySQL (or any supported database)
- Ngrok (for local Daraja API testing)

### Installation Steps 

1. Clone the repository:
```bash
git clone https://github.com/NMsby/BomaCare
cd bomacare
```

2. Install PHP dependencies:
```bash
composer install
```

3. Install and compile frontend assets:
```bash
npm install
npm run dev
```

4. Configure environments:
```bash
cp .env.example .env
php artisan key:generate
```

5. Set up database
```bash
php artisan migrate
```

6. Start the development server:
```bash
php artisan serve
```

7. For Daraja API testing
```bash
ngrok http 8000
```

## Usage Instructions

### How to Run
Ensure the server is running:
```bash
php artisan serve
```
Access the application:
Open http://localhost:8000 in your web browser.

## Examples

### User Registration

- Navigate to `/register`
- Fill in details and select role (Homeowner/Worker)
- Verify email address

### Job Posting (Homeowners):

- Go to Dashboard > "Post a Job"
- Fill in job details and submit

### Job Application (Workers):

- Browse available jobs on the dashboard
- Click "Apply" on suitable listings

### Payment Processing:
- Homeowners can initiate payments from their dashboard
- Follow Daraja API prompts to complete the transaction

## Input/Output
- Input: User details, job descriptions, payment information
- Output: Job listings, application statuses, payment confirmations

## Project Structure

```
bomacare/
├── app/
│   ├── Http/Controllers/
│   │   ├── JobController.php
│   │   └── PaymentController.php
│   └── Models/
│       ├── User.php
│       └── Job.php
├── resources/
│   └── views/
│       ├── dashboard.blade.php
│       └── jobs/
│           ├── create.blade.php
│           └── index.blade.php
├── routes/
│   └── web.php
├── .env.example
├── composer.json
└── README.md
```

## Key Files

- 'app/Http/Controllers/JobController.php': Manages job-related operations
- 'app/Http/Controllers/PaymentController.php': Handles Daraja API integrations
- 'resources/views/dashboard.blade.php': Main user interface after login
- 'routes/web.php': Defines web routes for the application


## Additional Information

### Project Status

BomaCare is currently in active development. Core features are implemented, with ongoing work on UI improvements and additional functionalities.

### Known Issues
- Occasional delays in payment confirmation


### Acknowledgements
- Laravel
- Jetstream
- Daraja API
- Tailwind CSS
- Vue.js

### Contact us
If you have a technical question regarding the code please create an issue in this repository. This is the fastest way to reach us.