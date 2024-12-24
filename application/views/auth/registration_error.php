<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Error | Training Management System</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <style>
        /* Full height to center the content */
        html, body {
            height: 100%;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #f8f9fa;
        }

        /* Fade-in animation for the alert */
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        .fade-in {
            animation: fadeIn 1s ease-in-out;
        }

        /* Shake animation for the card */
        @keyframes shake {
            0% { transform: translateX(0); }
            25% { transform: translateX(-5px); }
            50% { transform: translateX(5px); }
            75% { transform: translateX(-5px); }
            100% { transform: translateX(0); }
        }

        .shake {
            animation: shake 0.5s ease-in-out;
        }

        /* Smooth transition for the redirect text */
        .fade-out {
            animation: fadeOut 5s ease-in-out forwards;
        }

        @keyframes fadeOut {
            from { opacity: 1; }
            to { opacity: 0; }
        }

        /* Card Styling */
        .card {
            max-width: 500px;
            width: 100%;
        }

        /* Responsive adjustments */
        @media (max-width: 576px) {
            .card {
                margin: 0 15px;
            }
        }
    </style>
</head>
<body>

<div class="card shake">
    <div class="card-header bg-danger text-white">
        <h4 class="card-title mb-0">Registration Failed</h4>
    </div>
    <div class="card-body text-center">
        <?php if ($this->session->flashdata('error')): ?>
            <div class="alert alert-danger alert-dismissible fade-in" role="alert">
                <?php echo $this->session->flashdata('error'); ?>
            </div>
        <?php endif; ?>
        <p class="text-danger font-weight-bold">Incorrect inputs: try to change your username or email.</p>
        <p class="fade-out">You will be redirected back to the registration form in 5 seconds.</p>
    </div>
</div>

<!-- jQuery and Bootstrap JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
    // Redirect after 5 seconds
    setTimeout(function() {
        window.location.href = "<?php echo base_url('auth/register'); ?>";
    }, 5000);
</script>

</body>
</html>
