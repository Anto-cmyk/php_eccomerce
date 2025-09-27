<?php 
session_start();
$meu = "me";

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <link style="height: 10px; width: 10px; border-radius: 50%;" rel="web icon" href="pexels-pixabay-60628.jpg"
    type="image/x-icon">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Shellie Commerce</title>
  <style>
    * {
      box-sizing: border-box;
      margin: 0px;
      padding: 0px;
    }

     

    .up-nav {
      display: flex;
      height: 80px;
      width: 100%;
      background-color: color-mix(in srgb, rgb(9, 209, 26), rgb(206, 15, 72));
      line-height: 75px;
      padding-left: 23px;
      position: fixed;
    
    }

    .profilepic {
      height: 40px;
      width: 40px;
      border-radius: 50%;
      background-size: cover;
      background-repeat: no-repeat;
    }

    a {
      text-decoration: none;
    }

    .prod-tab {
      flex-basis: 19%;
      font-size: 25px;
      font-weight: 800;
      font-family: Arial, Helvetica, sans-serif;
      margin-right: 20%;
      margin-left: 29%;
      transition: 0.8s ease-in-out;
      align-self: center;
      padding-top: 31px;

    }

    .cart_tab {
      flex-basis: 21%;
      font-size: 22px;
      font-weight: 700;
      margin-right: 5%;
      transition: 0.9s ease-in-out;
      display: flex;
      padding-top: 15px;
    }
    .cart_items{
     margin-left: 4px;
     margin-right: 3px;
     color: red;
    }

    .prof-tab {
      flex-basis: 16%;
      display: flex;
      flex-direction: column;
      margin-top: 4px;
      line-height: 0px;
      
    }
    .prof-tab h3{
      color: purple;
      flex-basis: 20%;
      padding-top: 11px;

    }
     
    .prod-tab h4{
      cursor: pointer;
      align-self: center;
      align-items: center;
      display: flex;
      flex-direction: column;
      margin-top: 1px;
      flex-basis: 30%;
      padding-top: 2px;
    }
    .profilepic{
      width: 30px;
      height: 30px;
      margin-right: 7px;
      border-radius: 50%;
      background-size: cover;
      margin-top: 1px;
      margin-bottom: 0px;
    }
    .green_label{
      position: absolute;
      background-color: green;
      z-index: 104;
      width:10px;
      height: 10px;
      border-radius: 50%;
    }
    .menu_btn{
      align-self: center;
      justify-self: center;
    }
     
 

 


    /* Products */   
    #products {
      padding: 10px;
      width: 98%;
      margin-left: 10px;
      height: fit-content;
      box-shadow: 4px 2px 4px 5px forestgreen;
      border-radius: 7px;
      display: block;
    }

    .alter-item {
      display: flex;
      width: 90%;
      border: 8px solid rgb(22, 2, 2);
      border-radius: 5px;
      height: 48px;

    }

    .add-item {
      width: 189px;
      height: 35px;
      background-color: olive;
      padding: 3px;
      flex-basis: 30%;
      cursor: pointer;
      transition: 1s ease-in-out;
      border-radius: 9px;
    }

    .add-item:hover {
      background-color: grey;
    }


    .additem-page {
      font-size: 23px;
      display: none;
    }

    .mini_item {
      align-self: center;
      justify-self: center;
      border: 1px solid rgb(20, 18, 1);
      padding: 30px;
      width: 36%;
      height: max-content;
      border-radius: 11px;
    }

    .post_item_btn {
      width: 89px;
      height: 34px;
      cursor: pointer;
      background-color: chartreuse;
      border-radius: 9px;
      transition: 1s ease-in-out;
    }

    .post_item_btn:hover {
      background-color: aqua;
    }

    .backitemsbtn {
      width: 89px;
      height: 34px;
      cursor: pointer;
      background-color: rgb(238, 241, 235);
      border-radius: 9px;
      transition: 1s ease-in-out;
    }

    .backitemsbtn:hover {
      background-color: bisque;
    }

    .additem-page .imgbox {
      width: 120px;
      height: 120px;
      border: 2px solid blueviolet;
      cursor: progress;
      background-repeat: no-repeat;
      background-size: cover;
      margin-left: 0px;
    }


    /*layouts items*/
    .mainbox {
      width: 30%;
      height: 434px;
      border: 3px solid green;
      border-radius: 14px;
      display: flex;
      flex-direction: column;
      margin-left: 3%;
      margin-bottom: 8px;
      margin-top: 15px;
      background-color: coral;
    }
   
    .more_item_details{
      display: flex;
      flex-direction: column;
      align-self: center;
      font-size: 45px;
      margin-top: -11px;
      color: blue;
      cursor: pointer;
      background-color: transparent;
    }
    .more_item_details-page{
      width: fit-content;
      height: 280px;
      align-items: center;
      padding: 16px;
      background-color: rgb(31, 17, 17);
      color: white;
      font-size: 18px;
      border-radius: 11px;
      display: none;
      margin-left: 2%;
      position: absolute;
    }
    .more_item_details-page p{
      margin-top: 12px;
      cursor: pointer;
      background-color: transparent;
    }
    
    .more_item_details_toggle{
      display: flex;
      flex-direction: column;
      
    }
    

    .itemslayout {
      display: flex;
    
      flex-wrap: wrap;
    }

    .firstrow {
      height: 10%;
      display: flex;
      justify-content: space-between;
    }

    .secrow {
      height: 57%;
      margin-top: 5px;
    }

    .thirdrow {
      height: 19%;
      margin-top: 7px;
      border: 1px solid fuchsia;
      display: flex;
      flex-direction: row;
      justify-content: center;
      justify-items: center;
      align-items: center;
    }

    .forthrow {
      flex-basis: 10%;
    }

    .layoutimg {
      width: 96%;
      height: 99%;
      background-repeat: no-repeat;
      background-size: cover;
      margin-left: 2%;


    }

    .layoutlocation {
      flex-basis: 50%;
    }

    .layoutbuy {
      width: 94%;
      margin-left: 3%;
      height: 33px;
      margin-top: 3%;
      border-radius: 12px;
      cursor: pointer;
      background-color: chartreuse;
    }

  

    /* carts page*/
    #cart_page{
      display:none;
      padding: 5px;
      width: 100%;
      height: 100%;
      margin-top: -18px;
      
    }
    .cart_title{
      align-self: center;
      justify-self: center;
      font-style: italic;
      line-height: 56px;
    }











    /*Responsive design for tablet screens*/
    @media (max-width:900px){
      *{
        box-sizing:border-box;
        margin: 0px;
        padding: 0px;
        font-size: 15px;
      }
      .up-nav{
        width: 100%;
        height: 50px;
        background-color: grey;
        display: flex;
        font-size: 12px;
        line-height: 49px;
        padding-left: 1px;
      }
      #products{
        display: flex;
        flex-direction: column;
        margin-top: 18px;
        width: 100%;
        margin-left: 0px;
        margin-right: 0px;
        font-size: 13px;
      }
      .additem-page{
        width: 100%;
        height: fit-content;
        font-size: 15px;
        margin-left: 0px;
        padding: 9px 0px;

      }
      .add-item{
        width: fit-content;
        height: fit-content;
        padding: 9px;
        font-size: 12px;
      }
      .profilepic{
        width: 28px;
        height: 30px;
        border-radius: 50%;
        background-repeat: no-repeat;
        background-size: cover;
      }
      .additem-page input{
        width: 98%;
        font-size: 12px;
      }
      .additem-page p{
        font-size: 15px;
      }
      .imgbox{
        width: 50%;
        height: 34px;
        margin-left: 0px;
      }
      .prod-tab{
        font-size: 16px;
        margin-left: 10%;
        margin-right: 10%;
      }
      .prof-tab{
        margin-left:10%;
      }
      .cart_tab{
        font-size: 16px;
        margin-left: 9%;
        margin-right: 9px;
      }
      .profilepic{
        transform: scale(0.9);
      }
      .mini_item{
        margin-left: 0px;
        margin-right: 0px;
        width: 64%;
        padding: 16px;
        align-self: center;
        padding-left: 8%;
        font-size: 21px;
      }
      .mini_item p{
        font-size: 21px;
        font-weight:800;
      }.mini_item input{
        width: 60%;
        align-self: center;
        border-radius: 4px;
        height: 22px;
      }
      .additem-page center h2{
        font-size: 24px;
      }
      .post_item_btn{
        font-size: 14px;
      }
    }

    

    /*Responsive design for mobile phones screens*/
    @media (max-width:600px){
      *{
        box-sizing:border-box;
        margin: 0px;
        padding: 0px;
        font-size: 15px;
      }
      .up-nav{
        width: 100%;
        height: 43px;
        background-color: grey;
        display: flex;
        font-size: 12px;
        line-height: 39px;
        padding-left: 1px;
      }
      #products{
        display: flex;
        flex-direction: column;
        margin-top: 15px;
        width: 100%;
        margin-left: 0px;
        margin-right: 0px;
        font-size: 13px;
      }
      .additem-page{
        width: 100%;
        height: fit-content;
        font-size: 13px;
        margin-left: 0px;
        padding: 7px 0px;

      }
      .add-item{
        width: fit-content;
        height: fit-content;
        padding: 9px;
        font-size: 12px;
      }
      .profilepic{
        width: 28px;
        height: 30px;
        border-radius: 50%;
        background-repeat: no-repeat;
        background-size: cover;
      }
      .prof-tab h3{
        padding-top: 1px;
      }
      .prod-tab img{
        margin-bottom: 3px;
      }
      .prof-tab h4{
        margin-top: 1px;
      }
      .additem-page input{
        width: 98%;
        font-size: 12px;
      }
      .additem-page p{
        font-size: 15px;
      }
      .imgbox{
        width: 40%;
        height: 30px;
        margin-left: 6px;
      }
      .prod-tab{
        font-size: 15px;
        margin-left: 10%;
        margin-right: 10%;
      }
      .prof-tab{
        margin-left:10%;
      }
      .cart_tab{
        font-size: 15px;
        margin-left: 9%;
        margin-right: 9px;
      }
      .profilepic{
        transform: scale(0.9);
      }
      .mini_item{
        margin-left: 0px;
        margin-right: 0px;
        width: 94%;
        padding: 7px;
        align-self: center;
        padding-left: 3%;
        font-size: 16px;
      }
      .mini_item p{
        font-size: 16px;
        font-weight:400;
      }.mini_item input{
        width: 86%;
        align-self: center;
        border-radius: 4px;
        height: 22px;
      }
      .additem-page center h2{
        font-size: 15px;
      }
      .post_item_btn{
        font-size: 12px;
      }
      .backitemsbtn{
        font-size: 13px;
        height: 21px;
      }
      .itemslayout{
        display:flex;
        flex-direction:column;
        align-items:center;
      }
      .mainbox{
        width: 92%;
        align-self:center;
      }
    }
  </style>
</head>

<body>
 <?php


// Connect to the database
$conn = mysqli_connect("localhost", "root", "", "testdb");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["post_item_btn"])) {
    $item_name = mysqli_real_escape_string($conn, $_POST["name"]);
    $item_cost = mysqli_real_escape_string($conn, $_POST["cost"]);
    $item_location = mysqli_real_escape_string($conn, $_POST["location"]);
    

    $name = $_FILES["img_file"]["name"];
     $item_file = addslashes(file_get_contents($_FILES["img_file"]["tmp_name"])) ;

    // Validation
    $errors = [];

    if (empty($item_name)) {
        $errors[] = "Item name is required.";
    }

    if (empty($item_cost) || !is_numeric($item_cost) || $item_cost < 0) {
        $errors[] = "Item cost must be a positive number.";
    }

    if (empty($item_location)) {
        $errors[] = "Item location is required.";
    }

    if (!empty($errors)) {
        // Display all validation errors
        echo "<ul style='color:red;'>";
        foreach ($errors as $error) {
            echo "<li>" . htmlspecialchars($error) . "</li>";
        }
        echo "</ul>";
    } else {
        // All good, insert into database
        $sql = "INSERT INTO items (`name`, `file`, `cost`, `location`)
            VALUES ('$item_name', '$item_file', '$item_cost', '$item_location')";

        if (mysqli_query($conn, $sql)) {
            echo "<script>alert('Item posted successfully!');</script>";
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }
}
  

//Fetching data to display in the the website

?>


  


  <!--   Navigation tremplate   -->
  <nav class="up-nav">
    <a class="prod-tab " href="#products"><img style="width:50px;height:50px;background-size:cover;" src="files/home-button.png" alt=""></a>
  <a class="cart_tab" id="cart" href="#cart_page"><img  style="width:50px;height:50px;background-size:cover;" src="files/trolley.png" alt="">  (<p class="cart_items" >0</p>  )</a>

    <a class="prof-tab">
      <div style="display:flex;">
           <img class="profilepic" src="Profile-default-image.jpg" alt="">
            <div styles="width:7px;height:8px;border-radius:50%;position:absolute;margin-left:-1px;color:green;" class="green_label"></div>
            <h3> <?php  echo $meu; ?></h3>

          </div>
      <h4 class="menu_btn">
      <img style="width:40px;height:40px;background-size:cover;"  src="files/settings.png" alt="">
      <h4>
</a>
  </nav>  <br><br><br><br><br> <hr>

  <!--  Products page    -->
  <div id="products">
    <div class="alter-items">
      <button class="add-item">Add an Item</button>
    </div>
  

    


  

    <form class="additem-page"  enctype="multipart/form-data" action="home.php" method="POST">
      
      <center>
        <h2>Add item</h2>
      </center><br>
      <button type="button" class="backitemsbtn">Back</button><br><br>
      <div class="mini_item">
        <p>Enter the name of the item:</p>
        <input type="text" required placeholder="Item Name" class="name" name="name" required><br><br>

        <p>Fetch your item image file:</p>
        <input type="file" required class="img_file" name="img_file" accept="image/*" ><br><br>
         <img src="" class="imgbox">

        <p>Enter the cost of the item:</p>
        <input type="number" required placeholder="Item Cost" class="cost" name="cost"><br><br>

        <p>Enter the Item's location:</p>
        <input type="text" required placeholder="Location" class="location" name="location"><br><br>

        <button type="submit" class="post_item_btn" name="post_item_btn">Post Item</button>
      </div>
    </form>
  </div>  <br> <hr>

  <!--   Product component  -->

 <div class="itemslayout">
  <?php 
  
$fetch = "SELECT * FROM items";

$results = mysqli_query($conn,$fetch);
if(mysqli_num_rows($results) > 0)
{
       
   
   
    while($row = mysqli_fetch_assoc($results))
    {


$name = htmlspecialchars($row["name"]);
$_SESSION["itemname"] = $name;
$cost = htmlspecialchars($row["cost"]);
$_SESSION["itemcost"] = $cost;

$location = htmlspecialchars($row["location"]);
$img = base64_encode($row["file"]);
$id = $row["id"];


      echo'<div class="mainbox">
        <div class="firstrow">
          <h1 class="layoutname" name="layoutname">'.$name.'</h1>
            <p class="more_item_details" > ...</p>
        </div> 
             <div class="more_item_details-page" id="'.$id.'"  >
                     
                  <p class="see_products_details">See Products details</p>
                  <p class="about_the_owner">About the seller ></p>
                  <p class="about_the_owner" >Delete item</p>
                  <p class="buy_item">Buy item</p>
                  <p class="report_item">Report item </p>
                </div>         
        <div class="secrow">
          <img src="data:image/jpeg;base64,'.$img.'" alt="" class="layoutimg"></img>
        </div>
        <div class="thirdrow">
          <h4 class="layoutlocation">'.$location.'</h4>
          <h4 class="layoutcost" name="layoutcost">' .$cost.'</h4>
        </div>
        <div class="forthrow">
          <button class="layoutbuy" name="layoutbuy" >Buy</button>
        </div>
      </div> ';
      
      
      
    
      
  
    }
    
}


  ?>

      <!-- <div class="mainbox">
        <div class="firstrow">
          <h1 class="layoutname"></h1>
        </div>
        <div class="secrow">
          <img src="" alt="" class="layoutimg"></img>
        </div>
        <div class="thirdrow">
          <h4 class="layoutlocation"></h4>
          <h4 class="layoutcost"></h4>
        </div>
        <div class="forthrow">
          <button class="layoutbuy">Buy</button>
        </div>
      </div>  -->
     </div>
     

   

  <!--  Carts tab -->
  <div id="cart_page" >
         <h1 class="cart_title" style="align-self:center;font-style:italics;">Cart<img style="width:100px;height:100px;background-size:cover;align-self:center;" src="files/purchase.png" alt=""></h1>
          
          <div class="deposit_option" style="margin-left: 70%;">
          <input type="button" value="Deposit">
          <p>Account Balance:</p>
          <input type="text" name="" id="" value="0" readonly>
          </div>
          
        


         <div>
       <?php
       echo '
        <p>Item name:'.$_SESSION["itemname"].'.</p>
        <p> Cost: Ksh.'.$_SESSION["itemcost"].'</p>

       ';


       ?>
       </div>     
       <br>
       <hr>
       <p>Withdraw Current account balance</p>

       
      </div>



  <!-- About product details page -->
   <div class="see_products_details_page">
    <h1>Products details</h1>
        <button class="see_det_back">Back</button>  <hr>
        <h1> </h1>
    <div class="see_det_name">
        <label for="">Owners name:</label>
        <input type="text" readonly value="">
    </div>
    <img src="data:image/jpeg;base64,"  alt="">
    <div class="see_det_rem">
        <label for="">Available items:</label>
        <p></p>
        <label for="">prize:</label>
        <p></p>
    </div>
    <div class="see_det_location">
      <label for="">Location:</label>
      <p></p>
      
    </div>

    <div class="see_det_message">
        <h1>Message owner</h1>
        <input type="text" name="" id="">
        <input type="submit" value="Send msg">
    </div>
    <input type="submit" value="Buy" class="see_det_submit">

    
   </div>
      

   <!-- About the owner -->
    <div class="about_the_owner_page">
        <h3></h3>
        <h5></h5>
        <img src="data:image/jpeg;base64," alt="">
        <div class="loc">
            <h4>Location:</h4>
            <input type="text" name="" id="" readonly>
        </div>

    </div>
 
<!--  Report an item  -->
  <form class="report_item_page" action="home.php" method="GET">
    <h2>Report Frauders</h2>
    <p>After you find a certain item suspicious,you have the right to report the item.This helps Shellie Commerce community
      to ensure full transparency of the items posted by the suspicious sellers by reviewing them.Feel okay to submit your reviews below.
      If we find it vulnerable,we will remove it immediately within twelve hours.
    </p>
    <input type="email" required name="report_email" class="report_email" placeholder="email">
    <input type="text" name="report subject"  class="report_subject" placeholder="subject">
    <textarea name="report_msg" id="report_msg" cols="20" rows="10"></textarea>
    <input type="submit" name="report_submit" value="Submit">

</form>

  <script >
    const additembtn = document.querySelector(".add-item");
    const additempage = document.querySelector(".additem-page");
    const alteritems = document.querySelector(".alter-items");
    const backtoitems = document.querySelector(".backitemsbtn");
    const itemslayoutpage = document.querySelector(".itemslayout");
    const cart_page = document.querySelector("#cart_page");
    const cart_tab = document.querySelector(".cart_tab")
    const main_box = document.querySelector(".mainbox");


    

    //Php items div rendering
    /*window.onload = ()=>{
      loadProducts();
    }

    function loadProducts(){
      fetch("index.php")
      .then(res => res.text())
      .then(data =>{
        itemslayoutpage.innerHTML = data;
      });
    }

    function submitProduct(e){
      e.preventDefault();
      const formdata = new FormData(additempage);
        fetch("index.php",{
          method : 'POST',
          body:formdata
        })
        .then(res => res.text())
        .then(msg => {
          alert(msg);
          form.reset();
          loadProducts();
        })
        
    }*/
  

    
    //Image loading
    let img_file = document.querySelector(".img_file");
    let imgbox = document.querySelector(".imgbox");

    img_file.addEventListener("change",
      (e) => {
        e.preventDefault();
        let fil = e.target.files[0];
        let header = new FileReader();
        if (fil) {
          header.onload = function (e) {
            e.preventDefault();
            imgbox.src = e.target.result;
            //layoutimg.src = e.target.result;

          };
          header.readAsDataURL(fil)
        }
      })

    //Navigation buttons
    const producttab = document.querySelector(".prod-tab");
  
  

    //Div pages
    const productspage = document.querySelector("#products");
    const wholesettingpage = document.querySelector("#settings");

    producttab.addEventListener("click",
      () => {
      
         productspage.style.display = "block";
         itemslayoutpage.style.display = "flex";
        additempage.style.display = "none";
        cart_page.style.display = "none";
        alteritems.style.display = "block";
          }
                  )

         
    //Cart tab
    cart_tab.addEventListener("click",
      ()=>{
        
        cart_page.style.display = "block";
         itemslayoutpage.style.display = "none"
        productspage.style.display = "none";
         additempage.style.display = "none";
        alteritems.style.display = "none";

        

      }
    )

         

    // MENU btn and page rendering
    const menu_btn = document.querySelector(".prof-tab");
    menu_btn.addEventListener("click",
      ()=>{
        alteritems.style.display = "none";
        additempage.style.display = "none";
        cart_page.style.display = "none";
        itemslayoutpage.style.display = "none";
      }
    )

    additembtn.addEventListener("click",
      () => {
        alteritems.style.display = "none";
        additempage.style.display = "block";
        cart_page.style.display = "none";
        itemslayoutpage.style.display = "none";
        main_box.style.display = "none";
        cart_page.style.display = "none";
        
      }
    )
    backtoitems.addEventListener("click",
      (e) => {
        alteritems.style.display = "block";
        additempage.style.display = "none";
        cart_page.style.display = "none";
        itemslayoutpage.style.display = "flex"
        
      }
    )
    
    

   /* class item {
      constructor(name, file, cost, location) {
        this.name = name;
        this.file = file;
        this.cost = cost;
        this.location = location;



      }


      fixvalues() {


        let layoutcost = document.querySelector(".layoutcost");
        let layoutlocation = document.querySelector(".layoutlocation");
        let layoutimg = document.querySelector(".layoutimg");

        //let itemname = this.name;
        let layoutname = document.querySelector(".layoutname");
        layoutname.textContent = this.name;
        // let itemcost = this.cost;
        layoutcost.textContent = "prize: Ksh." + this.cost;
        //let itemlocation = this.location;
        layoutlocation.textContent = "Location: " + this.location;
        //let itemimg = this.file

        layoutimg.src = "data:image/jpeg;base64;"+this.file;


      }
    }
               */


  //Item Button when clicked
let items_in_cart = document.querySelector(".cart_items");
items_in_cart.textContent = 0 ;

let layoutbuy = document.querySelectorAll(".layoutbuy");
layoutbuy.forEach((btn,id)=>{
     btn.addEventListener("click",
  ()=>{
  let current_items = parseInt(items_in_cart.innerText);
items_in_cart.textContent = current_items + 1;
  items_in_cart.style.color = "purple";

    
   
    }
)
})




    //Getting items details to post
    let nam = document.querySelector(".name");
    let cos = document.querySelector(".cost");
    let loc = document.querySelector(".location");


    //Calling class item to post

    let postitembtn = document.querySelector(".post_item_btn");
     
    
    postitembtn.addEventListener("click",
      (e) => {

        let name = nam.value;
        let cost = cos.value;
        let locatio = loc.value;
        /*let i = 4;
        if (i == 4) {
          let itm = new item(name, imgfile, cost, locatio);*/
          
          //itemslayoutpage.style.display = "block";
          additempage.style.display = "none";
          productspage.style.display = "block";
          alteritems.style.display = "block";
          itemslayoutpage.style.display = "flex";
          
          //itm.fixvalues();


        
        nam.value = "";
        cos.value = "";
        loc.value = "";
        imgbox.src = "";
      }
    )

   /* function load_data(){
      let res =  fetch("index.php")
      .then(res.text())
      
    }*/

    //More details about the item
    const more_item_details = document.querySelectorAll(".more_item_details");
    more_item_details.forEach( (btn,id )=>{
          const more_item_details_page = document.getElementById(id);
      btn.addEventListener("click",
      ()=>{
        
        more_item_details_page.classList.toggle("more_item_details_toggle");
        
        
        })   
        
      }
    
    )
     window.onclick = ()=>{
      more_item_details_page.style.display = "none";
     }

  </script>










 













</body>
</html>