<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Redirecting...</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .loading-spinner {
            margin: 50px auto;
            width: 100px;
            height: 100px;
            border: 10px solid #f3f3f3;
            border-radius: 50%;
            border-top: 10px solid #3498db;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        .loading-text {
            text-align: center;
            font-size: 1.5rem;
            margin-top: 20px;
        }
    </style>
    <script>
        // Redirect after 5 seconds
        setTimeout(function(){
            window.location.href = "<?php echo $redirect_url; ?>";
        }, 5000);
    </script>
</head>
<body>

<div class="container text-center">
    <div class="loading-spinner"></div>
    <div class="loading-text">Please wait, you will be redirected shortly...</div>
</div>

</body>
</html>
