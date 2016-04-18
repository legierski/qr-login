<style>
html {
    text-align: center;
    margin: 100px;
    font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
}
</style>

<h1>Create new sample account:</h1>

(you can type *anything* in the fields below)<br><br><br><br>

<form action="/save_user" method="post">
    <input name="key" type="hidden" value="<?=$key;?>">

    Your email (will be used only to display your Gravatar):<br>
    <input name="email" type="text"><br><br>

    Your name:<br>
    <input name="name" type="text"><br><br>
    
    <input type="submit" value="Save user">
</form>

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
