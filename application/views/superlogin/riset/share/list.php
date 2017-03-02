<style type="text/css">
.fleft{float: left;}
h1{font-size: 36px;margin-bottom: 0px;text-align: center;}
.post_social {margin: 0 0 10px;height: 35px;}
.post_social img{float:left;margin-right: 5px;}
.post_row img {float: left;overflow: hidden;width: 200px;margin-right: 15px;margin-bottom: 8px;}
.post_row p {font-size: 16px !important;}
</style>

 <div class="content-wrapper">
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Master</a></li>
        <li class="active">User</li>
      </ol>
    </section>
    <section class="content">
        <h3>share : not fixed</h3>
       
        <div class="panel panel-primary">
            <div class="panel-heading">share wa</div>
            <div class="panel-body">
                <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <style>
            .web{
                font-family:tahoma;
                font-size:12px;
                top:10%;border:1px solid #CDCDCD;
                border-radius:10px;
                padding:10px;
                width:68%;
                margin:auto;
            }
            .web h2 a{
                text-decoration:none;
                color:#444;
            }
            .web h2 a:hover{
                text-decoration:underline;
                color:#FF0000;
            }
            .web p{
                line-height:20px;
            }
            .whatsapp{
                background-image: url('<?php echo base_url('resource/themes/images/whatsapp.png')?>'); 
                border: 1px solid #5cbe4a; 
                display: inline-block !important; 
                position: relative; 
                cursor: pointer; 
                text-transform: none; 
                color: #fff; 
                border-radius: 5px; 
                background-color: #5cbe4a; 
                background-repeat: no-repeat; 
                background-position: 5px; 
                line-height: 1.2; 
                text-decoration: none; 
                text-align: left;
                padding: 6px 6px 6px 30px;
                letter-spacing: .6px;
                font-size:16px;
            }
        </style>
        <script type="text/javascript">
            $(document).ready(function() {
                $('.whatsapp').on("click", function(e) {
                    if(/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
                        var article = $(this).attr("data-text");
                        var weburl = $(this).attr("data-link");
                        var whats_app_message = encodeURIComponent(article)+" - "+encodeURIComponent(weburl);
                        var whatsapp_url = "whatsapp://send?text="+whats_app_message;
                        window.location.href= whatsapp_url;
                    }else{
                        alert('you are not using mobile device.');
                    }
                });
            });
        </script>
         <h2><a href='http://www.stepblogging.com/google-cloud-messaging-push-notification-in-android-using-php-mysql/' target='_blank'>Google Cloud Messaging / PUSH Notification in Android using PHP, MYSQL</a></h2>
    <p>Google Cloud Messaging for Android (GCM) is a free service that helps us to send data from your server to their Andriod application on Andriod devices.</p>
    <a data-text="Google Cloud Messaging / PUSH Notification in Android using PHP, MYSQL" data-link="http://www.stepblogging.com/google-cloud-messaging-push-notification-in-android-using-php-mysql/" class="whatsapp">Share</a>
            
    <h2><a href='http://www.stepblogging.com/php-login-script-using-pdo/' target='_blank'>PHP Login Script using PDO</a></h2>
    <p>Are you looking for basic PHP login script. In this tutorial I want to discuss how to create a login page using PHP/MySQL with PDO Query , welcome and logout page. If you are a PHP beginner take a quick look at this live demo with Username : demo Password :demo. </p>
    <a data-text="PHP Login Script using PDO" data-link="http://www.stepblogging.com/php-login-script-using-pdo/" class="whatsapp">Share</a>
            </div>
            
        </div>
    </section>
  </div>
   <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1
    </div>
    <strong>Copyright &copy; <?php echo date('Y');  ?>  <a href="https://supertutorialsite.wordpress.com/"> Ahmad Bastiar || Super Tutorial </a>.</strong> All rights
    reserved.
  </footer>
  <div class="control-sidebar-bg"></div>
</div>