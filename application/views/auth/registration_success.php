<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Success</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        .success-message {
            text-align: center;
            margin-top: 50px;
        }

        .success-animation {
            width: 200px;
            margin: 0 auto;
        }

        /* Confetti animation */
        .confetti {
            position: fixed;
            top: 0;
            left: 50%;
            width: 15px;
            height: 15px;
            background: #FFC700;
            animation: fall 2s infinite ease-in-out;
        }

        @keyframes fall {
            0% {
                transform: translateX(0) translateY(0);
            }
            100% {
                transform: translateX(calc(-50vw + 100%)) translateY(100vh);
            }
        }
    </style>
</head>
<body>

<div class="container">
    <div class="success-message">
        <h1>Congratulations!</h1>
        <p>You have registered successfully.</p>
        <p>You will receive an email for further processes.</p>
        <div class="success-animation">
            <i class="fas fa-trophy fa-5x text-warning"></i>
        </div>
    </div>
</div>

<!-- Confetti Animation -->
<script>
    // Create a confetti effect
    function createConfetti() {
        for (let i = 0; i < 100; i++) {
            let confetti = document.createElement('div');
            confetti.classList.add('confetti');
            confetti.style.background = getRandomColor();
            document.body.appendChild(confetti);
            confetti.style.left = Math.random() * 100 + 'vw';
            confetti.style.animationDelay = Math.random() * 2 + 's';
            setTimeout(() => confetti.remove(), 5000); // Remove after animation
        }
    }

    // Random color generator
    function getRandomColor() {
        const colors = ['#FFC700', '#FF5733', '#C70039', '#900C3F', '#581845'];
        return colors[Math.floor(Math.random() * colors.length)];
    }

    // Trigger the confetti effect
    createConfetti();

    // Redirect to the login page after 5 seconds
    setTimeout(function() {
        window.location.href = "<?php echo base_url('auth/login'); ?>";
    }, 5000); // 5 seconds delay before redirecting

</script>

<!-- Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
