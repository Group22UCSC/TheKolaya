

<?php include 'top-container.php';?>

<link rel="stylesheet" href="<?php echo URL?>vendors/css/admin/deleteAccount1.css">


     <div class="middle"> 
     <a >DELETE ACCOUNTS</a> </div>
  

  <div class="k1">  

<div class="wrapper1">
    <div class="title">  Delete Form  </div>

    <div class="form">
      
        <div class="inputfield">
          <label> Name</label>
          <input type="text" class="input">
       </div> 

        <div class="inputfield">
          <label>ID</label>
          <input type="text" class="input">
       </div> 

       <div class="inputfield">
          <label>Address</label>
          <textarea class="textarea"></textarea>
       </div> 

        <div class="inputfield">
          <label>Type(Landowner/Employee)</label>
          <input type="text" class="input">
       </div>

        <div class="inputfield">
          <label>Phone number</label>
          <input type="text" class="input">
       </div>

       <div class="inputfield">
          <label>Password</label>
          <input type="password" class="input">
       </div>  

       <div class="inputfield">
          <a>If you want to delete the account</a>
      
       </div> 

      
      <div class="last">
            <div class="a">
       <a href="<?php echo URL?>admin/deleteAccount"><input type="submit" value="Discard" class="btn"></a>
      </div>


       <div class="b">
        <input type="submit" value="Delete" class="btn">
      </div>
           

      </div>

     

    </div>

  </div> 
</div>
<?php include 'bottom-container.php';?>