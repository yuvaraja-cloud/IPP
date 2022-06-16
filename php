&lt;html&gt;
&lt;head&gt;
&lt;title&gt;PHPFormValidation&lt;/title&gt;
&lt;style&gt;
.des{
display:block;
background-color:
lightblue;width:40%;
}
&lt;/style&gt;
&lt;/head&gt;
&lt;h1&gt;
&lt;?php
error_reporting(0);
$error=array();
functioncleaninput($input)
{
foreach($inputas$key=&gt;$value)
{
$value=trim($value);
$value=stripslashes($value);
$value=htmlspecialchars($value);
}
return$input;
}
functionvalidateinput($input)
{
if(!array_key_exists(&quot;gender&quot;,$input)){
$error[&quot;gender&quot;]=&quot;*Specifyyourgender.&quot;;
}
if(!array_key_exists(&quot;hobby&quot;, $input)){
$error[&quot;hobby&quot;]=&quot;*Whatareyour hobbies?&quot;;

M.Yuva Raja
19CSE063
}
foreach($inputas$key=&gt;$value)
{
switch($key)
{
case&quot;usr&quot;:
if(empty($value))
$error[&quot;usr&quot;] = &quot;*Name cannot be left
blank!&quot;;break;
case&quot;email&quot;:
if(!filter_var($value,FILTER_VALIDATE_EMAIL))
$error[&quot;email&quot;] = &quot;*Email cannot be left
blank!&quot;;break;
case&quot;edu&quot;:
if($value==&quot;--&quot;)
$error[&quot;edu&quot;] = &quot;*Tell us about your
education!&quot;;break;
case&quot;comment&quot;:
if($value==&quot;&quot;)
$error[&quot;comment&quot;] = &quot;*This field is
required.&quot;;break;
}
}
//var_dump($error);return$error;
}
if(isset($_POST[&quot;submit-btn&quot;])){
//var_dump($_POST);
$cleandata=cleaninput($_POST);
$error=validateinput($cleandata);
}
?&gt;
&lt;/h1&gt;
&lt;divclass=&quot;des&quot;&gt;
&lt;body&gt;
&lt;formaction=&quot;index.php&quot;method=&quot;post&quot;&gt;
&lt;label&gt;Name&lt;/label&gt;
&lt;inputtype=&quot;text&quot;name=&quot;usr&quot;&gt;&lt;br&gt;
&lt;divstyle=&quot;color:red&quot;&gt;&lt;?phpecho$error[&quot;usr&quot;];?&gt;&lt;/div&gt;&lt;br&gt;
&lt;label&gt;Email&lt;/label&gt;
&lt;inputtype=&quot;text&quot;name=&quot;email&quot;&gt;&lt;br&gt;
&lt;divstyle=&quot;color:red&quot;&gt;&lt;?phpecho$error[&quot;email&quot;];?&gt;&lt;/div&gt;&lt;br&gt;
&lt;labelfor=&quot;edu&quot;&gt;Education&lt;/label&gt;
&lt;selectid=&quot;edu&quot; name=&quot;edu&quot;&gt;
&lt;optionvalue=&quot;--&quot;&gt;--&lt;/option&gt;
&lt;optionvalue=&quot;hsc&quot;&gt;HSC&lt;/option&gt;
&lt;optionvalue=&quot;sslc&quot;&gt;SSLC&lt;/option&gt;
&lt;optionvalue=&quot;dip&quot;&gt;Diplomo&lt;/option&gt;
&lt;optionvalue=&quot;be&quot;&gt;B.E&lt;/option&gt;
&lt;/select&gt;
&lt;divstyle=&quot;color:red&quot;&gt;&lt;?phpecho$error[&quot;edu&quot;];?&gt;&lt;/div&gt;&lt;br&gt;
&lt;labelfor=&quot;gender&quot;&gt;Gender&lt;/label&gt;
&lt;inputtype=&quot;radio&quot;id=&quot;gender&quot;name=&quot;gender&quot;value=&quot;male&quot;&gt;
&lt;labelfor=&quot;male&quot;&gt;Male&lt;/label&gt;
&lt;inputtype=&quot;radio&quot;id=&quot;gender&quot;name=&quot;gender&quot;value=&quot;female&quot;&gt;
&lt;labelfor=&quot;female&quot;&gt;Female&lt;/label&gt;
&lt;inputtype=&quot;radio&quot;id=&quot;gender&quot;name=&quot;gender&quot;value=&quot;none&quot;&gt;
&lt;labelfor=&quot;none&quot;&gt;Other&lt;/label&gt;
&lt;divstyle=&quot;color:red&quot;&gt;&lt;?phpecho$error[&quot;gender&quot;];?&gt;&lt;/div&gt;&lt;br&gt;
&lt;labelfor=&quot;hobbies&quot;&gt;Hobbies&lt;/label&gt;
&lt;inputtype=&quot;checkbox&quot;id=&quot;hobby&quot;name=&quot;hobby&quot;value=&quot;drawing&quot;&gt;
&lt;labelfor=&quot;vehicle1&quot;&gt;Drawing&lt;/label&gt;
&lt;inputtype=&quot;checkbox&quot;id=&quot;hobby&quot;name=&quot;hobby&quot;value=&quot;singing&quot;&gt;
&lt;labelfor=&quot;vehicle2&quot;&gt;Singing&lt;/label&gt;
&lt;inputtype=&quot;checkbox&quot;id=&quot;hobby&quot;name=&quot;hobby&quot;value=&quot;dancing&quot;&gt;
&lt;labelfor=&quot;vehicle3&quot;&gt;Dancing&lt;/label&gt;
&lt;divstyle=&quot;color:red&quot;&gt;&lt;?phpecho$error[&quot;hobby&quot;];?&gt;&lt;/div&gt;&lt;br&gt;
&lt;labelfor=&quot;comment&quot;&gt;Comment&lt;/label&gt;
&lt;br&gt;
&lt;textarearows=&quot;4&quot;cols=&quot;30&quot;name=&quot;comment&quot;&gt;&lt;/textarea&gt;
&lt;divstyle=&quot;color:red&quot;&gt;&lt;?phpecho$error[&quot;comment&quot;];
?&gt;
&lt;/div&gt;
&lt;br&gt;&lt;br&gt;
&lt;inputtype=&quot;submit&quot;value=&quot;Submit&quot;name=&quot;submit-btn&quot;&gt;
&lt;/form&gt;
&lt;/body&gt;
&lt;/html&gt;
