<html>
<style>
input[type=text], select {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

input[type=submit] {
    width: 100%;
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

input[type=submit]:hover {
    background-color: #45a049;
}

label textarea{
 vertical-align: top;
 width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

div {
    border-radius: 5px;
    background-color: #f2f2f2;
    padding: 20px;
}
</style>
<body>

<h3>Send Message</h3>

<?php 
$sitename = ossn_site_settings('site_name');
//echo $sitename;
?>

<div>
    <form action= 'actions/post/approve.php' method= "post">
        <label for="n">Person Name</label>
        <input type="text" name="name" id= "n" placeholder="person username..">

        <label for="c">Community</label>
        <input type="text" name="comm" id="c" placeholder="community name..">

        <label for="m">Message
        <textarea rows="4" cols="53" id="m" name="message">
        </textarea>
        </label>
   
        
        <input type='hidden' name="var" value="
        <?php	
          $user=new Ossnuser;
          if(ossn_isLoggedin())
                $user = ossn_user_by_guid(ossn_loggedin_user()->guid);
          echo $user->username;
        ?>"/>
        <input type='hidden' name="sitename" value="
        <?php 
        $sitename = ossn_site_settings('site_name');
        echo $sitename;
        ?>"/>
        
        <input type="submit" value="Send Now">
    </form>
</div>



<h3>View My Messages</h3>

<div>
    <form action= 'actions/post/view.php' method= "post">
      <input type='hidden' name="var" value="
      <?php 
        $user=new Ossnuser;
        if(ossn_isLoggedin())
              $user = ossn_user_by_guid(ossn_loggedin_user()->guid);
        echo $user->username;
      ?>"/>
      <input type='hidden' name="sitename" value="
      <?php 
      $sitename = ossn_site_settings('site_name');
      echo $sitename;
      ?>"/>

      <input type="submit" value="Check Now">
    </form>
</div>

</body>
</html>