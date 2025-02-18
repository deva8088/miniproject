<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Senior Citizen Fitness Tracker</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: lightblue;
            margin: 0;
            padding: 20px;
            width: 100%;
        }
        h1 {
            text-align: center;
            color: navy;
        }
        form {
            max-width: 1000px;
            margin: 0 auto;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
        }
        label {
            display: block;
            margin: 10px 0 5px;
            font-weight: bold;
        }
        input, select, button {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button {
            background-color: navy;
            color: white;
            font-size: 1rem;
            cursor: pointer;
        }
        button:hover {
            background-color: darkblue;
        }
        .bmi-result {
            font-weight: bold;
            color: darkgreen;
            margin-top: -15px;
            margin-bottom: 20px;
        }
        .deva{
            text-align: center; 
        }
    </style>
</head>
<body>
    <h1>Daily Fitness Details</h1>
    <form id="fitness-form">
        <label for="exercise">Exercise</label>
        <select id="exercise" required>
            <option value="Walking">Walking</option>
            <option value="Yoga">Yoga</option>
            <option value="Stretching">Stretching</option>
            <option value="Light Aerobics">Light Aerobics</option>
            <option value="Swimming">Swimming</option>
            <option value="Cycling">Cycling</option>
            <option value="Tai Chi">Tai Chi</option>
        </select>

        <label for="duration">Duration (in minutes)</label>
        <input type="number" id="duration" placeholder="e.g., 30" required />

        <label for="water-intake">Water Intake (in liters)</label>
        <input type="number" id="water-intake" placeholder="e.g., 2" step="0.1" required />

        <label for="sleep">Sleep Duration (in hours)</label>
        <input type="number" id="sleep" placeholder="e.g., 7" step="0.1" required />

        <label for="mood">Mood</label>
        <select id="mood" required>
            <option value="Happy">Happy</option>
            <option value="Relaxed">Relaxed</option>
            <option value="Tired">Tired</option>
            <option value="Stressed">Stressed</option>
        </select>

        <label for="weight">Weight (in kg)</label>
        <input type="number" id="weight" placeholder="e.g., 70" required />

        <label for="height">Height (in cm)</label>
        <input type="number" id="height" placeholder="e.g., 170" required />

        <button type="button" onclick="calculateBMI()">Calculate BMI</button>
        <p class="bmi-result" id="bmi-result"></p>

        <label for="bp">Blood Pressure (in mmHg)</label>
        <input type="text" id="bp" placeholder="e.g., 120/80" required />

        <label for="sugar">Sugar Level (in mg/dL)</label>
        <input type="number" id="sugar" placeholder="e.g., 100" required />

        <a href="save.php" onclick="saveDetails()">
            <button type="button">Save</button>
        </a>
        <div class="deva">
            <a href="logout.php" >Logout</a>
        </div>
        
    </form>

    <script>
        function calculateBMI() {
            const weight = parseFloat(document.getElementById('weight').value);
            const height = parseFloat(document.getElementById('height').value);

            if (weight && height) {
                const heightInMeters = height / 100;
                const bmi = (weight / (heightInMeters ** 2)).toFixed(2);
                document.getElementById('bmi-result').textContent = `Your BMI is: ${bmi}`;
            } else {
                document.getElementById('bmi-result').textContent = 'Please enter valid weight and height.';
            }
        }

        function saveDetails() {
            const exercise = document.getElementById('exercise').value;
            const duration = document.getElementById('duration').value;
            const waterIntake = document.getElementById('water-intake').value;
            const sleep = document.getElementById('sleep').value;
            const mood = document.getElementById('mood').value;
            const weight = document.getElementById('weight').value;
            const height = document.getElementById('height').value;
            const bmi = document.getElementById('bmi-result').textContent.split(': ')[1]; // Extract BMI value
            const bp = document.getElementById('bp').value;
            const sugar = document.getElementById('sugar').value;

            const fitnessData = {
                exercise,
                duration,
                waterIntake,
                sleep,
                mood,
                weight,
                height,
                bmi,
                bp,
                sugar,
                date: new Date().toLocaleString() // More readable date format
            };

            // Get existing data from local-Storage or initialize an empty array
            const savedData = JSON.parse(localStorage.getItem('savedData')) || [];
            savedData.push(fitnessData);

            // Store updated data back to localStorage
            localStorage.setItem('savedData', JSON.stringify(savedData));
        }
    </script>
</body>
</html>
