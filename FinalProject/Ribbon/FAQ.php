<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adventure Atlas - Travel Guides</title>
    <script src="https://kit.fontawesome.com/6808397e85.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="FAQ.css">
</head>

<body>
    <?php include '../General/Header.php'; ?>

    <main>
        <div class="parallax parallax-1">
            <div class="parallax-img"></div>
            <div class="parallax-text">
                <h2>FAQ</h2>
                <p>
                    Welcome to our Frequently Asked Questions (FAQ) page! We understand that planning a trip can be
                    stressful, and you may have questions about our user-generated travel guides. That's why we've
                    compiled a list of the most common questions we receive, along with detailed answers to help you
                    plan your perfect vacation.
                    <br><br>
                    In this FAQ section, we've covered some of the most important information about our website and the
                    services we offer. From how to submit your own travel guide to how to use our platform to plan your
                    trip, we've got you covered. If you have any additional questions, please don't hesitate to contact
                    us - we're always happy to help.
                </p>
            </div>
        </div>
        <!--Our website is a platform for travelers to share their experiences, recommendations, and tips with others who are planning their own trips. We believe that personal recommendations are the best way to discover hidden gems and local favorites that may not be found in traditional travel guides. Our community of travel enthusiasts creates and curates content to help you plan your perfect trip.-->

        <div class="faq">
            <h2>General Travel FAQ</h2>
            <div class="faq-item">
                <div class="faq-question">
                    <h3>What thigs should I prepare for before a trip?</h3>
                    <span class="icon"><i class="fas fa-plus"></i></span>
                </div>
                <div class="faq-answer">
                    <p>Preparing for a trip can be an exciting yet overwhelming process. Here are a few things to
                        consider before your trip:
                    <ol>
                        <li>Passport and visas: Make sure your passport is up-to-date and that you have any necessary
                            visas for your destination.</li>
                        <li>Travel insurance: Consider purchasing travel insurance to protect yourself from unexpected
                            events such as cancellations, medical emergencies, or lost luggage.</li>
                        <li>Accommodations: Book your accommodations in advance to ensure availability and to
                            potentially save money.</li>
                        <li>Transportation: Plan how you will get to and from your destination, as well as how you will
                            get around once you're there.</li>
                        <li>Itinerary: Create a rough itinerary of what you want to do and see during your trip, but be
                            flexible enough to allow for unexpected opportunities.</li>
                        <li>Packing: Make a packing list and pack accordingly, considering the climate and activities
                            you will be doing.</li>
                        <li>Finances: Make sure you have enough money for your trip, including a budget for meals,
                            souvenirs, and any activities you plan to do.</li>
                    </ol>
                    By preparing ahead of time, you can reduce stress and increase the chances of having a successful
                    and enjoyable trip.</p>
                </div>
            </div>

            <div class="faq-item">
                <div class="faq-question">
                    <h3>Traveling can be quite expensive, are there any ways I can save money?</h3>
                    <span class="icon"><i class="fas fa-plus"></i></span>
                </div>
                <div class="faq-answer">
                    <p>Yes, traveling can certainly be expensive, but there are several strategies you can use to save
                        money and stretch your travel budget. One of the most effective ways to save money on travel is
                        to be flexible with your travel dates. By traveling during the off-season or shoulder season,
                        you can often find better deals on flights, accommodations, and attractions.
                        <br><br>
                        Another strategy is to opt for budget-friendly accommodations such as hostels, homestays, or
                        Airbnb rentals, which can be more affordable than traditional hotels. Cooking your own meals
                        instead of eating out is another way to save money, and can also be a fun way to experience
                        local cuisine and culture.
                        <br><br>
                        When it comes to transportation, using public transportation such as buses, trains, or subways
                        can be a cost-effective way to get around. Additionally, look for discounts on attractions and
                        activities, and sign up for email newsletters from airlines and travel companies to be notified
                        of sales and promotions.
                        <br><br>
                        Lastly, traveling with a group of friends can help split expenses and make travel more
                        affordable.
                        <br><br>
                        By implementing these strategies, you can enjoy a <a href="../Adventure Types/AdventureTypes.php?type=Budget Travel" style="color: #126D76; font-weight: bold; text-decoration: underline;">budget-friendly trip</a> without
                        sacrificing the quality of your experience.
                    </p>
                </div>
            </div>

            <div class="faq-item">
                <div class="faq-question">
                    <h3>I'm thinking of taking a solo trip. Is it safe?</h3>
                    <span class="icon"><i class="fas fa-plus"></i></span>
                </div>
                <div class="faq-answer">
                    <p>Ready to see the world? Do it on your own terms! There are few things as liberating and exciting
                        as traveling alone. Rather than making up excuses not to travel by waiting around for someone to
                        join you, book that
                        trip and go solo. <br><br>
                        Being able to do what you like when you like is something that is often underrated. When it
                        comes to solo travel, you can choose whether you want to sleep in, fill your day with activities
                        or treat yourself to a day of getting lost in a beautiful city. <br><br>
                        However, while safety can never be guaranteed, some destinations may be considered safer than
                        others. We have compiled a list of safe travel destinations, which you can find in the <a href="../Adventure Types/AdventureTypes.php?type=Solo Travel" style="color: #126D76; font-weight: bold; text-decoration: underline;">Solo
                            Travel</a> page. Keep in mind that it's always a good idea to research your destination
                        thoroughly before you travel, and to take appropriate precautions.
                    </p>
                </div>
            </div>

            <h2>Website Related FAQ</h2>
            <div class="faq-item">
                <div class="faq-question">
                    <h3>How can I submit my own travel guide?</h3>
                    <span class="icon"><i class="fas fa-plus"></i></span>
                </div>
                <div class="faq-answer">
                    <?php
                    if (!empty($_SESSION)) {
                        // User is logged in, display the link to Places_forms
                        $uploadGuideLink = '<a href="../Places/Places_forms.php" style="color: #126D76; font-weight: bold; text-decoration: underline;">Upload Guide</a>';
                    } else {
                        // User is not logged in, display the link to the login page
                        $uploadGuideLink = '<a href="../Login&RegistrationForm/Form.php" style="color: #126D76; font-weight: bold; text-decoration: underline;">Login</a>';
                    }
                    ?>
                    <p>To submit your own travel guide, simply create an account on our website (or login if you have
                        one already) and click on the <?php echo $uploadGuideLink; ?> button. From there, you can enter all the relevant information, including photos,
                        recommendations, and tips for other travelers. Our team will review your submission, and if it
                        meets our guidelines, we'll publish it on our platform for others to enjoy.</p>
                </div>
            </div>

            <div class="faq-item">
                <div class="faq-question">
                    <h3>Can I edit my travel guide after I've published it?</h3>
                    <span class="icon"><i class="fas fa-plus"></i></span>
                </div>
                <div class="faq-answer">
                    <p>Unfortunately, at this time, editing a travel guide after it has been published is not possible.
                        We encourage our contributors to carefully review their guides before publishing to ensure
                        accuracy and completeness.</p>
                </div>
            </div>

            <div class="faq-item">
                <div class="faq-question">
                    <h3>How can I search for travel guides?</h3>
                    <span class="icon"><i class="fas fa-plus"></i></span>
                </div>
                <div class="faq-answer">
                    <p>If you already know where you are going, you can search for travel guides by entering keywords or
                        destinations in the search bar on our
                        homepage. If you still haven't decide, head to our <a href="../Destinations/Destinations.php" style="color: #126D76; font-weight: bold; text-decoration: underline;">Destinations</a>
                        page and explore results by location, category, or other criteria to help you find the perfect
                        guide for your trip.</p>
                </div>
            </div>

            <div class="faq-item">
                <div class="faq-question">
                    <h3>Are all travel guides user-generated?</h3>
                    <span class="icon"><i class="fas fa-plus"></i></span>
                </div>
                <div class="faq-answer">
                    <p>Yes, all travel guides on our website are created and submitted by users. We believe that
                        personal recommendations from fellow travelers are the best way to discover hidden gems and
                        local favorites that may not be found in traditional travel guides.</p>
                </div>
            </div>

            <div class="faq-item">
                <div class="faq-question">
                    <h3>Are there any restrictions on what I can include in my travel guide?</h3>
                    <span class="icon"><i class="fas fa-plus"></i></span>
                </div>
                <div class="faq-answer">
                    <p>We ask that all content be respectful and appropriate for all audiences. We reserve the right to
                        remove any content that violates our terms of service, including content that is offensive,
                        discriminatory, or harmful.</p>
                </div>
            </div>

            <div class="faq-item">
                <div class="faq-question">
                    <h3>How can I share my travel guide with others?</h3>
                    <span class="icon"><i class="fas fa-plus"></i></span>
                </div>
                <div class="faq-answer">
                    <p>You can share your travel guide by copying the URL from the guide page and sharing it with others
                        via email, social media, or other platforms.</p>
                </div>
            </div>

            <div class="faq-item">
                <div class="faq-question">
                    <h3>Are there any fees associated with using the website?</h3>
                    <span class="icon"><i class="fas fa-plus"></i></span>
                </div>
                <div class="faq-answer">
                    <p>No, the website is free to use for both users and contributors.</p>
                </div>
            </div>

            <div class="faq-item">
                <div class="faq-question">
                    <h3>Can I monetize my travel guide?</h3>
                    <span class="icon"><i class="fas fa-plus"></i></span>
                </div>
                <div class="faq-answer">
                    <p>At this time, we do not offer a monetization program for travel guides.</p>
                </div>
            </div>

            <div class="faq-item">
                <div class="faq-question">
                    <h3>Can I use content from other travel guides in my own guide?</h3>
                    <span class="icon"><i class="fas fa-plus"></i></span>
                </div>
                <div class="faq-answer">
                    <p>We ask that all content be original and not copied from other sources.</p>
                </div>
            </div>

            <div class="faq-item">
                <div class="faq-question">
                    <h3>How do I know if a travel guide is up-to-date?</h3>
                    <span class="icon"><i class="fas fa-plus"></i></span>
                </div>
                <div class="faq-answer">
                    <p>Unfortunately, we cannot guarantee that all information is current. Please use your own judgement
                        and do your own research before making travel plans.</p>
                </div>
            </div>

            <div class="faq-item">
                <div class="faq-question">
                    <h3>How do I update information on a travel guide that has already been published?</h3>
                    <span class="icon"><i class="fas fa-plus"></i></span>
                </div>
                <div class="faq-answer">
                    <p>Unfortunately, updating information on a travel guide that has already been published is not
                        possible at this time. We recommend creating a new guide with the updated information.</p>
                </div>
            </div>

            <div class="faq-item">
                <div class="faq-question">
                    <h3>Can I use the website to plan my own trip?</h3>
                    <span class="icon"><i class="fas fa-plus"></i></span>
                </div>
                <div class="faq-answer">
                    <p>Yes, the website is designed to help users plan their own trips by providing detailed and
                        accurate information about destinations, activities, and accommodations.</p>
                </div>
            </div>
        </div>
        <div class="parallax parallax-2"></div>
    </main>

    <?php include '../General/Footer.php'; ?>

    <script>
        const faqQuestions = document.querySelectorAll('.faq-question');

        faqQuestions.forEach((question) => {
            question.addEventListener('click', () => {
                const answer = question.nextElementSibling;
                const icon = question.querySelector('.icon i');

                question.classList.toggle('open');

                if (answer.style.display === 'block') {
                    answer.style.display = 'none';
                    icon.classList.remove('fa-minus');
                    icon.classList.add('fa-plus');
                } else {
                    answer.style.display = 'block';
                    icon.classList.remove('fa-plus');
                    icon.classList.add('fa-minus');
                }
            });
        });
    </script>
</body>

</html>