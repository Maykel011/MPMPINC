<?php
echo "<h1>File Location Check</h1>";

echo "<h2>Current directory: " . __DIR__ . "</h2>";

echo "<h2>Files in this directory:</h2>";
$files = scandir(__DIR__);
echo "<ul>";
foreach($files as $file) {
    if ($file != '.' && $file != '..') {
        if (is_dir($file)) {
            echo "<li>📁 <strong>$file</strong>/</li>";
        } else {
            echo "<li>📄 $file</li>";
        }
    }
}
echo "</ul>";

echo "<h2>Looking for careerbackend.php:</h2>";
if (file_exists('careerbackend.php')) {
    echo "✅ careerbackend.php exists in root folder<br>";
} else {
    echo "❌ careerbackend.php NOT found in root folder<br>";
}

echo "<h2>Looking in backend folder:</h2>";
if (is_dir('backend')) {
    echo "✅ backend folder exists<br>";
    $backendFiles = scandir('backend');
    foreach($backendFiles as $file) {
        if ($file != '.' && $file != '..') {
            echo "📄 $file<br>";
        }
    }
} else {
    echo "❌ backend folder does NOT exist<br>";
}

echo "<h2>Looking in config folder:</h2>";
if (is_dir('config')) {
    echo "✅ config folder exists<br>";
    $configFiles = scandir('config');
    foreach($configFiles as $file) {
        if ($file != '.' && $file != '..') {
            echo "📄 $file<br>";
        }
    }
} else {
    echo "❌ config folder does NOT exist<br>";
}

echo "<h2>Looking in javascript folder:</h2>";
if (is_dir('javascript')) {
    echo "✅ javascript folder exists<br>";
    $jsFiles = scandir('javascript');
    foreach($jsFiles as $file) {
        if ($file != '.' && $file != '..') {
            echo "📄 $file<br>";
        }
    }
} else {
    echo "❌ javascript folder does NOT exist<br>";
}
?>