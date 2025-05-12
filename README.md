# Goal of the project

Learn to make the back and front end of an app.
In my case I didn't had the classes for the back so it is emulated in the api.php where instead of request there is already the Json results.

## Limits
The app for a lack of inspiration took the idea of the matrix and a lot of small interactions could have been added but the core of what is required is present.
The story was cowritten by ChatGPT and for a lack of imagination and time the images are from an API to get something on the screen other than text for the sake of learning how to do this. 
This allow for multiple interpretation of the story for the player. 

## How to play
To play it you simply can click the different options presented or type in partially the answers to give a better simulation of the terminal.
The story has some problems where you get sent back to the start and this in the end is close to a soft reset.
Progression is saved at each steps taken



# Manual for setting it up copied and edited from the original project 
original is : https://github.com/Chabloz/WebMobUI52-fullstack.git


## ⚙️ Installation Steps ⚙️

Follow these steps to get your project up and running:

### 1. Clone Repository & Set Upstream 🔄

Clone the boilerplate repository and then point the remote origin to your own GitHub repository (make sure you create it on GitHub first!).

```bash
# Clone the boilerplate
git clone https://github.com/B-Nikola/-WebMobUI52-Domovoi .

# Set your repository as the origin
git remote set-url origin https://github.com/YourGitHubUsername/YourAppName.git
```

### 3. Install Dependencies 📦

Install both the Node.js and PHP dependencies.

```bash
# Install Node.js dependencies and build assets
npm install
npm run build

# Install PHP dependencies
composer install
```

### 4. Configure Environment 📝

Copy the example environment file to create your own configuration.

```bash
cp .env.example .env
```

👉 **Important:** Edit the `.env` file if you need to configure database connections or other settings. By default, it uses SQLite.

### 5. Generate Key & Run Migrations 🔑

Generate the unique application key and set up the database schema.

```bash
# Generate application key
php artisan key:generate

# Run database migrations
php artisan migrate
```

### 6. Run the Application ▶️

Start the development server.

```bash
composer run dev
```

🎉 Your application should now be running! 🎉