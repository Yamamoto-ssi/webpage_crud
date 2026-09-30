<?php

    session_start();
    include "../../config/database.php";
    //only admin can access this page
    if(!isset($_SESSION["role"]) || $_SESSION["role"] != "admin"){
        header("Location: ../../index.php");
        exit;
    }
    $id = isset($_GET['id']) ? intval($_GET['id']) : 0;
    $result = mysqli_query($conn, "SELECT * FROM subjects WHERE id=$id");
    $subject = mysqli_fetch_assoc($result);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Student</title>
    <link href="../../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container py-5" style="max-width:700px">
    <div class="card border-0 shadow-sm">
        <div class="card-body p-4">
            <h2>Edit Student Account</h2>
                        <form method="POST">
                <div class="mb-3">
                    <label class="form-label">Student Number</label>
                    <input type="text" name="student_no" class="form-control" value="2026-0001" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Full Name</label>
                    <input type="text" name="full_name" class="form-control" value="Juan Dela Cruz" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Username</label>
                    <input type="text" name="username" class="form-control" value="juan" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">New Password <span class="text-muted">(leave blank to keep old password)</span></label>
                    <input type="password" name="password" class="form-control">
                </div>
                <button type="submit" name="update" class="btn btn-primary">Update Student</button>
                <a href="index.php" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>
</body>
</html>
