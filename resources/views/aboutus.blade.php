<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SPark: A Smart Parking Management System</title>

    @extends('header')
    @extends('footer')

    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(to right, #3498db, #1abc9c);
            color: #333; /* Updated text color */
            display: grid;
            flex-direction: column;
            min-height: 100vh; /* Ensure the body takes at least the full viewport height */
        }

        .about-us-section {
            height: 100%; /* Occupy the full height of the viewport */
            margin: auto;
            padding: auto;
            padding-top: 130px;
            background-color: rgba(255, 255, 255, 0.9);
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
            display: grid;
            grid-template-columns: 1fr;
            gap: 20px;
            text-align: center; /* Center the content including the image */
            flex: 1; /* Allow the content to grow and occupy available space */
        }

        /* Left content styles */
        .left-content {
            width: 48%; /* Adjust the width as needed */
        }

        /* Right content styles */
        .right-content {
            width: 48%; /* Adjust the width as needed */
        }

        section img {
            max-width: 100%; /* Ensure the image scales down proportionally */
            height: auto; /* Maintain the aspect ratio */
        }

        section h1,
        section h3 {
            color: #2c3e50;
        }

        section h1 {
            font-size: 1.5em;
            margin-bottom: 10px;
        }

        section p {
            line-height: 1.6;
            margin-bottom: 15px;
        }

        section h3 {
            text-align: center;
            font-size: 1.8em; /* Corrected font size */
            margin-bottom: 15px;
            border-bottom: 1px solid #2c3e50;
        }

        .about-footer-container {
            width: 100%;
            display: flex;
            background-color: rgba(255, 255, 255, 0.9);
            flex-direction: column;
        }

        .aboutus{
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            position: relative;
            width: 80%;
            min-height: 350px;
            margin: 3%;
            transition: all .4s;
            border: 3px solid rgb(74, 83, 118);
            background-color: #fff;
            margin: auto;
            padding: 20px;
            padding-bottom: 15px;
            box-shadow: 0px 0px 0px 10px rgba(210, 198, 198, 0.08);
        }
    </style>
</head>

<body>

    <section class="about-us-section">

        <div class="aboutus">

        <img src="layouts/SPark-logos_transparent.png" alt="">
        <h3>Company Overview:</h3>

        <p>Spark: Smart Parking Management:</p>
        <p>
            Spark specializes in providing smart parking management
            solutions to address parking challenges through
            innovative technologies and user-centric approaches.<br>
        </p>
        <h3>Potential Services:</h3>
        <h1>Smart Parking Solutions</h1>
        <p>
            - Spark offers smart parking solutions that leverage cutting-edge
            technology, including real-time analytics, user-friendly interfaces,
            and intelligent algorithms.
        </p>

        <h1>User-Centric Website Designs</h1>
        <p>
            - The company designs and implements user-friendly websites
            tailored for drivers seeking parking information, ensuring easy
            navigation and accessibility.
        </p>

        <h1>Real-Time Data Analytics</h1>
        <p>
            - Services include the development of systems that offer
            real-time insights into parking space availability,
            contributing to the optimization of existing parking spaces.
        </p>

        <h1>Financial Transparency Services</h1>
        <p>
            - Spark aims to reduce financial stress on drivers by providing
            transparent financial elements, such as a breakdown of parking fees,
            and various payment options.
        </p>

        <h3>Unique Features:</h3>
        <h1>Comprehensive Approach</h1>
        <p>
            -  Spark takes a holistic approach, addressing parking availability,
            financial transparency, and user-friendly
            interfaces to provide a seamless parking experience.
        </p>

        <h1>Innovation with Technology</h1>
        <p>
            -  The company stands out by adopting cutting-edge technology,
            including real-time analytics and intelligent algorithms,
            to revolutionize the parking experience.
        </p>

        <h1>User-Centric Design</h1>
        <p>
            -  The emphasis on user testing, feedback gathering, and
            user-friendly interfaces reflects a commitment to providing a positive and
            seamless experience for drivers.
        </p>

        <h1>Inclusivity and Accessibility</h1>
        <p>
            -  The company acknowledges and aims to address inclusivity
            challenges in urban design, emphasizing accessibility, especially
            for individuals with disabilities.
        </p>
        <h3>About us</h3>
        <p>
            Spark: Smart Parking Management is positioned as a company offering
            comprehensive smart parking solutions with a strong focus on user
            experience, technological innovation, and collaboration with local
            stakeholders, making it unique in its approach to addressing urban
            parking challenges.
        </p>
    </section>

    <div>


</body>

</html>
