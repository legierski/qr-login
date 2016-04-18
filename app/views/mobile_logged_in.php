<style>
html {
    font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
    margin: 30px;
}
</style>

<h1>You're logged in!</h1>

<?
echo $user->name.'<br>';
echo $user->email;
?>

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
