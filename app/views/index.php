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
</style>

<h3>Scan this QR code with your phone to log in.</h3><br>
<?
function base_url() {
    return 'https://sandbox.self.li/qr-login/';
}


$urlToEncode=base_url().'key/'.$key;
generateQRwithGoogle($urlToEncode);
function generateQRwithGoogle($url,$widhtHeight ='300',$EC_level='L',$margin='0') {
    $url = urlencode($url);
    echo '<img src="http://chart.apis.google.com/chart?chs='.$widhtHeight.
'x'.$widhtHeight.'&cht=qr&chld='.$EC_level.'|'.$margin.
'&chl='.$url.'" alt="QR code" widhtHeight="'.$widhtHeight.
'" widhtHeight="'.$widhtHeight.'"/>';
}
?>
<br><br><br>
<a href="http://blog.self.li/post/14864315302/qr-login">&larr; or go back to the blog post</a>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
<script type="text/javascript">
var key2 = '<?=$key;?>';


var interval=self.setInterval("check_token()", 3000);


function check_token() {
    $.post('<?=base_url();?>check_key/', {
        key: key2
    }, function(data) {
        response = $.parseJSON(data);
        if(response.success != true) {
            alert('Ups! Something went wrong')
        }
        else {
            if(response.action == 'logged_in') {
                window.location = '<?=base_url();?>logged_in/'+key2;
            }
            else if(response.action == 'create_user') {
                window.location = '<?=base_url();?>create_user/'+key2;
            }
            else {
                console.log('still waiting...');
            }
        }

    });
}

</script>

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
