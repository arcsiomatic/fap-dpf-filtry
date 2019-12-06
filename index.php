<?php
//ll DOCUMENT ROOT  ------------------------------------------------
$document_root = $_SERVER['DOCUMENT_ROOT'];
//    echo $document_root;
if (strpos($document_root, 'wamp64') !== false)
{
    $document_root .='/fap-dpf-filtry.cz/';
    $server = 'localhost';
}
elseif (strpos($document_root, 'profi-chiptuning.cz') !== false)
{
    $document_root .='/';
    $server = 'new';
}
else
{
    $document_root .= "/new/";
    $server = 'new';
}
//echo $document_root;
// TODO - Doesnt work trough httacess - if WORDPRESS IN SUBDIR
if (isset($_GET['p1']) and $_GET['p1'] == 'wp')
{
    include($document_root . 'wp/index.php');
    exit;
}
//ll SCRIPT TIME START -----------------------------------------------------
$script_time = round(microtime(true) * 1000);
//ll SESSION START ----------------------------------------------------------
session_start();


//ll LOG (what comes from httaccess) ------------------------------------
// also in php_error.log
if (1 == 2)
{
    $log = $script_time . "\n";
    if (isset($_GET))
    {
        $log .= "GET: \n";
        foreach ($_GET as $key => $value)
        {
            $log .= ', ' . $key . '  - ' . $value;
        }
    }
    if (isset($_POST))
    {
        $log .= "\nPOST: \n";
        foreach ($_POST as $key => $value)
        {
            $log .= ', ' . $key . '  - ' . $value;
        }
    }
    $log.= "----------------------\n";
//    file_put_contents("log.txt", $log, FILE_APPEND);
}



//ll BASE URL also in config !!! -----------------------------------------------------------
$baseUrl = $_SERVER['HTTP_HOST'];
//echo $baseUrl;
if ($baseUrl == "localhost")
    $baseUrl = "http://localhost/fap-dpf-filtry.cz/";
elseif ($baseUrl == "dpf")
    $baseUrl = "";
elseif ($baseUrl == "www.fap-dpf-filtry.cz")
    $baseUrl = "https://" . $baseUrl . '/';
elseif ($baseUrl == "fap-dpf-filtry.cz")
    $baseUrl = "https://" . $baseUrl . '/';
DEFINE('BASE', $baseUrl);


// workaround for images??? must resolve in htaccess !!! ----------------------------------
if (isset($_GET['p1']) and $_GET['p1'] == 'images' and isset($_GET['p2']))
{
    if (file_exists($document_root . 'images/' . $_GET['p2']))
    {
        include('images/' . $_GET['p2']);
        exit;
    }
};


//ll LOGIN  ------------------------------------------------
$admin = 0;
settype($admin, "int");
if (isset($_POST['login']) and $_POST['login'] == 'minotaur')
{
    $_SESSION['admin'] = 1;
    $_POST['login'] = "";
}
//ll LOGOUT & redir to home ------------------------------------------------
if (isset($_GET['p2']) and $_GET['p2'] == 'logout')
{
    $admin = 0;
    $_SESSION['admin'] = 0;
    $admin = 0;
    $_GET['p2'] = false;
    $_GET['p1'] = false;
    $_POST = '';
    header('Location: ' . BASE);
    exit;
}
//ll SET ADMIN from session ------------------------------------------------
if (isset($_SESSION['admin']) and ( $_SESSION['admin'] == '1' or $_SESSION['admin'] == 1))
{
    $admin = 1;
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
}
else
{
    $admin = 0;
}
//ll SET CACHING  ------------------------------------------------
if (isset($_GET['cacheon']))
{
    $_SESSION['caching'] = '1';
}
if (isset($_GET['cacheoff']))
{
    $_SESSION['caching'] = '0';
}
if (isset($_SESSION['caching']) and $_SESSION['caching'] == '1')
{
    $_GET['cacheoff'] = '1';
}




//llTODO - SITE SETTINGS --------------------------------------------------------------------------------------
$facebook_page = "https://www.facebook.com/Fapdpf-filtry-%C4%8Di%C5%A1t%C4%9Bn%C3%AD-v%C3%BDm%C4%9Bna-diagnostika-111010410369946";
$facebook_id = "111010410369946";
$instagram_page = "";
$wysiwyg = true;
$messenger_link = "m.me/111010410369946";
$skype_link = "";
$google_ua = "";
$facebook_pixel_id = "";
$whatsapp_link = "https://wa.me/420608650065";
$thumbsversions = [1200, 900, 800, 600, 400, 200]; //sizes of thumbs
$nocss = false; // for debugging turn off css and js
$nojs = false; // for debugging turn off css and js
$nojscss = false; // for debugging turn off css and js
//$renewing_page_cache = false; // when generating cache files
$ob_started = false;
$site_title = 'Profesionální čištění filtrů FAP/DPF - Praha, Brno, Ostrava';
$meta_description = 'Expresní čištění filtrů pevných částic FAP/DPF na profesionálním stroji - Praha, Brno, Ostrava. Svoz z celé ČR';

//ll SETTINGS UNNECESSARY VARIABLES ------------------------------------------------
$messages = array();
$test_cache = ''; $using_page_cache = false; $adminpage = false;
$safeAccess = false;
$fbpixel = false;
$page_blocks = '';
$form_feedback = "";
$ob_start_avoid = false;
$form_feedback = false;

// TODO JUST FOR DEBUGING  ------------------------------------------------------------
// // TODO JUST FOR DEBUGING  ------------------------------------------------------------
// // TODO JUST FOR DEBUGING  ------------------------------------------------------------
// // TODO JUST FOR DEBUGING  ------------------------------------------------------------
// // TODO JUST FOR DEBUGING  ------------------------------------------------------------
// TODO JUST FOR DEBUGING  ------------------------------------------------------------
//$admin = 1;
//    $ob_start_avoid = true;
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


if ($admin)
    $messages[] = "<!-- admin -->";

//ll SAVE SIMPLE ADMIN CONTENT --------------------------------------------------
if (isset($_POST['saveAdminContent']) and $admin)
{
    // create new page
    $_POST['adminContent'] = str_replace('t****extarea', 'textarea', $_POST['adminContent']);
    if ($_POST['saveAdminContent'] == 'copyThisPage')
    {
        file_put_contents($document_root . 'content/page_info/' . $_POST['newName'], $_POST['newInfoFile']);
        file_put_contents($document_root . 'content/' . $_POST['newName'] . '.html', $_POST['adminContent']);
    }
    else
    {
//        msg($_POST['saveFile']);
        if (file_put_contents($_POST['saveFile'], $_POST['adminContent']))
            msg('adminContent saved ' . $_POST['saveAdminContent']);
    }
    file_put_contents($document_root . 'lastupdate', time());
}

//ll SEND MAILS  --------------------------------------------------
if (isset($_POST['someFormSent']))
{

//$form_feedback .= "form sent ";

    if (isset($_POST['captcha']) && ($_POST['captcha'] != ""))
    {
// Validation: Checking entered captcha code with the generated captcha code
//               $form_feedback .= "Captcha isset ";

        if (strcasecmp($_SESSION['captcha'], $_POST ['captcha']) != 0)
        {
// Note: the captcha code is compared case insensitively.
// if you want case sensitive match, update the check above to strcmp()
//$form_feedback .= "Captcha NOK ";

//            $form_feedback = "sess: ".$_SESSION['captcha'].", post:  ". $_POST ['captcha'];
            $form_feedback .= "<p style='color:#FFFFFF; font-size:20px'><span style='background-color:#FF0000;'>Pane, jste robot? Chybná captcha.</span></p>";
        }
        else
        {
//            $form_feedback .= "Captcha ok";

            $to = 'marek.paral@centrum.cz';
            $subject = 'Objednávka/zpráva z fap-dpf-filtry';
            $headers = 'From: info@fap-dpf-filtry.cz' . "\r\n" .
                    'Reply-To: info@fap-dpf-filtry.cz' . "\r\n" .
                    "MIME-Version: 1.0\r\n" .
                    "Content-Type: text/html; charset=UTF-8\r\n" .
                    'X-Mailer: PHP/' . phpversion();

            $mailcontent ="";
            foreach ($_POST as $key => $value)
            {
                if (strpos($key, 'omeFormSen') == false and strpos($key, 'hidden') == false and strpos($key, 'aptch') == false)
                {
                    if (strpos($key, 'email') !== false) $formEmail = trim($value);
                    $mailcontent .= "<tr><td>" . $key . "</td><td> <strong>" . $value . "</strong></td></tr>";
                }
            }
            $mailcontent =  'Objednávka/zpráva z fap-dpf-filtry.cz: <br /><br /><table>'.str_replace('form_field_', '', $mailcontent) . "</table><p>Email odeslán z fap-dpf-filtry.cz</p>";
            if (mail($to, $subject, $mailcontent, $headers))
            {
//        echo "Zpráva $mailcontent odeslána";
                $form_feedback .= '<p>Vaše zpráva byla odeslána, děkujeme. Ozveme se vám obratem.</p>';
            }
            // NEODESLANY MAIL
            else { $form_feedback .= "<p style='color:#FFFFFF; font-size:20px'><span style='background-color:#FF0000;'>Oups, něco se při odesílání pokazilo!</span></p>";

            }
            // KOPIE KLIENTOVI
            $subject = 'Kopie Vaší objednávky/zprávy z fap-dpf-filtry.cz';
            if (mail($formEmail, $subject, $mailcontent, $headers))
            {
//        echo "Zpráva $mailcontent odeslána";
                $form_feedback .= '<p>Kopie zprávy byla odeslána na '.$formEmail.', </p>';
            }
            // NEODESLANA KOPIE
            else { $form_feedback .= "<p style='color:#FFFFFF; font-size:20px'><span style='background-color:#FF0000;'>Oups, kopii emailu se nepodařilo odeslat na '.$formEmail.'!</span></p>";

            }
            $file= $document_root.'content/sentForms/order-'.date('Y-m-d-H-m-s')."";
//            $form_feedback .= $file;
            if (file_put_contents($file, $mailcontent));

        } // /captcha is ok
    } else    $form_feedback .= "<p style='color:#FFFFFF; font-size:20px'><span style='background-color:#FF0000;'>Zapomněli jste vyplnit antispam captcha pole!</span></p>";

}


//ll DELETE CACHE  ------------------------------------------------
if ($admin and isset($_GET['p2']) and $_GET['p2'] == 'uncache')
{
    $files = array_diff(scandir($document_root . 'cache/page_cache'), array('.', '..'));
    $delcounter = 0;
    foreach ($files as $key => $value)
    {
        if (unlink($document_root . 'cache/page_cache/' . $value))
            $delcounter++;
    }
    $files = array_diff(scandir($document_root . 'cache/fragment_cache'), array('.', '..'));
    foreach ($files as $key => $value)
    {
        if (unlink($document_root . 'cache/fragment_cache/' . $value))
            $delcounter++;
    }
    $messages[] = "<!-- all $delcounter cache files deleted -->";
    $_GET['p1'] = 'uncache';
    $_GET['p2'] = false;
    $_GET['p3'] = false;
}
$messages[] = "<!-- document root: $document_root -->";

//ll TIME FOR CACHING - TODO TEST TIME OF SOURCE FILE   ------------------------------------------------
if ($admin)
{ // time for serving cached files
    $cached_limit = 0.01;
    $menu_cached_limit = 0.01;
}
else
{
    $cached_limit = 6;
    $menu_cached_limit = 6;
}


//ll SERVE CACHED FILES & RENEW CACHED FILES -------------------------------------
require_once($document_root . 'inc/url-factory.php');
$cached_html = $document_root . 'cache/page_cache/' . $page . '.cached';
$source_file = $document_root . 'content/' . $page . '.html';

if ((!$admin and ! isset($_GET['cacheoff'])))
{
    if (file_exists($cached_html))
    {
        $cached_time = filemtime($cached_html);
        $source_time = filemtime($source_file);
//        $diff = ((time() - $cached_time) / 60) / 60;
//        if ($diff < $cached_limit)
        $messages[] = ('<!-- times of files: ' . $cached_time . ' < ' . $source_time . '-->');
        if ($cached_time > $source_time)
        {

        // PAGE CACHE CACHE CACHE  PAGE FROM CACHE FROM CACHE FROM CACHE
        // PAGE CACHE CACHE CACHE  PAGE FROM CACHE FROM CACHE FROM CACHE
        // PAGE CACHE CACHE CACHE  PAGE FROM CACHE FROM CACHE FROM CACHE
//            include ($cached_html);
            $cached_content = file_get_contents($cached_html);
            $using_page_cache = true;
            echo $cached_content;

            // add form feedback to cached pages and refil sent form
             if ($form_feedback !=='' and $using_page_cache) {  ?>
                <!--form feedback for cached pages-->
                <script>document.addEventListener('DOMContentLoaded', function () { 
                    $('.formFeedbackField').html('<?php echo $form_feedback;?>');
                <?php
                foreach($_POST as $key => $val) {
                    if (strpos($key,'form_field') !== false){
                        ?> $('#<?php echo $key; ?>').val('<?php echo $val; ?>'); <?php
                    }
                } ?> });</script>
            <?php } 

            if ($admin)
                echo "<div style='position: absolute; top: 0; right: 2rem; background: red; color white; font-size: 6px;z-index: 1000000'>cached</div>";
//               echo "<!-- page $page served from page cache  -->";
            $script_time = round(microtime(true) * 1000) - $script_time;
            echo "<!-- page $page served from CACHE in $script_time milliseconds  -->";
            echo "</body></html>";
            exit;
        }
        elseif (file_exists($source_file))
        {
            //ll RENEWING PAGE CACHE FILE BECAUSE OF SOURCE IS NEWER
            $messages[] = '<!-- renewing page cache because of expiration -->';
            $renewing_page_cache = true;
            if (!$ob_start_avoid)
                ob_start();
            $ob_started = true;
        }
        else
        {
//            echo "soubor není platnou stránkou webu, nelze cachovat;
//            exit;
        }
    }
    else
    {
        //ll RENEWING PAGE CACHE BECAUSE OF NON EXISTING CACHE FILE
        if (file_exists($source_file))
        {
            $messages[] = '<!-- renewing page cache because empty cache -->';
            $renewing_page_cache = true;
            if (!$ob_start_avoid)
                ob_start();
            $ob_started = true;
        }
        else
        {
//            echo "soubor není platnou stránkou webu, nelze cachovat;
//            exit;
        }
    }
}

//ll FUNKCE MSG for admin messages ------------------------------------------------
function msg($mess = '', $gtp = false)
{
    global $messages;
    if ($mess == '')
    {
        echo '<div id="messages" class="php_message messages"';
        if ($gtp)
            echo ' ingetpage';
        echo '><div id="messages1"></div><div id="messages2"></div><div id="messages3"></div><div id="messages4"></div>';
        foreach ($messages as $key => $value)
        {
            $value = str_replace('<!--', '', $value);
            $value = str_replace('-->', '', $value);
            echo strip_tags($value) . "<br />";
        }
        echo "</div>";
    }
    else
    {
        $mess = str_replace('<!--', '', $mess);
        $mess = '<!--' . str_replace('-->', '', $mess) . '-->';
        $messages[] = "$mess";
    }
}

//ll CONFIG = + URL FACTORY + FUNCTIONS ------------------------------------------------------------
include('inc/config.php'); // url factory is in config
//ll HEADER-HTML 
include('inc/header-html.php');
?>
    <?php
    if (!isset($renewing_page_cache))
    {
        echo "<!-- html page  =========================================================  -->";
    }
    ?>
<div id="page" class="page">

<?php
//HEADER.PHP
if (!isset($renewing_page_cache))
{
    echo "<!-- #HEADER  =========================================================  -->";
}
?>
    <header id="header">
        <div class="header-skew">
<?php include('inc/header-top-header.php'); ?>
            <div class="header-in">
                <div id="logo" class="logo" title="Čištění filtrů pevných částic FAP/DPF">
                    <a href='<?php echo BASE; ?>'>
                        <strong><span>Čištění filtrů</span></strong><span><span>FAP/DPF</span></span></a></div>
            </div>
                <?php
// MENU:PHP
                include('inc/menu-automenu-filebased.php');
                ?>
        <?php // include('inc/header-top-header.php');   ?>
        </div>
    </header>
    <div id="contentandfooter" class="contentandfooter">
        <div id="content" class="content">
            <div id="view" class="view">
        <?php
        $safeAccess = true;
        include('inc/getPage.php');
        $safeAccess = false;
        ?>
            </div> <!-- end view -->
        </div>  <!-- /.content-->
        <?php
        include('inc/footer.php');

// SAVE PAGE  CACHE FILE
        if (isset($renewing_page_cache) and ! $ob_start_avoid)
        {
            $cache_page = ob_get_contents();  // obsah bufferu uloží do proměnné
            $cache_page = sanitize_output($cache_page);
            $file = 'cache/page_cache/' . $page . '.cached';
            $cache_page = "<!-- cached version of page $page from " . date('Y-m-d H:m:s') . " -->" . remove_html_comments($cache_page) . "<!-- cached version of page $page from " . date('Y-m-d H:m:s') . " -->";
            file_put_contents($file, $cache_page);
            ob_end_flush();
            echo "<!-- page $page was actualy renewed in cache -->";
        }

        foreach ($messages as $key => $value)
        {
            echo "$value";
        }
        $script_time = round(microtime(true) * 1000) - $script_time;
        echo "<!-- page $page generated in $script_time milliseconds  -->";


//var_dump($menu_tree);
        ?>
        </body>
</html>