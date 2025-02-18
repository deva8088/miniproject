<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daily Fitness Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f8ff;
            margin: 0;
            padding: 20px;
        }
        h1 {
            text-align: center;
            color: navy;
        }
        .details-container {
            max-width: 700px;
            margin: 0 auto;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
        }
        .entry {
            border-bottom: 1px solid #ddd;
            padding: 10px 0;
        }
        .entry:last-child {
            border-bottom: none;
        }
        p {
            margin: 5px 0;
        }
        .no-data {
            text-align: center;
            font-size: 1.2rem;
            color: gray;
        }
    </style>
</head>
<body>
    <h1>Weekly Fitness Details</h1>
    <div class="details-container" id="details-container">
        <!-- Details will be dynamically added here -->
    </div>

    <script>
        // Retrieve week data from local storage
        const weekData = JSON.parse(localStorage.getItem('savedData')) || [];
        const container = document.getElementById('details-container');

        if (weekData.length > 0) {
            weekData.forEach((entry, index) => {
                // Create a div for each day's entry
                const entryDiv = document.createElement('div');
                entryDiv.classList.add('entry');

                entryDiv.innerHTML = `
                    <p><strong>Entry ${index + 1} (${entry.date}):</strong></p>
                    <p>Exercise: ${entry.exercise}</p>
                    <p>Duration: ${entry.duration} minutes</p>
                    <p>Water Intake: ${entry.waterIntake} liters</p>
                    <p>Sleep Duration: ${entry.sleep} hours</p>
                    <p>Mood: ${entry.mood}</p>
                    <p>Weight: ${entry.weight} kg</p>
                    <p>Height: ${entry.height} cm</p>
                    <p>BMI: ${entry.bmi}</p>
                    <p>Blood Pressure: ${entry.bp}</p>
                    <p>Sugar Level: ${entry.sugar}</p>
                `;

                container.appendChild(entryDiv);
            });
        } else {
            // Show a message if there is no data
            container.innerHTML = '<p class="no-data">No fitness data available for the past week.</p>';
        }
    </script>
</body>
</html>
