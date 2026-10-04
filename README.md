# Health4Us

<p align="center">
  <strong>Empowering Health, One Step at a Time.</strong>
</p>

<p align="center">
  A gamified health platform designed to encourage healthier lifestyles through interactive activities, health education, and reward-based experiences.
</p>

<p align="center">
  <a href="https://health4us-website.vercel.app/">Live Website</a>
  ·
  <a href="https://github.com/sannzy/Health4Us">Repository</a>
</p>

---

## About

**Health4Us** is a web-based health platform that aims to make healthy living more engaging and accessible through a combination of **health education, gamification, and digital rewards**.

Instead of presenting health information in a conventional way, Health4Us encourages users to actively participate in healthy activities and build positive habits through an interactive experience.

The platform was developed as a web application using **Laravel** and incorporates a reward system called **HealthKoin** to make health-related activities more engaging.

---

## Key Features

### Health Activities

Users can participate in various health-related activities designed to encourage healthier daily habits.

### Gamification

Health-related activities are supported by gamification elements to create a more interactive and motivating user experience.

### HealthKoin

Users can earn **HealthKoin** by completing activities and participating in the platform.

### Reward System

HealthKoin can be utilized within the platform's reward ecosystem, providing users with additional motivation to maintain healthy habits.

### Health & Educational Content

Provides accessible information and content to increase users' awareness of healthy lifestyles.

### User-Friendly Interface

Designed with an intuitive interface to make health-related information and activities easy to access and navigate.

---

## Tech Stack

| Technology       | Purpose                             |
| ---------------- | ----------------------------------- |
| **Laravel**      | Backend & web application framework |
| **PHP**          | Application logic                   |
| **MySQL**        | Database management                 |
| **JavaScript**   | Interactive functionality           |
| **Tailwind CSS** | User interface styling              |
| **Vite**         | Frontend asset bundling             |
| **Vercel**       | Deployment                          |

---

## System Architecture

Health4Us follows a web application architecture where the Laravel application handles the core business logic, database interactions, routing, and user-facing functionality.

```text
┌─────────────────────┐
│       User          │
└──────────┬──────────┘
           │
           ▼
┌─────────────────────┐
│    Health4Us Web    │
│     Application     │
└──────────┬──────────┘
           │
     ┌─────┴─────┐
     ▼           ▼
┌──────────┐ ┌─────────────┐
│ Laravel  │ │  Database   │
│ Backend  │ │   MySQL     │
└──────────┘ └─────────────┘
           │
           ▼
┌─────────────────────┐
│    HealthKoin &     │
│   Reward System     │
└─────────────────────┘
```

---

## Project Structure

The project is organized following the Laravel application structure:

```text
Health4Us/
├── app/
├── bootstrap/
├── config/
├── database/
├── public/
├── resources/
├── routes/
├── storage/
├── tests/
├── package.json
├── composer.json
└── README.md
```

---

## Installation

### 1. Clone the repository

```bash
git clone https://github.com/sannzy/Health4Us.git
cd Health4Us
```

### 2. Install PHP dependencies

```bash
composer install
```

### 3. Install frontend dependencies

```bash
npm install
```

### 4. Configure environment

Copy the example environment file:

```bash
cp .env.example .env
```

For Windows:

```bash
copy .env.example .env
```

Then configure the database and other environment variables in `.env`.

### 5. Generate application key

```bash
php artisan key:generate
```

### 6. Run database migrations

```bash
php artisan migrate
```

### 7. Build frontend assets

```bash
npm run build
```

For development:

```bash
npm run dev
```

### 8. Start the application

```bash
php artisan serve
```

The application will be available at:

```text
http://127.0.0.1:8000
```

---

## Live Demo

Experience the deployed version of Health4Us:

**https://health4us-website.vercel.app/**

---

## Project Goals

Health4Us was developed with several goals in mind:

* Encourage users to adopt healthier habits.
* Make health education more engaging through gamification.
* Provide an interactive platform for health-related activities.
* Introduce a reward mechanism that motivates user participation.
* Combine technology and health awareness into an accessible digital experience.

---

## Future Improvements

Potential improvements for future development include:

* Personalized health recommendations.
* More diverse health challenges and activities.
* Expanded reward and redemption mechanisms.
* Progress tracking and health activity analytics.
* Mobile-responsive improvements.
* Integration with wearable or health-tracking devices.
* Additional educational health content.

---

## Contributors

Developed collaboratively as part of a web application project.

### Team

* Sanly 
* Bella Nadya Aurelia
* Leora Natania Klarise Purba
* Zahra Annisa Afandi
---

## License

This project is developed for educational and project on Web Programming Course purposes.

---

<p align="center">
  <strong>Health4Us — Making Healthy Living More Engaging.</strong>
</p>
