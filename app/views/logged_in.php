<style>
html {
    text-align: center;
    margin: 100px 0 0;
    font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
}

a {
    color: #003399;
    text-decoration: none;
}

a:hover {
    text-decoration: underline;
}

em {
    font-family: Georgia, serif;
    color: #888;
}
</style>

<h1>You're logged in!</h1>

<?
echo $user->name.'<br>';
echo $user->email.'<br><br>';
?>

<img src="//www.gravatar.com/avatar/<?=md5( strtolower( trim( $user->email ) ) );?>?s=250">
<br><br>

<em><strong>Note:</strong> Refresh page to log in again</em><br><br>
<em><strong>Note 2:</strong> Try to log in from another computer with the same phone - you won't be asked to fill the form again.</em><br><br>
<em><strong>Note 3:</strong> Using "Barcode Scanner" app on Android? Disable the "Retrieve more info" option to ensure you are remembered between sessions.</em>

<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-27961627-1']);
  _gaq.push(['_setDomainName', '.self.li']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
