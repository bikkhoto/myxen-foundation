<?php
// Simple authentication (in production, use proper authentication)
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header('Location: admin-login.php');
    exit;
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $job_data = [
        'title' => $_POST['title'],
        'slug' => createSlug($_POST['title']),
        'description' => $_POST['description'],
        'type' => $_POST['type'],
        'location' => $_POST['location'],
        'regions' => $_POST['regions'],
        'responsibilities' => $_POST['responsibilities'],
        'requirements' => $_POST['requirements'],
        'benefits' => $_POST['benefits'],
        'onboarding_date' => $_POST['onboarding_date'],
        'is_urgent' => isset($_POST['is_urgent']) ? 1 : 0,
        'created_at' => date('Y-m-d H:i:s')
    ];
    
    // Save to JSON file (in production, use database)
    $jobs = json_decode(file_get_contents('data/jobs.json'), true) ?? [];
    $jobs[] = $job_data;
    file_put_contents('data/jobs.json', json_encode($jobs, JSON_PRETTY_PRINT));
    
    $success = "Job posted successfully!";
}

function createSlug($text) {
    return strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $text), '-'));
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Post Job - MyXen Foundation</title>
    <style>
        /* Admin styles */
        .admin-container { max-width: 800px; margin: 2rem auto; padding: 2rem; }
        .form-group { margin-bottom: 1.5rem; }
        label { display: block; margin-bottom: 0.5rem; font-weight: bold; }
        input, textarea, select { width: 100%; padding: 0.75rem; border: 1px solid #ddd; border-radius: 4px; }
        textarea { min-height: 100px; }
        .btn { padding: 0.75rem 1.5rem; background: #007AFF; color: white; border: none; border-radius: 4px; cursor: pointer; }
    </style>
</head>
<body>
    <div class="admin-container">
        <h1>Post New Job</h1>
        
        <?php if (isset($success)): ?>
            <div style="background: #d4edda; color: #155724; padding: 1rem; border-radius: 4px; margin-bottom: 1rem;">
                <?= $success ?>
            </div>
        <?php endif; ?>
        
        <form method="POST">
            <div class="form-group">
                <label>Job Title *</label>
                <input type="text" name="title" required>
            </div>
            
            <div class="form-group">
                <label>Job Description *</label>
                <textarea name="description" required></textarea>
            </div>
            
            <div class="form-group">
                <label>Job Type *</label>
                <select name="type" required>
                    <option value="full-time">Full-time</option>
                    <option value="part-time">Part-time</option>
                    <option value="contract">Contract</option>
                </select>
            </div>
            
            <div class="form-group">
                <label>Location *</label>
                <select name="location" required>
                    <option value="remote">Remote</option>
                    <option value="hybrid">Hybrid</option>
                    <option value="onsite">On-site</option>
                </select>
            </div>
            
            <div class="form-group">
                <label>Regions (for Country Manager)</label>
                <input type="text" name="regions" placeholder="Africa, South America, Asia...">
            </div>
            
            <div class="form-group">
                <label>Responsibilities (one per line) *</label>
                <textarea name="responsibilities" required></textarea>
            </div>
            
            <div class="form-group">
                <label>Requirements (one per line) *</label>
                <textarea name="requirements" required></textarea>
            </div>
            
            <div class="form-group">
                <label>Benefits (one per line)</label>
                <textarea name="benefits"></textarea>
            </div>
            
            <div class="form-group">
                <label>Onboarding Date</label>
                <input type="date" name="onboarding_date">
            </div>
            
            <div class="form-group">
                <label>
                    <input type="checkbox" name="is_urgent" value="1"> Mark as Urgent Hiring
                </label>
            </div>
            
            <button type="submit" class="btn">Post Job</button>
        </form>
    </div>
</body>
</html>