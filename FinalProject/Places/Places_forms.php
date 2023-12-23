<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adventure Atlas - Travel Guides</title>
    <script src="https://kit.fontawesome.com/6808397e85.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="Places_forms.css">
</head>

<body>
    <?php include '../General/Header.php'; ?>

    <main>
        <form action="process-form.php" method="post" enctype="multipart/form-data">
            <legend for="guide-title">Guide Title:</legend>
            <p>Give your travel guide a catchy title, highlighting the destination and country</p>
            <input type="text" id="guide-title" name="guide-title" required>

            <legend for="location">Location:</legend>
            <select id="location" name="location" required>
                <option value="">Select a location</option>
                <option value="Africa">Africa</option>
                <option value="Asia">Asia</option>
                <option value="Europe">Europe</option>
                <option value="Oceania">Oceania</option>
                <option value="North America">North America</option>
                <option value="South America">South America</option>
            </select>

            <section>
                <legend for="travel-type">Type of Travel:</legend>
                <input type="checkbox" id="travel-type-roadtrips" name="travel-type[]" value="Roadtrips">
                <label for="travel-type-roadtrips">Roadtrips</label>
                <input type="checkbox" id="travel-type-backpacking" name="travel-type[]" value="Backpacking">
                <label for="travel-type-backpacking">Backpacking</label>
                <input type="checkbox" id="travel-type-solo" name="travel-type[]" value="Solo Travel">
                <label for="travel-type-solo">Solo Travel</label>
                <input type="checkbox" id="travel-type-luxury" name="travel-type[]" value="Luxury Travel">
                <label for="travel-type-luxury">Luxury Travel</label>
                <input type="checkbox" id="travel-type-budget" name="travel-type[]" value="Budget Travel">
                <label for="travel-type-budget">Budget Travel</label>
                <input type="checkbox" id="travel-type-active" name="travel-type[]" value="Active">
                <label for="travel-type-active">Active</label>
            </section>

            <section>
                <legend for="image">Image:</legend>
                <input type="file" id="image" name="image" accept="image/*" required>
            </section>

            <section>
                <legend for="guide-summary">Guide Summary:</legend>
                <p>Craft a compelling summary that captures the essence of your travel guide and leaves readers eager to
                    explore</p>
                <textarea id="guide-summary" name="guide-summary" rows="10" required></textarea>
            </section>

            <section>
                <legend for="detailed-paragraph">Detailed Paragraph:</legend>
                <p>Offer readers a wealth of information about your destination in this section, including practical
                    details such as visa requirements, weather, health and safety considerations, and more.</p>
                <textarea id="detailed-paragraph" name="detailed-paragraph" rows="10" required></textarea>
            </section>

            <section id="num-sections-section">
                <legend for="num-sections">Sections:</legend>
                <div>
                    <label for="section1-title">Section 1 Title:</label>
                    <input type="text" name="section1-title" id="section1-title">
                    <br>
                    <label for="section1-content">Section 1 Summary:</label>
                    <textarea name="section1-content" id="section1-content" rows="10"></textarea>
                </div>

                <div>
                    <label for="section2-title">Section 2 Title:</label>
                    <input type="text" name="section2-title" id="section2-title">
                    <br>
                    <label for="section2-content">Section 2 Summary:</label>
                    <textarea name="section2-content" id="section2-content" rows="10"></textarea>
                </div>

                <div>
                    <label for="section3-title">Section 3 Title:</label>
                    <input type="text" name="section3-title" id="section3-title">
                    <br>
                    <label for="section3-content">Section 3 Summary:</label>
                    <textarea name="section3-content" id="section3-content" rows="10"></textarea>
                </div>

                <div>
                    <label for="section4-title">Section 4 Title:</label>
                    <input type="text" name="section4-title" id="section4-title">
                    <br>
                    <label for="section4-content">Section 4 Summary:</label>
                    <textarea name="section4-content" id="section4-content" rows="10"></textarea>
                </div>
            </section>

            <input type="submit" value="Submit Guide">
        </form>
    </main>

    <?php include '../General/Footer.php'; ?>

</body>

</html>