<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Game Page</title>
    <style>
        body {
            background-image: url('resultbg.jpg'); /* Replace with your background image */
            background-size: cover;
            background-position: center;
            color: #00ff00; /* Neon green color for text */
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            overflow: hidden;
            margin: 0;
            padding: 0;
        }

        #particles-js {
            position: absolute;
            width: 100%;
            height: 100%;
            z-index: -1; /* Place behind everything */
        }

        .game-container {
            background-color: rgba(0, 0, 0, 0.8); /* Black with opacity for background */
            border-radius: 15px;
            padding: 20px;
            text-align: center;
            width: 80%;
            max-width: 500px;
            border: 2px solid #00ff00;
            position: relative;
            z-index: 1;
            display: flex;
            flex-direction: column;
            align-items: center; /* Center align the contents */
            justify-content: center;
        }

        .text-frame {
            width: 300px;
            height: 300px;
            border: 10px solid #00ff00;
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 20px;
            font-size: 50px;
            color: #00ff00;
            overflow: hidden;
        }

        .time-display {
            font-size: 20px;
            margin-top: 10px;
            color: #00ff00;
        }

        .animated-text {
            opacity: 0;
            transform: scale(0.5) rotate(0deg);
            transition: transform 0.5s ease-out, opacity 0.5s ease-out;
        }

        .animated-text.show {
            opacity: 1;
            transform: scale(1.2) rotate(10deg);
            animation: burst 0.6s forwards;
        }

        @keyframes burst {
            0% {
                transform: scale(0.5) rotate(0deg);
                opacity: 0;
            }
            50% {
                transform: scale(1.4) rotate(15deg);
                opacity: 1;
            }
            70% {
                transform: scale(1.1) rotate(-5deg);
            }
            100% {
                transform: scale(1) rotate(0deg);
            }
        }

        button {
            padding: 10px 20px;
            font-size: 16px;
            background-color: #00ff00;
            color: #000;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #00cc00;
        }
    </style>
    <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
</head>
<body>
    <div id="particles-js"></div>

    <div class="game-container">
        <div class="text-frame" id="textFrame">
            <div id="loadingText">RESULT</div>
            <div id="displayedText" class="animated-text" style="display: none;"></div>
        </div>

        <div class="time-display" id="timeDisplay">03:44:15 PM</div>

        <button id="showTextBtn" onclick="showRandomText()">CHANGE</button>
    </div>

    <script>
        function showRandomText() {
            const texts = ["SMALL","BIG","SMALL","BIG","BIG","SMALL"];
            const randomIndex = Math.floor(Math.random() * texts.length);
            const selectedText = texts[randomIndex];

            // Always show "Loading..." when button is clicked
            document.getElementById('loadingText').textContent = 'Loading...';
            document.getElementById('loadingText').style.display = 'block';
            document.getElementById('displayedText').style.display = 'none';
            document.getElementById('displayedText').classList.remove('show');

            // After 4 seconds, display the random text with burst effect
            setTimeout(() => {
                document.getElementById('displayedText').textContent = selectedText;
                document.getElementById('loadingText').style.display = 'none';
                document.getElementById('displayedText').style.display = 'block';
                setTimeout(() => {
                    document.getElementById('displayedText').classList.add('show');
                }, 50); // Slight delay to ensure the transition is visible
            }, 4000); // 4 seconds loading time

            // Hide the button during the process
            document.getElementById('showTextBtn').style.display = 'none';
            setTimeout(() => {
                document.getElementById('showTextBtn').style.display = 'block';
            }, 15000); // Button reappears after 15 seconds
        }

        function updateClock() {
            var now = new Date();
            var hours = now.getHours();
            var minutes = now.getMinutes();
            var seconds = now.getSeconds();
            var ampm = hours >= 12 ? 'PM' : 'AM';
            hours = hours % 12;
            hours = hours ? hours : 12; // The hour '0' should be '12'
            hours = hours < 10 ? "0" + hours : hours;
            minutes = minutes < 10 ? "0" + minutes : minutes;
            seconds = seconds < 10 ? "0" + seconds : seconds;
            document.getElementById('timeDisplay').textContent = hours + ":" + minutes + ":" + seconds + " " + ampm;
        }

        setInterval(updateClock, 1000); // Update the clock every second

        // Initialize Particle.js
        particlesJS('particles-js', {
            particles: {
                number: {
                    value: 80,
                    density: {
                        enable: true,
                        value_area: 800
                    }
                },
                color: {
                    value: '#ffffff'
                },
                shape: {
                    type: 'circle',
                    stroke: {
                        width: 0,
                        color: '#000000'
                    },
                    polygon: {
                        nb_sides: 5
                    }
                },
                opacity: {
                    value: 0.5,
                    random: false,
                    anim: {
                        enable: false,
                        speed: 1,
                        opacity_min: 0.1,
                        sync: false
                    }
                },
                size: {
                    value: 3,
                    random: true,
                    anim: {
                        enable: false,
                        speed: 40,
                        size_min: 0.1,
                        sync: false
                    }
                },
                line_linked: {
                    enable: true,
                    distance: 150,
                    color: '#ffffff',
                    opacity: 0.4,
                    width: 1
                },
                move: {
                    enable: true,
                    speed: 6,
                    direction: 'none',
                    random: false,
                    straight: false,
                    out_mode: 'out',
                    bounce: false,
                    attract: {
                        enable: false,
                        rotateX: 600,
                        rotateY: 1200
                    }
                }
            },
            interactivity: {
                detect_on: 'canvas',
                events: {
                    onhover: {
                        enable: true,
                        mode: 'repulse'
                    },
                    onclick: {
                        enable: true,
                        mode: 'push'
                    },
                    resize: true
                },
                modes: {
                    grab: {
                        distance: 400,
                        line_linked: {
                            opacity: 1
                        }
                    },
                    bubble: {
                        distance: 400,
                        size: 40,
                        duration: 2,
                        opacity: 8,
                        speed: 3
                    },
                    repulse: {
                        distance: 200,
                        duration: 0.4
                    },
                    push: {
                        particles_nb: 4
                    },
                    remove: {
                        particles_nb: 2
                    }
                }
            },
            retina_detect: true
        });
    </script>
</body>
</html>
