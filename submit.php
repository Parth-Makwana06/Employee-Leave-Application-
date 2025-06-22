<?php
include "db.php";

$employee_name = $_POST['employee_name'];
$leave_type = $_POST['leave_type'];
$start_date = $_POST['start_date'];
$end_date = $_POST['end_date'];
$reason = $_POST['reason'];

$sql = "INSERT INTO leaves (employee_name, leave_type, start_date, end_date, reason)
        VALUES ('$employee_name', '$leave_type', '$start_date', '$end_date', '$reason')";

// Start HTML output before any potential errors
?>
<!DOCTYPE html>
<html>
<head>
    <title>Leave Application Status</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        .result-container {
            text-align: center;
            padding: 40px;
            background-color: rgba(255, 255, 255, 0.95);
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            max-width: 600px;
            margin: 50px auto;
            transform: scale(0.95);
            opacity: 0;
            animation: fadeIn 0.6s forwards;
        }
        
        @keyframes fadeIn {
            to {
                transform: scale(1);
                opacity: 1;
            }
        }
        
        .success-icon {
            font-size: 80px;
            color: #4CAF50;
            margin-bottom: 20px;
            animation: bounce 1s;
        }
        
        @keyframes bounce {
            0%, 20%, 50%, 80%, 100% {transform: translateY(0);}
            40% {transform: translateY(-30px);}
            60% {transform: translateY(-15px);}
        }
        
        .details-box {
            background-color: #f8f9fa;
            border-left: 4px solid #4CAF50;
            padding: 15px;
            margin: 20px 0;
            text-align: left;
        }
        
        .back-btn {
            display: inline-block;
            margin-top: 20px;
            padding: 12px 25px;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: all 0.3s;
        }
        
        .back-btn:hover {
            background-color: #45a049;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }
        
        .confetti {
            position: fixed;
            width: 10px;
            height: 10px;
            background-color: #f00;
            opacity: 0;
        }
    </style>
</head>
<body>
    <div class="result-container">
        <?php
        if ($conn->query($sql) === TRUE) {
            echo '<div class="success-icon">✓</div>';
            echo '<h2>Leave Application Submitted Successfully!</h2>';
            echo '<div class="details-box">';
            echo '<p><strong>Employee:</strong> '.htmlspecialchars($employee_name).'</p>';
            echo '<p><strong>Leave Type:</strong> '.htmlspecialchars($leave_type).'</p>';
            echo '<p><strong>From:</strong> '.htmlspecialchars($start_date).' <strong>To:</strong> '.htmlspecialchars($end_date).'</p>';
            if (!empty($reason)) {
                echo '<p><strong>Reason:</strong> '.nl2br(htmlspecialchars($reason)).'</p>';
            }
            echo '</div>';
            echo '<a href="index.php" class="back-btn">Back to Application</a>';
            
            // Confetti effect
            echo '<script>
                function createConfetti() {
                    const colors = ["#4CAF50", "#2196F3", "#FFC107", "#FF5722", "#9C27B0"];
                    const confetti = document.createElement("div");
                    confetti.className = "confetti";
                    confetti.style.left = Math.random() * 100 + "vw";
                    confetti.style.backgroundColor = colors[Math.floor(Math.random() * colors.length)];
                    confetti.style.transform = "rotate(" + Math.random() * 360 + "deg)";
                    document.body.appendChild(confetti);
                    
                    const animation = confetti.animate([
                        { top: "-10px", opacity: 1 },
                        { top: "100vh", opacity: 0.5 }
                    ], {
                        duration: 2000 + Math.random() * 3000,
                        easing: "cubic-bezier(0.1, 0.8, 0.3, 1)"
                    });
                    
                    animation.onfinish = () => confetti.remove();
                }
                
                // Create confetti for 2 seconds
                const interval = setInterval(createConfetti, 100);
                setTimeout(() => clearInterval(interval), 2000);
            </script>';
        } else {
            echo '<div class="success-icon" style="color: #f44336;">✗</div>';
            echo '<h2 style="color: #f44336;">Submission Failed</h2>';
            echo '<div class="details-box" style="border-left-color: #f44336;">';
            echo '<p>There was an error processing your request.</p>';
            echo '<p>'.htmlspecialchars($conn->error).'</p>';
            echo '</div>';
            echo '<a href="index.php" class="back-btn" style="background-color: #f44336;">Try Again</a>';
        }
        $conn->close();
        ?>
    </div>
</body>
</html>