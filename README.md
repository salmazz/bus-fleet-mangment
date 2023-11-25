# Bus Management System API

## Table of Contents

- [Introduction](#introduction)
- [Database Schema](#database-schema)
- [API Endpoints](#api-endpoints)
    - [1. Available Seat](#1-available-seats)
    - [2. BookSeat](#2-book-seat)
    - [3. Login](#3-login)
    - [4. Trip List](#4-trips-list)
    - [5. BookingList](#5-booking-list)
- [Design Patterns](#design-patterns)
- [Docker](#docker)
- [Authentication](#authentication)
- [Postman Collection](#postman-collection)

## Introduction

This project provides a set of APIs for managing a mini bus reservation system. It include

## Database Schema

### Entities and Attributes

- `users`: id, name, email, password, is_admin,email_verified_at
- `buses `: id, total_seats
- `seats`: id, bus_id, seat_number, is_available
- `trips` : id,date, bus_id, origin_city_id , destination_city_id
- `bookings `: id,trip_id , user_id,origin_city_id , destination_city_id,seat_id

## API Endpoints

## Path Table

| Method | Path                     | Description     |
|--------|--------------------------|-----------------|
| POST   | /api/book-seat           | Book Seat       |
| GET    | /api/available-seats/    | Available Seats |
| GET    | /api/login/              | login           |
| GET    | /api/admin/trips/        | List of trips   |
| GET    | /api/admin/booking-list/ | List of Booking |


### 1. Check Availability

Endpoint: `/api/available-seats`

Description: Get the available seats with trip information when enter the start and end city with date.

**Headers:**
- Content-Type: "application/json"
- Accept: "application/json"
- Authorization: "Bearer {{token}}"

**Request Body:**
```json
{
  "origin_city_id": 2,
  "destination_city_id" :5,
  "date" : "2023-11-01"
}
```

### 2. Reserve Table

Endpoint: `/api/book-seat`

Description: Book Seat with send data for that and ensure for no duplicate for the seat twice 


**Headers:**
- Content-Type: "application/json"
- Accept: "application/json"
- Authorization: "Bearer {{token}}"

**Request Body:**
```json
{
    "trip_id": 114,
    "seat_id": 5,
    "start_city_id": 28,
    "end_city_id": 29
}
```

### 4. Login

Endpoint: `/api/login`

Description: Make login for user make account in our system

### 4. List  Trips

Endpoint: `/api/admin/trips`

Description: List all trips with information for each trip.


### 5. List Booking list

Endpoint: `/api/admin/booking-list`

Description: List all booking with information for each book.


#### Example About Search in booking list 

Endpoint: `/admin/booking-list?search=trip_id:101`

You Can pass any parameter from the list of the booking

**Headers:**
- Content-Type: "application/json"
- Accept: "application/json"
- Authorization: "Bearer {{token}}"


## Authentication

Authentication With Sanctum

## Postman Collection

To facilitate testing and integration, provide a Postman collection that includes sample requests for each API endpoint, along with expected responses. This will help users understand how to interact with your API.

[Link to Postman Collection](https://www.postman.com/solar-rocket-457862/workspace/salma-workspace/collection/6208228-fb33e9ef-8780-46b3-b343-0331edc1da37?action=share&creator=6208228&active-environment=6208228-a360a765-9213-4d6c-b4a4-ad7a65fad7a7) - Update this link once you create the collection.

Please Add in Booking Env

- app_url: with your app link
- token :when make login
- In Every Api Body have example about request


## Design Pattern 
Using Repository Design pattern with Service Layer 


# Requirements
- PHP 8.2
- MySQL

## Getting Started

1. Clone this repository.
2. Install the required dependencies.
3. Set up your database and configure the `.env` file.
4. Migrate and seed the database.
5. Run the application.
6. Run The Jobs

## Clone
Clone this repo to your local machine using https://github.com/salmazz/bus-fleet-mangment
and run
```
git clone https://github.com/salmazz/bus-fleet-mangment
cd bus-fleet-mangment
cp .env.example .env
composer install
composer dumpautoload
```
# to login with Admin 
write ===> email:"admin@example.com" | password:"password"

# Laravel sail
run  ./vendor/bin/sail up -d to setup environment by docker
```
./vendor/bin/sail up -d
```

## Run Migrations
```bash
 ./vendor/bin/sail artisan migrate --seed
 ````

## Run Tests
```bash
 ./vendor/bin/sail artisan test
 ````
