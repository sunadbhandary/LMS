<?PHP
require_once("fg_membersite.php");
require_once("initialize.php");

$fgmembersite = new FGMembersite();

//Provide your site name here
$fgmembersite->SetWebsiteName('PESLMS');

//Provide the email address where you want to get notifications
$fgmembersite->SetAdminEmail('librarypesit@gmail.com');

//Provide your database login details here:
//hostname, user name, password, database name and table name
//note that the script will create the table (for example, fgusers in this case)
//by itself on submitting register.php for the first time
$fgmembersite->InitDB(/*hostname*/'localhost',
                      /*username*/'root',
                      /*password*/'sannub',
                      /*database name*/'se',
                      /*table name*/'user');

//For better security. Get a random string from this link: http://tinyurl.com/randstr
// and put it here
$fgmembersite->SetRandomKey('qSRcVS6DrTzrPvr');

?>
