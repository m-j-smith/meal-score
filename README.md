# Meal Score
A shared household meal planner designed around the concept of a shared dinner table.

Table members plan the week's dinners together, automatically generate a shopping list from the meal plan, and rate meals after eating.

> **Status:** Early development — skeleton application in progress.

## Installation

1. Clone the repository
```bash
   git clone https://github.com/m-j-smith/meal-score.git
   cd meal-score
```

2. Install dependencies
```bash
   composer install
   npm install
```

3. Set up environment
```bash
   cp .env.example .env
   php artisan key:generate
```

4. Run database migrations
```bash
   php artisan migrate
```

5. Start the development server
```bash
   npm run dev
   php artisan serve
```

## License

[MIT](LICENSE)